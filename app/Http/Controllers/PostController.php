<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class PostController extends Controller
{
    public function create(Request $request)
{
    $topic = Topic::findOrFail($request->topic_id);

    return view('posts.create', compact('topic'));
}
}
