<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest_model extends CI_Model{

    function __construct() {
       
        parent::__construct();
    }

    function getAll(){
        return $this->db->select('*')
        ->from('guests')
        ->get()->result();
    }
    
    function getGuestDetail($where = array()){

        return $this->db->select('*, group_concat(ro.roomNumber  separator ", ") as roomNumber, group_concat(ro.roomType  separator ", ") as roomType')
        ->from('guests as g')
        ->join('reservation as r','r.guestID = g.guestID')
        ->join('booking as b','b.reservationID = r.reservationID')
        ->join('rooms as ro', 'ro.roomID = b.roomID')
        ->where($where)
        ->group_by('r.reservationID')
        ->get()->result();
    }

    function getGuest($where = array()){
        return $this->db->select('*')
        ->from('guests as g')
        ->where($where)
        ->get()->row();
    }

    function getGuestVisits($where){
        return $this->db->select('count(*) as visits')
        ->from('guests as g')
        ->join('reservation as r', 'r.guestID = g.guestID')
        ->where($where)
        ->get()->row();
    }
}