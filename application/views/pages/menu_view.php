s<section id="main">

	<div class="fixer">

		<article class="menu">

			<aside class="col-lhs507">

				<h1>The Denny’s Menu</h1>

				<div class="panel-box menu-box">

					<div class="menu-list">	
						<ul>
							<?php
								foreach($menus['menuGroups'] as $menu) {
							?>
									<li><figure class="pic"><a href="<?php echo base_url(); ?>menu/detail?id=<?php echo $menu['id']; ?>" title=""><img src="<?php  echo $menu['mediaURI']; ?>" alt="" /><strong><?php echo $menu['menuGroupName']; ?></strong></a></figure></li>
							<?php
								}
					    	?>
						</ul>
					</div><!-- /.menu-list -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php");?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->