<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DonationConfirmation;
use App\Program;
use App\Category;
use App\User;
use App\Development;
use App\Report;

class backController extends Controller
{
    public function index(){
        $program = Program::count();
        $programPublished = Program::where('isPublished', 1)->count();
        $programSelected = Program::where('isSelected', 1)->count();
        $user = User::where('role', 0)->count();
        $category = Category::count();
    
        return view('back.index', compact('program', 'programPublished', 'user', 'category', 'programSelected'));
    }

    public function program(){
        $programs = Program::with('report')->get();
        return view('back.program', compact('programs'));
    }

    public function categories(){
        $categories = Category::all();
        return view('back.categories', ['categories' => $categories]);
    }

    public function categoriescreate(Request $request){
        Category::create($request->all());
        return redirect()->back();
    }

    public function published($id){
        $program = Program::find($id);
        if($program->isPublished == 0){
            $program->update(['isPublished' => 1]);
        }else{
            $program->update(['isPublished' => 0]);
        }

        return redirect()->back();
    }

    public function selected($id){
        $program = Program::find($id);
        if($program->isSelected == 0){
            $program->update(['isSelected' => 1]);
        }else{
            $program->update(['isSelected' => 0]);
        }

        return redirect()->back();
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect()->back();
    }

    public function detail($id){
        $program = Program::find($id);
        $donaturCount = DonationConfirmation::where('program_id', $id)->count();
        $devs = Development::where('program_id', $program->id)->get();
        $reports = Report::where('program_id', $program->id)->get();
        return view('back.detail', compact('program', 'donaturCount', 'devs', 'reports'));
    }

    public function hapusProgram($id){
        Program::destroy($id);
        return redirect()->back();
    }

    public function kelolaUser()
    {
        // mengambil data dari table users
        $users = DB::table('users')->paginate(10);

        // mengirim data users ke view users
        // $users = User::all();
        return view('back.users' , ['users' => $users]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		// $cari = $request->cari;
        $cari = $request->get('cari');
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$users = DB::table('users')
		->where('name','like',"%".$cari."%")
		->paginate(5);
 
    		// mengirim data pegawai ke view index
		return view('back.users',['users' => $users]);
 
	}

    public function createUser(Request $request)
    {
        $user = new \App\User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->status = 'active';
        $user->password = bcrypt($request->password);
        $user->remember_token = str::random(60);
        $user->save();


        // Insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        // $siswa = \App\User::create($request->all()) ;
        return redirect('admin/users');
        

        // User::create($request->all());
        // return redirect()->back();
    }

    public function hapusUser($id)
    {
        // $user = User::find($id);
        User::destroy($id);
        // $user->delete();
        return redirect()->back();
    }

    public function editUser($id)
    {
        $user = \App\User::find($id);
        // dd($user);
        return view('back.editUser', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->update($request->all());
        return redirect('/admin/users');
    }

    // public function search(Request $request)
    // {
    //     $search =  $request->input('q');
    //     if($search!=""){
    //         $users = User::where(function ($query) use ($search){
    //             $query->where('name', 'like', '%'.$search.'%')
    //                 ->orWhere('email', 'like', '%'.$search.'%');
    //         })
    //         ->paginate(2);
    //         $users->appends(['q' => $search]);
    //     }
    //     else{
    //         $users = User::paginate(2);
    //     }
    //     return View('back.user')->with('data',$users);
    //     //
    // }



}
