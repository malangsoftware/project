<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php echo ucfirst($title); ?></title>
    <!-- Le styles -->
    <link href="<?php echo get_stylesheet('bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo get_stylesheet('bootstrap-responsive.css');?>" rel="stylesheet">
    <link href="<?php echo get_stylesheet('common.css');?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_image('ico.png'); ?>">
	<script src="<?php echo get_jqueryF('jquery.js');?>"></script>
	<script src="<?php echo get_script('bootstrap-transition.js');?>"></script>
	<script src="<?php //echo get_script('bootstrap-alert.js');?>"></script>
	<script src="<?php echo get_script('bootstrap-modal.js');?>"></script>
	<script src="<?php echo get_script('bootstrap-dropdown.js');?>"></script>
	<script src="<?php //echo get_script('bootstrap-scrollspy.js');?>"></script>
	<script src="<?php //echo get_script('bootstrap-tab.js');?>"></script>
	<script src="<?php //echo get_script('bootstrap-tooltip.js');?>"></script>
	<script src="<?php //echo get_script('bootstrap-popover.js');?>"></script>
	<script src="<?php echo get_script('bootstrap-button.js');?>"></script>
	<script src="<?php //echo get_script('bootstrap-collapse.js');?>"></script>
	<script src="<?php echo get_script('bootstrap-carousel.js');?>"></script>
	<script src="<?php echo get_script('bootstrap-typeahead.js');?>"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
	  <style id="holderjs-style" type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style><script type="text/javascript" src="chrome-extension://pmoflmbbcfgacopiikdcpmbiellfihdg/unity-api-page-proxy-builder-gen.js"></script>
	  <script type="text/javascript" src="chrome-extension://pmoflmbbcfgacopiikdcpmbiellfihdg/unity-api-page-proxy.js"></script>
</head>

<?php
if (!isset($pageName)){
	$pageName=$title;
}
$index="";$porto="";$about="";$contact="";$product="";
if ($pageName == "login"){$index="active";}
if ($pageName == "portofolio"){$porto="active";}
if ($pageName == "product"){$product="active";}
if ($pageName == "aboutus"){$about="active";}
if ($pageName == "contact"){$contact="active";}
?>

<div class="navbar-wrapper" alt="rezstore indonesia">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <a class="brand" href="#"><img src="<?php echo get_logo('logo.png');?>" width="70" height="20" alt="rezstore indonesia"></a>
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav" alt="rezstore indonesia">
                <li class="<?php echo $index; ?>" alt="rezstore indonesia"><a href="<?php echo site('?p=home'); ?>"><?php if ($pageName=="login"){echo "Login";}else{echo "Home";}?></a></li>
                <li class="<?php echo $porto; ?>"><a href="<?php echo site('?p=portofolio'); ?>" alt="rezstore indonesia">Portofolio</a></li>
                <li class="<?php echo $product; ?>"><a href="<?php echo site('?p=product'); ?>" alt="rezstore indonesia">Product</a></li>
                <li class="<?php echo $about; ?>"><a href="<?php echo site('?p=aboutus'); ?>" alt="rezstore indonesia">About Us</a></li>
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="<?php echo $contact; ?>"><a href="<?php echo site('?p=contact'); ?>">Contact</a> </li>
                <?php if ($pageName !=="login"){echo '<li><a href="'.site('unset_sess').'">Logout</a> </li>';}?>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->
    <hr><hr>
