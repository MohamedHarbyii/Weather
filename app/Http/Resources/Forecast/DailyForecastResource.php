<?php

namespace App\Http\Resources\Forecast;

use App\Http\Resources\AstroResource;
use App\Http\Resources\Current\Condition\ConditionResource;
use App\Http\Resources\DateTimeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyForecastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'date'=>new DateTimeResource($this),
            'max_temp' => $this['day']['maxtemp_c'],
            'min_temp' => $this['day']['mintemp_c'],
            'avg_temp' => $this['day']['avgtemp_c'],
            'condition' => new ConditionResource($this['day']['condition']),
            'rain_chance' => $this['day']['daily_chance_of_rain'] . '%',
            'humidity' => $this['day']['avghumidity'] . '%',
            'astro' => new AstroResource($this['astro']),
            'hours_forecast'=>HoursForcastResource::collection($this['hour']),


            ];
    }
}
