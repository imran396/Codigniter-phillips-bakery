<?php
include(APPPATH."/helpers/class.idgenerator.php");

function returnGenerateID(){

    $generator = new IdGenerator(999);
    return $generator->generate();
}