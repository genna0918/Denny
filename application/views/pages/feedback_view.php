<section id="main">

	<div class="fixer">

		<article class="feedback">

			<aside class="col-lhs507">

				<h1>Feedback</h1>
				<p>Got something on your mind? Don't be shy! Drop us a line. </p>

				<div class="panel-box feedback-box">

					<form id="from_feedback" action="<?php echo base_url(); ?>feedback/success" method="POST">
						<div class="row">
							<div class="col-lhs">
	        	            	<input type="text" class="fld" id="name" name="name" placeholder="Your Name" title="Your Name" />
							</div>
							<div class="col-rhs">
	                    		<input type="text" class="fld" id="email" name="email" placeholder="Your Email" title="Your Email" />
							</div>
						</div>
						<div class="row row-dropdown">
							<div class="col-lhs">
	                    		<input type="text" class="fld" id="phone" name="phone" placeholder="Telephone" title="Telephone" />
							</div>
							<div class="col-rhs">

								<select class="selectbox" id="subject" name="subject">
										<option value="" style="color:#b0b0b0;">Subject</option>
										<?php
											foreach($subjects as $subject) {
												echo '<option value="'.$subject['id'].'">'.$subject['feedbackSubjectName'].'</option>';
										}
										?>
								</select>

							</div>

						</div>
						<div class="row">
							<textarea cols="5" rows="5" class="fltxt" id="message" name="message" placeholder="Your Message"></textarea>
						</div>                        
						<div class="action-row">
							<p class='error'></p>
							<a href="javascript:void(0)" onclick="submitFeedback();" title="" class="btn">SUBMIT</a>
						</div>
					</form>

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

	</div><!-- /.fixer -->

</section><!--/section -->
<script>
	$(".selectbox").css("color","red;");
</script>