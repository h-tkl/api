<?php

function json_api($data,$success=true,$msg=""){
    $result=[
        'success'=>$success,
        'errorMsg'=>$msg,
        'result'=>$data
    ];
    return json($result);
}