    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing" >
      <!-- Three columns of text below the carousel -->
      <div class="row" style="min-height:50%;" id="loader">
        <?php
		if($data=="login"){
			$ctrl->login();
		}elseif($data=="portofolio"){
			$ctrl->portofolio();
		}elseif($data=="aboutus"){
			$ctrl->aboutus();
		}elseif($data=="contact"){
			$ctrl->contact();
		}elseif($data=="product"){
			$ctrl->product();
		}
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
