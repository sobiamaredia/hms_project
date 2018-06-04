<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 */

class Bookings extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('bookings/booking_model');
        $this->load->model('guests/guest_model');
        $this->load->model('rooms/room_model');
    }
   
    function index(){
       
       $data['bookings'] = $this->booking_model->getAll();
       $data['content'] = 'booking/bookings';
       $this->load->view('dashboard', $data);
    }

    function create(){
        
        if($this->input->post() &&(!isset($this->session->userdata["form_id"]) || $this->input->post("form_id") > $this->session->userdata["form_id"] )){
            $this->session->set_userdata(array("form_id"=>$this->input->post("form_id")));
            if($this->booking_model->create()){
                return $this->redirect();
            }
            $this->error_message = 'Error in creating Booking';
        }
        $data['guests'] = $this->guest_model->getAll();
        $data['rooms'] = isset($data['rooms']) ? $data['rooms'] : array();
        $data['content'] = 'booking/add_edit';
        return $this->load->view('dashboard', $data);
    }

    function edit(){

        $id = $this->uri->segment(3);
        if( $this->input->post() &&(!isset($this->session->userdata["form_id"]) || $this->input->post("form_id") > $this->session->userdata["form_id"] )){
            $this->session->set_userdata(array("form_id"=>$this->input->post("form_id")));
            if($this->booking_model->update($id)){
                return redirect('bookings');
            }
            $this->error_message = "Error in updating record";
        }

        $where=array('reservation.reservationID'=>$id);
        $booking = $this->booking_model->getBookingByID($where);
        $data["booking"] = $booking;
        $data['guests'] = $this->guest_model->getAll();
        $param = array('where'=> "(reservation.checkinDate BETWEEN '$booking->checkinDate' AND '$booking->checkoutDate' OR reservation.checkoutDate BETWEEN '$booking->checkinDate' AND '$booking->checkoutDate') AND reservation.reservationIsCancelled = 0");
        $rooms = $this->room_model->getAvailableRooms($param);
        $where = "roomID IN ($booking->roomID)";
        $booked_rooms = $this->room_model->getRoomByID($where);
        $data['booked_rooms'] = $booked_rooms;
        // $rooms = array_merge($booked_rooms, $rooms);
        $data['rooms'] = $rooms;
        $data["content"] = "booking/add_edit";
        return $this->load->view('dashboard',$data);
    }

    function cancel($id){
        if($id){
            $where = array('reservationID' => $id);
            $result = $this->booking_model->cancelBooking($where);
            if($result){
                return redirect('bookings');
            }
            
            $this->error_message = 'Error in cancel Booking';
        }
        redirect('404');
    }
}
?>