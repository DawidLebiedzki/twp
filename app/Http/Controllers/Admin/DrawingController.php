<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Drawing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DrawingController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortBy('article_number_intern');

        $drawings = Drawing::all();
        return view('admin.drawings.index')->with('drawings', $drawings)->with('articles', $articles);
    }

    public function create(){

        $articles = Article::all();

        return view('admin.drawings.create')->with('articles', $articles);
    }

    public function store(Request $request)
    {   
        $file = $request->file('drawing');

       $drawing = Drawing::create($request->all());

       $drawing->addMedia($request->drawing)->toMediaCollection();
        // redirect
        Session::flash('message', 'Successfully created drawing!');
        return Redirect::route('admin.drawings.index');
    }


    public function edit(Drawing $drawing)
    {
        $articles = Article::all()->sortBy('article_number_intern');

        return view('admin.drawings.edit')->with('drawings', $drawing)->with('articles', $articles);

        // return 'Hello Edit';
    }

    public function destroy(Drawing $drawing)
    {
        $drawing->delete();

        // redirect
        Session::flash('message', 'Zeichnung wurde entfernt!');
        return redirect()->route('admin.drawings.index');
    }
}
