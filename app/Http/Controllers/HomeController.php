<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        return redirect('login');
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
        $jobs = $jobs->where('active', 1);
        $jobs = $jobs->where('status', 1);
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
        $jobDetail = null;
        if (Auth::check()) {
            $jobDetail = JobDetail::where('job_id', $id)->where('user_id', Auth::id())->first();
        }

        return view('job-detail', compact('job'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('categories', Category::all())
            ->with('jobDetail', $jobDetail);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profileUpdate(Request $request)
    {

        $user = User::find(Auth::id());
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $request->merge([
                'file_dinh_kem' => $imageName
            ]);
        }

        $user->update($request->all());
        return redirect()->route('profile')
            ->with('success', 'Cập nhật thông tin thành công');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apply($jobId)
    {
        JobDetail::create([
            'job_id' => $jobId,
            'user_id' => Auth::id(),
            'status' => 0
        ]);
        $job = Job::find($jobId);
//        Mail::to($job->user->email)->send(new NotifyMail());
//
//        if (Mail::failures()) {
//            return redirect()->route('welcome');
//        }else{
//            return redirect()->route('welcome');
//        }
        return redirect()->route('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function history()
    {
        $jobDetails = JobDetail::where('user_id', Auth::id())->paginate(7);

        return view('history', compact('jobDetails'));
    }
}
