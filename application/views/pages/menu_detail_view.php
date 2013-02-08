<section id="main">

	<div class="fixer">

		<article class="menu">

			<aside class="col-lhs507">

				<h1>Denny’s <?php echo $subMenus['menuGroupName'];?> Menu</h1>

				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo base_url(); ?>menu" title="">Back to Menu</a></li>
					</ul>
				</div><!-- /.top-tools -->

				<div class="panel-box menu-box">

					<div class="item">
						<figure class="pic"><img src="<?php  echo $subMenus['mediaURI']; ?>" alt="" /><strong><?php echo $subMenus['menuGroupName'];?></strong></figure>
						<div class="txt">
							<p><?php echo $subMenus['menuGroupDesc'];?></p>
						</div>
					</div><!-- /.item -->

					
					<div id="accordion">
						<?php	
							foreach($subMenus['menuSubGroups'] as $subMenu) {
									if(is_array($subMenu))
									{
									
						?>
						<div>
							<h3><a href="#"><?php echo $subMenu['name'];?></a></h3>
							<div>
									<?php
										
										foreach($subMenu['menuItems'] as $sub_subMenu) {
									
									?>
								<div class="small-item">
									<figure class="pic"><img src="<?php echo $sub_subMenu['thumbMediaURI'];?>" alt="" /></figure>
									<div class="txt">
										<h4><a href="" title=""><?php echo $sub_subMenu['name'];?></a></h4>
										<p><?php echo $sub_subMenu['desc'];?></p>
									</div>
								</div><!-- /.small-item -->
									<?php
										
										}
									?>
							</div>
						</div>

						<?php
									}		
							}
							
						?>

	
					</div><!-- /#accordion -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->