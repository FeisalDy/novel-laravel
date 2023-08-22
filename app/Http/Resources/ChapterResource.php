<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'chapters',
            'id' => $this->id(),
            'attributes' => [
                'title' => $this->title(),
                'content' => $this->content(),
            ],
            'links' => [
                'self' => route('chapters.show', $this->id()),
                'related' => route('chapters.show', $this->title()),
                'novel' => route('novels.show', $this->novel_id),
            ],
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
