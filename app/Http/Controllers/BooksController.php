<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Book;
use App\Author;
use App\Publisher;
use Illuminate\View\View;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => "Books",
            'books' => Book::orderBy('name', 'asc')->paginate(7),
        );
        // $books = Book::all();
        // $books = Book::orderBy('name', 'asc')->get();
        // $books = Book::orderBy('name', 'asc')->paginate(3);
        return view('books.index')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::get()->mapWithKeys(function ($item) {
            return [$item['id'] => "{$item['last_name']}, {$item['first_name']}"];
        });

        $data = array(
            'title' => "Add Book",
            'authors' => $authors,
            'publishers' => Publisher::pluck('name', 'id')
        );

        return view('books.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'edition' => 'required',
            'copies' => 'required',
            'cover' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if ($request->hasFile('cover')) {
            $fileName = Str::slug($request->input('name'), '_') . '_' . time();
            $extension = $request->file('cover')->getClientOriginalExtension();
            $fileNameToStore = $fileName . ".{$extension}";

            $coverPath = $request->file('cover')->storeAs(
                'public/cover_images',
                $fileNameToStore
            );
        } else {
            $fileNameToStore = 'noImage.png';
        }

        // Create Book
        $book = new Book;
        $book->name = $request->input('name');
        $book->publisher_id = $request->input('publisher');
        $book->edition = $request->input('edition');
        $book->published_at = $request->input('published_at');
        $book->isbn = $request->input('isbn');
        $book->cover = $fileNameToStore;
        $book->copies = $request->input('copies');
        $book->location = $request->input('location');
        $book->review = $request->input('review');


        $book->save();
        $book->authors()->sync($request->input('author'));

        return redirect('/books')->with('success', 'Book added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::get()->mapWithKeys(function ($item) {
            return [$item['id'] => "{$item['last_name']}, {$item['first_name']}"];
        });

        $data = array(
            'book' => Book::find($id),
            'authors' => $authors,
            'publishers' => Publisher::pluck('name', 'id')
        );
        return view('books.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'edition' => 'required',
            'copies' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('cover')) {
            $fileName = Str::slug($request->input('name'), '_') . '_' . time();
            $extension = $request->file('cover')->getClientOriginalExtension();
            $fileNameToStore = $fileName . ".{$extension}";

            $coverPath = $request->file('cover')->storeAs(
                'public/cover_images',
                $fileNameToStore
            );
        }

        // Create Book
        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->authors()->sync($request->input('author'));
        $book->publisher_id = $request->input('publisher');
        $book->edition = $request->input('edition');
        $book->published_at = $request->input('published_at');
        $book->isbn = $request->input('isbn');
        if ($request->hasFile('cover')) {
            $book->cover = $fileNameToStore;
        }
        $book->copies = $request->input('copies');
        $book->location = $request->input('location');
        $book->review = $request->input('review');
        $book->save();

        return redirect('/books')->with('success', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $bookName = $book->name;

        // Remove book image if any
        if ($book->cover != 'noImage.png') {
            Storage::delete('public/cover_images/' . $book->cover);
        }

        $book->authors()->detach($book->authors);
        $book->delete();

        return redirect('/books')->with('success', "Book '{$bookName}' Removed");
    }
}