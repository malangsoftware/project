<table class="table" style="">
 <tr>
  <td colspan=5>Portofolio Page</td>
 </tr>
 <tr>
  <th>ID</th>
  <th>Nama</th>
  <th>Image</th>
  <th>Description</th>
  <th>Edit </th>
 </tr>
 <?php 
 if (!isset($q)) exit(); 
 if ($q->num_rows() > 0){
	 foreach($q->result() as $row){
	 	$id=$row->ID;
	  	$datas=json_decode($row->content);
		 $a=array("web","web_dev","desktop");
		 $n=0;
		 if ($row->lang=='id'){$lang="Indonesia";}else{$lang="English";}
		 echo "<tr>
		 	<td colspan=5>".$lang."</td>
		 </tr>";
		 foreach($datas->value as $r){
		  $title=$datas->value->$a[$n]->title;
		  $img=$datas->value->$a[$n]->img;
		  $desc=$datas->value->$a[$n]->description;
		  $no=$n+1;
		  $img='<img class="img-rounded" data-src="holder.js/140x140" alt="140x140" src="'.get_image($img).'" 
			style="max-width: 50px; max-height: 50px;">';
		 echo "
		  <tr>
			  <td>".$no."</td>
			  <td>".$title."</td>
			  <td>".$img."</td>
			  <td>".$desc."</td>
			  <td><a class='btn btn-primary' href=".site('editportofolio?id='.$id.'&content='.$a[$n]).">Edit</a> </td>
		 </tr>";
		 $n++;
		 }
	 }
 }
 ?>
</table>
