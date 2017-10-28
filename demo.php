<?php 
session_start();
require "Csrf.php";

//generate a token 
$token=Csrf::generate(32);

var_dump($token);


//just do a simple test
var_dump(Csrf::check("lfldfldf");
?>