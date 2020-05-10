<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Wall extends JsonResource
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
            'ptext' => $this->ptext,
            'pby' => $this->pby,
            'pdate' => $this->pdate,
            'pidby' => $this->pidby,
        ];
    }
}
