<?php

namespace App\Classes;

use App\Traits\External_Api;
use Illuminate\Support\Facades\Cache;

class Weather
{

    private const url="http://api.weatherapi.com/v1/";
    private const key="4e54187f322c494a92d111238252411";
    private $query;
    private $location;
    private $query_string;

    /**
     * Create a new class instance.
     */
    public function __construct($query,$query_string)
    {
        $this->query=$query;
        $this->location=$query['q'];
        $this->query['key']=self::key;
        $this->query_string=$query_string;
    }
    public function Current()
    {
       $end_point=self::url.'current.json';
        /*
         used current to assign the location to its endpoint because i'll be using the same location in different
        end points
        */
        return Cache::remember($this->query_string,now()->addHours(12),function()use($end_point){
            return External_Api::get($end_point,$this->query);
        });



    }
    public function Forecast()
    {
        return Cache::remember($this->query_string,now()->addHours(12),function(){
            return  External_Api::get(self::url."forecast.json",$this->query);

        });
    }
    public function Search()
    {
        return Cache::remember('search.'.$this->query_string,now()->addHours(12),function(){
            return  External_Api::get(self::url."search.json",$this->query);
        });
    }

}
