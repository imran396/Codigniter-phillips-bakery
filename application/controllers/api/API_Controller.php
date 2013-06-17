<?php

class API_Controller extends CI_Controller
{
    protected function sendOutput($data, $code = 200, $content_type = "application/json")
    {
        header("HTTP/1.1: $code");
		header("Status: $code");
        header("Content-type: $content_type");

        echo json_encode($data);
    }
}