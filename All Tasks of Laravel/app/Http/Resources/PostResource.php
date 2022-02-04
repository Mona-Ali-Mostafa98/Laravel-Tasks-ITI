<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id ,  //this refer to attributes of post resource 
            'title' => $this->title ,
            'description' => $this->description ,
            // 'user_name' => isset($this->user) ? $this->user->name : 'Not Found' , //to prevent error show when user name null
            'user' => new UserResource($this ->user) ,
        ];
    }
}
