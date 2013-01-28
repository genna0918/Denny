
<?php 
	if(isset($error))
	{
		$fld_error = 'fld-error';
		$error_style = "Invalid Login";
	}
	else
	{
		$fld_error = '';
		$error_style = "";
	}
?>
<section id="main">

	<div class="fixer one-col-no-bg">

		<article class="login">

			<h1>Login to Denny’s</h1>
			<p>Manage your My Denny's profile, points, and more!</p>

			<div class="panel-box login-box">
				<form id="signin" action="<?php echo base_url(); ?>login" method="POST">
					<div class="row">
						<div class="col-lhs">
	                    	<input type="text" class="fld" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""?>"  title="Email" />
						</div>
						<div class="col-rhs">
	                    	<input type="password" class="fld <?php echo $fld_error;?>" id="password" name="password" placeholder="PIN" title="PIN" />
						</div>
					</div>
					<div class="row check-tick">
						<div class="col-lhs">
							<input type="checkbox" id="keep" name="keep" value="0" onclick="keep_check();" /><label>Keep me logged in</label>
						</div>
						<a href="<?php echo base_url(); ?>forgot" title="" class="btn-forgot">Forgotten PIN</a>
					</div>
					<input type="hidden" id="success" name="success" value="1"/>
					<div class="action-row">
					<p class="error"><?php echo $error_style;?></p>
					
					<a href="javascript:void(0)" onclick="signIn();" title="" class="btn">LOGIN</a></div>
				</form>
			</div><!-- /.panel-box -->

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->