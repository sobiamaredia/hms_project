<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends CI_Model{

    function __construct() {
       
        parent::__construct();
    }

    function getAll(){
        return $this->db->select('*')
        ->from('rooms')
        ->get()->result();
    }

    function getAvailableRooms($param = array()){
        $subQuery = $this->subQuery($param);
        $result =  $this->db->select('ro.roomID, ro.roomType, ro.roomNumber, ro.bookingStatus')
        ->from('rooms as ro')
        ->join('booking as b', 'b.roomID = ro.roomID','LEFT')
        ->join('reservation as r','r.reservationID = b.reservationID','LEFT')
        ->where('r.checkinDate IS NULL AND r.checkoutDate IS NULL')
        ->or_where("ro.roomID NOT IN ($subQuery)", NULL, FALSE)
        ->group_by('ro.roomID')
        ->get()->result();
        return $result;
    }
    
    function subQuery($param = array()){
        $this->db->select('booking.roomID')
        ->from('booking')
        ->join('reservation','reservation.reservationID = booking.reservationID')
        ->where($param['where']);
        return $this->db->get_compiled_select();
    }

    function getRoomByID($where = array()){
        return $this->db->select('*')
        ->from('rooms')
        ->where($where)
        ->get()->result();
    }

}