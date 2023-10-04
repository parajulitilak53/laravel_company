<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.sliders.index',['sliders'=>$sliders]);
    }
    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request){
        // validate data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:50000'
        ]);
        // upload image
        // dd($request->all());
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('sliders'), $imageName);

        $slider = new Slider;
        $slider->image = $imageName;
        $slider->title = $request->title;
        $slider->description = $request->description;

        $slider->save();

        notify()->success('Slider is added');

        return redirect()->route('sliders.index');
        // return view('admin.sliders.index');//->withSuccess('Slider Created !!!!');
    }

    public function edit($id){
        //dd($id);
        $slider = Slider::where('id',$id)->first();
        return view('admin.sliders.edit',['slider' => $slider]);
    }

    public function update(Request $request, $id){
        // dd($request->all());
        // validate data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:50000'
        ]);
        $slider = Slider::where('id', $id)->first();
        if(isset($request->image)){
            // upload image
            $imageName = time().'.'.$request->image->extension();
            File::delete(public_path('sliders/' . $slider->image));
            $request->image->move(public_path('sliders'), $imageName);
            $slider->image = $imageName;
        }
        $slider->title = $request->title;
        $slider->description = $request->description;

        $slider->update();

        notify()->success('Slider is updated');

        return redirect()->route('sliders.index');
    }

    public function destroy($id){
        $slider = Slider::where('id',$id)->first();
        File::delete(public_path('sliders/' . $slider->image));
        $slider->delete();

        notify()->success('Slider is deleted');

        return redirect()->route('sliders.index');
    }

    public function show($id){
        $slider = Slider::where('id',$id)->first();
        return view('admin.sliders.show',['slider'=>$slider]);
      }

}
