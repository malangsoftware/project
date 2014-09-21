<?php
class M_id extends CI_Model
{
   function escape($str){
   return $this->db->escape($str);
  }
   
  function portofolio(){
  	$sql="SELECT * FROM web_properties where type='portofolio'";
  	return $this->db->query($sql);
  }
  
  function aboutus(){
  	$sql="SELECT * FROM web_properties where type='aboutus'";
  	return $this->db->query($sql);
  }
  
  function contact(){
  	$sql="SELECT * FROM contact_person where 1";
  	return $this->db->query($sql);
  }
  
  function get_password($user){
  	$user=$this->escape($user);
  	$sql="SELECT password FROM users WHERE username=$user LIMIT 1";
  	return $this->db->query($sql);
  }
  
  function get_content_portofolio($id){
  	$id=$this->escape($id);
  	$sql="SELECT * FROM web_properties WHERE ID=$id";
  	return $this->db->query($sql);
  }
  
  function update_portofolio($id,$content){
  	$id=$this->escape($id);
  	$content=$this->escape($content);
  	$sql="UPDATE web_properties SET content=$content WHERE ID=$id";
  	$this->db->query($sql);
  }
  
  function product(){
  	$sql="SELECT product.*,framework.f_name
  		FROM product
  		 LEFT JOIN framework ON product.framework=framework.f_code 
  		   ORDER BY product.project_code";
  	return $this->db->query($sql);
  }
  
  function select_FW(){
  	$sql="SELECT f_code,f_name FROM framework WHERE 1";
  	return $this->db->query($sql);
  }
  
  function check_duplicate($code){
  	$sql="SELECT ID_proj FROM product WHERE project_code=$code";
  	$q=$this->db->query($sql);
  	return $q->num_rows();
  }
  
  function insert_new_product($type,$code,$nama,$framework,$des_in,$des_en,$filename){
  	if ($code =="")exit();
  	$code=$this->escape($type.$code);
  	if ($this->check_duplicate($code)==0){
	  	$nama=$this->escape($nama);
	  	$framework=$this->escape($framework);
	  	$des[]=$des_in;
	  	$des[]=$des_en;
		$fn=$this->escape($filename);
	  	$sql="INSERT INTO product (`project_code`,`project_title`,`framework`,`image`) 
	  		VALUES ($code,$nama,$framework,$fn)";
	  	$this->db->query($sql);
	  	$l=array("id","en");
	  	for($n=0;$n<=1;$n++){
	  		$lang=$this->escape($l[$n]);
	  		$desc=$this->escape($des[$n]);
	  		$sql2="INSERT INTO product_description(`project_code`,`lang`,`description`) VALUES ($code,$lang,$desc)";
	  		$this->db->query($sql2);
	  	}
  	}else{
  		return $error="Data Duplikat Terdeteksi";
  	}
  }
  
  function select_product_where($id){
  	$id=$this->escape($id);
  	$sql="SELECT product.*,product_description.description,product_description.lang FROM product 
  		LEFT JOIN product_description ON product.project_code=product_description.project_code
  		 WHERE product.ID_proj=$id ";
  	return $this->db->query($sql);
  }
  
  function update_product($code,$nama,$framework,$des_in,$des_en,$filename=''){
	$code=$this->escape($code);
	$nama=$this->escape($nama);
	$framework=$this->escape($framework);
	$des_in=$this->escape($des_in);
	$des_en=$this->escape($des_en);
	$fn=$this->escape($filename);
	if ($filename==""){
		$sql="UPDATE product SET project_title=$nama,framework=$framework WHERE project_code=$code LIMIT 1";
	}else{
		$sql="UPDATE product SET project_title=$nama,framework=$framework,image=$fn WHERE project_code=$code LIMIT 1";
	}
	$this->db->query($sql);
	$this->update_description($code,$des_in,$des_en);
  }
  
  function update_description($code,$des_in,$des_en){
  	$sql_en="UPDATE product_description SET description=$des_en WHERE project_code=$code and lang='en' LIMIT 1";
  	$sql_in="UPDATE product_description SET description=$des_in WHERE project_code=$code and lang='id' LIMIT 1";
  	
  	if ($this->db->query($sql_in)){$this->db->query($sql_en);}
  }
  
  function get_about_us_value($id){
  	$id=$this->escape($id);
  	$sql="SELECT ID, content FROM web_properties WHERE ID=$id LIMIT 1";
  	return $this->db->query($sql);
  }
  
  function update_aboutUs($id,$value){
  	$value=$this->escape($value);
  	$sql="UPDATE web_properties SET content=$value WHERE ID=$id";
  	$this->db->query($sql);
  }

 function get_image_from_db($code){
  	$code=$this->escape($code);
  	$sql="SELECT image FROM product WHERE project_code=$code LIMIT 1";
  	return $this->db->query($sql);
  }

function get_contact_where($id){
  	$id=$this->escape($id);
  	$sql="SELECT * FROM contact_person WHERE ID_contact = $id";
  	return $this->db->query($sql);
  }
  
  function update_contact($id,$nama,$nomor,$bb,$wa,$email,$state,$desc){
  	$id=$this->escape($id);
  	$nama=$this->escape($nama);
  	$nomor=$this->escape($nomor);
  	$bb=$this->escape($bb);
  	$wa=$this->escape($wa);
  	$email=$this->escape($email);
  	$state=$this->escape($state);
  	$desc=$this->escape($desc);
  	$sql="UPDATE contact_person SET person_name=$nama,person_phone=$nomor,person_bb=$bb,person_wa=$wa, 
  		person_email=$email,state_person=$state,description=$desc
  		WHERE ID_contact = $id ";
  	$sql=$this->db->query($sql);
  }

  function new_contact($nama,$nomor,$bb,$wa,$email,$state,$desc){
  	$nama=$this->escape($nama);
  	$nomor=$this->escape($nomor);
  	$bb=$this->escape($bb);
  	$wa=$this->escape($wa);
  	$email=$this->escape($email);
  	$state=$this->escape($state);
  	$desc=$this->escape($desc);
  	$sql="INSERT INTO contact_person (`person_name`,`person_phone`,`person_bb`,`person_wa`,`person_email`,`state_person`,`description`)
  		 VALUES ($nama,$nomor,$bb,$wa,$email,$state,$desc)";
  	$this->db->query($sql);
  }


}
//end of file