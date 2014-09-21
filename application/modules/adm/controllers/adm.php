<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {
 public $username;
	function __construct()
	 {
		parent::__construct();
		$this->load->helper(array('url','html','adm'));
		$this->load->model('m_id');
		$this->load->library('session');
	 }
	 
	function header($data){
		$this->load->view("header",$data);
	 }
	 
	function view($filename,$data=''){
		$this->load->view($filename,$data);
	 }
	 
	function set_sess($user){
		$this->session->set_userdata("username",$user);
	}
	 
	function unset_sess(){
		$this->session->unset_userdata("username");
		redirect(site());
	}
	 
	function get_sess(){
		$user=$this->session->userdata("username");
		if ($user=="")redirect(site());
		return $user;
	}
	
	function sess(){
		return $this->session->userdata("username");
	}
	
	function index(){
		$p=$this->input->get('p');
		$data['ctrl']=$this;
		if ($this->sess() == ""){
		 $p="login";
		}
		 $data['data']=$p;
		$data['title']=$p;
		$this->header($data);
		$this->view('main_container',$data);
	}
	
	function post($str){
		return $this->input->post($str);
	}
	
	function get($str){
		return $this->input->get($str);
	}
	
	function encript($str){
		$this->load->library('encrypt');
		return $this->encrypt->encode($str,'|typography|');
	}
	
	function decript($str){
		$this->load->library('encrypt');
		return $this->encrypt->decode($str,'|typography|');
	}
	
	function str_decript(){
	 if ($this->input->get('t')=="en"){
	   echo $this->encript($this->input->get('str'));
	 }else{
	   echo $this->decript($this->input->get('str'));
	 }
	}
	
	function login(){
		if ($_POST){
		 $user=$this->post('r_username');
		 $pass=$this->post('r_password');
		 if (!empty($user) and !empty($pass)){
		  $q=$this->m_id->get_password($user);
		  if ($q->num_rows() > 0){
			  foreach($q->result() as $r){
			   $pass2=$this->decript($r->password);
			   $err[]=$this->check($user,$pass,$pass2);
			  }
		  }
		 }
		}else{
		 $this->load->helper('form');
		 $this->view("login");
		}
	}
	
	function check($user,$str1,$str2){
		if ($str1 == $str2){
		 $this->set_sess($user);
		 redirect('adm/');
		}else{
		 return "Username dan password salah!";
		}
	}
	
	function portofolio(){
		$data['q']=$this->m_id->portofolio();
		$this->view("portofolio",$data);
	}
	
	function editportofolio(){
		$this->get_sess();
		$this->load->helper('form');
		$data['title']="Edit Portofolio";
		$id=$this->get('id');
		$data['content']=$this->get('content');
		if ($_POST){
		 $title=$this->post('title');
		 $img=$this->post('img');
		 $desc=$this->post('description');
		 $content=$this->update($id,$data['content'],$title,$img,$desc);
		 $this->m_id->update_portofolio($id,$content);
		 redirect(site('?p=portofolio'));
		}
		$data['type']=$this->get('content');
		$data['q']=$this->m_id->get_content_portofolio($id);
		$this->header($data);
		$this->view('edit_portofolio',$data);
	}
	
	function update($id,$content,$title,$img,$desc){
		$d=$this->m_id->get_content_portofolio($id);
		foreach($d->result() as $r){
			$data=json_decode($r->content);
			foreach ($data as $key => $entry) {
				if (is_object($entry)){
					$data->$key->$content->title=$title;
					$data->$key->$content->img=$img;
					$data->$key->$content->description=$desc;
				}
			}
			return json_encode($data);
		}
	}
	
	function aboutus(){
		$this->get_sess();
		if ($_POST){
		 $id=$this->get('id');
		 $value=$this->post('desc');
		 if ($value != ""){
		  $this->m_id->update_aboutUs($id,$value);
		  redirect(site());
		 }
		}else{
			if ($this->get('q')=="edit"){
			 $id=$this->get('id');
			 if ($id == "") {echo "data tidak valid";exit();}
			 $this->load->helper('form');
			 $data['title']="Edit About us";
			 $data['q']=$this->m_id->get_about_us_value($id);
			 $this->header($data);
			 $this->view('edit_aboutus',$data);
			}else{
			$data['q']=$this->m_id->aboutus();
			$this->view("aboutus",$data);
			}
		}
	}
	
	function contact(){
		$data['q']=$this->m_id->contact();
		$this->view("contact",$data);
	}
	
	function product(){
		$this->load->helper('form');
		$data['q']=$this->m_id->product();
		$this->view("product",$data);
	}
	
	function load_newProduct_form(){
		$this->get_sess();
		$this->load->helper('form');
		$data['title']="New Produk";
		$data['fw']=$this->m_id->select_FW();
		$this->header($data);
		$this->view('new_product',$data);
	}
	
	function editProduct_form(){
		$this->get_sess();
	 	$id=$this->get('id');
		$this->load->helper('form');
		$data['title']="Edit Produk";
		$data['product']=$this->m_id->select_product_where($id);
		$data['fw']=$this->m_id->select_FW();
		$this->header($data);
		$this->view('edit_product',$data);
	}
	
	function update_product(){
	 $id=$this->get('id');
	 if($_POST){
	  	 $type=$this->post('type');
		 $code=$this->post('code_p');
		 $nama=$this->post('nama_p');
		 $framework=$this->post('framework');
		 $des_in=$this->post('description_in');
		 $des_en=$this->post('description_en');
		 $file_name="";
		 $name=$type.$code;
			 if ($_FILES['userfile']['name'] != ""){
				$config['upload_path'] = './assets/images/c/product/';
				$config['allowed_types'] = 'jpg|png';
				$config['file_name'] = $type.$code.'_'.date('i');
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					$err=var_dump($error);
				}
				$image=$this->get_image_from_db($name);
				$this->remove_old_image_product($image);
				$file_name=$this->upload->data()['file_name'];
			}
		 $this->m_id->update_product($type.$code,$nama,$framework,$des_in,$des_en,$file_name);
		 redirect(site('?p=product'));
	 }
	 
	}
	
	function get_image_from_db($code){
		$q=$this->m_id->get_image_from_db($code);
		
		foreach($q->result() as $r){
		  return $image=$r->image;
		}
	}
	
	function remove_old_image_product($filename){
	$filestring1 = PUBPATH.'assets/images/c/product/'.$filename;
	  if (file_exists($filestring1)){
	    unlink($filestring1);
	  }
	}
	
	function insert_new(){
		if ($_POST){
		 $type=$this->post('type');
		 $code=$this->post('code_p');
		 $nama=$this->post('nama_p');
		 $framework=$this->post('framework');
		 $des_in=$this->post('description_in');
		 $des_en=$this->post('description_en');
		 #=====================================
		 $file_name="nophoto.jpg";
		 if ($_FILES['userfile']['name'] != ""){
			$config['upload_path'] = './assets/images/c/product/';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] = $type.$code;
			//$config['max_size']	= '100';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$err=var_dump($error);
			}
			$file_name=$this->upload->data()['file_name'];
		}
		 #-----------------------------------
		 $q=$this->m_id->insert_new_product($type,$code,$nama,$framework,$des_in,$des_en,$file_name);
		 if (!isset($err)){
			 if ($q ==""){
			  redirect(site('?p=product'));			 
			 }
		 echo $q;
		 }
		}
	}
	
	function edit_contact(){
		$this->get_sess();
		$id=$this->get('id');
		if($id!==""){
		 if ($_POST){
		  $nama=$this->post('nama');
		  $nomor=$this->post('phone');
		  $bb=$this->post('bb');
		  $wa=$this->post('wa');
		  $email=$this->post('email');
		  $state=$this->post('state');
		  $desc=$this->post('diskripsi');
		  $this->m_id->update_contact($id,$nama,$nomor,$bb,$wa,$email,$state,$desc);
		  redirect(site('?p=contact'));
		 }
		 $data['title']="Edit Contact";
		 $this->load->helper('form');
		 $data['edit_val']=$this->m_id->get_contact_where($id);
		 $this->header($data);
		 $this->view('add_edit_contact',$data);
		}
	}

	function new_contact(){
		$this->get_sess();
		$data['title']="Buat Kontak";
		$this->load->helper('form');
		if ($_POST){
		  $nama=$this->post('nama');
		  $nomor=$this->post('phone');
		  $bb=$this->post('bb');
		  $wa=$this->post('wa');
		  $email=$this->post('email');
		  $state=$this->post('state');
		  $desc=$this->post('diskripsi');
		  $this->m_id->new_contact($nama,$nomor,$bb,$wa,$email,$state,$desc);
		  redirect(site('?p=contact'));
		}
		 $this->header($data);
		 $this->view('add_edit_contact',$data);
	}
	
}