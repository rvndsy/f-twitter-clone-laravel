<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = [
            "title" => "First Title",
            "date" => "2024-05-14",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat, magni exercitationem. Aspernatur, error inventore! Velit, voluptate? Enim, nihil nostrum labore odit suscipit distinctio consectetur dicta qui, sit officiis accusantium repellat?"
        ];

        return view('posts.show')
            ->with( 'P', $result);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
