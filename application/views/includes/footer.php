<?php
	$ctrl_name = $this->uri->segment(1);
	$app_stories = "";
	$selected_about = "";
	$selected_terms = "";
	$selected_privacy = "";
	$selected_sitemap = "";
	$sel_style = "class='active'";
  if($ctrl_name == ""){
		$app_stories = "display:none";
	}
  else if($ctrl_name == "about"){
		$selected_about = $sel_style;
	}else if($ctrl_name == "terms"){
		$selected_terms = $sel_style;
	}else if($ctrl_name == "privacy"){
		$selected_privacy = $sel_style;
	}else if($ctrl_name == "sitemap"){
		$selected_sitemap = $sel_style;
	}

?>
<footer>

	<div class="fixer">

		<a href="<?php echo base_url(); ?>" title="" class="logo">dennys</a>

		<aside class="column">

			<ul>
				<li class="nodivider"><a href="<?php echo base_url(); ?>about" title="" <?php echo $selected_about;?>>About Denny’s</a></li>
				<li><a href="<?php echo base_url(); ?>terms" title="" <?php echo $selected_terms;?>>Terms</a></li>
				<li><a href="<?php echo base_url(); ?>privacy" title="" <?php echo $selected_privacy;?>>Privacy</a></li>
				<li><a href="<?php echo base_url(); ?>sitemap" title="" <?php echo $selected_sitemap;?>>Sitemap</a></li>
			</ul>
			<h6>&copy;2012 Denny’s - Some legal information will most likely go here lorem ipsum dolor</h6>

		</aside><!-- /.column -->	
        
		<ul class="app-stories" style="<?php echo $app_stories;?>">
			<li><a href="" title="" class="app-store">app-store</a></li>
			<li><a href="" title="" class="android">android</a></li>
		</ul><!-- /.app-stories -->

	</div><!-- /.fixer -->

</footer><!-- /footer -->

</div><!-- /#holder -->

</body>

</html>