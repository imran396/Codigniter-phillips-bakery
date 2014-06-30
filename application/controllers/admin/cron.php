<?php
class Cron extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        die();
    }


    function order_cancelled()
    {




        //$this->db->where('')->get()

        $cur_date = time();
        $this->db->set(array('log_date'=>$cur_date))->insert('order_logs');
        //$start_time = strtotime("yesterday 4 pm 30 min");
        //$end_time = strtotime("today 4 pm 30 min");
        //$this->db->where('boat_details.boat_start_date >',$start_time);
        //$this->db->where('boat_details.boat_start_date <',$end_time);
    }
}

/* End of file cron.php */
/* Location: ./system/application/controllers/cron.php */