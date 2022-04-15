<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        Log::info('dsadsad testt');
        $result = view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('departments', Category::all());
        if(request()->input('id')) {
            $result-> with('user', User::find(request()->input('id')));
//            dd(User::find(request()->input('id')));
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
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
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);

        $request->merge([
            'password' => Hash::make($request->input('password')),
        ]);
//        dd($request->all());
        User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = User::find($id);
        return view('products.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = User::find($id);
        $users = User::latest()->paginate(10);

        return view('users.index')
            ->with('i', (request()->input('page', 1) - 1) * 10)
            ->with('item', $item)
            ->with('users', $users);
//        return view('users.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
//        dd($user);
        $user->delete();
//        $user->update([
//            'active' => $user->active == 0 ? 1 : 0
//        ]);

        return redirect()->route('users.index')
            ->with('success', 'Delete user success');
    }
}
