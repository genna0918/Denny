<?php 
	$latitude = $store['storeLatitude'];
	$longitude = $store['storeLongitude'];
?>
<script>
	
	$(document).ready(function(){
		var latitude = "<?php echo $latitude; ?>";
		var longitude = "<?php echo $longitude; ?>";
		var map;
		var myOptions;
		map_center = new google.maps.LatLng(latitude, longitude)
		myOptions = {
			zoom: 14,
			center: map_center,
			panControl: false,
			zoomControl: false,
			scaleControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map"), myOptions);
		var img_url = base_url + "assets/img/icons/find-a-dennys.png"
		var image = new google.maps.MarkerImage(img_url);
		var myLatLng = new google.maps.LatLng(latitude, longitude);
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image
		});
		 marker.setMap(map);
	});
	
</script>
<section id="main">

	<div class="fixer">

		<article class="res-profile">

			<aside class="col-lhs507">

				<h1>Denny’s of <?php echo $store['localeName']; ?></h1>

				<div class="top-tools">
					<ul>
						<li class="back-link"><a href="<?php echo $back_url; ?>" title="">Find a Denny’s</a></li>
					</ul>
				</div><!-- /.top-tools -->

				<div id="map" class="panel-box map-box" style="width: 499px; height: 299px;">

		<!--		<img src="<?php echo base_url(); ?>assets/img/temp/map.jpg" alt="" />       -->

				</div><!-- /.panel-box -->

				<div class="panel-box res-profile-box">

					<figure class="pic"><img src="<?php echo $store['storeManagerMediaUri']; ?>" alt="" /></figure>

					<div class="txt">
						<h2>ADDRESS</h2>
						<address><?php echo $store['storeAdd1']; ?>, <?php echo $store['storeCity']; ?>, <?php echo $store['storeName']; ?></address>

						<div class="col-lhs">
							<h2>STORE MANAGER</h2>
							<p><?php echo $store['storeManager']; ?></p>
							<h2>TELEPHONE</h2>
							<p><?php echo $store['storeTel1']; ?></p>
						</div><!-- /.col-lhs -->

						<div class="col-rhs">
						</div><!-- /.col-rhs -->
						<?php 
							if($store['storeIsOpen24'] == 'true')
								echo '<span class="open24">open 24 hours</span>';
						?>
					</div><!-- /.txt -->

				</div><!-- /.panel-box -->

			</aside><!-- /aside -->

			<?php  include_once("sidebar.php")?>

		</article><!-- /article -->

	</div><!-- /.fixer -->

</section><!--/section -->