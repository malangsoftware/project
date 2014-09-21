<table class="table">
 <tr>
  <td>Description</td>
 </tr><tr>
  <td>
   <?php 
   $value='';
   if (!isset($q))exit();
   foreach($q->result() as $r){
    $id=$r->ID;
    $val=$r->content;
   }
    echo form_open(site('aboutus?id='.$id));
    echo form_textarea('desc',$val,'style="min-width:500px;"');
    echo form_submit('submit','Simpan');
    echo form_button('button','Cancel','onclick="history.back();"');
    echo form_close();
   ?>
  </td>
 </tr>
<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
</table>
