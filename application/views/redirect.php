<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
echo form_open($action_path, array('id'=>'RedirectForm','name'=>'RedirectForm'),$search);
echo form_close();?>
<script type="text/javascript">
	document.RedirectForm.submit();
</script>