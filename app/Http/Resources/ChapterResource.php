<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BooksResource;
use App\Http\Resources\ArticlesResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return ['data' => $this->collection];
        $data = parent::toArray($request);
        // $data['article'] = new ArticlesResource($this->whenLoaded('article'));
        // $data['books'] = new BooksResource($this->whenLoaded('books'));

        return $data;
    }
}
