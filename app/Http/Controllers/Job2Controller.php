<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Job2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->type == 2) {
            $items = Job::where('user_id', Auth::user()->id)->paginate(5);
        } else {
            $items = Job::latest()->paginate(5);
        }


        return view('job2.index', compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('job2.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'job_type' => 'required',
            'expired_date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'skills' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $request->merge([
            'image_url' => $imageName,
            'status' => 0,
            'user_id' => Auth::user()->id,
            'expired_date' => Carbon::parse($request->input('expired_date')),
        ]);
        Job::create($request->all());

        return redirect()->route('job2.index')
            ->with('success', 'Thêm Job thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Job::find($id);
        return view('job2.edit', compact('item'))->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $job = Job::find($id);
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'job_type' => 'required',
            'expired_date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'skills' => 'required',
        ]);

        $request->merge([
            'expired_date' => Carbon::parse($request->input('expired_date')),
        ]);
        $job->update($request->all());
        return redirect()->route('job2.index')
            ->with('success', 'Cập nhật Job thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $job = Job::find($id);
        $job->update([
            'active' => $job->active == 1 ? 0 : 1
        ]);
        return redirect()->route('job2.index')
            ->with('success', 'Cập nhật Job thành công');
    }
}
