<section id="main">

	<div class="fixer">

		<article class="votes">

			<aside class="col-lhs507">

				<h1>Votes & Polls</h1>
				<p>Since it's your Denny's, we want to know what you want. The voting booths are a click away.</p>

				<div class="panel-box votes-box">
	
					<ul class="list">
						<?php
								$i=0;
								if(!empty($results))
								{
								foreach($results as $poll) {
									
						?>
						 <li>
							<div class="txt">
								<p><?php echo $poll['pollName']; ?></p>
							</div>
							<p class="link"><a href="<?php echo base_url(); ?>votes/detail?id=<?php echo $poll['pollId']; ?>" title="" class="view">VIEW</a></p>
						</li>
						<?php
							$i++;	
							}
								}
								else
								{
									echo "<h2 style='margin-top: 30px;color: #AD2D30; text-align: center;'>There are no Votes at this time, Please check back later</h2>";
								}
						?>
					</ul>

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->