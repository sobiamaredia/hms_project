<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 */

class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
   
    function index(){
        $data['totalGuest'] = $this->db->select('count(*) as guests')->from('guests')->get()->row();
        $data['totalReservation'] = $this->db->select('count(*) as reservations')->from('reservation')->where(array('reservationIsCancelled'=> 0))->get()->row();

    $data['content'] = 'dashboard/analytics';
       $this->load->view('dashboard',$data);
    }
}
?>