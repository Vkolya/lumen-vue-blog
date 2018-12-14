<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'text' => $this->text,
            'author_name' => $this->user->name,
            'created_at' => $this->created_at->toDateTimeString()
        ];
    }
}
