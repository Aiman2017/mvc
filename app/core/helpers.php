<?php
function show($stuff) {
    echo '<pre>';
    var_dump($stuff);
    echo '</pre>';
}

function setEqualForID($keys, $sign): string // =: or !=:
{
    $query = '';
    foreach ($keys as $key) {
        $query .= $key  . $sign .  $key . ' && ';
    }
    return $query;
}