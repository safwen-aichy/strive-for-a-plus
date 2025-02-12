<?php

namespace App\Http\Controllers;

use App\Models\TuitionPost;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionPostController extends Controller
{
    // Show tutor's dashboard
    public function index()
    {
        if (auth()->user()->role !== 'tutor') {
            abort(403, 'Unauthorized action.');
        }
        $posts = Auth::user()->tuitionPosts()->paginate(12);
        return view('dashboard', compact('posts'));
    }

    // Show the form to create a new tuition post
    public function create()
    {
        if (auth()->user()->role !== 'tutor') {
            abort(403, 'Unauthorized action.');
        }
        
        // Fetch categories and predefined subjects
        $categories = Category::all();
        $subjects = Subject::all();

        return view('tuition.create', compact('categories', 'subjects'));
    }


    // Show a single post for editing
    public function edit($id)
    {
        $post = TuitionPost::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        $subjects = Subject::all();

        return view('tuition.edit', compact('post', 'categories', 'subjects'));
    }

    // Store a new tuition post
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id', // Restrict to predefined subjects
            'fee' => 'required|numeric|min:0',
            'max_students' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        Auth::user()->tuitionPosts()->create([
            'subject_id' => $request->subject_id, // Store the subject ID
            'fee' => $request->fee,
            'max_students' => $request->max_students,
            'category_id' => $request->category_id,
            'photo_path' => $photoPath,
        ]);

        return redirect('/dashboard')->with('success', 'Tuition post created successfully!');
    }

    // Update an existing post
    public function update(Request $request, $id)
    {
        $post = TuitionPost::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'fee' => 'required|numeric|min:0',
            'max_students' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($request->only('subject_id', 'fee', 'max_students', 'category_id'));

        return redirect('/dashboard')->with('success', 'Post updated successfully.');
    }

    // Delete a post
    public function destroy($id)
    {
        $post = TuitionPost::findOrFail($id);

        if ($post->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect('/dashboard')->with('success', 'Post deleted successfully.');
    }
}
