<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->where('status','public')->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        return view('news.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $path = $request->file('image_url')->store('images', 'public');
        $path_doc = $request->file('document')->store('documents', 'public');
        try {
            // Insert the data into the database
            DB::table('news')->insert([
                'user_id'=>$user->id,
                'title' => $request['title'],
                'content' => $request['content'],
                'image_url' => $path,
                'document'=>$path_doc,
                'status'=>$request->input('selector')
            ]);

            // Redirect with a success message
            return redirect()->route('news.index')->with('success', 'News item created successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect back with an error message
            \Log::error('Error saving news: ' . $e->getMessage());
            return back()->withErrors(['error' => 'There was an issue saving the news item. Please try again.']);
        }
    }


    public function show($id)
    {
        //$news = News::with('comments')->findOrFail($id);
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
}
