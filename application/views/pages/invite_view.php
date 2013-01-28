<script>
$(function() {
	$("#datepicker").datepicker({ dateFormat : 'DD  dth  MM' });
	$("#timepicker").timepicker();
});
</script>
<section id="main">

	<div class="fixer">

		<article class="invite">

			<aside class="col-lhs507">

				<h1 id="invite_title">Invite Someone</h1>

				<p>Meet up with your pals at your Denny's, where more is always merrier.</p>

				<div id="invite_form1" class="panel-box invite-box">

					<form id="invite_frm" action="<?php echo base_url(); ?>invite/email_send" method="POST">

						<h2>Location & Time</h2>
						<div class="row first-row" style="z-index:1;">
								<select class="selectbox" id="location" name="location">
									<option value="">Where</option>
						<?php 		
											foreach($wheres as $where) {
												echo '<option value="'.$where['storeAdd1'].', '.$where['storeCity'].', '.$where['storeName'].', '.$where['localeName'].'">'.$where['storeAdd1'].', '.$where['storeCity'].', '.$where['storeName'].', '.$where['localeName'].'</option>';
										}
										  
						?>
        
								</select>
						</div>

						<div class="row row-dropdown" style="z-index:0;">
							<div class="col-lhs">
	                    		<input type="text" class="fld" id="datepicker" name="date" placeholder="Date" title="Date" onkeyup="vaild_date();" />
							</div>
							<div class="col-rhs">
								<input type="text" class="fld" id="timepicker" name="time" placeholder="Time" title="Time" onkeyup="vaild_time();"/>
							</div>
						</div>
                        
						<h2>Friends Details</h2>
                        
						<div class="row">
        	            	<input type="text" class="fld" id="email1" name="email1" placeholder="Email Address 1" title="Email Address 1" />
						</div>                   
						<div class="row">
        	            	<input type="text" class="fld" id="email2" name="email2" placeholder="Email Address 2" title="Email Address 2" />
						</div>                   
						<div class="action-row">
							<p class='error'></p>
							<a href="javascript:void(0)" title="" onclick="invite_send();" class="btn btn-rhs">SEND</a>
							<a href="<?php echo base_url(); ?>invite" title="" class="btn">CANCEL</a>
						</div>
					</form>
		
				</div><!-- /.panel-box -->
					<div id="invite_form2" style="display: none;" class="panel-box invite-box">

					<aside class="content">
						<h3><?php  echo  $customer_name; ?> would like to invite you to meet <br />him at Denny’s</h3>
						<h3><strong><font id="send_date"></font><br />at <font id="send_time"></font></strong></h3>
						<p><strong><font id="send_where"></font></strong></p>
					</aside><!-- /.content -->

					<div class="action-row">
						<a href="javascript:void(0)" onclick="invite_confirm();" title="" class="btn btn-rhs">CONFIRM</a>
						<a href="javascript:void(0)" onclick="invite_edit();" title="" class="btn">EDIT</a>
					</div>

				</div><!-- /.panel-box -->
			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->