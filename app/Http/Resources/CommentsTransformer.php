<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentsTransformer extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($comment){
                return [
                    'id'            => $comment->id,
                    'user'          => $comment->user,
                    'body'          => $comment->body,
                    'depth'         => $comment->depth,
                    'created_at'    => Carbon::parse($comment->created_at)->format('M d , Y H:i'),
                ];
            }),
        ];
    }
}
