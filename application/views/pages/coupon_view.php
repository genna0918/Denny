<section id="main">

	<div class="fixer">

		<article class="my-rewards">

			<aside class="col-lhs507">

				<h1>Rewards</h1>

				<div class="btn-panel">
					<a href="<?php echo base_url(); ?>allRewards/page" title="" class="btn active">ALL REWARDS</a>
					<a href="<?php echo base_url(); ?>myRewards/page" title="" class="btn btn-rhs">MY REWARDS</a>
				</div><!-- /.btn-panel -->	

				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo base_url(); ?>allRewards/page" title="">Back to Rewards</a></li>
						<li class="print"><a href="javascript:window.print()" title="">Print Coupon</a></li>
					</ul>
				</div><!-- /.top-tools -->

				<div class="panel-box coupon-box">

					<aside class="item">

						<div class="top-item">
							<figure class="pic"><img src="<?php echo $img_url; ?> " width="186" height="95" alt="" /></figure>
							<div class="txt">
								<h2><?php echo $rewardName;?></h2>
								<p><?php echo $points;?> Points</p>
								<ul class="valid">
									<li>Valid until <?php echo $valid_until;?></li>
									<li><img src="<?php echo base_url(); ?>assets/img/logo-small.png" alt="" /></li>
								</ul>
							</div><!-- /.txt -->
						</div><!-- /.top-item -->

						<div class="code"><img src="<?php echo base_url(); ?>assets/img/code.png" alt="" /> <h6>12345678</h6></div>

			<!--			<div class="action-row"><a href="" title="" class="btn">REDEEM COUPON</a></div>        -->


					</aside><!-- /.item -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

	</div><!-- /.fixer -->

</section><!--/section -->