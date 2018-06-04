<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct() {
		$this->load->model('guests/guest_model');

		parent::__construct();
	}

	
	function index(){
	    $data['customers'] = $this->customer_model->getAllCustomers();
	    $data['content'] = 'admin/customer/admin';
	    $this->load->view( 'admin/dashboard',$data);
	}
	
    /*function create(){
	    if($this->input->post() &&(!isset($this->session->userdata["form_id"]) || $this->input->post("form_id") > $this->session->userdata["form_id"] )){
	        $this->session->set_userdata(array("form_id"=>$this->input->post("form_id")));
	        $id = $this->user_model->create();
	        if($id){
	            if(!$this->log_model->create(1,'user',$id)){
	                $do_status = 'Error in Creating Log';
	            }
					return $this->redirect();
	        }
	        $this->error_message = 'Error in Creating User';
	    }
	    $data['roles'] = $this->role_model->getAllRole();
	    $data['users'] = $this->user_model->getAllUser(array('u.Status'=>'1'));
	    $data["content"] = "admin/user/add_edit";
	    return $this->load->view('admin/dashboard',$data);
	}*/


	// function profile(){
	//     if( $this->input->post() &&(!isset($this->session->userdata["form_id"]) || $this->input->post("form_id") > $this->session->userdata["form_id"] )){
	//         $this->session->set_userdata(array("form_id"=>$this->input->post("form_id")));
	//         $id = $this->session->userdata['user']->UserID;
	//         $where =  array("user.UserID" => $id);
	//         $old_user = $this->db->where($where)->get('user')->row_array();
	//         if($this->user_model->update($id ,'profile')){
	//             if(isset($_POST['all_log_out'])){
	//                 $this->all_logout();
	//             }
	//             $updated_fields =  $this->log_model->get_effected_fields($old_user, $this->db->where($where)->get('user')->row_array());
	//             if($updated_fields){
	//                 if(!$this->log_model->create(2, "user", $id, $updated_fields)){
	//                     $do_status = "Error to Create user log";
	//                 }
	//             }
	//             $data["message_title"] = "Successfully changed your Profile details.";
	//             $data["message"] = "You Profile change request for <b>".$this->session->userdata['user']->UserName."</b> is completed.";
	//             $data["content"] = "admin/message";
	//             return $this->load->view('admin/dashboard', $data);
	          
	//         }
	//         $this->error_message = "Error in updating record";
	//     }
	//     $where= array('user.UserID'=>$this->session->userdata['user']->UserID);
	//     $data['user'] = $this->db->where($where)->get('user')->row_array();
	//     $data['content'] = 'admin/user/profile';
	//     $this->load->view('admin/dashboard',$data);
	// }
	// function changepassword(){
	//     if($this->input->post() &&(!isset($this->session->userdata["form_id"]) || $this->input->post("form_id") > $this->session->userdata["form_id"] )){
	//         $this->session->set_userdata(array("form_id"=>$this->input->post("form_id")));
	//         if($this->user_account_model->changepassword()){
	//             $this->log_model->create(6);
	//             $data["message_title"] = "Successfully changed your password.";
	//             $data["message"] = "You password change request for <b>".$this->session->userdata['user']->UserName."</b> is completed.<br />To keep the account secure kindly change your password periodically.";
	//             $data["content"] = "admin/message";
	//             return $this->load->view('admin/dashboard', $data);
	//         }
	//         $this->error_message = "Your password change request failed";
	//     }
	
	//     $where= array('user.UserID'=>$this->session->userdata['user']->UserID);
	//     $data['user'] = $this->db->where($where)->get('user')->row_array();
	//     $data['content'] = 'admin/user/changepassword';
	//     $this->load->view('admin/dashboard',$data);
	// }
	
	// function all_logout(){
	//     //delete From all devices code
	//     $this->db->where('UserID',$this->session->userdata['user']->UserID);
	//     $this->db->where_not_in('id',session_id());
	//     $this->db->delete('ci_sessions');
	// }
	
	function edit(){
	    $id = $this->uri->segment(4);
	    if($id){
	        if( $this->input->post() &&(!isset($this->session->userdata["form_id"]) || $this->input->post("form_id") > $this->session->userdata["form_id"] )){
	            $this->session->set_userdata(array("form_id"=>$this->input->post("form_id")));
	            $where =  array("customers.CustomerID" => $id);
	            $old_customer = $this->db->where($where)->get('customers')->row_array();
	            if($this->customer_model->update($id)){
	                if($updated_fields =  $this->log_model->get_effected_fields($old_customer, $this->db->where($where)->get('customers')->row_array())){
	                    if(!$this->log_model->create(2, "customers", $id, $updated_fields)){
	                        $do_status = "Error to Create customer log";
	                    }
	                }
	                return $this->redirect();
	            }
	            $this->error_message = "Error in updating record";
	        }
	        $where=array('customers.CustomerID'=>$id);
	        $data["customer"] = $this->db->where($where)->get('customers')->row_array();
	        $data["content"] = "admin/customer/add_edit";
	        return $this->load->view('admin/dashboard',$data);
	    }
	    redirect("404");
	}
	
	function delete(){
	    $id = $this->uri->segment(4);
	    if($id){
	        if($this->db->delete('customer_account',array('CustomerID'=>$id))){
	            $this->log_model->create(3, "Customer account",$id);
	            return $this->redirect();
	        }
	    }
	    redirect('404');
	}
}
