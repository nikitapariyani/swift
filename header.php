<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Swift
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'swift' ); ?></a>
<div class="container">
    <div class="row">
	<header id="masthead" class="site-header col-12" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
    
        <nav class="main-navigation">
            <div class="container">
                <div class="row">
		<div class="site-navigation-inner col-12 " role="navigation">
                    <div class="navbar navbar-default">
                    <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">

    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>

</button>
                    
                    
            	
       
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </div>
                </div>
    </div>
            </div>
        </nav>
	</header><!-- #masthead -->
    

	<div id="content" class="site-content">
 