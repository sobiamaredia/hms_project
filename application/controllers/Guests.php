<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 */

class Guests extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('guests/guest_model');
        //temp comment
    }
   
    function index(){
        $data['guests'] = $this->guest_model->getAll();
        $data['content'] = 'guest/guests';
        return $this->load->view('dashboard', $data);
    }

    function view($id){
        if ($id){
            $where = array('g.guestID'=>$id);
            $data['guest'] = $this->guest_model->getGuest($where);
            $data['guest_details'] = $this->guest_model->getGuestDetail($where);
            $where['r.reservationIsCancelled'] = '0'; 
            $data['guest_visits'] = $this->guest_model->getGuestVisits($where);
            $data['content'] = 'guest/details';
            return $this->load->view('dashboard', $data);
        }

        redirect("404");
    }
}
?>