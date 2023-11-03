<?php
function libraryOne($classname):void {
    $filename = __DIR__ . DIRECTORY_SEPARATOR
        . str_replace('\\', DIRECTORY_SEPARATOR, $classname)
        . ".php";
    require_once($filename);
}

spl_autoload_register('libraryOne');