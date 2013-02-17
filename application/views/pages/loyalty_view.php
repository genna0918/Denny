	</script>
<section id="main">

	<div class="fixer">

		<article class="my-profile">

			<aside class="col-lhs507">

				<h1>My Loyalty</h1>

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
	
					</div><!-- /.panel-box -->

				</div><!-- /.loyalty-card -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->