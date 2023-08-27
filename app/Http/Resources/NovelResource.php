<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ChapterResource; // Import your ChapterResource


class NovelResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'novels',
            'id' => $this->id(),
            'title' => $this->title(),
            'author' => $this->author(),
            'cover' => $this->cover(),
            'description' => $this->description(),
            'links' => [
                'self' => route('novels.show', $this->id()),
                'related' => route('novels.show', $this->title()),
            ],
            // 'relationships' => [
            //     'data' => ChapterResource::collection($this->chapters),
            // ],
        ];
    }
    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
    }
}
