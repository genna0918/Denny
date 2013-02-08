<?php 
	$fld_error = '';
	$error_style = "";
	$success_message = "";
	if(isset($error) && ($error==1))
	{
		$fld_error = 'fld-error';
		$error_style = "<p class='error'>You are not registerted user</p>";
	}
	if(isset($error) && ($error==0))
	{
		$success_message = "<h2 style='color: #A91317;'>Thankyou and fire off WS customerForgotPIN</h2>";
	}
	
?>
<section id="main">

	<div class="fixer one-col-no-bg">

		<article class="forgotten">

			<h1>Forgotten PIN</h1>
			<?php echo $success_message;?>
			<p>If you can't remember your My Denny's password, just provide us with your email address, and we'll send it to you.</p>

			<div class="panel-box forgotten-box">
				<form id="reset_frm" action="<?php echo base_url(); ?>forgot" method="POST">
					<div class="row">
                    	<input type="text" class="fld <?php echo $fld_error;?>" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""?>" title="Email" />
					</div>
					<div class="action-row">
						<p class="error"></p>
						<input type="hidden" id="success" name="success" value="1"/>
						<?php echo $error_style;?>
						<a href="javascript:void(0)" onclick="resetPassword();" title="" class="btn">RESEND PASSWORD</a>
					</div>
				</form>
			</div><!-- /.panel-box -->

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->