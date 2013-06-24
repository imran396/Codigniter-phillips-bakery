<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Base Controller
 *
 * Common tasks of all controllers are done here. Only inherit, no direct use please.
 *
 * @category Controller
 * @author   Emran Hasan <emran@rightbrainsolution.com>
 */
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