<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

function getCurrentLang() {
    return app()->getLocale();
}

function getLocalizedLangsForNavBar() {
    $getLocalized = '';
    foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
        $getLocalized .= "<li><a href='".LaravelLocalization::getLocalizedURL($localeCode, null, [], true)."'>$properties[native]</a></li>";
    };
    return $getLocalized;
}


function returnError($errNum, $msg = 'Something went wrong'){
    return response()->json([
        'status' => false,
        'errNum' => $errNum,
        'msg' => $msg,
    ]);
}

function returnSuccessMessage($msg = "", $errNum = "S000")
{
    return [
        'status'=> true,
        'errNum'=> $errNum,
        'msg'=> $msg,
    ];
}

function returnData($data, $msg = "")
{
    return response()->json([
        'status'=> true,
        'errNum'=> "S000",
        'msg'=> $msg,
        'data' => $data,
    ]);
}

function returnValidationError($code = 'E001', $validator)
{
    return returnError($code, $validator->errors()->first());
}