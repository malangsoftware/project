<table class="table" style="">
 <tr>
  <td colspan=5>About Us Page</td>
 </tr>
 <tr>
  <th>Nama</th>
  <th>Description</th>
  <th>Edit</th>
 </tr>
 <?php 
 if (!isset($q)) exit(); 
 if ($q->num_rows() > 0){
	 foreach($q->result() as $r){
	  if ($r->lang=='id'){$lang="Indonesia";}else{$lang="English";}
	  echo "<tr><td colspan=3><b>".$lang."</b></td>";
	  $datas=$r->content;
		 echo "
		  <tr>
			  <td>About Us</td>
			  <td>".$datas."</td>
			  <td><a class='btn btn-primary' href=".site('aboutus?q=edit&id='.$r->ID).">Edit</a> </td>
		 </tr>";
	 }
 }
 ?>
</table>
