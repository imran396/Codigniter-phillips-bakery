<?php

class Revel_Product extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('Product');
    }

    public function create($data)
    {
        $productData = array(
            'is_cold'                 => false,
            'sold_by_weight'          => false,
            'combo_product_1'         => null,
            'combo_product_2'         => null,
            'combo_product_3'         => null,
            'combo_product_4'         => null,
            'combo_product_5'         => null,
            'kitchen_print_name'      => '',
            'cost'                    => 0.0,
            'third_party_id'          => '',
            'tare'                    => 0.0,
            'productclass'            => '/products/ProductClass/1/',
            'rti_combo'               => false,
            'variable_pricing_by'     => 0,
            'description'             => isset($data['title']) ? $data['title'] : null,
            'category'                => '/products/ProductCategory/1/',
            'uuid'                    => $this->generateUUID(),
            'combo_discount_products' => null,
            'created_by'              => '/enterprise/User/1/',
            'updated_date'            => date("c"),
            'updated_by'              => '/enterprise/User/1/',
            'created_date'            => date("c"),
            'price_embedded'          => true,
            'is_drink'                => false,
            'course_number'           => 0,
            'printrs'                 => '/resources/Device/1/',
            'happy_hour_start_time'   => '',
            'establishment'           => $this->revel['establishment'],
            'image'                   => null,
            'display_on_kiosk'        => true,
            'sku'                     => '',
            'crv_enabled'             => true,
            'deleted'                 => false,
            'tax'                     => null,
            'price'                   => 0.30,
            'barcode'                 => '',
            'crv_value'               => 0.0,
            'point_value'             => 0.0,
            'brand'                   => "/enterprise/Brand/1/",
            'dining_options'          => '',
            'point_redeem'            => 0.0,
            'active'                  => true,
            'happy_hour_end_time'     => '',
            'variable_pricing'        => true,
            'allow_price_override'    => true,
            'sorting'                 => time(),
            'tax_amount'              => 0.0,
            'name'                    => isset($data['title']) ? $data['title'] : null,
            'happy_hour_price'        => 0.0,
            'ebt_no'                  => true,
            'is_combo'                => false,
            'happy_hour'              => false,
            'export'                  => true,
            'max_price'               => 0.0,
            'tax_included'            => true,
            'crv_label'               => '',
            'attribute_type'          => 0,
            'tax_class'               => 0

        );

        $this->postResource('Product', $productData, true);
        return basename($this->headers['location']);
    }

    public function delete($id)
    {
        return $this->deleteResource('Product', $id, true);
    }
}