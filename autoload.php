<?php
//auto carga de clases
function autoload($class){
include 'controllers/' . $class . '.php';

}

spl_autoload_register('autoload');