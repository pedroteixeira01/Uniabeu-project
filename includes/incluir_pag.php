
<?php
	 if (@$_GET["pg"]=="") {
	 
		include "visao/principal/inicio.php";
					
		 }else{
	    //base64_decode
		include (base64_decode($_GET["pg"]));		
						
	 }	
?>