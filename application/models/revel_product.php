<?php

class Revel_Product extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('Product', 0, 20, 'json');
    }

    public function create($data)
    {
        $ProductData = array(
            'is_cold' => true,
            'sold_by_weight' => true,
            'combo_product_1' => null,
            'combo_product_2' => null,
            'combo_product_3' => null,
            'combo_product_4' => null,
            'combo_product_5' => null,
            'kitchen_print_name' => 'Hello World',
            'cost' => 0.0,
            'third_party_id' => 'Helo world',
            'tare' => 26.09,
            'productclass' => '/products/ProductClass/1/',
            'rti_combo' => true,
            'variable_pricing_by' => 2673,
            'description' => 'test',
            'category' => '/products/ProductCategory/1/',
            'uuid' => $this->generateUUID(),
            'combo_discount_products' => null,
            'created_by' => '/enterprise/User/1/',
            'updated_date' => date("Y-m-dTH:i:s"),
            'updated_by' => '/enterprise/User/19/',
            'created_date' => date("Y-m-dTH:i:s"),
            'price_embedded' => true,
            'is_drink' => true,
            'course_number' => 2673,
            'printrs' => '/resources/Device/1/',
            'happy_hour_start_time' => 'Hello',
            'establishment' => $this->revel['establishment'],
            'image' => null,
            'display_on_kiosk' => true,
            'sku' => 'Hello World',
            'crv_enabled' => true,
            'deleted' => true,
            'tax' => null,
            'price' => 26.30,
            'barcode' => 'hello world',
            'crv_value' => 26.73,
            'point_value ' => 26.73,
            'brand ' => "/enterprise/Brand/1/",
            'dining_options' => 'hel0',
            'point_redeem' => 26.73,
            'active' => true,
            'happy_hour_end_time' => 'hell0',
            'variable_pricing' => true,
            'allow_price_override' => true,
            'sorting' => 2673,
            'tax_amount' => 26.73,
            'name' => isset($data['title']) ? $data['title'] : null ,
            'happy_hour_price' => 26.73,
            'ebt_no' => true,
            'is_combo' => true,
            'happy_hour' => true,
            'export' => true,
            'max_price' => 26.73,
            'tax_included' => true,
            'crv_label' => 'hello world',
            'attribute_type' => 0,
            'tax_class' => 0,
            'variable_pricing_by' => 0

        );

        $this->postResource('Product', $ProductData);
        return basename($this->headers['location']);
    }
}