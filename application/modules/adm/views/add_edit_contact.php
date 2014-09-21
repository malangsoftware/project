   <?php 
   $value='';
   if (isset($edit_val)){
	   foreach($edit_val->result() as $r){
	    $id=$r->ID_contact;
	    $nama=$r->person_name;
	    $phone=$r->person_phone;
	    $bb=$r->person_bb;
	    $wa=$r->person_wa;
	    $email=$r->person_email;
	    $state=$r->state_person;
	    $desc=$r->description;
	    $url=site('edit_contact?id='.$id);
	   }
   }else{
	    $id="";	    $nama="";	    $phone="";
	    $bb="";	    $wa="";	    $email="";
	    $state="";	    $desc="";		$url=site('new_contact?id='.$id);
   }
    $form=form_open($url);
    $f_nama=form_input('nama',$nama);
    $f_phone=form_input('phone',$phone);
    $f_bb=form_input('bb',$bb);
    $f_wa=form_input('wa',$wa);
    $f_email=form_input('email',$email);
    $f_state=form_dropdown('state',array('1'=>'Aktif','0'=>'Nonaktif'),$state);
    $f_desc=form_textarea('diskripsi',$desc);
    $submit=form_submit('submit','Simpan');
    $button=form_button('button','Cancel','onclick="history.back();"');
    $close_f=form_close();
   ?>
<table class="table" style="width:50%">
<?php echo $form;?>
 <tr>
  <td colspan=3>Edit Person Info</td>
 </tr>
 <tr>
  <td>Nama</td> <td>:</td>
  		<td><?php echo $f_nama; ?></td>
 </tr>
 <tr>
  <td>Nomor</td> <td>:</td>
  		<td><?php echo $f_phone; ?></td>
 </tr>
 <tr>
  <td>Blackberry</td> <td>:</td>
  		<td><?php echo $f_bb; ?></td>
 </tr>
 <tr>
  <td>Whatsup</td> <td>:</td>
  		<td><?php echo $f_wa; ?></td>
 </tr>
 <tr>
  <td>Email</td> <td>:</td>
  		<td><?php echo $f_email; ?></td>
 </tr>
 <tr>
  <td>Email</td> <td>:</td>
  		<td><?php echo $f_state; ?></td>
 </tr>
 
 <tr>
  <td>Email</td> <td>:</td>
  		<td><?php echo $f_desc; ?></td>
 </tr>
 <tr>
  <td colspan=3><?php echo $submit.$button; ?></td>
 </tr>
<?php echo $close_f;?>
</table>
