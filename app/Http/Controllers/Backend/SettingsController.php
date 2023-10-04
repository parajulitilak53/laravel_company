<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::latest()->get();
        return view('admin.settings.index',['settings'=>$settings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'site_key' => 'required',
            'site_value' => 'required',
        ]);
        // dd($request->all());
        $setting = new Setting;
        $setting->site_key = $request->site_key;
        $setting->site_value = $request->site_value;

        $setting->save();

        notify()->success('Setting is added');

        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $setting = Setting::where('id',$id)->first();
        return view('admin.settings.show',['setting'=>$setting]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::where('id',$id)->first();
        return view('admin.settings.edit',['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'site_key' => 'required',
            'site_value' => 'required'
        ]);
        $setting = Setting::where('id', $id)->first();
        $setting->site_key = $request->site_key;
        $setting->site_value = $request->site_value;

        $setting->update();

        notify()->success('setting is updated');

        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::where('id',$id)->first();
        $setting->delete();

        notify()->success('Setting is deleted');

        return redirect()->route('settings.index');
    }
}
