<?php
/**
 * The header for our theme
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php echo get_the_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body>
	<?php wp_body_open(); ?>
	<div class="wrapper">
		<div class="header-wrapper">
			<header class="header">
				<div class="header__container">
					<div class="header__logo">
						<a href="/"><img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/logo.svg" alt=""></a>
					</div>
					<div class="menu-header">
						<button type="button" class="menu-header__icon icon-menu"><span></span></button>
						<nav class="menu-header__body">
							<?php
							if (has_nav_menu('menu-hu')) {
								wp_nav_menu(array(
									'theme_location' => 'menu-hu', // location in functions.php
									'menu_class'     => 'nav-menu', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('menu-en')) {
								wp_nav_menu(array(
									'theme_location' => 'menu-en', // location in functions.php
									'menu_class'     => 'nav-menu', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('menu-ru')) {
								wp_nav_menu(array(
									'theme_location' => 'menu-ru', // location in functions.php
									'menu_class'     => 'nav-menu', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('menu-de')) {
								wp_nav_menu(array(
									'theme_location' => 'menu-de', // location in functions.php
									'menu_class'     => 'nav-menu', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('menu-uk')) {
								wp_nav_menu(array(
									'theme_location' => 'menu-uk', // location in functions.php
									'menu_class'     => 'nav-menu', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							?>

							<div class="languages">
							<?php
							if (has_nav_menu('menu-lang')) {
								wp_nav_menu(array(
									'theme_location' => 'menu-lang', // location in functions.php
									'menu_class'     => 'nav-menu', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							?>
							</div>
							<!-- <a href="" class="button button-yellow">Get a Quote</a> -->
							<?php
							if (has_nav_menu('button-hu')) {
								wp_nav_menu(array(
									'theme_location' => 'button-hu', // location in functions.php
									'menu_class'     => 'button button-yellow', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('button-en')) {
								wp_nav_menu(array(
									'theme_location' => 'button-en', // location in functions.php
									'menu_class'     => 'button button-yellow', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('button-ru')) {
								wp_nav_menu(array(
									'theme_location' => 'button-ru', // location in functions.php
									'menu_class'     => 'button button-yellow', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('button-de')) {
								wp_nav_menu(array(
									'theme_location' => 'button-de', // location in functions.php
									'menu_class'     => 'button button-yellow', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							if (has_nav_menu('button-uk')) {
								wp_nav_menu(array(
									'theme_location' => 'button-uk', // location in functions.php
									'menu_class'     => 'button button-yellow', // UL item class
									'container'      => false, // Turn off the container around the menu
								));
							}
							?>
							<div class="header-contacts">
								<?php
									// Query arguments
								$args = array(
									'post_type'      => 'contact',
									'posts_per_page' => 10,
									'order'          => 'DESC',
									
								);
								$query = new WP_Query($args);

								if ($query->have_posts()) : 
								?>
								<?php
									while ($query->have_posts()) : $query->the_post();
									// Photo:
									$image_id = get_post_meta(get_the_ID(), 'icon', true); 
									// Get the image URL
									$image_url = $image_id ? wp_get_attachment_url($image_id) : '';

									$text = get_post_meta(get_the_ID(), 'text', true); 
									?>

									<?php 
									$item_name = get_the_title();
									if ($item_name == "Phone") {
										$cleaned = preg_replace('/[^0-9+]/', '', $text);
									?>
									<a href="tel:<?php echo esc_html($cleaned); ?>" >
										<img src="<?php echo esc_url($image_url); ?>" alt="icon">
										<span><?php echo esc_html($text); ?></span>
									</a>
									<?php
									}
									?>

									<?php 
									$item_name = get_the_title();
									if ($item_name == "Email") {
									?>
									<a href="mailto:<?php echo esc_html($text); ?>">
										<img src="<?php echo esc_url($image_url); ?>" alt="icon">
										<span><?php echo esc_html($text); ?></span>
									</a>
									<?php
									}
									?>

									<?php 
									$item_name = get_the_title();
									if ($item_name == "Telegram") {
										$cleaned = preg_replace('/[^0-9+]/', '', $text);
									?>
									<a href="https://t.me/<?php echo esc_html($cleaned); ?>">
										<img src="<?php echo esc_url($image_url); ?>" alt="icon">
										<span><?php echo esc_html($item_name); ?></span>
									</a>
									<?php
									}
									?>

									<?php 
									$item_name = get_the_title();
									if ($item_name == "Viber") {
										$cleaned = preg_replace('/[^0-9+]/', '', $text);
										$cleaned = str_replace('+', '%2B', $cleaned);
									?>
									<a href="viber://chat?number=<?php echo esc_html($cleaned); ?>">
										<img src="<?php echo esc_url($image_url); ?>" alt="icon">
										<span><?php echo esc_html($item_name); ?></span>
									</a>
									<?php
									}
									?>

									<?php 
									$item_name = get_the_title();
									if ($item_name == "WhatsApp") {
										$cleaned = preg_replace('/[^0-9+]/', '', $text);
										$cleaned = str_replace('+', '', $cleaned);
									?>
									<a href="https://wa.me/<?php echo esc_html($cleaned); ?>">
										<img src="<?php echo esc_url($image_url); ?>" alt="icon">
										<span><?php echo esc_html($item_name); ?></span>
									</a>
									<?php
									}
									?>
									

									<?php
									endwhile;
								endif;
								?>
								
							</div>
						</nav>
					</div>
				</div>
			</header>
		</div>