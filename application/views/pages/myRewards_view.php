<section id="main">

	<div class="fixer">

		<article class="my-rewards">

			<aside class="col-lhs507">

				<h1>Rewards</h1>

				<div class="btn-panel">
					<a href="<?php echo base_url(); ?>allRewards/page" title="" class="btn">ALL REWARDS</a>
					<a href="<?php echo base_url(); ?>myRewards/page" title="" class="btn btn-rhs active">MY REWARDS</a>
				</div><!-- /.btn-panel -->	

				<div class="pagination pag-top"><ul><?php echo $links; ?></ul></div>

				<div class="panel-box my-rewards-box">
					<?php
								$i = 0;
								$active = "";
								foreach($results as $data) {
									if(($start <= $i) && (($start + $limit) > $i))
									{
											$data['rewardName'] = "FREE Dessert with any Grand Slam";
										    $data['status'] = 0;
											$valid_array = explode("-", $data['validUntil']);
											$vaild_until = $valid_array[1]."/".$valid_array[2]."/".$valid_array[0];
					?>
					<aside class="item">
					<?php
							if( $data['status'] == 0)	
							{
								echo '<span class="redeemed">redeemed</span>';
								$active = "unactive";
							}
						?>

						<div class="inner <?php echo $active; ?>">
							<figure class="pic"><img src="<?php echo $data['thumbMediaURI']; ?>" alt="" /></figure>
    	                    <div class="txt">
								<h2><?php echo $data['rewardName']; ?></h2>
								<p><?php echo $data['pointsRequired']; ?> Points</p>
								<ul class="valid">
									<li>Valid until <?php echo $vaild_until; ?></li>
									<li><img src="<?php echo base_url(); ?>assets/img/logo-small.png" alt="" /></li>
								</ul>
							</div><!-- /.txt -->
						</div><!-- /.inner -->
					</aside><!-- /.item -->
					<?php
								$i++;	
								}
								
					   }
					   if($i == 0)
								{
									echo "<h2 style='margin-top: 30px;color: #AD2D30; text-align: center;'>You’re closer to rewards than you think but there are none at this time. Please check back later</h2>";
								}
					?>

				</div><!-- /.panel-box -->

				<div class="pagination pag-bottom"><ul><?php echo $links; ?></ul></div>

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->