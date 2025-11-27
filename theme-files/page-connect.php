<?php
/* Template Name: Connect Template. Post Type: page */

get_header();
?>
		<main id="primary" class="site-main page">

			<?php
				$current_lang = pll_current_language();
				$current_page_id = 533;
				switch ($current_lang) {
					case 'en':
						$current_page_id = 342;
						break;
					case 'ru':
						$current_page_id = 536;
						break;
					case 'de':
						$current_page_id = 539;
						break;
					case 'ua':
						$current_page_id = 688;
						break;
				}
				$fields = get_fields($current_page_id);
			?>
			
			
			<!-- SECTION main -->
			<section class="main contacts-main">
				<div class="main__container">
					<div class="main__wrapper">
						<div class="breadcrumbs">
							<ul>
								<li><a href="" class="home-link"></a></li>
								<li><?php echo get_the_title($current_page_id); ?></li>
							</ul>
						</div>


						<div class="main__title">
							<span>
								<?php echo   esc_html($fields['section_1']['title']); ?>
							</span>
						</div>
						<div class="main__description">
							<?php echo  esc_html($fields['section_1']['description']); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION main -->




			<!-- SECTION INFO -->
			<section class="contacts-info">
				<div class="contacts-info__container">
					<div class="contacts-info__content">
						
								<?php
									// Query arguments
								$args = array(
									'post_type'      => 'contact',
									'posts_per_page' => 10,
									'order'          => 'DESC',
									
								);
								$query = new WP_Query($args);

								if ($query->have_posts()) : 
								
									while ($query->have_posts()) : $query->the_post();
									// Photo:
									$image_id = get_post_meta(get_the_ID(), 'icon', true); 
									// Get the image URL
									$image_url = $image_id ? wp_get_attachment_url($image_id) : '';
									$text = get_post_meta(get_the_ID(), 'text', true); 
									$item_name = get_the_title();
									?>
									<?php 
									
									if ($item_name == "Phone") {
										$cleaned = preg_replace('/[^0-9+]/', '', $text);
									?>
									<a href="tel:<?php echo esc_html($cleaned); ?>" class="contacts-info__item">
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
									<a href="mailto:<?php echo esc_html($text); ?>" class="contacts-info__item">
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
									<a href="https://t.me/<?php echo esc_html($cleaned); ?>" class="contacts-info__item">
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
									<a href="viber://chat?number=<?php echo esc_html($cleaned); ?>" class="contacts-info__item">
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
									<a href="https://wa.me/<?php echo esc_html($cleaned); ?>" class="contacts-info__item">
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

						<div class="contacts-info__decor">
							<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-contacts.svg" alt="">
						</div>
						<div class="contacts-info__item contacts-info__item--address">
							<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-location.svg" alt=""><span>Hungary, 1106 Budapest<br>Fehér út. 1</span>
						</div>
					</div>
					<div class="contacts-info__map">
						<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/map.jpg" alt="">
					</div>
				</div>
				
			</section>
			<!-- End of SECTION INFO -->




			<!-- SECTION SEND REQUEST -->
			<section class="send-request">
				<div class="send-request__container">
					<div class="send-request__row">
						<div class="send-request__col">
							<div class="send-request__title">
								<span><?php echo   esc_html($fields['section_3']['title']); ?></span>
							</div>
							<div class="send-request__description">
								<?php echo esc_html($fields['section_3']['description']); ?>
							</div>
						</div>
						<div class="send-request__col">
							
							<?php 
							if ($current_page_id == 342) {
								echo do_shortcode('[contact-form-7 id="6bbbeea" title="Contact form - page EN"]');
							}
							if ($current_page_id == 536) {
								echo do_shortcode('[contact-form-7 id="3026056" title="Contact form - page RU"]');
							}
							if ($current_page_id == 539) {
								echo do_shortcode('[contact-form-7 id="628e75c" title="Contact form - page DE"]');
							}
							if ($current_page_id == 533) {
								echo do_shortcode('[contact-form-7 id="b2f6ed8" title="Contact form - page HU"]');
							}
							if ($current_page_id == 688) {
								echo do_shortcode('[contact-form-7 id="ae06578" title="Contact form - page UK"]');
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION SEND REQUEST -->



		</main>
<?php get_footer(); ?>