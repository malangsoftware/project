<?php
if (isset($product)){
 foreach($product->result() as $row){
  $val_type=explode('-',$row->project_code)[0].'-';
  $val_code=explode('-',$row->project_code)[1];
  $val_name=$row->project_title;
  if ($row->lang=="id"){
	  $val_des_id=$row->description;
  }else{
	  $val_des_en=$row->description;  
  }
 }
}
 $type=form_dropdown('type',array('WEBDSG-'=>'WEBDSG','WEBAPP-'=>'WEBAPP','DESKTP-'=>'DESKTP'),$val_type,'style="width:100px;"');
 $code=form_input("code_p",$val_code,'style="height:30px;"');
 $nama=form_input("nama_p",$val_name,'style="height:30px;"');
 $upload=form_upload("userfile","",'');
 $desc_id=form_textarea("description_in",$val_des_id,'style="width:300px;height:50px;"');
 $desc_en=form_textarea("description_en","$val_des_en",'style="width:300px;height:50px;"');
 $arr_fw=array();
 if (isset($fw)){
  foreach($fw->result() as $r){
   $arr_fw[$r->f_code]=ucfirst($r->f_name);
  }
 }
 $frameW=form_dropdown('framework',$arr_fw,'','');
?>
<div class="container marketing" >
      <!-- Three columns of text below the carousel -->
      <div class="row" id="loader">
      <br>
	  <?php echo form_open_multipart(site('update_product')); ?>
		<table class="table" style="width:70%">
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
		<button type="button" class="btn btn-default" onclick="history.back();">Close</button>
		<input type="submit" class="btn btn-primary" value="Save changes" onclick="post_data()">
	   </form>
      </div><!-- /.row -->
       <!-- START THE FEATURETTES -->

      <hr>

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p><?php get_group();?><a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>

</div><!-- /.container -->
<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>

</body>
</html>

