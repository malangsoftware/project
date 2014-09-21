<table class="table" style="">
 <tr>
  <td colspan=5>Contact Page</td><td> <a class='btn btn-default' href="<?php echo site('new_contact');?>">Tambah</a> </td>
 </tr>
 <tr>
  <th>Nama</th>
  <th>Telphone</th>
  <th>BlackBerry</th>
  <th>WhatsUp</th>
  <th>Email</th>
  <th>Edit</th>
 </tr>
 <?php 
 if (!isset($q)) exit(); 
 	if ($q->num_rows() > 0){
	 foreach($q->result() as $r){
		  $id=$r->ID_contact;
		    $nama=$r->person_name;
		      $hp= $r->person_phone;
		      $bb= $r->person_bb;
		      $wa= $r->person_wa;
		      $email= $r->person_email;
		 echo "
		  <tr>
			  <td>".$nama."</td>
			  <td>".$hp."</td>
			  <td>".$bb."</td>
			  <td>".$wa."</td>
			  <td>".$email."</td>
			  <td><a class='btn btn-primary' href=".site('edit_contact?id='.$id).">Edit</a> </td>
		 </tr>";
	 }
 }
 ?>
</table>