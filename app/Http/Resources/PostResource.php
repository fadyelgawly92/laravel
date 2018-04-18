<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostResource extends Resource
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
            'my_title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user)
        ];
    }
}
