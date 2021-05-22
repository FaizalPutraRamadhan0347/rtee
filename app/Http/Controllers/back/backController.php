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
use App\GlobalSetting;

class backController extends Controller
{
    public function index(){
        $program = Program::count();
        $programPublished = Program::where('isPublished', 1)->count();
        $programSelected = Program::where('isSelected', 1)->count();
        $user = User::where('role', 'user')->count();
        $partner = User::where('role', 'partner')->count();
        $category = Category::count();
    
        return view('back.index', compact('program', 'programPublished', 'user', 'partner' , 'category', 'programSelected'));
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

    // UNTUK HALAMAN SETTINGS ADMIN
    public function globalSetting()
    {
        $global_settings = \App\GlobalSetting::find(1);
        // $settings = GlobalSetting::all();
        return view('back.setting', ['global_setting' => $global_settings]);
    }

    public function updateSetting(Request $request){
        // $user = new \App\User;
        $global_settings = \App\GlobalSetting::find(1);
        $global_settings->persen = $request->persen;
        $global_settings->inforekening = $request->inforekening;
        $global_settings->save();

        return redirect()->back();
    }
}
