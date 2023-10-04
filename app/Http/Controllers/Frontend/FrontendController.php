<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('frontend.index', ['settings'=>$settings]);
    }
    public function about()
    {
        $abouts = About::first();
        $services = Service::get();
        return view('frontend.about',compact('abouts','services'));
    }
    public function service()
    {
        $services = Service::get();
        return view('frontend.services',['services'=>$services]);
    }
    public function teams()
    {
        return view('frontend.team');
    }
    public function testimonials()
    {
        return view('frontend.testimonials');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function blog_single()
    {
        return view('frontend.blog-single');
    }
    public function pricing()
    {
        return view('frontend.pricing');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function portfolio()
    {
        return view('frontend.portfolio');
    }
    public function portfolio_details()
    {
        return view('frontend.portfolio-details');
    }
}
