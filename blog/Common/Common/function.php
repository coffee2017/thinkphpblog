<?php
function setting(){
    $config =   M("setting")->getField('k,v');
    return $config;
}
function showbug($bug){
  echo "<pre style='color:red'>";
  var_dump($bug);
  echo "</pre>";
}

