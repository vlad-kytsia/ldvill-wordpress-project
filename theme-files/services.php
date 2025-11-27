<?php
/* Template Name: Services Template. Post Type: page */
get_header();
?>
		<main id="primary" class="site-main page">

			<?php
				$current_lang = pll_current_language();
				$current_page_id = 556;
				switch ($current_lang) {
					case 'en':
						$current_page_id = 266;
						break;
					case 'ru':
						$current_page_id = 559;
						break;
					case 'de':
						$current_page_id = 562;
						break;
					case 'ua':
						$current_page_id = 694;
						break;
				}
				$fields = get_fields($current_page_id);
			?>
			
			
			<!-- SECTION main -->
			<section class="main services-main">
				<div class="main__container">
					<div class="main__wrapper">
						<div class="breadcrumbs">
							<ul>
								<li><a href="" class="home-link"></a></li>
								<li><?php echo get_the_title($current_page_id); ?></li>
							</ul>
						</div>
						<div class="main__title">
							<span><?php echo esc_html( $fields['section_1']['title'] ); ?></span>
						</div>
						<div class="main__description">
							<?php echo esc_html( $fields['section_1']['text'] ); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION main -->



			<!-- SECTION SERVICES -->
			<section class="our-services">
				<div class="our-services__container">
					<div class="our-service">
						<div class="our-service__col our-service__col--image">
							<img class="our-service__image" src="<?php echo esc_url( $fields['section_2']['item_1']['big_image'] ); ?>" alt="photo">
							<img class="our-service__image--mob" src="<?php echo esc_url( $fields['section_2']['item_1']['big_image_mobile'] ); ?>" alt="photo">
						</div>
						<div class="our-service__col our-service__col--text">
							<div class="our-service__title our-service__title--text">
								<img src="<?php echo esc_url( $fields['section_2']['item_1']['image'] ); ?>" alt="icon">
								<span><?php echo $fields['section_2']['item_1']['title']; ?></span>
							</div>
							<div class="our-service__text">
								<?php echo esc_html( $fields['section_2']['item_1']['text'] ); ?>
							</div>
							<a href="#" data-popup="#request" class="button button-yellow"><?php echo esc_html( $fields['section_2']['item_1']['button_text'] ); ?></a>
						</div>
					</div>

					<div class="our-service">
						<div class="our-service__col our-service__col--image">
							<img class="our-service__image" src="<?php echo esc_url( $fields['section_2']['item_2']['big_image'] ); ?>" alt="photo">
							<img class="our-service__image--mob" src="<?php echo esc_url( $fields['section_2']['item_2']['big_image_mobile'] ); ?>" alt="photo">
						</div>
						<div class="our-service__col our-service__col--text">
							<div class="our-service__title our-service__title--text">
								<img src="<?php echo esc_url( $fields['section_2']['item_2']['image'] ); ?>" alt="icon">
								<span><?php echo $fields['section_2']['item_2']['title']; ?></span>
							</div>
							<div class="our-service__text">
								<?php echo esc_html( $fields['section_2']['item_2']['text'] ); ?>
							</div>
							<a href="#" data-popup="#request" class="button button-yellow"><?php echo esc_html( $fields['section_2']['item_2']['button_text'] ); ?></a>
						</div>
					</div>

					<div class="our-service">
						<div class="our-service__col our-service__col--image">
							<img class="our-service__image" src="<?php echo esc_url( $fields['section_2']['item_3']['big_image'] ); ?>" alt="photo">
							<img class="our-service__image--mob" src="<?php echo esc_url( $fields['section_2']['item_3']['big_image_mobile'] ); ?>" alt="photo">
						</div>
						<div class="our-service__col our-service__col--text">
							<div class="our-service__title our-service__title--text">
								<img src="<?php echo esc_url( $fields['section_2']['item_3']['image'] ); ?>" alt="icon">
								<span><?php echo $fields['section_2']['item_3']['title']; ?></span>
							</div>
							<div class="our-service__text">
								<?php echo esc_html( $fields['section_2']['item_3']['text'] ); ?>
							</div>
							<a href="#" data-popup="#request" class="button button-yellow"><?php echo esc_html( $fields['section_2']['item_3']['button_text'] ); ?></a>
						</div>
					</div>

					<div class="our-service">
						<div class="our-service__col our-service__col--image">
							<img class="our-service__image" src="<?php echo esc_url( $fields['section_2']['item_4']['big_image'] ); ?>" alt="photo">
							<img class="our-service__image--mob" src="<?php echo esc_url( $fields['section_2']['item_4']['big_image_mobile'] ); ?>" alt="photo">
						</div>
						<div class="our-service__col our-service__col--text">
							<div class="our-service__title our-service__title--text">
								<img src="<?php echo esc_url( $fields['section_2']['item_4']['image'] ); ?>" alt="icon">
								<span><?php echo $fields['section_2']['item_4']['title']; ?></span>
							</div>
							<div class="our-service__text">
								<?php echo esc_html( $fields['section_2']['item_4']['text'] ); ?>
							</div>
							<a href="#" data-popup="#request" class="button button-yellow"><?php echo esc_html( $fields['section_2']['item_4']['button_text'] ); ?></a>
						</div>
					</div>

					<div class="our-service">
						<div class="our-service__col our-service__col--image">
							<img class="our-service__image" src="<?php echo esc_url( $fields['section_2']['item_5']['big_image'] ); ?>" alt="photo">
							<img class="our-service__image--mob" src="<?php echo esc_url( $fields['section_2']['item_5']['big_image_mobile'] ); ?>" alt="photo">
						</div>
						<div class="our-service__col our-service__col--text">
							<div class="our-service__title our-service__title--text">
								<img src="<?php echo esc_url( $fields['section_2']['item_5']['image'] ); ?>" alt="icon">
								<span><?php echo $fields['section_2']['item_5']['title']; ?></span>
							</div>
							<div class="our-service__text">
								<?php echo esc_html( $fields['section_2']['item_5']['text'] ); ?>
							</div>
							<a href="#" data-popup="#request" class="button button-yellow"><?php echo esc_html( $fields['section_2']['item_5']['button_text'] ); ?></a>
						</div>
					</div>

					<div class="our-service">
						<div class="our-service__col our-service__col--image">
							<img class="our-service__image" src="<?php echo esc_url( $fields['section_2']['item_6']['big_image'] ); ?>" alt="photo">
							<img class="our-service__image--mob" src="<?php echo esc_url( $fields['section_2']['item_6']['big_image_mobile'] ); ?>" alt="photo">
						</div>
						<div class="our-service__col our-service__col--text">
							<div class="our-service__title our-service__title--text">
								<img src="<?php echo esc_url( $fields['section_2']['item_6']['image'] ); ?>" alt="icon">
								<span><?php echo $fields['section_2']['item_6']['title']; ?></span>
							</div>
							<div class="our-service__text">
								<?php echo esc_html( $fields['section_2']['item_6']['text'] ); ?>
							</div>
							<a href="#" data-popup="#request" class="button button-yellow"><?php echo esc_html( $fields['section_2']['item_6']['button_text'] ); ?></a>
						</div>
					</div>

				</div>
			</section>
			<!-- End of SECTION SERVICES -->



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