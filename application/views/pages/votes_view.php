<section id="main">

	<div class="fixer">

		<article class="votes">

			<aside class="col-lhs507">

				<h1>Votes & Polls</h1>
				<p>Since it's your Denny's, we want to know what you want. The voting booths are a click away.</p>

				<div class="panel-box votes-box">
	
					<ul class="list">
						<?php
								foreach($results as $poll) {
									
						?>
						 <li>
							<div class="txt">
								<p><?php echo $poll['pollName']; ?></p>
							</div>
							<p class="link"><a href="<?php echo base_url(); ?>votes/detail?id=<?php echo $poll['pollID']; ?>" title="" class="view">VIEW</a></p>
						</li>
						<?php
								}
						?>
					</ul>

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->