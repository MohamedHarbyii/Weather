<?php

namespace App\Http\Resources\Current\Condition;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConditionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return

        [
            "status"      => $this['text'], // حالة الجو (مثلا Partly cloudy)
            "icon"        => "https:" . $this['icon'], // الأيقونة (زودنا https عشان تظهر)
        ];
    }
}
