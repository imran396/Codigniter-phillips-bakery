<?php

class Locations extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('locations_model');
        $this->load->model('revel_location');

        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2, null), $this->uri->segment(3, null));
    }

    public function index()
    {
        $this->data['active'] = $this->uri->segment(2, 0);
        $this->layout->view('admin/locations/locations_view', $this->data);
    }

    public function listing()
    {
        $this->data['result'] = $this->locations_model->getListing();
        $this->data['active'] = $this->uri->segment(2, 0);

        $this->layout->view('admin/locations/listing_view', $this->data);
    }

    public function save()
    {
        if (!empty($_POST)) {

            $this->addValidation();

            if ($this->form_validation->run()) {

                $this->saveData();
                $id = $this->input->post('location_id');

                if (!empty($id)) {
                    $this->redirectToHome('edit/' . $id);
                } else {
                    $this->redirectToHome('listing');
                }

            }
        }

        $this->index();
    }

    public function edit($id)
    {
        $this->data['queryup'] = $this->locations_model->getLocations($id);
        $this->data['active']  = $this->uri->segment(2, 0);

        $this->layout->view('admin/locations/locations_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Location Title', 'required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('email', 'Email Address', 'valid_email');
        $this->form_validation->set_rules('location_id');
        $this->form_validation->set_rules('vaughan_location', 'trim|xss_clean|callback_checkVaughanLocation');
        $this->form_validation->set_rules('address1');
        $this->form_validation->set_rules('address2');
        $this->form_validation->set_rules('city');
        $this->form_validation->set_rules('province');
        $this->form_validation->set_rules('postal_code');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('surcharge');
        $this->form_validation->set_rules('pos_api');
        $this->form_validation->set_rules('status');
    }

    private function saveData()
    {
        $data = $this->input->post();

        if (empty($data['location_id'])) {

            if (isset($data['title'])) {

                try {
                    $data['revel_location_id'] = $this->revel_location->create($data);
                } catch (\Exception $e) {
                    $data['revel_location_id'] = null;
                }

            }

            $this->locations_model->create($data);
            $this->session->set_flashdata('success_msg', "New location has been added successfully");

        } else {

            $this->locations_model->save($data, $data['location_id']);
            $this->session->set_flashdata('success_msg', "Location has been updated successfully");
        }

    }

    public function sorting()
    {
        $this->locations_model->sortingList();
        echo $this->lang->line('update_msg');
    }

    public function status($id)
    {
        $this->locations_model->statusChange($id);
        $this->session->set_flashdata('success_msg', $this->lang->line('update_msg'));

        $this->redirectToHome("listing");
    }

    public function remove($id)
    {
        $this->locations_model->delete($id);
        $this->redirectToHome("listing");
    }

    public function checkTitle($title)
    {
        $data = $this->input->post();
        return $this->locations_model->checkLocations($data['location_id'], $title);
    }

    function checkVaughanLocation($VaughanLocation)
    {
        $data = $this->input->post();
        return $this->locations_model->vaughanLocation($data['location_id'], $VaughanLocation);
    }

    private function redirectToHome($redirect = null)
    {
        redirect('admin/locations/' . $redirect);
    }

    public function revel()
    {
        $data = $this->revel_location->getAll();
        var_dump($data);
    }

    public function sync()
    {
        $data = $this->locations_model->findAll();

        foreach ($data as $location) {

            try {
                $location['revel_location_id'] = $this->revel_location->create($location);
            } catch (\Exception $e) {
                $location['revel_location_id'] = null;
            }

            $this->locations_model->updateRevelId($location['location_id'], $location['revel_location_id']);

        }
    }

    public function clear()
    {
        $data = $this->revel_location->getAll();

        foreach ($data as $location) {
            $this->revel_location->delete($location->id);
        }
    }
}