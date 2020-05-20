<?php 
	include("ligacao.php");
	function is_admin(){
		if ($_SESSION['permissao']<>1) {
			header("Location: dashboard.php");
		}
	}
?>