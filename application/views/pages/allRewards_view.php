<script type="text/javascript">
			$(function(){
				$('#popup').dialog({
					autoOpen: false, 
					modal: true, 
					width:300,
					create:function () {
						$(this).closest(".ui-dialog").addClass("popup-dialog");
					}					
				});				
			
			});
	</script>
<section id="main">
		<div id="popup" title="">
			<h2 id="popup_title"></h2>
			<p id="popup_content"></p>
			<div class="action-row">
				<div id="popup_btn_group1">
					<a href="javascript:void(0)" title="" id="popup_btn1" onclick="" class="btn "></a>
					<a href="javascript:void(0)" title="" id="popup_btn2" onclick="" class="btn btn-rhs"></a>
				</div>
				<div id="popup_btn_group2">
					<a href="javascript:void(0)" title="" id="popup_btn3" style="margin-left: 80px;" onclick="" class="btn "></a>
				</div>
			</div>
		</div><!-- /#popup -->
		<div class="fixer">

		<article class="my-rewards">

			<aside class="col-lhs507">

				<h1>Rewards</h1>

				<div class="btn-panel">
					<a href="<?php echo base_url(); ?>allRewards/page" title="" class="btn active">ALL REWARDS</a>
					<a href="<?php echo base_url(); ?>myRewards/page" title="" class="btn btn-rhs">MY REWARDS</a>
				</div><!-- /.btn-panel -->	

				<div class="pagination pag-top"><ul><?php echo $links; ?></ul></div>

				<div class="panel-box my-rewards-box">
					<?php
								
								$i = 0;
								foreach($results as $data) {
									if(($start <= $i) && (($start + $limit) > $i))
									{
										$data['rewardName'] = "FREE Dessert with any Grand Slam";
					?>
					<aside class="item">
						<div class="inner">
							<figure class="pic"><img src="<?php echo $data['thumbMediaURI']; ?>" alt="" /></figure>
    	                    <div class="txt">
								<h2><a href="<?php echo base_url(); ?>allRewards/coupon?id=<?php echo $data['id']; ?>" title="" class="link-more"><?php echo $data['rewardName']; ?></a></h2>
								<p><?php echo $data['pointsRequired']; ?> Points</p>
								<a href="javascript:void(0)" onclick="func_purchase(<?php echo $point_cnt; ?>, <?php echo $data['id']; ?>, <?php echo $data['pointsRequired']; ?>)" title="" class="link-purchase">PURCHASE</a>
							</div><!-- /.txt -->
						</div><!-- /.inner -->
					</aside><!-- /.item -->
					<?php
								$i++;	
								}
								
					   }
					   if($i == 0)
								{
									echo "<h2 style='margin-top: 30px;color: #AD2D30; text-align: center;'>There are no Rewards at this time, Please check back later</h2>";
								}
					?>
					<input type="hidden" id="customer_point" name="customer_point" value="<?php echo $point_cnt; ?>">
					<input type="hidden" id="reward_point" name="reward_point" value="">
					<input type="hidden" id="reward_id" name="reward_id" value="">
				</div><!-- /.panel-box -->

				<div class="pagination pag-bottom"><ul><?php echo $links; ?></ul></div>

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->