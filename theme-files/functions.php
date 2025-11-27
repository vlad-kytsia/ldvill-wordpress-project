<?php
/**
 * LD-electrician functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LD-electrician
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function ld_electrician_setup() {
	/*
		* Make theme available for translation.
		*/
	load_theme_textdomain( 'ld-electrician', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-hu' => esc_html__( 'HEADER and FOOTER - HU - ', 'ld-electrician' ),
			'menu-en' => esc_html__( 'HEADER and FOOTER - EN - ', 'ld-electrician' ),
			'menu-ru' => esc_html__( 'HEADER and FOOTER - RU - ', 'ld-electrician' ),
			'menu-de' => esc_html__( 'HEADER and FOOTER - DE - ', 'ld-electrician' ),
			'menu-uk' => esc_html__( 'HEADER and FOOTER - UK - ', 'ld-electrician' ),
			'menu-lang' => esc_html__( 'Language switch ', 'ld-electrician' ),
			'button-hu' => esc_html__( 'BUTTON - HU - ', 'ld-electrician' ),
			'button-en' => esc_html__( 'BUTTON - EN - ', 'ld-electrician' ),
			'button-ru' => esc_html__( 'BUTTON - RU - ', 'ld-electrician' ),
			'button-de' => esc_html__( 'BUTTON - DE - ', 'ld-electrician' ),
			'button-uk' => esc_html__( 'BUTTON - UK - ', 'ld-electrician' ),
		)
	);

	/*
		* Function for adding the data-popup attribute to all buttons in the ul menu
	*/
	function add_data_popup_to_menu($args) {
		$locations = ['button-hu', 'button-en', 'button-ru', 'button-de', 'button-uk'];
		
		if (in_array($args['theme_location'], $locations)) {
			$args['items_wrap'] = '<ul data-popup="#request" id="%1$s" class="%2$s">%3$s</ul>';
		}
		
		return $args;
	}
	add_filter('wp_nav_menu_args', 'add_data_popup_to_menu');

	/*
		* Add support for core custom logo.
		*/
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ld_electrician_setup' );

/*
	* Set the content width in pixels, based on the theme's design and stylesheet.
	*/
function ld_electrician_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ld_electrician_content_width', 640 );
}
add_action( 'after_setup_theme', 'ld_electrician_content_width', 0 );

/*
	* Register widget area.
	*/


