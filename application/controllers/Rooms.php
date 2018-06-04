<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 */

class Rooms extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('rooms/room_model');

    }
   
    function index(){
        if($this->input->post('fromDate') && $this->input->post('toDate')){
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');
            $param = array('where'=>"(reservation.checkinDate BETWEEN '$fromDate' AND '$toDate' OR reservation.checkoutDate BETWEEN '$fromDate' AND '$toDate') AND reservation.reservationIsCancelled = 0");
            $data['rooms'] = $this->room_model->getAvailableRooms($param);
            $this->output->enable_profiler(TRUE);

        }

        $data['rooms'] = isset($data['rooms']) ? $data['rooms'] : array();
        $data['content'] = 'room/rooms';
        return $this->load->view('dashboard', $data);
    }

    function ajaxGetRooms(){
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
        $param = array('where'=> "(reservation.checkinDate BETWEEN '$fromDate' AND '$toDate' OR reservation.checkoutDate BETWEEN '$fromDate' AND '$toDate') AND reservation.reservationIsCancelled = 0");
        $rooms = $this->room_model->getAvailableRooms($param);
        echo json_encode($rooms);
        
    }
}
?>