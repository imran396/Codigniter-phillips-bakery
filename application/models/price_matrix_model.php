<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Price_matrix_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function save($location_id)
    {


        $flavour = ($this->input->post('flavour_id'));
        $this->remove($location_id);

        foreach ($flavour as $flav):
            $serving = $this->input->post('serving_id_'.$flav);
            $price = $this->input->post('price_'.$flav);
            $i=0;
            foreach ($serving as $serv):
                $this->db->set(array('location_id'=>$location_id,'flavour_id'=> $flav,'serving_id'=> $serv,'price'=> $price[$i]))->insert('price_matrix');
                $i++;
            endforeach;
        endforeach;


    }



    public function getprice_matrix($price_matrix_id)
    {

        return $this->db->select('*')->where(array('price_matrix_id'=>$price_matrix_id))->get('price_matrix')->result();

    }

    public function getPrice($location_id,$flavour_id,$serving_id)
    {

        $rows= $this->db
            ->select('price')
            ->where(array('location_id'=>$location_id,'flavour_id'=>$flavour_id,'serving_id'=>$serving_id))
            ->get('price_matrix')->result();

        return isset($rows[0]->price)? $rows[0]->price :'';

    }

    private function remove($location_id){

        $this->db->where(array('location_id'=>$location_id))->delete('price_matrix');

    }


    public function getServings()
    {

        return $this->db->select('*')->where('status',1)->order_by("serving_id", "asc") ->get('servings')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where('status',1)->order_by("location_id", "asc")->get('locations')->result();

    }
    public function getFlavours()
    {

        return $this->db->select('*')->where('status',1)->order_by("flavour_id", "asc")->get('flavours')->result();

    }


}