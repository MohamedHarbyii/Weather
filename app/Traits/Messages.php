<?php

namespace App\Traits;

trait Messages
{
public function Error($data,$message,$status){
    return response()->json(['data'=>$data,'message'=>$message],$status);
}
}
