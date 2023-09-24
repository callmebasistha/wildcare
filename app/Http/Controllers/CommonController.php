<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function customValidation($data,$rules){
        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return ['status'=>false,'message'=>$validator->errors()->first()];
        }else{
            return ['status'=>true,'message'=>''];

        }
    }
}
