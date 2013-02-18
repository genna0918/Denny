
</script>
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
							$subMenu_array = array();
							if(isset($subMenu['menuSubGroups']['empty']))
							{
								$subMenu_array['menuSubGroups'] = array();
							}
							else 
							if(isset($subMenus['menuSubGroups']['id']))
							{
								
								$subMenu_array['menuSubGroups'][0] = $subMenus['menuSubGroups'];
							}
							else
							{
								$subMenu_array = $subMenus;
							}
					
							if(!empty($subMenu_array['menuSubGroups']))
							{
							foreach($subMenu_array['menuSubGroups'] as $subMenu) {
							
									
						?>
						<div>
							<h3><a href="#"><?php echo $subMenu['name'];?></a></h3>
							<div>
									<?php
									
										$sub_subMenu_array = array();
										if(isset($subMenu['menuItems']['empty']))
										{
											$sub_subMenu_array['menuItems'] = array();
										}
										else if(isset($subMenu['menuItems']['id']))
										{
											
											$sub_subMenu_array['menuItems'][0] = $subMenu['menuItems'];
										}
										else
										{
											$sub_subMenu_array = $subMenu;
										}
								
										if(!empty($sub_subMenu_array['menuItems']))
										{
										foreach($sub_subMenu_array['menuItems'] as $sub_subMenu) {
													
											?>
										<div class="small-item">
											<figure class="pic"><img src="<?php echo $sub_subMenu['thumbMediaURI'];?> " alt="" /></figure>
											<div class="txt">
												<h4><?php echo $sub_subMenu['name'];?></h4>
												<p><?php echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a sem a lorem sollicitudin faucibus euismod"; /*echo $sub_subMenu['desc'];*/?></p>
											</div>
										</div><!-- /.small-item -->
											<?php
												
												}
										}
										else
										{
											echo "<h2 style='margin-top: 30px;color: #AD2D30; text-align: center;'>There are no menuItem at this time, Please check back later</h2>";
										}
									?>
							</div>
						</div>

						<?php
									}
								
							}
							else
							{
								echo "<h2 style='margin-top: 30px;color: #AD2D30; text-align: center;'>There are no submenu at this time, Please check back later</h2>";
							}
							
						?>

	
					</div><!-- /#accordion -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->
<script>
  $(document).ready(function(){
	$(".ui-accordion-content").css("height", "");
	});
	
</script>