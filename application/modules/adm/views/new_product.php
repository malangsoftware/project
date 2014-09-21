<?php
 $type=form_dropdown('type',array('WEBDSG-'=>'WEBDSG','WEBAPP-'=>'WEBAPP','DESKTP-'=>'DESKTP'),'','style="width:100px;"');
 $code=form_input("code_p","",'style="height:30px;"');
 $nama=form_input("nama_p","",'style="height:30px;"');
 $upload=form_upload("userfile","",'');
 $desc_id=form_textarea("description_in","",'style="width:300px;height:50px;"');
 $desc_en=form_textarea("description_en","",'style="width:300px;height:50px;"');
 $arr_fw=array();
 if (isset($fw)){
  foreach($fw->result() as $r){
   $arr_fw[$r->f_code]=ucfirst($r->f_name);
  }
 }
 $frameW=form_dropdown('framework',$arr_fw,'','');
?>
   <?php echo form_open_multipart(site('insert_new')); ?>
	<table class="table" style="max-width:70%">
	 <tr>
	  <td>Kode</td>	<td>:</td>	<td><?php echo $type.$code; ?></td>
	 </tr>
	 <tr>
	  <td>Nama</td>	<td>:</td>	<td><?php echo $nama; ?></td>
	 </tr>
	 <tr>
	  <td>Framework</td> <td>:</td>	<td><?php echo $frameW; ?></td>
	 </tr>
	 <tr>
	  <td>Image</td> <td>:</td>	<td><?php echo $upload; ?></td>
	 </tr>
	 <tr>
	  <td colspan=3 bgcolor="#DDD">Deskripsi</td>
	 </tr>
	 <tr>
	  <td>Indeonesia</td> <td>:</td>	<td><?php echo $desc_id; ?></td>
	 </tr>
	 <tr>
	  <td>English</td> <td>:</td>	<td><?php echo $desc_en; ?></td>
	 </tr>
	</table>
	<button type="button" class="btn btn-default" onclick="document.location='<?php echo site('?p=product'); ?>'">Close</button>
	<input type="submit" class="btn btn-primary" value="Save">
	</form>
	<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>