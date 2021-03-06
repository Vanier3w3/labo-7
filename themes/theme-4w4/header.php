<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-4w4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'theme-4w4' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$theme_4w4_description = get_bloginfo( 'description', 'display' );
			if ( $theme_4w4_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $theme_4w4_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<!-- D/but du carrousel -->
		<?php
		if (is_front_page()) :?>
		<section class="carrousel">
				<div><img src="http://e1734174.webdev.cmaisonneuve.qc.ca/4w4/wp-content/uploads/2021/353_Infographic_Triangle_R10V2_Branded-01.png"></div>
				<div><img src="http://e1734174.webdev.cmaisonneuve.qc.ca/4w4/wp-content/uploads/2021/scrumframework-1.png"></div>
				<div><img src="http://e1734174.webdev.cmaisonneuve.qc.ca/4w4/wp-content/uploads/2021/too-many-meetings-in-scrum.jpg"></div>
		</section>
		<div class="boutton">
			<nav id="un" class="boutton-clip"><a href="#"></a></nav>
			<nav id="deux"><a href="#"></a></nav>
			<nav id="trois"><a href="#"></a></nav>
		</div>
		<?php endif ?>
		<!-- fin carrousel -->


		<!-- <img src="https://s2.svgbox.net/hero-solid.svg?ic=menu&color=000000" width="32" height="32"> -->
		<nav id="site-navigation" class="main-navigation">
			<button id="burger" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<div></div>
				<div></div>
				<div></div>
			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->