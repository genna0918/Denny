<section id="main">

	<div class="fixer">

		<article id="intro">

			<h1>Welcome to My Denny’s</h1>
			<p>It's all about you. Your preferences, your tastes, your cravings. It's your Denny's, so why not have it all? Make Denny's yours with My Denny's, the only app that earns you perks with every bite you take. </p>
			<p>Whether you're in for breakfast, lunch, dinner, or late night, with My Denny's you'll earn one point for every dollar you spend. Redeem your points in-store for food and beverages, or spread your love by gifting points to your family and friends. </p>
			<p>Make Denny's yours, one loving mouthful at a time, with My Denny's.</p>

			<ul class="app-stories">
				<li><a href="" title="" class="app-store">app-store</a></li>
				<li><a href="" title="" class="android">android</a></li>
			</ul><!-- /.app-stories -->

		</article><!-- /article -->

		<?php 
			if(!empty($logged)) 
			{
				?>
			<aside class="col-rhs300">

							<h2>My Loyalty Card</h2>

							<div class="loyalty-card">

								<div class="panel-box loyalty-box">

									<a href="<?php echo base_url(); ?>" title="" class="logo">dennys</a>
									<!--  check in button
									<div class="action-row"><a href="" title="" class="btn">CHECK IN</a></div>
									-->

									<div class="cupons-list">
										<ul>
											<?php 
												
												foreach($loyalty_card['customerLoyaltyCardStamps'] as $stamp)
												{
													if($stamp['reward'] == 'true')
														echo '<li class="blank reward"><img src=" '.$stamp['thumbMediaURI'].' " alt="" /></li>';
													else
														echo '<li class="c_1 blank"><img src=" '.$stamp['thumbMediaURI'].' " alt="" /></li>';
												}
											?>
										</ul>
									</div><!-- /.cupons-list -->

								</div><!-- /.panel-box -->

							</div><!-- /.loyalty-card -->

						</aside><!-- /aside -->

				</article><!-- /article -->

			<?php 
			}
			else
			{
				?>
		
		<aside class="col-rhs300">

			<div class="signup-box">
				<h2>Sign up Here</h2>

				<div class="steps">
					<ul>
						<li class="txt">Step</li>
						<li><a href="javascript:void(0)" title="" class="step1 active">1</a></li>
						<li><a href="javascript:void(0)" title="" class="step2" >2</a></li>
					</ul>
				</div><!-- /.steps -->

				<form id="signup" action="<?php echo base_url(); ?>" method="POST">
					<div id="login_step1">
						<div class="row"><input type="text" id="first_name" name="first_name" class="fld" placeholder="First Name" title="First Name" /></div>
						<div class="row"><input type="text" id="last_name" name="last_name" class="fld"  placeholder="Last Name" title="Last Name" /></div>
						<div class="row"><input type="text" id="cell_num" name="cell_num" class="fld" placeholder="Cell Number" title="Cell Number" /></div>
						<div class="action-row"><a href="javascript:void(0)" title="" id="login_step_btn" class="btn">NEXT</a></div>
					</div>

					<div id="login_step2" style="display: none;">
						<div class="row"><input type="text" id="email" name="email" class="fld"  placeholder="Email" title="Email" /></div>
						<div class="row row-dropdown">
							<select class="selectbox" id="country" name="country">
								<option value="">Location</option>
									<?php
											foreach($locales as $locale) {
												echo '<option value="'.$locale['id'].'">'.$locale['localeName'].'</option>';
										}
								?>
							</select>
						</div>
						<div class="row"><input type="password" id="password" name="password" class="fld" placeholder="Create a PIN" title="Create a PIN" /></div>
						<div class="row"><input type="password" id="re_password" name="re_password" class="fld" placeholder="Confirm PIN" title="Confirm PIN" />	</div>
						<div class="row check-tick">
							<div><input type="checkbox" id="offer_flag" name="offer_flag" value="0" onclick="offer_flag_check();"/><label>Contact me  about Special Offers</label></div>
							<div><input type="checkbox" id="agree" name="agree" value="0" onclick="agree_check();"/><label>I agree to the <a href="<?php echo base_url(); ?>terms" title="">terms &amp; conditions</a></label></div>
						</div>
						<input type="hidden" id="success" name="success" value="1"/>
						<div class="action-row"><a href="javascript:void(0)" onclick="signUp();" title="" class="btn">SUBMIT</a></div>
					</div>

				</form>
				<script>
					$('#login_step_btn').click(function (){
						var phone_regex = /^[0-9 +*_.-]+$/i;
						if(document.getElementById('first_name').value=='')
						{
							alert("Please Enter First Name");
						}
						
						else if(document.getElementById('last_name').value=='')
						{
							alert("Please Enter Last Name");
						}
						else if(document.getElementById('cell_num').value=='')
						{
							alert("Please Enter Cell Number");
						}
						else if(!phone_regex.test(document.getElementById('cell_num').value))
						{
							alert("Please Enter a vaild Cell Number");
						}
						else
					    {
							$('#login_step1').hide();
							$('.step1').removeClass('active');
							$('#login_step2').show();
							$('.step2').addClass('active');
						}
					});
					$('.step1').click(function (){
						$('#login_step1').show();
						$('.step1').addClass('active');
						$('#login_step2').hide();
						$('.step2').removeClass('active');
					});
					$('.step2').click(function (){
						var phone_regex = /^[0-9 +*_.-]+$/i;
						if(document.getElementById('first_name').value=='')
						{
							alert("Please Enter First Name");
						}
						
						else if(document.getElementById('last_name').value=='')
						{
							alert("Please Enter Last Name");
						}
						else if(document.getElementById('cell_num').value=='')
						{
							alert("Please Enter Cell Number");
						}
						else if(!phone_regex.test(document.getElementById('cell_num').value))
						{
							alert("Please Enter a vaild Cell Number");
						}
						else
					    {
							$('#login_step1').hide();
							$('.step1').removeClass('active');
							$('#login_step2').show();
							$('.step2').addClass('active');
						}
					});
				</script>

			</div><!-- /.signup-box -->

		</aside><!-- /aside -->
		<?php 
	}
	?>

	</div><!-- /.fixer -->

</section><!--/section -->	