<section id="main">

	<div class="fixer">

		<article class="votes">

			<aside class="col-lhs507">

				<h1>Votes & Polls</h1>

				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo base_url(); ?>votes" title="">Back to Votes</a></li>
					</ul>
				</div><!-- /.top-tools -->

				<p>Since it's your Denny's, we want to know what you want. The voting booths are a click away.</p>

				<div class="panel-box votes-box">
	
					<ul class="list">
						<?php
								foreach($results['pollChoices'] as $poll) {
	
						?>
						<li>
							<div class="txt">
								<p><?php echo $poll['name']; ?></p>
							</div>                        
							<a href="<?php echo base_url(); ?>votes/vote?id=<?php echo $poll['id']; ?>" title="" class="btn">VOTE</a>
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