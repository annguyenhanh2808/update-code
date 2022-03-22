<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com', 'password' => Hash::make('123456'),
            'type' => 1,
            'active' => 1
        ]);
        return view('home');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::where('type', 2)->get();
        return view('adminHome')
            ->with('users', $users);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jobList(Request $request, $categoryId = null)
    {
        $jobs = Job::latest();
        if ($categoryId) {
            $jobs = $jobs->where('category_id', $categoryId);
        }
        if ($request->input('category_id')) {
            $jobs = $jobs->where('category_id', $request->input('category_id'));
        }
        if ($request->input('title')) {
            $jobs = $jobs->whereRaw("UPPER(title) LIKE '%" . strtoupper($request->input('title')) . "%'");
        }
        if ($request->input('job_type')) {
            $jobs = $jobs->where('job_type', $request->input('job_type'));
        }
        $jobs = $jobs->paginate(7);
        return view('job-list', compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('categories', Category::all());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function jobDetail($id)
    {
        $job = Job::find($id);
        return view('job-detail', compact('job'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('categories', Category::all());
    }
}