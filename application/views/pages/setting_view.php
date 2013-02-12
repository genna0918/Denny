<section id="main">

	<div class="fixer">

		<article class="my-settings">

			<aside class="col-lhs507">

				<h1>Settings</h1>
				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo base_url(); ?>profile" title="">Back to Profile</a></li>
					</ul>
				</div><!-- /.top-tools -->

				<div class="panel-box settings-box">

					<h4>Edit your settings below and hit update</h4>

					<form  id="edit_frm" action="<?php echo base_url(); ?>setting/success" method="POST">
						<div class="row">
							<div class="col-lhs">
	        	            	<input type="text" class="fld"  id="first_name" name="first_name" class="fld" placeholder="First Name" title="First Name" value="<?php echo htmlspecialchars($first_name); ?> " onchange="check_length(this)"/>
							</div>
							<div class="col-rhs">
	                    		<input type="text" class="fld" id="last_name" name="last_name" class="fld"  placeholder="Last Name" title="Last Name" value="<?php echo htmlspecialchars($last_name); ?>" onchange="check_length(this)"/>
							</div>
						</div>
						<div class="row">
							<div class="col-lhs">
	        	            	<input type="text" class="fld" id="cell_num" name="cell_num" class="fld" placeholder="Cell Number" title="Cell Number" value="<?php echo $telephone; ?>" onchange="check_length(this)"/>
							</div>
							<div class="col-rhs">
	                    		<input type="text" class="fld"  id="email" name="email" class="fld"  placeholder="Email" title="Email" value="<?php echo $email; ?>"/>
							</div>
						</div>
						<div class="row row-dropdown">
							<div class="col-lhs">

								<select class="selectbox" id="country" name="country">
								<option value="">Location</option>
									<?php
											foreach($locales as $locale) {
												if($locale['id'] == $locale_id)
													echo '<option selected value="'.$locale['id'].'">'.$locale['localeName'].'</option>';
												else
													echo '<option value="'.$locale['id'].'">'.$locale['localeName'].'</option>';
										}
								?>
							</select>

							</div>
							<div class="col-rhs">
	                    		<input type="password" id="password" name="password" class="fld" placeholder="Create a PIN" title="Create a PIN"  value="<?php echo $pin; ?>"/>
							</div>
						</div>
						<div class="row check-tick">
							<input type="checkbox" id="chboxa" name="chboxa" value="" <?php echo $checked; ?>/><label>I would like to be contacted about Special Offers</label>
						</div>
						<div class="action-row">
							<p class='error'></p>
							<a href="javascript:void(0)" onclick="editUser();" title="" class="btn">UPDATE</a>
 
						</div>
					</form>

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->