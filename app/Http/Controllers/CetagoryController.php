<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorys;
class CetagoryController extends Controller
{
    public function DataCategory(){
        $category = categorys::all();
        return view('Dashboard.category.index', compact('category'));
    }

    public function CreateCat(){

        return view('Dashboard.category.create');
    }

    public function PostCategory(Request $request){
        $request->validate([
            'name' => 'required',
            'slug_category' => 'required'
        ]);

        $category = categorys::create($request->all());

        if($category->save()){
            return redirect()->route('Data_Category')->with('success', 'Data Saved Successfully');
        }else{
            return redirect()->back()->with('failed', 'Data failed to save, chack the input data again');
        }

    }

    public function EditCat($id){
        $dec = decrypt($id);
        $category = categorys::findOrFail($dec);

        return view('Dashboard.category.edit', compact('category'));
    }

    public function UpdateCat(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'slug_category' => 'required'
        ]);

        $dec = decrypt($id);
        $category = categorys::findOrFail($dec);
        $category->name = $request->name;
        $category->slug_category = $request->slug_category;

        if($category->save()){
            return redirect()->route('Data_Category')->with('success', 'Data Update Successfully');
        }else{
            return redirect()->back()->with('failed', 'Data failed to update, chack the input data again');
        }
    }

    public function deleteCat($id){
        $dec = decrypt($id);
        $category = categorys::findOrFail($dec);
        $category->delete();

        if($category->delete()){
            return redirect()->route('Data_Category')->with('success', 'Data Delete Successfully');
        }else{
            return redirect()->back()->with('failed', 'Data failed to delete, chack the input data again');
        }

    }
}
