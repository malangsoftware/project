<?php

function get_site(){ echo "rezstore.com ";}
function get_group(){ echo "© REZGroup· ";}
function site($page=""){return site_url("adm/".$page);}

function get_stylesheet($fileName){
	return base_url("assets/stylesheet/adm/".$fileName);
}

function get_logo($fileName){
	return base_url("assets/images/c/".$fileName);
}

function get_image($fileName){
	return base_url("assets/images/c/".$fileName);
}

function product_image($fileName=''){
	return base_url("assets/images/c/product/".$fileName);
}

function get_script($fileName){
	return base_url("assets/script/adm/".$fileName);
}

function get_jqueryF($fileName){
	return base_url("assets/script/jquery-family/".$fileName);
}

?>
