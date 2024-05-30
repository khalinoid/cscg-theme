<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CSCG-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cscg-theme' ); ?></a>

	<header id="main-header" class="site-header">
	<!-- <header id="main-header"> -->
		<div class="main-nav">
			<div class="container">
			<nav>
				<div class="logo">
				<h3>Generate your smart contracts today!</h3>
				</div>
				<ul>
				<li><a href="#">HELP & FAQs</a></li>
				<li><a href="#">About CSCG</a></li>
				<li><a href="#">About Cardano</a></li>
				</ul>
			</nav>
			</div>
		</div>

		<div class="showcase">
			<div><h1>CSCG</h1></div>
			<div><h3>Cardano Smart Contract Generator</h3></div>
			<div><h6>Generate your smart contracts today!</h6></div>
		</div>
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
			?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->
