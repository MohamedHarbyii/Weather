<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

abstract class External_Api
{

 public static function get($end_point,$query=null)
 {
     $data=Http::get($end_point,$query);
     return $data->json() ;
 }
}
