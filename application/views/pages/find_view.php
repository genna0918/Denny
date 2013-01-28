<section id="main">

	<div class="fixer">

		<article class="find-a-dennys">

			<aside class="col-lhs507">

				<h1>Find a Denny’s</h1>
				<p>Find a Denny’s near to you through the list or searching via postal code.</p>

				<div class="panel-box search-box">

					<form id="frm_store" action="<?php echo base_url(); ?>find/search" method="POST">

						<div class="col-lhs">
        	            	<input type="text" class="fld" id="postal" name="postal" placeholder="Postal Code" title="Postal Code" />
						</div>  					
						<a href="javascript:void(0)" onclick="find_store();" title="" class="btn">SEARCH</a>
					</form>

				</div><!-- /.panel-box -->

				<div class="pagination pag-top"><ul><?php echo $links; ?></ul></div>

				<div class="panel-box find-a-dennys-box">

					<div class="list">
						<table border="0" cellpadding="0" cellspacing="0">
							<?php
								$i = 0;
								foreach($stores as $store) {
									if(($start <= $i) && (($start + $limit) > $i))
									{
							?>
							
							<tr>
								<td><p><?php echo $store['storeAdd1']; ?>, <?php echo $store['storeCity']; ?>, <?php echo $store['storeName']; ?>, <?php echo $store['localeName']; ?></p></td>
								<td class="link"><a href="<?php echo base_url(); ?>find/profile?id=<?php echo $store['id']; ?>" title="" class="view">VIEW PROFILE</a></td>
							</tr>
							<?php
									}
								$i++;
								}
							?>
						</table>
					</div><!-- /.list -->

				</div><!-- /.panel-box -->

				<div class="pagination pag-bottom"><ul><?php echo $links; ?></ul></div>

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->