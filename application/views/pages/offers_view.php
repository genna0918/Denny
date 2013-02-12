<section id="main">

	<div class="fixer">

		<article class="offers">

			<aside class="col-lhs507">

				<h1>Offers</h1>

			  <div class="pagination pag-top"><ul><?php echo $links; ?></ul></div>

				<div class="panel-box offers-box">

					<figure class="pic"><img src="<?php echo base_url(); ?>assets/img/temp/01.jpg" alt="" /></figure>

					<?php
								$i = 0;
								if(!empty($results))
								foreach($results as $data) {
									if(($start <= $i) && (($start + $limit) > $i))
									{
					?>
					<aside class="item">
						<figure class="pic"><img src="<?php echo $data['thumbMediaURI']; ?>" alt="" /></figure>
                        <div class="txt">
							<h2><a href="<?php echo base_url(); ?>offers/detail?id=<?php echo $data['id']; ?>" title="" class="link-more"><?php echo $data['specialOfferName']; ?></a></h2>
							<p><?php echo $data['restrictions']; ?></p>
						</div><!-- /.txt -->
					</aside><!-- /.item -->
					<?php
								$i++;	
								}			
					   }
					   else
								{
									echo "<h2 style='margin-top: 30px;color: #AD2D30; text-align: center;'>There are no Offers at this time, Please check back later</h2>";
								}
					?>

				</div><!-- /.panel-box -->
				 <div class="pagination pag-bottom"><ul><?php echo $links; ?></ul></div>
				

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

	</div><!-- /.fixer -->

</section><!--/section -->