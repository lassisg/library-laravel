<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => "Publishers",
            'publishers' => Publisher::orderBy('name', 'asc')->paginate(7),
        );
        return view('publishers.index')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publisher = Publisher::find($id);
        return view('publishers.show')->with('publisher', $publisher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "Add Publisher",
        );

        return view('publishers.create')->with($data);
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
        ]);

        // Create Publisher
        $publisher = new Publisher;
        $publisher->name = $request->input('name');
        $publisher->save();

        return redirect('/publishers')->with('success', 'Publisher added');
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
            'publisher' => Publisher::find($id),
        );
        return view('publishers.edit')->with($data);
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
        ]);

        // Create Publisher
        $publisher = Publisher::find($id);
        $publisher->name = $request->input('name');
        $publisher->save();

        return redirect('/publishers')->with('success', 'Publisher updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisherName = $publisher->name;
        $publisher->delete();

        return redirect('/publishers')->with('success', "Publisher '{$publisherName}' Removed");
    }
}