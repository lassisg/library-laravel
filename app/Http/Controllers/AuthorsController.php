<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => "Authors",
            'authors' => Author::orderBy('last_name', 'asc')->paginate(7),
        );
        return view('authors.index')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        return view('authors.show')->with('author', $author);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "Add Author",
        );

        return view('authors.create')->with($data);
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
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        // Create Author
        $author = new Author;
        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->observations = $request->input('observations');
        $author->save();

        return redirect('/authors')->with('success', 'Author added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'author' => Author::find($id),
        );
        return view('authors.edit')->with($data);
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
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        // Create Author
        $author = Author::find($id);
        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->observations = $request->input('observations');
        $author->save();

        return redirect('/authors')->with('success', 'Author updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $authorName = "{$author->last_name}, {$author->first_name}";
        $author->delete();

        return redirect('/authors')->with('success', "Author '{$authorName}' Removed");
    }
}