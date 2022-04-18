<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $deapartments = Category::all();
        return view('dashboard.index')->with('deapartments', $deapartments);
    }
}
