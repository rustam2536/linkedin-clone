<?php 
function getMessage()
{
	$txt="Hello";
	return $txt;
}

function is_logged_in()
{
	$db =& get_instance();
	if($db->session->userdata('isAdminLoggedIn') !='')
	{
		return true;
	}
	return false;
}

?>