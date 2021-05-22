<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\ApprovePartnerEmail;
use App\Mail\RejectPartnerEmail;

class UserAdminController extends Controller
{
    public $user_status = [
        'active' => 'Aktif',
        'pending' => 'Pending',
        'suspend' => 'Suspend',
        'reject' => 'Reject',
    ];

    public function index(Request $request)
    {
        $total_per_page = 20;

        $users = DB::table('users')->paginate($total_per_page);
        
        if ($request->get('cari')){
            $cari = $request->get('cari');
 
            $users = DB::table('users')
                ->where('name','like',"%".$cari."%")
                ->orWhere('email', 'like', '%'.$cari.'%')
                ->orWhere('no_hp', 'like', '%'.$cari.'%')
                ->orWhere('status', 'like', '%'.$cari.'%')
                ->paginate($total_per_page);
        }

        if ($request->get('filter')){
            $filter = $request->get('filter');
        
            $users = DB::table('users')
                ->where('role', 'like', "%".$filter."%")
                ->orWhere('status', 'like', "%".$filter."%")
                ->paginate($total_per_page);
        }
        
        $user_status = $this->user_status;
        $total_data = $users->count();

        return view('back.users' , compact('users', 'user_status', 'total_data'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:120',
            'email' => 'required|unique:users|max:120',
            'no_hp' => 'required|min:2|max:15',
            'password' => 'required|min:6|max:255',
            'cpassword' => 'required|max:255|same:password',
            'role' => 'required',
        ], [
            'name.required' => 'masukan nama', 
            'email.required' => 'masukan email', 
            'no_hp.required' => 'masukan nomor telepon atau nomor hp',
            'password.required' => 'masukan password minimal 6 karakter',
            'cpassword.required' => 'konfirmasi password',
            'cpassword.same' => 'tidak cocok dengan password',
            'role.required' => 'pilihlah role pengguna',
        ]);
        
        $user = new \App\User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        if($request->role == 'user' || 'admin'){
            $user->status = 'active';
        } else {
            $user->status = 'pending';
        }

        $user->password = bcrypt($request->password);
        $user->remember_token = str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        return redirect('admin/users');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = \App\User::find($id);
        return view('back.editUser', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/admin/users');
    }

    public function updateStatus($id, $status)
    {
        $user_status = array_keys($this->user_status);

        if (in_array($status, $user_status)){
            $user = User::find($id);
            $user->update(['status' => $status]);
            if ($user->role == 'partner' && $user->status == 'pending'){
                if ($status == 'active'){
                    Mail::to($user->email)->send(new ApprovePartnerEmail($user->name, $user->email));
                } else if ($status == 'reject'){
                    Mail::to($user->email)->send(new RejectPartnerEmail($user->name));
                }
            }

            return redirect()->back();
        } else {
            return redirect()->with(['error' => 'Invalid status'])->back();
        }
    }
}