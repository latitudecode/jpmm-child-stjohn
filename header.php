<?php
	global $avia_config;

	$style 		= $avia_config['box_class'];
	$responsive	= avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
	$blank 		= isset($avia_config['template']) ? $avia_config['template'] : "";	
	$av_lightbox= avia_get_option('lightbox_active') != "disabled" ? 'av-default-lightbox' : 'av-custom-lightbox';
	$preloader	= avia_get_option('preloader') == "preloader" ? 'av-preloader-active av-preloader-enabled' : 'av-preloader-disabled';

	
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo " html_{$style} ".$responsive." ".$preloader." ".$av_lightbox." ".avia_header_class_string();?> ">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- page title, displayed in your browser bar -->
<title><?php if(function_exists('avia_set_title_tag')) { echo avia_set_title_tag(); } ?></title>

<?php
/*
 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
 * located in framework/php/function-set-avia-frontend.php
 */
 if (function_exists('avia_set_follow')) { echo avia_set_follow(); }


 /*
 * outputs a favicon if defined
 */
 if (function_exists('avia_favicon'))    { echo avia_favicon(avia_get_option('favicon')); }
?>


<!-- mobile setting -->
<?php

if( strpos($responsive, 'responsive') !== false ) echo '<meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=1.5;" name="viewport" />';
?>

<script type="text/javascript">
	// window.onload = function() {
	// 	document.getElementById("full_slider_1").innerHTML = '<a href="#next-section" title="" class="scroll-down-link" aria-hidden="true" data-av_icon="" data-av_iconfont="entypo-fontello"></a>';
	// }
</script>

<!-- Scripts/CSS and wp_head hook -->
<?php
/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */

wp_head();

?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/hover.css" type="text/css" media="screen" />

<!-- font awesome -->
<script src="https://use.fontawesome.com/008e90267e.js"></script>

<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

</head>




<body id="top" <?php body_class($style." ".$avia_config['font_stack']." ".$blank); avia_markup_helper(array('context' => 'body')); ?>>

	<?php 
		
	if("av-preloader-active av-preloader-enabled" === $preloader)
	{
		echo avia_preload_screen(); 
	}
		
	?>

	<div id='wrap_all'>

	<?php 
	if(!$blank) //blank templates dont display header nor footer
	{ 
		 //fetch the template file that holds the main menu, located in includes/helper-menu-main.php
         get_template_part( 'includes/helper', 'main-menu' );

	} ?>
		
	<div id='main' data-scroll-offset='<?php echo avia_header_setting('header_scroll_offset'); ?>'>

	<?php do_action('ava_after_main_container'); ?>
