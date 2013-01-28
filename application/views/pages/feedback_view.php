<?php 
	$success_message = "";
	if(isset($error) && ($error==1))
	{
	}
	if(isset($error) && ($error==0))
	{
		$success_message = "<h2 style='color: #A91317; sss'>Thank you for your Feedback</h2>";
	}
	
?>
<section id="main">

	<div class="fixer">

		<article class="feedback">

			<aside class="col-lhs507">

				<h1>Feedback</h1>
				<?php echo $success_message;?>
				<p>Got something on your mind? Don't be shy! Drop us a line. </p>

				<div class="panel-box feedback-box">

					<form id="from_feedback" action="<?php echo base_url(); ?>feedback" method="POST">
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
										<option value="">Subject</option>
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
                        <input type="hidden" id="success" name="success" value="1"/>
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