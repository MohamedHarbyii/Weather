<?php

namespace App\Http\Resources\Current;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "temp" => $this['temp_c'], // الحرارة بالسيليزيوس
            "feels_like" => $this['feelslike_c'], // درجة الحرارة المحسوسة
            "humidity" => $this['humidity'] . '%', // الرطوبة
            "wind_speed" => $this['wind_kph'] . " km/h",
            "uv_index" => $this["uv"],
            "is_day"=>$this["is_day"],
        ];
    }
}
