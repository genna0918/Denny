<section id="main">

	<div class="fixer one-col-no-bg">

		<article class="login">

			<h1>Change PIN</h1>
			<p>You have requested to change your PIN, enter a new one below and click confirm, your new PIN will be available to use immediately. </p>

			<div class="panel-box login-box">
				<form  id="changPIN_frm" action="<?php echo base_url(); ?>changePIN" method="POST">
					<div class="row">
						<div class="col-lhs">
	                    	<input type="password" class="fld" id="new_pin" name="new_pin" placeholder="New PIN" title="New PIN" />
						</div>
						<div class="col-rhs">
	                    	<input type="password" class="fld " id="confrirm_pin" name="confrirm_pin" placeholder="Confirm New PIN" title="Confirm New PIN" />
						</div>
					</div>
					<div class="action-row">
						<input type="hidden" id="success" name="success" value="1"/>
						<input type="hidden" id="email" name="email" value="<?php echo $email; ?>"/>
						<input type="hidden" id="resetCode" name="resetCode" value="<?php echo $resetCode ?>"/>
						<p class="error"></p>
						<a href="javascript:void(0)" onclick="changePassword();" title="" class="btn">CHANGE</a>
					</div>
				</form>
			</div><!-- /.panel-box -->

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->