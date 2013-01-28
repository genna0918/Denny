<?php 
if(!empty($logged)) 
{
	?>
<aside class="col-rhs300">

				<h2>My Loyalty Card</h2>

				<div class="loyalty-card">

					<div class="panel-box loyalty-box">

						<a href="<?php echo base_url(); ?>" title="" class="logo">dennys</a>

				<!--   check in button		
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

				<div class="banners">

					<div class="sign-up">
						<figure class="pic"><img src="<?php echo base_url(); ?>assets/img/get-dennys-rewards.png" alt="" /></figure>
						<a href="<?php echo base_url(); ?>" title="" class="btn">SIGN ME UP</a>
					</div>

					<div class="adds">
						<figure class="pic"><img src="<?php echo base_url(); ?>assets/img/temp/06.jpg" alt="" /></figure>
					</div>
				
					<div class="adds">
						<figure class="pic"><img src="<?php echo base_url(); ?>assets/img/temp/07.jpg" alt="" /></figure>
			<!--	check in button
							<a href="" title="" class="btn btn-checkin">CHECK IN</a>
							 -->
					</div>
				
					
					<div class="adds">
						<figure class="pic">
						  <div class="likeImage">
								<a class="addthis_button_facebook" href="#" target="facebook"><img src="<?php echo base_url(); ?>assets/img/temp/08.jpg" alt="" /></a>
							</div>
						</figure>
					</div>

				</div><!-- /.banners -->

	</aside><!-- /aside -->
	<script>
		$(document).ready(function () {
			jQuery('a.link-fb').attr('addthis:url', 'http://www.ddsapp.com');
			jQuery('a.link-fb').attr('addthis:title', 'title');
		});
	</script>
	

<?php 
}
?>
