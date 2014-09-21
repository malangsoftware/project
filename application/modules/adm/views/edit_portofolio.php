    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
<hr><hr>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php
		if (!isset($q)) exit();
		foreach ($q->result() as $r){
		 $object=json_decode($r->content);
		 $obj=$object->value->$type;
		 $p_title=form_input('title',$obj->title,'style="width:100%;height:30px;"');
		 $p_img=form_input('img',$obj->img,'style="width:100%;height:30px;" readonly="true"');
		 $p_desc=form_textarea('description',$obj->description,'style="width:100%;"');
		 $submit=form_submit('','Simpan','class="btn btn-primary"');
		 $cancel="<a class='btn btn-default' onclick='history.back();'>Cancel</a>" ;
		}
		echo form_open('adm/id/editportofolio?id='.$r->ID.'&content='.$content).
			"<table class='table'>".
			 "<tr>
			   <td>Title</td>
			   <td>:</td>
			   <td>".$p_title."</td>
			 </tr>".
			 "<tr>
			   <td>Image</td>
			   <td>:</td>
			   <td>".$p_img."</td>
			 </tr>".
			 "<tr>
			   <td>Description</td>
			   <td>:</td>
			   <td>".$p_desc."</td>
			 </tr>".
			 "<tr>
			   <td></td>
			   <td></td>
			   <td>".$cancel.' '.$submit."</td>
			 </tr>".
			"</table>".
		     form_close();
			
		
	?>
      </div><!-- /.row -->
       <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p><?php get_group();?><a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>

</div><!-- /.container -->
</body>
</html>
