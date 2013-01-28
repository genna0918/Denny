
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>dennys</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/jquery.ui.timepicker.css" />
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f3837f2231e79d"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/ui.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/ui.datepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.5.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/ui.timepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/common.js"></script>
	

    <script src="<?php echo base_url(); ?>assets/js/jquery.jqtransform.js"></script> 
	<script>$(function(){$('.check-tick').jqTransform();});</script>

	<script src="<?php echo base_url(); ?>assets/js/jquery.selectbox-0.5.js"></script>

	<link type="text/css" href="<?php echo base_url(); ?>assets/css/custom-theme/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.8.17.custom.min.js"></script>

	<script>
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {}
		else {$(document).ready(function() {$('.selectbox').selectbox();});}
		$(function(){
			$("#accordion").accordion({ header: "h3" });
		});
		
	</script>
	<script type="text/javascript">
        $(document).ready(function () {
            if ($.browser.msie) {         //this is for only ie condition ( microsoft internet explore )
                $('input[type="text"][placeholder], textarea[placeholder]').each(function () {
                    var obj = $(this);

                    if (obj.attr('placeholder') != '') {
                        obj.addClass('IePlaceHolder');

                        if ($.trim(obj.val()) == '' && obj.attr('type') != 'password') {
                            obj.val(obj.attr('placeholder'));
                        }
                    }
                });

                $('.IePlaceHolder').focus(function () {
                    var obj = $(this);
                    if (obj.val() == obj.attr('placeholder')) {
                        obj.val('');
                    }
                });

                $('.IePlaceHolder').blur(function () {
                    var obj = $(this);
                    if ($.trim(obj.val()) == '') {
                        obj.val(obj.attr('placeholder'));
                    }
                });
            }
        });
    </script>
	
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>
	<!--[if lte IE 8]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="assets/js/html5.js"></script>
		<script src="assets/js/ie.js"></script>
	<![endif]-->
</head>

<body class="homepage">

<div id="holder">

<header>

<?php
	$ctrl_name = $this->uri->segment(1);
	
	$selected_home = "";
	$selected_offers = "";
	$selected_rewards = "";
	$selected_invite = "";
	$selected_votes = "";
	$selected_menu = "";
	$selected_feedback = "";
	$profile_actvie = "";
	$selected_find = "";
	$selected_find2 = "";
	$selected_setting = "";
	$login_txt = "LOGIN";
	$login_url = base_url().'login';
	$sel_style = "class='active'";
	
	if($ctrl_name == ""){
		$selected_home = $sel_style;
	}else if($ctrl_name == "offers"){
		$selected_offers = $sel_style;
	}else if(($ctrl_name == "allRewards") || ($ctrl_name == "myRewards")){
		$selected_rewards = $sel_style;
	}else if($ctrl_name == "invite"){
		$selected_invite = $sel_style;
	}else if($ctrl_name == "votes"){
		$selected_votes = $sel_style;
	}else if($ctrl_name == "menu"){
		$selected_menu = $sel_style;
	}else if($ctrl_name == "feedback"){
		$selected_feedback = $sel_style;
	}else if($ctrl_name == "find"){
		$selected_find = "active";
		$selected_find2 = $sel_style;
	}else if($ctrl_name == "setting"){
		$selected_setting = $sel_style;
	}
	else if($ctrl_name == "profile"){
		$profile_actvie = "active btn-my-profile-active";
	}
	$customer_id = $this->session->userdata('customer_id');

	if (!empty($customer_id))
	{
		$login_txt = "LOGOUT";
		$login_url = base_url().'home/logout';
	}
?>
	<div class="fixer">

		<a href="<?php echo base_url(); ?>" title="" class="logo">dennys</a>
		<a href="<?php echo base_url(); ?>find/page" title="" class="find-a-dennys <?php echo $selected_find;?>">Find a Denny’s</a>
		<a href="<?php echo base_url(); ?>profile" title="" class="btn-my-profile <?php echo $profile_actvie;?>">My Profile</a>
		<a href="<?php echo $login_url; ?>" title="" class="btn"><?php echo $login_txt;?></a>
		
        <a href="#" title="" class="menu-link">menu-link</a>
		<nav>
			<a href="#" title="" class="small-logo">dennys</a>
			<ul class="menu">
				<li class="tab-home"><a href="<?php echo base_url(); ?>" title="" <?php echo $selected_home;?>>HOME</a></li>
				<li class="tab-find"><a href="<?php echo base_url(); ?>find/page" title="" <?php echo $selected_find2;?>>FIND A DENNY'S</a></li>
				<li class="tab-offers"><a href="<?php echo base_url(); ?>offers/page" title="" <?php echo $selected_offers;?>>OFFERS</a></li>
                <li class="tab-loyalty"><a href="" title="" >LOYALTY</a></li>
				<li class="tab-rewards"><a href="<?php echo base_url(); ?>allRewards/page" title="" <?php echo $selected_rewards;?>>REWARDS</a></li>
				<li class="tab-settings"><a href="<?php echo base_url(); ?>setting" title="" <?php echo $selected_setting;?>>SETTINGS</a></li>
				<li class="tab-invite"><a href="<?php echo base_url(); ?>invite" title="" <?php echo $selected_invite;?>>INVITE SOMEONE</a></li>
				<li class="tab-votes"><a href="<?php echo base_url(); ?>votes" title="" <?php echo $selected_votes;?>>VOTES &amp; POLLS</a></li>
				<li class="tab-menu"><a href="<?php echo base_url(); ?>menu" title="" <?php echo $selected_menu;?>>MENU</a></li>
				<li class="tab-feedback"><a href="<?php echo base_url(); ?>feedback" title="" <?php echo $selected_feedback;?>>FEEDBACK</a></li>
			</ul>
		</nav><!-- /nav -->

	</div><!-- /.fixer -->

</header><!-- /header -->