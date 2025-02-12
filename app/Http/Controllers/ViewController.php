<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TuitionPost;
use App\Models\Category;
use App\Models\Subject;

class ViewController extends Controller
{

    // Show the home page or landing page
    public function index()
    {
        // Query builder for filtering
        $query = TuitionPost::query();


        // Fetch filtered results with pagination
        $tuitionPosts = $query->latest()->take(4);
        $categories = Category::all();

        return view('home', compact('tuitionPosts', 'categories'));
    }

    // Show all tuition posts
    public function showall(Request $request)
    {
        // Query builder for filtering
        $query = TuitionPost::query();
        
        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Filter by date (newest or oldest)
        if ($request->has('date')) {
            $query->orderBy('created_at', $request->date == 'desc' ? 'desc' : 'asc');
        }

        // Filter by tutor (search by tutor name)
        if ($request->has('tutor')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->tutor . '%');
            });
        }

        // Filter by subject
        if ($request->has('subject') && $request->subject != '') {
            $query->where('subject_id', $request->subject);
        }

        // Fetch filtered results with pagination
        $tuitionPosts = $query->latest()->paginate(12)->appends($request->query());
        $categories = Category::all();
        $subjects = Subject::all();

        return view('tuition.showall', compact('tuitionPosts', 'categories', 'subjects'));
    }

    // Show a single tuition post
    public function show($id)
    {
        $post = TuitionPost::findOrFail($id);
        return view('tuition.show', compact('post'));
    }
}

