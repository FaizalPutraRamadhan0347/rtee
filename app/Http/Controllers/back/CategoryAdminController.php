<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryAdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories');
        
        if ($request->get('q')){
            $q = $request->get('q');
            $categories = DB::table('categories')
                ->where('category_name', 'like', '%'.$q.'%');
        }
        
        $total_data = $categories->count();
        $categories = $categories->paginate(20);

        return view('back.categories.list', compact('categories', 'total_data'));
    }

    public function create(Request $request){
        Category::create($request->all());
        return redirect()->back();
    }

    public function edit($id){
        $category = Category::find($id);
        return view('back.categories.edit', compact('category'));
    }

    public function update($id, Request $request){
        $category = Category::find($id);
        $category->update($request->all());
        return redirect('/admin/categories');
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect()->back();
    }
}