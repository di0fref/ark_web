<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>


    <?php wp_head(); ?>
<?php the_field('header_scripth'); ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


<script>/*<![CDATA[*/(function(w,a,b,d,s){w[a]=w[a]||{};w[a][b]=w[a][b]||{q:[],track:function(r,e,t){this.q.push({r:r,e:e,t:t||+new Date});}};var e=d.createElement(s);var f=d.getElementsByTagName(s)[0];e.async=1;e.src='//arksystems.actonservice.com/cdnr/203/acton/bn/tracker/34390';f.parentNode.insertBefore(e,f);})(window,'ActOn','Beacon',document,'script');ActOn.Beacon.track();/*]]>*/</script>






</head>

<body <?php body_class(); ?>>
	<div class="outer" id="top">
		<?php do_action('cpotheme_before_wrapper'); ?>
		<div class="wrapper">
			<div id="topbar" class="topbar">
				<div class="container">
					<?php do_action('cpotheme_top'); ?>
					<div class="clear"></div>
				</div>
			</div>
			<header id="header" class="header">
				<div class="container">
					<?php do_action('cpotheme_header'); ?>
					<div class='clear'></div>
				</div>
			</header>
			<?php do_action('cpotheme_before_main'); ?>
			<div class="clear"></div>