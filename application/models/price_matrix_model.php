<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Price_matrix_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function save($location_id)
    {

        $flavour = ($this->input->post('cake_id'));
        //$this->remove($location_id);
       // $query="TRUNCATE TABLE `price_matrix`";
       // $this->db->query($query);
        foreach ($flavour as $flav):
            $serving = $this->input->post('serving_id_'.$flav);
            $price = $this->input->post('price_'.$flav);
            $price_matrix = $this->input->post('price_matrix_'.$flav);
            $i=0;
            foreach ($serving as $serv):
                if($price_matrix[$i] > 0 ){
                    $this->db->set(array('price'=> $price[$i]))->where(array('price_matrix_id'=>$price_matrix[$i]))->update('price_matrix');
                }else{
                    $this->db->set(array('location_id'=>$location_id,'cake_id'=> $flav,'serving_id'=> $serv,'price'=> $price[$i]))->insert('price_matrix');
                }

                $i++;
            endforeach;
        endforeach;
    }



    public function getprice_matrix($price_matrix_id)
    {

        return $this->db->select('*')->where(array('price_matrix_id'=>$price_matrix_id))->get('price_matrix')->result();

    }

    public function getPrice($location_id,$cake_id,$serving_id)
    {

        return $rows= $this->db
            ->select('price_matrix_id,price')
            ->where(array('location_id'=>$location_id,'cake_id'=>$cake_id,'serving_id'=>$serving_id))
            ->get('price_matrix')->result();



    }

    private function remove($location_id){

        $this->db->where(array('location_id'=>$location_id))->delete('price_matrix');

    }


    public function getServings()
    {

        return $this->db->select('*')->where('status',1)->order_by("ordering", "asc") ->get('servings')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where('status',1)->order_by("ordering", "asc")->get('locations')->result();

    }
    public function getFlavours()
    {

        return $this->db->select('*')->where('status',1)->order_by("title", "asc")->get('flavours')->result();

    }
    public function getCakes()
    {

        return $this->db->select('*')->where('status',1)->order_by("title", "asc")->get('cakes')->result();

    }

    public function getAll($location_id)
    {
        $data = $this->db->select('price_matrix_id,location_id,cake_id,serving_id,price')->where(array('location_id'=>$location_id))->order_by('price_matrix_id','asc')->get('price_matrix')->result_array();

        foreach($data as $key => $val){
            $data[$key]['price_matrix_id'] = (int) $data[$key]['price_matrix_id'];
            $data[$key]['cake_id'] = (int) $data[$key]['cake_id'];
            $data[$key]['location_id'] = (int) $data[$key]['location_id'];
            $data[$key]['serving_id'] = (int) $data[$key]['serving_id'];
            $data[$key]['price'] = (float) $data[$key]['price'];
        }
        return $data;
    }



}