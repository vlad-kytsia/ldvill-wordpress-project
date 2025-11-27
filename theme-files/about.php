<?php
/* Template Name: About Us Template. Post Type: page */

get_header();
?>
		<main id="primary" class="site-main page">

			<?php
				$current_lang = pll_current_language();
				$current_page_id = 527;
				switch ($current_lang) {
					case 'en':
						$current_page_id = 258;
						break;
					case 'ru':
						$current_page_id = 529;
						break;
					case 'de':
						$current_page_id = 531;
						break;
					case 'ua':
						$current_page_id = 686;
						break;
				}
				$fields = get_fields($current_page_id);
			?>

			<!-- SECTION main -->
			<section class="main about-main">
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
								<?php echo  esc_html($fields['section_1']['title'] ); ?>
							</span>
						</div>
						<div class="main__description">
							<?php echo  esc_html($fields['section_1']['description'] ); ?>
						</div>
						<div class="main__subtitle">
							<span><?php echo  esc_html($fields['section_1']['label'] ); ?></span>
						</div>
						<div class="our-mission">
							<div class="our-mission__col our-mission__col--1">
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-quotation.svg" alt="quote">
								<div class="main__quote">
									<?php echo  esc_html($fields['section_1']['quote'] ); ?>
								</div>
							</div>
							<div class="our-mission__col our-mission__col--2">
								<img src="<?php echo esc_url($fields['section_1']['image']); ?>" alt="photo">
								<div class="our-mission__person-info">
									<div class="our-mission__name"><?php echo  esc_html($fields['section_1']['name'] ); ?></div>
									<div class="our-mission__speciality"><?php echo  esc_html($fields['section_1']['speciality'] ); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION main -->




			<!-- SECTION services -->
			<section id="services" class="our-services our-values">
				<div class="our-services__container">
					<div class="section-title">
						<div class="section-title-text"><?php echo esc_html($fields['section_2']['lable'] ); ?></div>
					</div>
					<div class="our-services__title">
						<?php echo esc_html($fields['section_2']['title'] ); ?>
					</div>

					<div class="services">

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_html($fields['section_2']['item_1']['image'] ); ?>" alt="icon">
								</div>
								<div class="service__title">
									<?php echo esc_html($fields['section_2']['item_1']['title'] ); ?>
								</div>
								<div class="service__text">
									<?php echo esc_html($fields['section_2']['item_1']['description'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_html($fields['section_2']['item_2']['image'] ); ?>" alt="icon">
								</div>
								<div class="service__title">
									<?php echo esc_html($fields['section_2']['item_2']['title'] ); ?>
								</div>
								<div class="service__text">
									<?php echo esc_html($fields['section_2']['item_2']['description'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_html($fields['section_2']['item_3']['image'] ); ?>" alt="icon">
								</div>
								<div class="service__title">
									<?php echo esc_html($fields['section_2']['item_3']['title'] ); ?>
								</div>
								<div class="service__text">
									<?php echo esc_html($fields['section_2']['item_3']['description'] ); ?>
								</div>
							</div>
						</div>

						<div class="service">
							<div class="service__content">
								<div class="service__image">
									<img src="<?php echo esc_html($fields['section_2']['item_4']['image'] ); ?>" alt="icon">
								</div>
								<div class="service__title">
									<?php echo esc_html($fields['section_2']['item_4']['title'] ); ?>
								</div>
								<div class="service__text">
									<?php echo esc_html($fields['section_2']['item_4']['description'] ); ?>
								</div>
							</div>
						</div>

					</div>

				</div>
			</section>
			<!-- End of SECTION services -->




			<!-- SECTION RESULTS -->
			<section class="our-history">
				<div class="our-history__container">
					<div class="section-title section-title-white">
						<div class="section-title-text"><?php echo esc_html($fields['section_3']['label'] ); ?></div>
					</div>

					<div class="our-history__title">
						<?php echo esc_html($fields['section_3']['title'] ); ?>
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

					$args = array(
						'post_type'      => 'our_history',
						'meta_key'       => 'year', 
						'orderby'        => 'meta_value_num', 
						'order'          => 'ASC', 
						'tax_query'      => array(
							array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => $category_slug, 
							),
						),
					);

					$query = new WP_Query($args);

					if ($query->have_posts()) : 
					?>

					<!-- Slider wrapper -->
					<div class="years__slider swiper">
						<div class="swiper-pagination"></div>
						<!-- The moving part of the slider -->
						<div class="years__wrapper swiper-wrapper">

					<?php
						while ($query->have_posts()) : $query->the_post();

						$year = get_post_meta(get_the_ID(), 'year', true); 
						$title = get_post_meta(get_the_ID(), 'title', true); 
						$text = get_post_meta(get_the_ID(), 'text', true); 
						?>

						<!-- Slide -->
						<div class="years__slide swiper-slide">
							<?php
							if($title) {
							?>
							<a href="">
							<?php
							}
							?>
							
								<span><?php echo esc_html($year); ?></span>

							<?php
							if($title) {
							?>
							</a>
							<?php
							}
							?>

							<?php
							if($title) {
							?>
							
							<div class="swiper-slide__content-position">
								<div class="swiper-slide__content">
									<div class="our-history__subtitle"><?php echo esc_html($title); ?></div>
									<div class="our-history__text">
										<?php echo esc_html($text); ?>
									</div>
								</div>
							</div>

							<?php
							}
							?>
						
						</div>

						<?php
						endwhile;
						?>

						</div>

						<!-- If you need buttons for navigation (left/right) -->
						<button type="button" class="swiper-button-prev"></button>
						<button type="button" class="swiper-button-next"></button>
					</div>
					<!-- End of Slider wrapper -->

						<?php
					endif;
					?>


				</div>
			</section>
			<!-- End of SECTION RESULTS -->




			<!-- SECTION TEAM -->
			<section class="team">
				<div class="team__container">
					<div class="section-title">
						<div class="section-title-text"><?php echo esc_html($fields['section_4']['label'] ); ?></div>
					</div>
					<div class="team__title">
						<?php echo esc_html($fields['section_4']['title'] ); ?>
					</div>

					<div class="team-items">
						<div class="team-item width-25">
							<div class="team-image-wrapper">
								<img src="<?php echo esc_url($fields['section_4']['image_1']); ?>" alt="photo">
								<div class="team-info">
									<div class="team-info__name">
										<?php echo esc_html($fields['section_4']['name'] ); ?>
									</div>
									<div class="team-info__speciality">
										<?php echo esc_html($fields['section_4']['speciality'] ); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="team-item width-75">
							<div class="team-image-wrapper">
								<img src="<?php echo esc_url($fields['section_4']['image_2']); ?>" alt="photo">
							</div>
						</div>
						<div class="team-item width-50">
							<div class="team-image-wrapper">
								<img src="<?php echo esc_url($fields['section_4']['image_3']); ?>" alt="photo">
							</div>
						</div>
						<div class="team-item width-50">
							<div class="team-image-wrapper">
								<img src="<?php echo esc_url($fields['section_4']['image_4']); ?>" alt="photo">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION TEAM -->



			<!-- SECTION main -->
			<section class="main main-projects main-projects--about">

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
									$lang_permalink = 'ua/proekty-kompanii';
									$check_text = 'Всі <br>проекти';
									break;
								// Add more cases if needed for other languages
							}
							?>
							<a href="<?php echo esc_url(home_url($lang_permalink)); ?>" class="check-all-projects">
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/icon-all-projects.svg" alt="">
								<img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/arrow-all-projects-yellow.svg" alt="">
							</a>
							<div class="check-text">
								<?php echo $check_text; ?>
							</div>
						</div>
					</div>
			
			</section>
			<!-- End of SECTION main -->



			<!-- SECTION REQUEST -->
			<?php
			// Получаем ID главной страницы
			$homepage_id = get_option('page_on_front');

			// Получаем поле 'request' с главной страницы
			$request = get_field('request', $homepage_id);
			?>

			<section id="contacts" class="request">
				<div class="request__container">
					<div class="request__title">
							<?php echo esc_html( $request['title'] ); ?>
					</div>
					<div class="request__text">
							<?php echo wp_kses_post( $request['text'] ); ?>
					</div>
					<?php
					$link = $request['button'];
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