<?php

class Revel_Model extends CI_Model
{
    protected $revel;

    public function __construct()
    {
        parent::__construct();
        $this->revel = $this->config->item('revel');
    }

    protected function getResource($resource, $format = 'json')
    {
        $client = new HttpRequest($this->revel['endpoint'] . '/resources/' . $resource . '/?format=' . $format);

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));
        $client->send();

        return $client->getResponseBody();
    }

    protected function postResource($resource, $data)
    {
        $client = new HttpRequest($this->revel['endpoint'] . '/resources/' . $resource . '/');

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));

        $client->setBody(str_replace('\\/', '/', json_encode($data, 64)));
        $client->setMethod(HTTP_METH_POST);
        $client->send();

        return $client->getResponseBody();
    }

    protected function generateUUID()
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