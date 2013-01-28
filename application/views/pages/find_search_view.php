<section id="main">

	<div class="fixer">

		<article class="find-a-dennys">

			<aside class="col-lhs507">

				<h1>Find a Denny’s</h1>
				<p>Find a Denny’s near to you through the list or searching via postal code.</p>

				<div class="panel-box search-box">

					<form id="frm_store" action="<?php echo base_url(); ?>find/search" method="POST">

						<div class="col-lhs">
        	            	<input type="text" class="fld" id="postal" name="postal" value="<?php echo $postal_name; ?>" title="Postal Code" />
						</div>  					
						<a href="javascript:void(0)" onclick="find_store();" title="" class="btn">SEARCH</a>

					</form>

				</div><!-- /.panel-box -->

				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo base_url(); ?>find/page" title="">Show All</a></li>
					</ul>
					<h2>Denny's near <?php echo $postal_name; ?></h2>
				</div><!-- /.top-tools -->

				<div class="panel-box find-a-dennys-box">

					<div class="list">
						<table border="0" cellpadding="0" cellspacing="0">
							<?php
								foreach($stores as $store) {
									$pos = strpos($store['storeZip'], $postal_name);
									if($pos !== false)
									{
							?>
							
							<tr>
								<td><p><?php echo $store['storeAdd1']; ?>, <?php echo $store['storeCity']; ?>, <?php echo $store['storeName']; ?>, <?php echo $store['localeName']; ?></p></td>
								<td class="link"><a href="<?php echo base_url(); ?>find/profile?id=<?php echo $store['id']; ?>" title="" class="view">VIEW PROFILE</a></td>
							</tr>
							<?php
									}
								}
							?>

						</table>
					</div><!-- /.list -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->