<?php

class Revel_Location extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('PosStation');
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
            'mac'                             => 'B8:C7:5D:DA:19:6F',
            'name'                            => $data['name'],
            'network_key'                     => 'eno',
            'no_cash_drawer'                  => false,
            'payment_options_array'           => array(1, 2, 3, 4, 5, 6, 7, 8),
            'pos_mode'                        => 'T',
            'uuid'                            => $this->generateUUID(),
        );

        return $this->postResource('PosStation', $data, true);
    }
}