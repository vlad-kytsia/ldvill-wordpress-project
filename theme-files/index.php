<?php
/* Template Name: Home Page Template. Post Type: page */

get_header();
?>
		<main id="primary" class="site-main page">

			<?php
				$current_lang = pll_current_language();
				$current_page_id = 208;
				switch ($current_lang) {
					case 'en':
						$current_page_id = 12;
						break;
					case 'ru':
						$current_page_id = 215;
						break;
					case 'de':
						$current_page_id = 217;
						break;
					case 'ua':
						$current_page_id = 690;
						break;
				}
				$fields = get_fields($current_page_id);
			?>

			<!-- SECTION main -->
			<section class="main">
				<video class="main__background-video main__background-video--pc" autoplay muted loop>
					<source src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/video/video-bg-pc.mp4" type="video/mp4">
				</video>
				<video class="main__background-video main__background-video--mobile" autoplay muted loop playsinline>
					<source src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/video/video-bg-mobile.mp4" type="video/mp4">
					<source src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/video/video-bg-mobile.webm" type="video/webm">
					<source src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/video/video-bg-mobile.mov" type="video/mov">
				</video>

				<div class="main__bg-cover">
				</div>
				<div class="main__container">
					<div class="main__wrapper">
						<h1 class="main__title">
							<span class="text-yellow"><?php echo esc_html( $fields['Section_1']['title_yellow_letters'] ); ?></span>
							<span><?php echo esc_html( $fields['Section_1']['title_white_letters'] ); ?></span>
						</h1>
						<div class="main__description">
							<?php echo esc_html( $fields['Section_1']['description'] );  ?>
						</div>
						
						<?php
							$link = '';
							$link = $fields['Section_1']['button'];
							if ($link) {
								?>
								<a href="<?php echo esc_url($link['url']); ?>" data-popup="#request" target="<?php echo esc_attr($link['target']); ?>" class="button button-yellow"><?php echo esc_html($link['title']); ?></a>
								<?php
							}
						?>
					</div>
				</div>

				<div class="main-slider-projects">

					<!-- Slider wrapper -->
					<div class="projects__slider swiper">
						<!-- The moving part of the slider -->
						<div class="projects__wrapper swiper-wrapper">

							<?php
							// Get the current language code
							$current_lang = pll_current_language();

							// Map the current language code to the corresponding category slug
							$category_slug = 'uncategorized';
							switch ($current_lang) {
								case 'en':
									$category_slug = 'uncategorized-en';
									break;
								case 'ru':
									$category_slug = 'uncategorized-ru';
									break;
								case 'de':
									$category_slug = 'uncategorized-de';
									break;
								case 'ua':
									$category_slug = 'uncategorized-ua';
									break;
								// Add more cases if needed for other languages
							}

							$args = array(
								'post_type'      => 'projects',
								'posts_per_page' => 50, 
								'order'          => 'DESC', 
								'tax_query'      => array(
									array(
											'taxonomy' => 'category',
											'field'    => 'slug',
											'terms'    => $category_slug, // Filter by category slug
									),
								),
							);
							$query = new WP_Query($args);

							if ($query->have_posts()) : 
								while ($query->have_posts()) : $query->the_post();
								// Photo:
								$image_id = get_post_meta(get_the_ID(), 'image', true); 
								// Get the image URL
								$image_url = $image_id ? wp_get_attachment_url($image_id) : '';
								$title = get_post_meta(get_the_ID(), 'title', true); 
								?>
								<!-- Slide -->
									<div class="projects__slide swiper-slide">
										<div class="swiper-slide__wrapper">
											<div>
												<img src="<?php echo esc_html($image_url); ?>" alt="photo">
												<span><?php echo esc_html($title); ?></span>
											</div>
										</div>
									</div>
									<?php
								endwhile;
							endif;
							
							wp_reset_postdata();
							?>

						</div>

						<div class="projects__slide check-all">
							<div class="swiper-slide__wrapper">
								<?php
								$current_lang = pll_current_language();
								$lang_permalink = "projektjeink";
								$check_text = 'Nézd meg az <br>összes projektet';
								switch ($current_lang) {
									case 'en':
										$lang_permalink = 'en/our-projects';
										$check_text = 'Check <br>all projects';
										break;
									case 'ru':
										$lang_permalink = 'ru/nashi-proekty';
										$check_text = 'Посмотреть <br>все проекты';
										break;
									case 'de':
										$lang_permalink = 'de/our-projects-de';
										$check_text = 'Alle <br>Projekte ansehen';
										break;
									case 'ua':
										$lang_permalink = 'uk/vsi-proekty';
										$check_text = 'Всі <br>проекти';
										break;
									// Add more cases if needed for other languages
								}
								?>
								<a href="<?php echo esc_url(home_url($lang_permalink)); ?>" class="check-all-projects">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/arrow-all-projects.svg" alt="">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/arrow-all-projects-yellow.svg" alt="">
								</a>
								<div class="check-text">
									<?php echo $check_text; ?>
								</div>
							</div>
						</div>
					</div>
									
				</div>
			</section>
			<!-- End of SECTION main -->

			<!-- SECTION work-with -->
			<section class="work-with">
				<div class="work-with__container">
					<div class="section-title">
						<div class="section-title-text"><?php echo wp_kses_post( get_field('partners')['lable'] ); ?></div>
					</div>
					<div class="partners">
						<?php
						$args = array(
							'post_type'      => 'partners',
							'posts_per_page' => 10, 
							'order'          => 'DESC', 
						);
						$query = new WP_Query($args);

						if ($query->have_posts()) : 
							while ($query->have_posts()) : $query->the_post();
							?>
							<div class="partners__partner">
								<?php 
								if (has_post_thumbnail()) {
									the_post_thumbnail('full');
								}
								?>
							</div>
								<?php
							endwhile;
						endif;
						
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
			<!-- End of SECTION we-work-with -->



			<!-- SECTION ABOUT -->
			<section id="about" class="about">
				<div class="about__container">
					<div class="section-title section-title-white">
						<div class="section-title-text"><?php echo wp_kses_post( get_field('about')['lable'] ); ?></div>
					</div>
					<div class="about__title"><?php echo wp_kses_post( get_field('about')['title'] ); ?></div>
					<div class="about__text">
						<div class="about__col">
							<?php echo wp_kses_post( get_field('about')['text_1'] ); ?>
						</div>
						<div class="about__col">
							<?php echo wp_kses_post( get_field('about')['text_2'] ); ?>
						</div>
					</div>
				</div>

				<div class="features">
					<!-- Slider wrapper -->
					<div class="features__slider swiper">
						<!-- The moving part of the slider -->
						<div class="features__wrapper swiper-wrapper">
							<!-- Slide -->
							<div class="features__slide swiper-slide">
								<div class="feature"><?php echo wp_kses_post( get_field('about')['scrolling_text_1'] ); ?></div>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-features.svg" alt="">
							</div>
							<!-- Slide -->
							<div class="features__slide swiper-slide">
								<div class="feature"><?php echo wp_kses_post( get_field('about')['scrolling_text_2'] ); ?></div>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-features.svg" alt="">
							</div>
							<!-- Slide -->
							<div class="features__slide swiper-slide">
								<div class="feature"><?php echo wp_kses_post( get_field('about')['scrolling_text_3'] ); ?></div>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-features.svg" alt="">
							</div>
							<!-- Slide -->
							<div class="features__slide swiper-slide">
								<div class="feature"><?php echo wp_kses_post( get_field('about')['scrolling_text_1'] ); ?></div>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-features.svg" alt="">
							</div>
							<!-- Slide -->
							<div class="features__slide swiper-slide">
								<div class="feature"><?php echo wp_kses_post( get_field('about')['scrolling_text_2'] ); ?></div>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-features.svg" alt="">
							</div>
							<!-- Slide -->
							<div class="features__slide swiper-slide">
								<div class="feature"><?php echo wp_kses_post( get_field('about')['scrolling_text_3'] ); ?></div>
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/decor-features.svg" alt="">
							</div>
						</div>
					</div>
				</div>

			</section>
			<!-- End of SECTION ABOUT -->
			


			<!-- SECTION about-photos -->
			<section class="about-photos">
				<div class="about-photos__container">
					<!-- Slider wrapper -->
					<div class="about-photos__slider swiper">
						<!-- The moving part of the slider -->
						<div class="about-photos__wrapper swiper-wrapper">
							<!-- Slide -->
							<div class="about-photos__slide swiper-slide">
								<div class="about-photos__wprapper">
									<img src="<?php echo esc_url( get_field('photos')['image_1'] ); ?>" alt="photo">
								</div>
							</div>
							<!-- Slide -->
							<div class="about-photos__slide swiper-slide">
								<div class="about-photos__wprapper">
									<img src="<?php echo esc_url( get_field('photos')['image_2'] ); ?>" alt="photo">
								</div>
							</div>
							<!-- Slide -->
							<div class="about-photos__slide swiper-slide">
								<div class="about-photos__wprapper">
									<img src="<?php echo esc_url( get_field('photos')['image_3'] ); ?>" alt="photo">
								</div>
							</div>
							<!-- Slide -->
							<div class="about-photos__slide swiper-slide">
								<div class="about-photos__wprapper">
									<img src="<?php echo esc_url( get_field('photos')['image_1'] ); ?>" alt="photo">
								</div>
							</div>
							<!-- Slide -->
							<div class="about-photos__slide swiper-slide">
								<div class="about-photos__wprapper">
									<img src="<?php echo esc_url( get_field('photos')['image_2'] ); ?>" alt="photo">
								</div>
							</div>
							<!-- Slide -->
							<div class="about-photos__slide swiper-slide">
								<div class="about-photos__wprapper">
									<img src="<?php echo esc_url( get_field('photos')['image_3'] ); ?>" alt="photo">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION about -->



			<!-- SECTION services -->
			<section id="services" class="our-services">
				<div class="our-services__container">
					<div class="section-title">
						<div class="section-title-text"><?php echo wp_kses_post( get_field('services')['label'] ); ?></div>
					</div>
					<div class="our-services__title">
						<?php echo wp_kses_post( get_field('services')['title'] ); ?>
					</div>
					<div class="services">

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-01.svg" alt="icon">
								</div>
								<div class="service__image--hover">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-01-white.svg" alt="icon">
								</div>
								<div class="service__title">
									<?php echo get_field('services')['card_1']['title']; ?>
								</div>
								<div class="service__text">
									<?php echo wp_kses_post( get_field('services')['card_1']['text'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-02.svg" alt="icon">
								</div>
								<div class="service__image--hover">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-02-white.svg" alt="icon">
								</div>
								<div class="service__title">
									<?php echo get_field('services')['card_2']['title']; ?>
								</div>
								<div class="service__text">
									<?php echo wp_kses_post( get_field('services')['card_2']['text'] ); ?>
								</div>
							</div>
						</div>

						<div class="service service-main">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-03.svg" alt="icon">
								</div>
								<div class="service__image--hover">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-03-white.svg" alt="icon">
								</div>
								<div class="service__title">
									<?php echo get_field('services')['card_3']['title']; ?>
								</div>
								<div class="service__text">
									<?php echo wp_kses_post( get_field('services')['card_3']['text'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-04.svg" alt="icon">
								</div>
								<div class="service__image--hover">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-04-white.svg" alt="icon">
								</div>
								<div class="service__title">
									<?php echo get_field('services')['card_4']['title']; ?>
								</div>
								<div class="service__text">
									<?php echo wp_kses_post( get_field('services')['card_4']['text'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-05.svg" alt="icon">
								</div>
								<div class="service__image--hover">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-05-white.svg" alt="icon">
								</div>
								<div class="service__title">
									<?php echo get_field('services')['card_5']['title']; ?>
								</div>
								<div class="service__text">
									<?php echo wp_kses_post( get_field('services')['card_5']['text'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-06.svg" alt="icon">
								</div>
								<div class="service__image--hover">
									<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-service-06-white.svg" alt="icon">
								</div>
								<div class="service__title">
									<?php echo get_field('services')['card_6']['title']; ?>
								</div>
								<div class="service__text">
									<?php echo get_field('services')['card_6']['text']; ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- End of SECTION services -->




			<!-- SECTION RESULTS -->
			<section class="results">
				<img class="bg-cover" src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/bg-main-pc.jpg" alt="">
				<div class="results__container">
					<div class="section-title section-title-white">
						<div class="section-title-text"><?php echo wp_kses_post( get_field('results')['label'] ); ?></div>
					</div>

					<div class="results__content">
						<div class="results__title">
							<?php echo wp_kses_post( get_field('results')['title'] ); ?>
							
						</div>
						<div data-watch class="counters results-items">
							<div class="result-item result-item-1">
								<div data-digits-counter data-digits-counter-speed="1000" class="counters__item result-item__numer">
									<?php echo wp_kses_post( get_field('results')['result_1']['number'] ); ?>
								</div>
								<div class="result-item__text">
									<?php echo wp_kses_post( get_field('results')['result_1']['text'] ); ?>	
								</div>
							</div>
							<div class="result-item result-item-2">
								<div data-digits-counter data-digits-counter-speed="1500" class="counters__item result-item__numer">
									<?php echo wp_kses_post( get_field('results')['result_2']['number'] ); ?>
								</div>
								<div class="result-item__text">
									<?php echo wp_kses_post( get_field('results')['result_2']['text'] ); ?>
								</div>
							</div>
							<div class="result-item result-item-3">
								<div data-digits-counter data-digits-counter-speed="2000" class="counters__item result-item__numer">
									<?php echo wp_kses_post( get_field('results')['result_3']['number'] ); ?>
								</div>
								<div class="result-item__text">
									<?php echo wp_kses_post( get_field('results')['result_3']['text'] ); ?>
								</div>
							</div>
						</div>

						<div class="bg-results">
							<img class="bg-results-pc" src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/bg-results.png" alt="">
							<img class="bg-results-mob" src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/bg-results-mob.png" alt="">
						</div>

					</div>

				</div>
			</section>
			<!-- End of SECTION RESULTS -->



			<!-- SECTION Testimonials -->
			<section class="testimonials">
				<div class="testimonials__container">
					<div class="section-title">
						<div class="section-title-text">
							<?php echo wp_kses_post( get_field('testimonials')['label'] ); ?>
						</div>
					</div>
					<div class="testimonials__title">
						<?php echo wp_kses_post( get_field('testimonials')['title'] ); ?>
					</div>

					<?php
					// Get the current language code
					$current_lang = pll_current_language();

					// Map the current language code to the corresponding category slug
					$category_slug = 'uncategorized';
					switch ($current_lang) {
						case 'en':
							$category_slug = 'uncategorized-en';
							break;
						case 'ru':
							$category_slug = 'uncategorized-ru';
							break;
						case 'de':
							$category_slug = 'uncategorized-de';
							break;
						case 'ua':
							$category_slug = 'uncategorized-ua';
							break;
						// Add more cases if needed for other languages
					}

					$posts_per_page = wp_is_mobile() ? 12 : 6;

					// Query arguments
					$args = array(
						'post_type'      => 'testimonial',
						'posts_per_page' => $posts_per_page,
						'order'          => 'DESC',
						'tax_query'      => array(
							array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => $category_slug, // Filter by category slug
							),
						),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) : 
					?>

					<!-- Slider wrapper, start -->
					<div class="testimonials__slider swiper">
						<!-- The moving part of the slider -->
						<div class="testimonials__wrapper swiper-wrapper">

						<?php
						while ($query->have_posts()) : $query->the_post();

						// Photo:
						$image_id = get_post_meta(get_the_ID(), 'image', true); 
						// Get the image URL
						$image_url = $image_id ? wp_get_attachment_url($image_id) : '';
						// Get the thumbnail image URL
						$image_data = wp_get_attachment_image_src($image_id, 'thumbnail');
						$image_thumbnail_url = $image_data ? $image_data[0] : '';

						$name = get_post_meta(get_the_ID(), 'name', true); 
						$city = get_post_meta(get_the_ID(), 'city', true); 
						$rating = get_post_meta(get_the_ID(), 'rating', true); 
						$text = get_post_meta(get_the_ID(), 'text', true); 
						?>

							<!-- Slide -->
							<div class="testimonials__slide swiper-slide">
								<div class="testimonial">
									<div class="testimonial__header">
										<div class="testimonial__avatar">
											<img src="<?php echo esc_html($image_thumbnail_url) ? esc_html($image_thumbnail_url) : esc_html($image_url);
 ?>" alt="photo">
										</div>
										<div class="testimonial__user-info">
											<div class="testimonial__user-name"><?php echo esc_html($name); ?></div>

											<div class="testimonial__location">
												<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/Icon-geo.svg" alt="">
												<div class="testimonial__adress"><?php echo esc_html($city); ?></div>
											</div>
										</div>
									</div>
									<div class="testimonial__rating">
										<div class="testimonial__rating-numer"><?php echo esc_html($rating); ?></div>
										<div data-rating="" data-rating-value="<?php echo esc_html($rating); ?>" class="rating"></div>
									</div>
									<div class="testimonial__full-text" style="height: 0; width: 0; overflow: hidden; opacity: 0;">
										<?php echo esc_html($text); ?>
									</div>
									<div class="testimonial__text">
										<?php 
										$excerpt = esc_html($text); // Retrieve the post excerpt
										$excerpt = wp_trim_words($excerpt, 9999, ''); // Trim it to a large number of words to keep all words intact
										// If the length of the excerpt exceeds 200 characters, trim it to 200 characters while keeping words intact
										if (mb_strlen($excerpt) > 220) {
											$excerpt = mb_substr($excerpt, 0, 220);
											$last_space = mb_strrpos($excerpt, ' '); // Find the last space in the trimmed text
											$excerpt = mb_substr($excerpt, 0, $last_space); // Trim the text to the last space
											$excerpt = rtrim($excerpt, '.,;: -') . '...'; // Add ellipsis at the end of the trimmed text
										}
										echo $excerpt;
										?>
									</div>
									<?php
									if (mb_strlen(esc_html($text)) > 220) {
									?>
									<div data-popup="#testimonial" testimonial-ID="<?php echo get_the_ID(); ?>" class="testimonial__read-more">
									</div>
									<?php
									}
									?>
								</div>
							</div>

							<?php
						endwhile;
					endif;
					?>
						</div><!-- The moving part of the slider, end -->
						<!-- pagination -->
						<div class="swiper-pagination"></div>
					</div><!-- Slider wrapper, end -->
					<?php
					$total_posts = $query->found_posts;
					wp_reset_postdata();
					?>

					<?php if ($total_posts > 6) : ?>
					<div class="load-more"><span>Load More</span></div>
					<?php endif; ?>

				</div>

			</section>
			<!-- End of SECTION Testimonials -->



			<!-- SECTION REQUEST -->
			<section id="contacts" class="request">
				<div class="request__container">
					<div class="request__title">
						<?php echo esc_html( get_field('request')['title'] ); ?>
					</div>
					<div class="request__text">
						<?php echo  wp_kses_post( get_field('request')['text'] ); ?>
					</div>
					<?php
						$link = '';
						$link = get_field('request')['button'];
						if ($link) {
							?>
							<a data-popup="#request" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="button"><?php echo esc_html($link['title']); ?></a>
							<?php
						}
					?>
				</div>
			</section>
			<!-- End of SECTION REQUEST -->



		</main>
<?php get_footer(); ?>