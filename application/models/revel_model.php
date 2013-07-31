<?php

include_once realpath(APPPATH .'libraries') . '/httpful.phar';

class Revel_Model extends CI_Model
{
    protected $revel;
    protected $response;
    protected $headers;
    protected $code;

    public function __construct()
    {
        parent::__construct();
        $this->revel = $this->config->item('revel');
    }

    protected function getResource($resource, $offset = 0, $limit = 20, $format = 'json', $debug = false)
    {
        $params = array('offset' => $offset, 'limit' => $limit, 'format' => $format);
        $client = \Httpful\Request::get($this->revel['endpoint'] . '/resources/' . $resource . '/?' . http_build_query($params));

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));
        $response = $client->send();

        $this->code     = $response->code;
        $this->response = $response->body;
        $this->headers  = $response->headers;

        if ($debug) {
            var_dump($response);
        }

        return $response->raw_body;
    }

    protected function postResource($resource, $data, $debug = false)
    {
        $client = \Httpful\Request::post($this->revel['endpoint'] . '/resources/' . $resource . '/');

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));
        $client->sendsAndExpects('json');

        $client->body(str_replace('\\/', '/', json_encode($data)));
        $response = $client->send();

        $this->code     = $response->code;
        $this->response = $response->body;
        $this->headers  = $response->headers;

        if ($debug) {
            var_dump($response);
        }

        return $response->raw_body;
    }

    protected function deleteResource($resource, $id, $debug = false)
    {
        $client = \Httpful\Request::delete($this->revel['endpoint'] . '/resources/' . $resource . '/' . $id . '/');

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));
        $response = $client->send();

        $this->code     = $response->code;
        $this->response = $response->body;
        $this->headers  = $response->headers;

        return $response->raw_body;
    }

    public function generateUUID()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)

        );
    }
}