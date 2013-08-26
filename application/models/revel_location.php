<?php

class Revel_Location extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('PosStation');
    }

    public function create($data)
    {
        $data = array(
            'active'                          => true,
            'card_options_array'              => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
            'devices'                         => array(),
            'dining_options_array'            => array(0, 1, 2, 3, 4, 5),
            'disable_auto_prompt_for_barcode' => false,
            'disable_local_synchronization'   => false,
            'establishment'                   => $this->revel['establishment'],
            'ip_address'                      => null,
            'is_bar'                          => false,
            'kitchen_view'                    => false,
            'mac'                             => '',
            'name'                            => $data['title'],
            'network_key'                     => '',
            'no_cash_drawer'                  => false,
            'payment_options_array'           => array(1, 2, 3, 4, 5, 6, 7, 8),
            'pos_mode'                        => 'T',
            'uuid'                            => $this->generateUUID(),
        );

        $this->postResource('PosStation', $data, true);
        return basename($this->headers['location']);
    }

    public function update($data)
    {
        $Locationdata = array(
            'active'                          => true,
            'card_options_array'              => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
            'devices'                         => array(),
            'dining_options_array'            => array(0, 1, 2, 3, 4, 5),
            'disable_auto_prompt_for_barcode' => false,
            'disable_local_synchronization'   => false,
            'establishment'                   => $this->revel['establishment'],
            'ip_address'                      => null,
            'is_bar'                          => false,
            'kitchen_view'                    => false,
            'mac'                             => '',
            'name'                            => $data['title'],
            'network_key'                     => '',
            'no_cash_drawer'                  => false,
            'payment_options_array'           => array(1, 2, 3, 4, 5, 6, 7, 8),
            'pos_mode'                        => 'T',

        );

        $this->putResource('PosStation', $Locationdata, $data['revel_location_id'],true);
        return basename($this->headers['location']);
    }

    public function delete($id)
    {
        return $this->deleteResource('PosStation', $id, true);
    }
}