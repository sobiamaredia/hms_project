<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model{

    function __construct() {
       
        parent::__construct();
    }

    function field_validation($method = NULL){
        $this->load->library('form_validation');
        if($this->input->post('guest')){
             $this->form_validation->set_rules('guest', 			'Guest',    'required');
        }
        $this->form_validation->set_rules('fromDate', 			'Check-in Date',		'required');
        $this->form_validation->set_rules('toDate', 			'Check-out Date',		'required');
        //$this->form_validation->set_rules('rooms', 			'Room',		'required');
        $this->form_validation->set_rules('no_guest', 			'No. of Guests',		'required');
        
        if ($this->form_validation->run() == TRUE){
            return TRUE;
        }
        return FALSE;
    }
    

    function getAll(){
        return $this->db->select('*,group_concat(rooms.roomID  separator ", ") as roomID, group_concat(rooms.roomNumber  separator ", ") as roomNumber, group_concat(rooms.roomType  separator ", ") as roomType')
        ->from('reservation')
        ->join('booking','booking.reservationID = reservation.reservationID')
        ->join('rooms','rooms.roomID = booking.roomID')
        ->join('guests','guests.guestID = reservation.guestID')
        ->group_by('reservation.reservationID')
        ->get()->result();
    }

    function getBookingByID($where){
        return $this->db->select('*,group_concat(rooms.roomID  separator ", ") as roomID, group_concat(rooms.roomNumber  separator ", ") as roomNumber, group_concat(rooms.roomType  separator ", ") as roomType')
        ->from('reservation')
        ->where($where)
        ->join('booking','booking.reservationID = reservation.reservationID')
        ->join('rooms','rooms.roomID = booking.roomID')
        ->join('guests','guests.guestID = reservation.guestID')
        ->group_by('reservation.reservationID')
        ->get()->row();
    }

    function create(){
        if($this->field_validation() == TRUE){
            $data = $this->setReservationData();
            $this->db->trans_start();
            if($this->db->insert('reservation', $data)){
                $reservation_id = $this->db->insert_id();
                $rooms = $this->input->post('rooms');
                foreach($rooms as $room){
                    $booking_data = $this->setBookingData($reservation_id, $room);
                    $this->db->insert('booking', $booking_data);
                }
            }
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }
            else{
                $this->db->trans_commit();
                return true;
            }
        }
        return false;
    }

    function setReservationData(){
        return array(
            'guestID'           => $this->input->post('guest') ? $this->input->post('guest') : $this->input->post('guest_id'),
            'noOfGuests'        => $this->input->post('no_guest'),
            'specialRequest'    => $this->input->post('special_req'),
            'checkinDate'       => $this->input->post('fromDate'),
            'checkoutDate'      => $this->input->post('toDate'),
        );
    }
    function setBookingData($reservation_id, $room_id){
        return array(
            'reservationID' => $reservation_id,
            'roomID'        => $room_id,
            'isCancelled'   => '0',
        );
    }

    function cancelBooking($where){
        $data = array('reservationIsCancelled'=> '1');
        return $this->db->update('reservation',$data,$where);
    }

    function update($id){
        if($this->field_validation() == TRUE){
            $where =  array("reservationID" => $id);
            $data = $this->setReservationData();
            $this->db->trans_start();
            if($this->db->update('reservation', $data, $where)){
                $rooms = $this->input->post('rooms');
                foreach($rooms as $room){
                    $booking_data = $this->setBookingData($id, $room);
                    $booking = $this->db->select('*')->from('booking')->where($booking_data)->get()->row_array();
                    if(count($booking) == 0 ){
                        $this->db->insert('booking', $booking_data);
                    }
                }
                $this->db->where($where)->where_not_in('roomID', $rooms)->delete('booking');
            }
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }
            else{
                $this->db->trans_commit();
                return true;
            }
        }
        return false;
    }
}