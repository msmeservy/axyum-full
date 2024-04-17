<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package axyum
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta property="og:title" content="title" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="site name" />
	<meta property="og:image" content="/wp-content/themes/axyum-full/img/og.jpg" />
	<link rel="icon" href="/wp-content/themes/axyum-full/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'axyum' ); ?></a>

	<header id="masthead" class="site-header">
		
		<div class="mobile-bar">
			<div class="mobile-logo">
			<a href="/">
			<picture>
				<source srcset="/wp-content/themes/axyum-full/img/logo-w.webp" type="image/webp">
				<source srcset="/wp-content/themes/axyum-full/img/logo-w.png" type="image/png"> 
				<img src="/wp-content/themes/axyum-full/img/logo.png" alt="logo">
			</picture>
			</a>
			</div>
			<div class="toggle-x">
				<span class="hamburger-top"></span>
				<span class="hamburger-mid"></span>
				<span class="hamburger-bot"></span>
			</div>
		</div>
		<nav id="mobile-nav" class="mobile-navigation">
			<div class="nav-inner">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_s' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'mobile-menu',
					'depth'=>'3',
				)
			);
			?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="headerarea transition">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="logo-side transition">
							<a href="/">
								<picture>
								<source srcset="/wp-content/themes/axyum-full/img/logo-w.webp" type="image/webp">
								<source srcset="/wp-content/themes/axyum-full/img/logo-w.png" type="image/png"> 
								<img src="/wp-content/themes/axyum-full/img/logo-w.png" alt="logo">
								</picture>
							</a>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="nav-side transition">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'axyum' ); ?></button>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'depth'=>'3',
									)
								);
								?>
							</nav><!-- #site-navigation -->

						</div>
					</div>
				</div>
			</div>
	</div>
<?php if(is_front_page()) { ?>	
<div class="banner">
<!--	animate__animated animate__bounceInUp-->
	
	<div class="banner-content">
		<div class="ban-logo">
		<img alt="logo" src="/wp-content/themes/axyum-full/img/logo.webp"></div>
		<h2><?php echo get_option('headtag'); ?></h2>
		<p><?php echo get_option('headerpara'); ?></p>
		<!--<a href="/contact-us/" class="main-btn transition">Get Started Now!</a>-->
	</div>
</div>
<?php } else { ?>

<?php } ?>