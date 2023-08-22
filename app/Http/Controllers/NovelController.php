<?php

namespace App\Http\Controllers;

use App\Http\Resources\NovelCollection;
use App\Http\Resources\NovelResource;
use App\Models\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new NovelCollection(Novel::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:novels|max:255',
            'description' => 'required',
            'author' => 'required',
            'cover' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Novel $novel)
    {
        return (new NovelResource($novel))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Novel $novel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        //
    }
}
