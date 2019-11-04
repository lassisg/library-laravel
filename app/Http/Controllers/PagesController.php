<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        $bestSellers = Book::where('isBestSeller', true)
            ->orderBy('name', 'desc')
            ->take(5)
            ->get();
        $authors = Author::take(5)
            ->get();

        $data = array(
            'title' => "GeraçãoTec Library System",
            'books' => $books,
            'bestSellers' => $bestSellers,
            'authors' => $authors,
        );
        // return view('pages.index', compact('title'));
        return view('pages.index')->with($data);
    }

    public function books()
    {
        $title = "Books";
        return view('pages.books')->with('title', $title);
    }

    public function authors()
    {
        $title = "Authors";
        return view('pages.authors')->with('title', $title);
    }
}