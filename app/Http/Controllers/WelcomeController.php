<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $job = Job::where('active', 1)->where('status', 1)->latest()->take(4)->get();
        return view('welcome')
            ->with('categoriesAll', Category::all())
            ->with('categories8', Category::latest()->take(8)->get())
            ->with('jobs', $job);
    }
}
