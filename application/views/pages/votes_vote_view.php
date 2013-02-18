<section id="main">

	<div class="fixer">

		<article class="votes">

			<aside class="col-lhs507">

				<h1>Votes & Polls</h1>

				<p>Thank you for taking the time to vote, here’s how the votes as looking so <br />far, do other people share your opinion?</p>

				<div class="panel-box votes-box">
	
					<ul class="list">
						<?php
								foreach($results['pollChoices'] as $poll) {
									if($poll['percentage'] == "")
										 $poll['percentage'] = 0;
									if($poll['id'] == $pollChoices_id)
										  $poll['percentage'] = $poll['percentage'] + 1;
						?>
						<li>
							<div class="txt">
								<p><?php echo $poll['name']; ?></p>
							</div>                        
							<strong class="score"><?php echo $poll['percentage']; ?>%</strong>
							<div class="progress-bar">
								<span class="progress-track" style="width:<?php echo $poll['percentage']; ?>%"></span>
							</div>                            
						</li>
						<?php
								}
						?>
						
					</ul><!-- /.list -->

					<div class="action-row">
						<a href="<?php echo base_url(); ?>votes" title="" class="btn">ANOTHER POLL</a>
						<a href="<?php echo base_url(); ?>offers/page" title="" class="btn btn-view">VIEW OFFERS</a>
					</div>

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->