<?php

function autoload_lluis($classname){
    include 'controllers/' . $classname . '.php';
}

spl_autoload_register('autoload_lluis');