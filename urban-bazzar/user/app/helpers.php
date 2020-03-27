<?php

function redirect($path)
{
	header('location:'.$path);
}


function checkcustLogin()
{
	if(isset($_SESSION['cust_name']))
		return true;

	return false;
}

function redirection($path)
{
	echo '<script> window.location.href="'.$path.'" </script>';
}


function showMsg($msg)
{
	$temp = '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
				<i class="icon-remove"></i>
				</button>
				<i class="icon-ok green"></i>'.
				$msg.'
				</div>';

	$_SESSION['showmsg'] = $temp;			
}