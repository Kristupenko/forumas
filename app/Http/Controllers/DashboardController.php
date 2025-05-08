<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class DashboardController extends Controller
{
    public function index()
    {
        $topics = Topic::with('category', 'user')->paginate(10); 
    return view('dashboard', compact('topics'));}
}
