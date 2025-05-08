<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Post;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $query = Topic::query()->with('user', 'category');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $topics = $query->paginate(10);

        return view('topics.index', compact('topics'));
    }
    //sukuria 
    public function create()
    {
        $categories = Category::all();
        return view('topics.create', compact('categories'));
    }

    public function show(Topic $topic)
    {
        $topic->load('category', 'user', 'posts.user');
        return view('topics.show', compact('topic'));
    }
    //išsaugo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        //sukuria tema
        Topic::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('topics.index')->with('success', 'Tema sėkmingai sukurta!');
    }
    public function addPost(Request $request, Topic $topic)//prideda įrašu tai temai
{
    $validated = $request->validate([
        'content' => 'required|string',
    ]);

    $topic->posts()->create([
        'content' => $validated['content'],
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('topics.show', $topic)->with('success', 'Komentaras pridėtas!');
}
}
