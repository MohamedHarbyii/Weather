<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AstroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sunrise'=>$this['sunrise'],
            'sunset'=>$this['sunset'],
            'moonrise'=>$this['moonrise'],
            'moonset'=>$this['moonset'],
            'moon_phase'=>$this['moon_phase'],
        ];
    }
}