function ld_electrician_scripts() {
	wp_enqueue_style( 'ld-electrician-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ld-electrician-style', 'rtl', 'replace' );
	wp_enqueue_style( 'ld-electrician-style-main', get_template_directory_uri() . '/assets/css/style.css', array() );

	wp_enqueue_script( 'ld-electrician-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ld-electrician-main', get_template_directory_uri() . '/assets/js/app.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ld_electrician_scripts' );


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

# Add SVG to the list of allowed files
# Adds SVG to the list of permitted files.
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

# Fix MIME type for SVG files.
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {

	// WP 5.1+
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime type has been reset, fix it
	// and also check the user right
	if( $dosvg ){

		// allow
		if( current_user_can('manage_options') ){
			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// disable
		else {
			$data['ext'] = false;
			$data['type'] = false;
		}

	}

	return $data;
}


/**
 * Automatically generates a numeric title and slug for new 'testimonial' posts.
 *
 * This function runs when a post is inserted. If the post is of the 'testimonial'
 * type and has the status 'auto-draft', it assigns the post ID as both the title
 * and the slug. 
 *
 * To prevent an infinite loop, the function temporarily removes its own hook
 * before updating the post, and adds it back afterward.
 */
function custom_generate_numeric_title($post_id) {
    // We disable the execution of our hook while updating the post.
    remove_action('wp_insert_post', 'custom_generate_numeric_title');

    $post_type = get_post_type($post_id);

    if ($post_type == 'testimonial' && get_post_status($post_id) == 'auto-draft') {

        $numeric_title = (string) $post_id;

        wp_update_post(array(
            'ID' => $post_id,
            'post_title' => $numeric_title,
            'post_name' => $numeric_title 
        ));
    }

    add_action('wp_insert_post', 'custom_generate_numeric_title');
}

add_action('wp_insert_post', 'custom_generate_numeric_title');



/** 
 * AJAX:
 * */

// Enqueue AJAX scripts
function enqueue_load_more_scripts() {
    // Connecting the script for testimonials
    wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more.js', array('jquery'), null, true);

    // Connecting the script for projects
    wp_enqueue_script('load-more-projects', get_template_directory_uri() . '/js/load-more-projects.js', array('jquery'), null, true);

    // Localization of variables for both scripts
    wp_localize_script('load-more', 'ajax_params_testimonials', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('load_more_nonce') 
    ));
    
    wp_localize_script('load-more-projects', 'ajax_params_projects', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('load_more_projects_nonce') 
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_scripts');

// Handle AJAX request
function load_more_posts() {
	check_ajax_referer('load_more_nonce', 'nonce');

	$paged = $_POST['page'] ? intval($_POST['page']) : 1;

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
		'post_type'      => 'testimonial',
		'posts_per_page' => 6,
		'paged'          => $paged,
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
		ob_start();
		
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
						<div data-rating="" data-rating-value="<?php echo esc_html($rating); ?>" class="rating">
							<div class="rating__items">
								<?php
									for ($i=1; $i <= $rating ; $i++) { 
									?>
									<label class="rating__item rating__item--active">
										<input class="rating__input" type="radio" name="rating" value="<?php echo $i; ?>">
									</label>
									<?php
									}

								$emptyStars = 5 - $rating;
									if ($emptyStars >= 1) {
										for ($i=1; $i <= $emptyStars; $i++) { 
									?>
									<label class="rating__item">
										<?php
										$ratingValue = 5 - $emptyStars + $i;
										?>
										<input class="rating__input" type="radio" name="rating" value="<?php echo $ratingValue; ?>">
									</label>
									<?php
										}
									}
								?>
							</div>
						</div>
					</div>
					<div class="testimonial__full-text" style="height: 0; width: 0; overflow: hidden; opacity: 0;">
						<?php echo esc_html($text); ?>
					</div>
					<div class="testimonial__text">
						<?php 
						$excerpt = esc_html($text); // Retrieve the post excerpt
						$excerpt = wp_trim_words($excerpt, 9999, ''); 
						// If the length of the excerpt exceeds 200 characters, trim it to 200 characters while keeping words intact
						if (mb_strlen($excerpt) > 220) {
							$excerpt = mb_substr($excerpt, 0, 220);
							$last_space = mb_strrpos($excerpt, ' '); 
							$excerpt = mb_substr($excerpt, 0, $last_space); 
							$excerpt = rtrim($excerpt, '.,;: -') . '...'; 
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
			$response['content'] .= ob_get_clean();
		endwhile;
		$response['more'] = $query->max_num_pages > $paged;
	else:
		$response['more'] = false;
	endif;

	wp_reset_postdata();
	echo json_encode($response);
   wp_die();
}
add_action('wp_ajax_load_more', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'load_more_posts');







// LOAD MORE PROJECTS

// Handle AJAX request
function load_more_projects() {
	check_ajax_referer('load_more_projects_nonce', 'nonce');

	$paged = $_POST['page'] ? intval($_POST['page']) : 1;

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
		'paged'          => $paged,
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
		ob_start();

		// Photo:
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
					<?php echo esc_html($title); ?>
				</div>
				<div class="our-project__text">
					<?php echo esc_html($description); ?>
				</div>
			</div>
		</div>

			<?php
			$response['content'] .= ob_get_clean();
		endwhile;
		$response['more'] = $query->max_num_pages > $paged;
	else:
		$response['more'] = false;
	endif;

	wp_reset_postdata();
	echo json_encode($response);
   wp_die();
}
add_action('wp_ajax_load_more_projects', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects');
