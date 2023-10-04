<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutsController extends Controller
{
    public function index(){

        $abouts = About::latest()->get();
        return view('admin.abouts.index',['abouts'=>$abouts]);
    }

    public function create(){

        return view('admin.abouts.create');
    }

    public function store(Request $request){
        // validate data
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required'
        ]);
        // dd($request->all());
        $about = new About;
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->description = $request->description;

        $about->save();

        notify()->success('About is added');

        return redirect()->route('abouts.index');
        // return view('admin.sliders.index');//->withSuccess('Slider Created !!!!');
    }
    public function edit($id){
        //dd($id);
        $about = About::where('id',$id)->first();
        return view('admin.abouts.edit',['about' => $about]);
    }
    public function update(Request $request, $id){
        // dd($request->all());
        // validate data
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required'
        ]);
        $about = About::where('id', $id)->first();
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->description = $request->description;

        $about->update();

        notify()->success('About is updated');

        return redirect()->route('abouts.index');
    }

    public function destroy($id){
        $about = About::where('id',$id)->first();
        $about->delete();

        notify()->success('About is deleted');

        return redirect()->route('abouts.index');
    }

    public function show($id){
        $about = About::where('id',$id)->first();
        return view('admin.abouts.show',['about'=>$about]);
      }

}
