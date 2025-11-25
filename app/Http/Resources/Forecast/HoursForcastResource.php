<?php

namespace App\Http\Resources\Forecast;

use App\Http\Resources\Current\AirQuality\AirQualityResource;
use App\Http\Resources\Current\Condition\ConditionResource;
use App\Http\Resources\Current\CurrentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HoursForcastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'air_quality'=>new AirQualityResource($this['air_quality']),
            'weather'=>new CurrentResource($this),
            'condition'=>new ConditionResource($this['condition']),
        ];
    }
}
