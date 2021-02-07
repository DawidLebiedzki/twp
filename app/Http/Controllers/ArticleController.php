<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webPage = 'Artikeln';

        $articles = Article::all();
        return view('articles.index')->with('articles', $articles)->with('webpage', $webPage);
    }
}
