<?php
/* Template Name: Projects Template. Post Type: page */

get_header();
?>
		<main id="primary" class="site-main page">

			<?php
				$current_lang = pll_current_language();
				$current_page_id = 542;
				switch ($current_lang) {
					case 'en':
						$current_page_id = 264;
						break;
					case 'ru':
						$current_page_id = 548;
						break;
					case 'de':
						$current_page_id = 553;
						break;
					case 'ua':
						$current_page_id = 692;
						break;
				}
				$fields = get_fields($current_page_id);
			?>
			
			
			<!-- SECTION main -->
			<section class="main projects-main">
				<div class="main__container">
					<div class="main__wrapper">
						<div class="breadcrumbs">
							<ul>
								<li><a href="" class="home-link"></a></li>
								<li><?php echo get_the_title($current_page_id); ?></li>
							</ul>
						</div>
						<div class="main__title">
							<span><?php echo esc_html($fields['section_1']['title'] ); ?></span>
						</div>
						<div class="main__description">
							<?php echo esc_html($fields['section_1']['description'] ); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- End of SECTION main -->



			<!-- SECTION PROJECTS -->
			<section class="our-projects">
				<div class="our-projects__container">

					<div class="our-projects__wrapper">

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

					// Query arguments
					$args = array(
						'post_type'      => 'projects',
						'posts_per_page' => 5,
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
					<?php
						while ($query->have_posts()) : $query->the_post();

						$image_id = get_post_meta(get_the_ID(), 'image', true); 
						// Get the image URL
						$image_url = $image_id ? wp_get_attachment_url($image_id) : '';
						$year = get_post_meta(get_the_ID(), 'year', true); 
						$title = get_post_meta(get_the_ID(), 'title', true); 
						$description = get_post_meta(get_the_ID(), 'description', true); 

						?>

						<div class="our-project">
							<div class="our-project__col--image">
								<img src="<?php echo esc_html($image_url); ?>" alt="photo">
							</div>
							<div class="our-project__col--text">
								<div class="our-project__year">
									<?php echo esc_html($year); ?>
								</div>
								<div class="our-project__title">
									<?php echo $title; ?>
								</div>
								<div class="our-project__text">
									<?php echo esc_html($description); ?>
								</div>
							</div>
						</div>

						<?php
						endwhile;
					endif;
					?>

					</div>

					<div class="load-more"><span>Load More</span></div>


				</div>
			</section>
			<!-- End of SECTION PROJECTS -->



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