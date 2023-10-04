<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicsController extends Controller
{
    public function index(){

        $services = Service::latest()->get();
        return view('admin.services.index',['services'=>$services]);
    }

    public function create(){

        return view('admin.services.create');
    }

    public function store(Request $request){
        // validate data
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        // dd($request->all());
        $service = new Service;
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        $service->save();

        notify()->success('Service is added');

        return redirect()->route('services.index');
        // return view('admin.sliders.index');//->withSuccess('Slider Created !!!!');
    }

    public function edit($id){
        //dd($id);
        $service = Service::where('id',$id)->first();
        return view('admin.services.edit',['service' => $service]);
    }

    public function update(Request $request, $id){
        // dd($request->all());
        // validate data
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        $service = Service::where('id', $id)->first();
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        $service->update();

        notify()->success('Service is updated');

        return redirect()->route('services.index');
    }

    public function destroy($id){
        $service = Service::where('id',$id)->first();
        $service->delete();

        notify()->success('Service is deleted');

        return redirect()->route('services.index');
    }

    public function show($id){
        $service = Service::where('id',$id)->first();
        return view('admin.services.show',['service'=>$service]);
      }
}
