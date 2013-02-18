	<script>

		$(document).ready(function() {
			$(".expand").click(function() {
				$(".content").slideToggle("fast");
				if($(".expand").text() == 'Tier Explanation')
				{
					$(".expand").text("Close Tier Explanation");
				}
				else
				{
					$(".expand").text("Tier Explanation");
				}
				$(this).toggleClass("expand-active"); return false;
				
			});
			$('.close').click(function() {
				$('.content').slideToggle("fast");
				$(".expand").removeClass("expand-active");
				$(".expand").text("Tier Explanation");
				
			});

			
			
		});

	</script>
<section id="main">

	<div class="fixer">

		<article class="my-profile">

			<aside class="col-lhs507">

				<h1>My Profile</h1>

				<div class="panel-box points-box">

					<h2>YOU HAVE <strong><?php echo $point; ?></strong> <span>POINTS</span></h2>

					<div class="action-row">
						<div class="col-lhs"><a href="<?php echo base_url(); ?>myRewards/page" title="" class="btn">REDEEM</a></div>
						<div class="col-rhs"><a href="<?php echo base_url(); ?>setting" title="" class="btn">SETTINGS</a></div>
					</div>
					<div class="row"><a href="<?php echo base_url(); ?>allRewards/page" title="" class="btn">REWARDS AVAILABLE</a></div>

				</div><!-- /.panel-box -->

				<div class="loyalty-card">

					<div class="panel-box loyalty-box">

						<div class="cupons-list">
							<ul>
								<?php 
									if(!isset($loyalty_card['customerLoyaltyCardStamps']['empty']) && isset($loyalty_card))
									{
										$result = array();
										if(isset($loyalty_card['customerLoyaltyCardStamps']['reward']))
										{
											$result[0] = $loyalty_card['customerLoyaltyCardStamps'];
										}
										else
										{
											$result = $loyalty_card['customerLoyaltyCardStamps'];
										}
										foreach($result as $stamp)
										{
										
											if($stamp['reward'] == 'true')
												echo '<li class="blank reward"><img src=" '.$stamp['thumbMediaURI'].' " alt="" /></li>';
											else
												echo '<li class="c_1 blank"><img src=" '.$stamp['thumbMediaURI'].' " alt="" /></li>';
										}
									}
								?>
							</ul>
						</div><!-- /.cupons-list -->

						<div class="action-row">
							<div class="col-lhs"><a href="<?php echo base_url(); ?>myRewards/page" title="" class="btn">REDEEM</a></div>
							<div class="col-rhs"><a href="<?php echo base_url(); ?>setting" title="" class="btn">SETTINGS</a></div>
						</div>
					<div class="row"><a href="<?php echo base_url(); ?>allRewards/page" title="" class="btn">REWARDS AVAILABLE</a></div>
	
					</div><!-- /.panel-box -->

				</div><!-- /.loyalty-card -->


				<div class="panel-box tier-box">
					<?php
				
						foreach($tiers as $tier)
						{
							if($tier['id'] == $tier_id)
							{
									
								$mediaUrl = $tier['mediaURI'];
					?>
					<span class="gold-main">gold</span>
					<script>
							var media_url = "<?php echo $mediaUrl;?>";
	//				        var media_url = "assets/img/gold-main.png";
							$(".gold-main").css("background", "url(" + media_url + ") no-repeat");
					</script>
					<div class="heading">
						<h3><?php echo strtoupper($tier['tierName']); ?> TIER MEMBER</h3>
						<h4><a href="javascript:void(0)" title="" class="expand">Tier Explanation</a></h4>
					</div>
					<?php
							}
						}
					?>
					<div class="content">
							<?php
							$num = count($tiers);
							$i = $num - 1;
							while ($i >= 0) 
								{
									
							?>
						<div class="heading">
							<h3><?php echo strtoupper($tiers[$i]['tierName']); ?> TIER</h3>
							<span class="ring"><img src="<?php echo $tiers[$i]['mediaURI']; ?>" style="width: 32px;" alt="" /></span>
						</div>
						<div class="list">
							<ul>
								<li><a href="" title=""><?php echo $tiers[$i]['desc']; ?></a></li>
							</ul>
		<!--					<ul class="col-rhs">
								<li><a href="" title="">Advantage goes here</a></li>
								<li><a href="" title="">Advantage goes here</a></li>
								<li><a href="" title="">Advantage goes here</a></li>
								<li><a href="" title="">Advantage goes here</a></li>
							</ul>
		-->
						</div>
                        <?php
								$i--;
							}
					
							?>

						<div class="row">
							<h4><a href="javascript:void(0)" title="" class="close">Close Tier Explanation</a></h4>
						</div>
                        
					</div><!-- /content -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<aside class="col-rhs300">

				<h2>My Loyalty Card</h2>

				<div class="loyalty-card">

					<div class="panel-box loyalty-box">

						<a href="javascript:void(0)" title="" class="logo">dennys</a>

		<!--				<div class="action-row"><a href="" title="" class="btn">CHECK IN</a></div>                  -->

						<div class="cupons-list">
							<ul>
								<?php 
									if(!isset($loyalty_card['customerLoyaltyCardStamps']['empty']) && isset($loyalty_card))
									{
										$result = array();
										if(isset($loyalty_card['customerLoyaltyCardStamps']['reward']))
										{
											$result[0] = $loyalty_card['customerLoyaltyCardStamps'];
										}
										else
										{
											$result = $loyalty_card['customerLoyaltyCardStamps'];
										}
										foreach($result as $stamp)
										{
										
											if($stamp['reward'] == 'true')
												echo '<li class="blank reward"><img src=" '.$stamp['thumbMediaURI'].' " alt="" /></li>';
											else
												echo '<li class="c_1 blank"><img src=" '.$stamp['thumbMediaURI'].' " alt="" /></li>';
										}
									}
								?>
							</ul>
						</div><!-- /.cupons-list -->

					</div><!-- /.panel-box -->

				</div><!-- /.loyalty-card -->

			</aside><!-- /aside -->

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->