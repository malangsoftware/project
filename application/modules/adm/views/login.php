<div class="span3">
<?php
echo form_open(site('login'));
echo "<label for='inputPassword' class='col-sm-2 control-label'>username</label>".
	form_input(array('name'=>'r_username','class'=>"form-control" ,'id'=>"password", 'placeholder'=>"Username"));
echo "<label for='inputPassword' class='col-sm-2 control-label'>username</label>".
	form_input(array('name'=>'r_password','class'=>"form-control" ,'type'=>"password", 'placeholder'=>"Username"));
echo form_button('button','Cancel','class="btn btn-default"');
echo form_submit('submit','Sign in','class="btn btn-primary"');
echo form_close();

?>
</div><!-- /.span3 -->
