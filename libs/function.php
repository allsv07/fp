<?php

function isAjax(){
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }
}

function pr($arr){
    echo '<pre>'.print_r($arr, 1).'</pre>';
}