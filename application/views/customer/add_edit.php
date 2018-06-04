<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if($this->uri->segment(3) == "edit"){
	$url = current_url()."?".$_SERVER['QUERY_STRING'];
}else{
	$url = "admin/customer/create";
}
$post = $this->input->post();
$user_id = isset($post["customer_id"]) 	? $post["customer_id"] 	:(isset($customer["CustomerID"])	? $customer["CustomerID"] 	: NULL);
$first_name 	 = isset($post["first_name"])		? $post["first_name"] 	:(isset($customer["FirstName"]) 		? $customer["FirstName"] 	: NULL);?>
<div class="page-header"><h1><?php echo ucfirst($this->uri->segment(3))." Customer";?></h1></div><?php
echo form_open($url, array('id'=>'CustomerForm','name'=>'CustomerForm' ,'class'=>'form-horizontal col-xs-offset-1 col-xs-12', 'role'=>'form'), array('user_id'=>$user_id, 'first_name'=>$first_name, 'query' => $this->input->get('query'), 'qtype' => $this->input->get('qtype'), 'page' => $this->input->get('page')));
$this->load->view('admin/customer/form');?>
    <div class="clearfix">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn btn-info">
			     <i class="ace-icon fa fa-check bigger-110"></i>Save
			</button>
			<button type="reset" class="btn">
			    <i class="ace-icon fa fa-undo bigger-110"></i>Reset
			</button>
			<button type="button" class="btn btn-danger" onclick="goBack()">
			    <i class="ace-icon fa fa-remove bigger-110"></i>Cancel
			</button>
        </div>
    </div>
<?php
echo form_close();
?>
<script>
function goBack() {
    window.history.back();
}
</script>