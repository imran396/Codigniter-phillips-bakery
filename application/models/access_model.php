<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Access_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }


    public function logged_status($log_status){

        if(!$log_status)
        {
            redirect('login');

        }
    }

    function access_permission($controller=NULL,$function=NULL){

        $group_id = $this->session->userdata('group_id');


        $this->db->select('controller');
        $this->db->from('access_control');
        $this->db->join('user_control','user_control.control_id =  access_control.control_id','inner');
        $this->db->where(array('access_control.group_id'=>$group_id,'user_control.controller_name'=>$controller));
        $user_access=$this->db->get();
        $count=$user_access->num_rows();
        $row = $user_access->result();
        if($count > 0 && $row[0]->controller == 1){

            $array= array('listing','save','edit','delete','view','status','others');

            if(in_array($function,$array)){

                $this->db->select('*');
                $this->db->from('access_control');
                $this->db->join('user_control','user_control.control_id =  access_control.control_id','inner');
                $this->db->where(array('access_control.group_id'=>$group_id,'user_control.controller_name'=>$controller,$function=>1,));
                $user_access=$this->db->get();
                $count=$user_access->num_rows();
                if($count == 0 ){

                    redirect('admin/'.$controller);
                }
            }

        }else{

                redirect();
        }
        //exit;

    }



}