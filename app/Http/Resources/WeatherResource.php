<?php

namespace App\Http\Resources;

use App\Http\Resources\Current\AirQuality\AirQualityResource;
use App\Http\Resources\Current\Condition\ConditionResource;
use App\Http\Resources\Current\CurrentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [



            'location'=>new LocationResource($this['location']??null),
             'current'=>new CurrentResource($this['current']??null),
            'Air_Quality'=>new AirQualityResource($this['current']['air_quality']??null),
            'condition'=>new ConditionResource($this['current']['condition']??null),



        ];
    }
}
