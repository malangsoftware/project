<table class="table" style="">
 <tr>
  <td colspan=7>Product Page 
  	<a class="btn btn-primary" id="new" href="<?php echo site('load_newProduct_form'); ?>" style="float:right;">Tambah Data</a></td>
 </tr>
 <tr>
  <th>ID</th>
  <th>Kode Project</th>
  <th>Image</th>
  <th>Nama</th>
  <th>Framework</th>
  <th>Description</th>
  <th>Edit </th>
 </tr>
 <?php 
 if (!isset($q)) exit(); 
 if ($q->num_rows() > 0){
	$no=1;
	 foreach($q->result() as $row){
		  $id=$row->ID_proj;
		  $code=$row->project_code;
		  $p_title=$row->project_title;
		  $image=$row->image;
		  $fw=$row->f_name;
		  $img='<img class="img-rounded" data-src="holder.js/140x140" alt="140x140" src="'.product_image($image).'" 
			style="max-width: 50px; max-height: 50px;">';
		  $desc=anchor('','Lihat Diskripsi');
		 echo "
		  <tr>
			  <td>".$no."</td>
			  <td>".$code."</td>
			  <td>".$img."</td>
			  <td>".$p_title."</td>
			  <td>".$fw."</td>
			  <td>".$desc."</td>
			  <td><a class='btn btn-primary' id='button' href='".site('editProduct_form?id='.$id)."'>Edit</a> </td>
		 </tr>";
		 $no++;
		 }
 }
 ?>
</table>
