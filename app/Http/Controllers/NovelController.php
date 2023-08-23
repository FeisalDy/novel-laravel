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

        $novel = Novel::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author' => $request->input('author'),
            'cover' => $request->input('cover'),
        ]);

        return (new NovelResource($novel))
            ->response()
            ->setStatusCode(201);
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
        $this->validate($request, [
            'title' => 'sometimes|max:255', // Allow empty value
            'description' => 'sometimes',    // Allow empty value
            'author' => 'sometimes',         // Allow empty value
            'cover' => 'sometimes',          // Allow empty value
        ]);

        $novelData = [
            'title' => $request->input('title', $novel->title), // Use old value if new value is null
            'description' => $request->input('description', $novel->description), // Use old value if new value is null
            'author' => $request->input('author', $novel->author), // Use old value if new value is null
            'cover' => $request->input('cover', $novel->cover), // Use old value if new value is null
        ];

        $novel->update($novelData);

        return (new NovelResource($novel))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        $novel->delete();

        return response()->json(null, 204);
    }
}
