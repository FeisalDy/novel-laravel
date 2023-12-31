<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Resources\ChapterCollection;
use App\Http\Resources\ChapterResource;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ChapterCollection(Chapter::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $chapter = Chapter::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'novel_id' => $request->input('novel_id') ?? 1,
        ]);

        return (new ChapterResource($chapter))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return (new ChapterResource($chapter))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $chapter->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // $chapter->title = $request->input('title');
        // $chapter->content = $request->input('content');
        // $chapter->save();

        return (new ChapterResource($chapter))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return response()->json(null, 204);
    }

    public function getChapterByNovelId($novel_id)
    {
        $chapter = Chapter::where('novel_id', $novel_id)->get();
        return (new ChapterCollection($chapter))
            ->response()
            ->setStatusCode(200);
    }
}
