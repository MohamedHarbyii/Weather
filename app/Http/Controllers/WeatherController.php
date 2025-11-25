<?php

namespace App\Http\Controllers;

use App\Classes\Weather;
use App\Http\Requests\CurrentRequest;
use App\Http\Requests\ForecastRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\Forecast\DailyForecastResource;
use App\Http\Resources\WeatherResource;

class WeatherController extends Controller
{


    public function Current(CurrentRequest $request)
    {
        $query=$request->validated();
        $weather=new Weather($query,$request->getQueryString());
        $data=$weather->Current();

        return isset($data['error'])?$data:new WeatherResource($data);
    }
    public function Forecast(ForecastRequest $request)
    {
        $query=$request->validated();
        $weather=new Weather($query,$request->getQueryString());
        $data=$weather->Forecast();
        return isset($data['error'])?$data:[
            'weather'=>new WeatherResource($data),
            'forecast'=>DailyForecastResource::collection($data['forecast']['forecastday']),
            'alerts'=>$data['alerts']??null

        ];

    }
    public function Search(SearchRequest $request)
    {
        $query=$request->validated();
        $weather=new Weather($query,$request->getQueryString());
        $data=$weather->Search();
        return $data;

    }
}
