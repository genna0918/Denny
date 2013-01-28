<section id="main">

	<div class="fixer">

		<article class="offers">

			<aside class="col-lhs507">

				<h1><?php echo  $offer_name;?></h1>

				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo  $back_url;?>" title="">Back to Offers</a></li>
						<li class="print"><a href="javascript:window.print()" title="">Print Coupon</a></li>
					</ul>
				</div><!-- /.top-tools -->

				<div class="panel-box offers-box">

					<figure class="pic"><img src="<?php echo $img_url; ?>" alt="" /></figure>

					<aside class="content">
						<p><?php echo $desc;?></p>
                        
					</aside><!-- /.item -->
					<script>
							var url = base_url + "offers/detail?id=" + "<?php echo $id;?>";
							var title = "<?php echo $offer_name;?>"
							$(document).ready(function () {
								jQuery('a.twitter').attr('addthis:url', url);
								jQuery('a.twitter').attr('addthis:title', title);
								jQuery('a.pinterest').attr('addthis:url', url);
								jQuery('a.pinterest').attr('addthis:title', title);
								jQuery('a.email').attr('addthis:url', url);
								jQuery('a.email').attr('addthis:title', title);
								jQuery('a.addthis_button_facebook_like').attr('addthis:url', url);
								jQuery('a.addthis_button_facebook_like').attr('addthis:title', title);
							});
						</script>
					<div class="social-bar">
						
						<p>Valid at all restaurants until <?php echo $valid_until; ?></p>
						<ul class="share">
							<li><a href="" title="" class="twitter addthis_button_twitter"><img src="<?php echo base_url(); ?>assets/img/icons/twitter.jpg" alt="" /></a></li>
							<li><a class=" pinterest addthis_button_pinterest" href="#" target="pinterest"></a></li>
							<li><a href="" title="" class="email addthis_button_email"><img src="<?php echo base_url(); ?>assets/img/icons/email.jpg" alt="" /></a></li>
							<li class="facebook"><a class="addthis_button_facebook_like" style="width: 85px;"></a></li>
						</ul>

					</div><!-- /.social-bar -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->