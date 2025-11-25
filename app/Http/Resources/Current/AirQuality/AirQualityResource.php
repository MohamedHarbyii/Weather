<?php

namespace App\Http\Resources\Current\AirQuality;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AirQualityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // مصفوفة بسيطة لترجمة الأرقام لكلام مفهوم
        $descriptions = [
            1 => 'Good',
            2 => 'Moderate',
            3 => 'Unhealthy for sensitive groups',
            4 => 'Unhealthy',
            5 => 'Very Unhealthy',
            6 => 'Hazardous'
        ];

        $index = $this['us-epa-index'] ?? 1;

        return [
            'us_epa_index' => $index,
            'description'  => $descriptions[$index] ?? 'Unknown',
            'pm2_5'        => $this['pm2_5'] ?? 0, // الجسيمات الدقيقة
            'co'           => $this['co'] ?? 0,    // أول أكسيد الكربون (اختياري)
        ];
    }
}
