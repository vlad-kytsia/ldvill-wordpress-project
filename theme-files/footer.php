<?php
/**
 * The template for displaying the footer
 */

?>

		<footer class="footer">
			<div class="footer__container">
				<div class="footer__logo">
					<a href=""><img src="<?php echo esc_url(bloginfo('template_url')); ?>/assets/img/logo.svg" alt="logo"></a>
				</div>
				<div class="footer__content">
					<div class="footer__col">
						<?php						
						if (has_nav_menu('menu-hu')) {
							wp_nav_menu(array(
								'theme_location' => 'menu-hu', 
								'menu_class'     => 'footer__nav-link', 
								'container'      => false, 
								'items_wrap'     => '%3$s', 
								'link_before'    => '<span class="white-circle"></span><span>', 
								'link_after'     => '</span>', 
							));
						}
						if (has_nav_menu('menu-en')) {
							wp_nav_menu(array(
								'theme_location' => 'menu-en', 
								'menu_class'     => 'footer__nav-link', 
								'container'      => false, 
								'items_wrap'     => '%3$s', 
								'link_before'    => '<span class="white-circle"></span><span>', 
								'link_after'     => '</span>', 
							));
						}
						if (has_nav_menu('menu-ru')) {
							wp_nav_menu(array(
								'theme_location' => 'menu-ru', 
								'menu_class'     => 'footer__nav-link', 
								'container'      => false, 
								'items_wrap'     => '%3$s', 
								'link_before'    => '<span class="white-circle"></span><span>', 
								'link_after'     => '</span>', 
							));
						}
						if (has_nav_menu('menu-de')) {
							wp_nav_menu(array(
								'theme_location' => 'menu-de', 
								'menu_class'     => 'footer__nav-link', 
								'container'      => false, 
								'items_wrap'     => '%3$s', 
								'link_before'    => '<span class="white-circle"></span><span>', 
								'link_after'     => '</span>', 
							));
						}
						if (has_nav_menu('menu-uk')) {
							wp_nav_menu(array(
								'theme_location' => 'menu-uk', 
								'menu_class'     => 'footer__nav-link', 
								'container'      => false, 
								'items_wrap'     => '%3$s', 
								'link_before'    => '<span class="white-circle"></span><span>', 
								'link_after'     => '</span>', 
							));
						}
						?>
					</div>
					<div class="footer__col">

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
						<a href="tel:<?php echo esc_html($cleaned); ?>" class="footer__nav-link">
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
						<a href="mailto:<?php echo esc_html($text); ?>" class="footer__nav-link">
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
						<a href="https://t.me/<?php echo esc_html($cleaned); ?>" class="footer__nav-link">
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
						<a href="viber://chat?number=<?php echo esc_html($cleaned); ?>" class="footer__nav-link">
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
						<a href="https://wa.me/<?php echo esc_html($cleaned); ?>" class="footer__nav-link">
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
					<div class="footer__col">
						<div>L&D Vill Kft</div>
						<div>Hungary, 1106 Budapest Fehér út. 1</div>
					</div>
					<div class="footer__col">
						<div>© L&D Vill 2024</div>
						<div>Minden jog fenntartva</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	
	<div id="testimonial" aria-hidden="true" class="popup">
		<div class="popup__wrapper">
			<div class="popup__content">
				<button data-close type="button" class="popup__close">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="3.50928" y="24.7227" width="30" height="2.5" rx="1.25" transform="rotate(-45 3.50928 24.7227)" fill="#A3ABB6" />
						<rect x="5.27734" y="3.50952" width="30" height="2.5" rx="1.25" transform="rotate(45 5.27734 3.50952)" fill="#A3ABB6" />
					</svg>
				</button>
				<div class="popup__text">
					<div class="testimonial">
						<div class="testimonial__header"></div>
						<div class="testimonial__rating"></div>
						<div class="testimonial__text"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="request" aria-hidden="true" class="popup">
		<div class="popup__wrapper">
			<div class="popup__content">
				<button data-close type="button" class="popup__close">
					<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="3.50928" y="24.7227" width="30" height="2.5" rx="1.25" transform="rotate(-45 3.50928 24.7227)" fill="#A3ABB6" />
						<rect x="5.27734" y="3.50952" width="30" height="2.5" rx="1.25" transform="rotate(45 5.27734 3.50952)" fill="#A3ABB6" />
					</svg>
				</button>
				<div class="popup__text">
				
					<?php
					$current_lang = pll_current_language();
					$popup_shortcode = '[contact-form-7 id="8f0b597" title="Contact form in the pop-up Zend Request HU"]';
					switch ($current_lang) {
						case 'en':
							$popup_shortcode = '[contact-form-7 id="c01b9b0" title="Contact form in the pop-up Zend Request EN"]';
							break;
						case 'ru':
							$popup_shortcode = '[contact-form-7 id="ea8b32a" title="Contact form in the pop-up Zend Request RU"]';
							break;
						case 'de':
							$popup_shortcode = '[contact-form-7 id="04d4891" title="Contact form in the pop-up Zend Request DE"]';
							break;
						case 'ua':
							$popup_shortcode = '[contact-form-7 id="93bc077" title="Contact form in the pop-up Zend Request UK"]';
							break;
					}
					?>
					<?php echo do_shortcode($popup_shortcode ); ?>
					
				</div>
			</div>
		</div>
	</div>
	
	<script>
		// Add event listener to the document or a specific parent element
		document.addEventListener('click', function(event) {
			// Check if the clicked element has the class "testimonial__read-more"
			if (event.target.classList.contains('testimonial__read-more')) {
				// Get the value of the "testimonial-ID" attribute
				let testimonialID = event.target.getAttribute('testimonial-ID');
				
				// Find the parent element with class "testimonial"
				let parentElement = event.target.closest('.testimonial');
				
				if (parentElement) {
					// Get the values of the inner elements
					let headerHTML = parentElement.querySelector('.testimonial__header') ? parentElement.querySelector('.testimonial__header').innerHTML.trim() : 'N/A';
               let ratingHTML = parentElement.querySelector('.testimonial__rating') ? parentElement.querySelector('.testimonial__rating').innerHTML.trim() : 'N/A';
					let fullText = parentElement.querySelector('.testimonial__full-text') ? parentElement.querySelector('.testimonial__full-text').textContent.trim() : 'N/A';

					// Check if the element with id="testimonial" exists
					const testimonialElement = document.getElementById('testimonial');

					if (testimonialElement) {
						// Find the div with class="testimonial__header" inside the testimonial element
						const headerElement = testimonialElement.querySelector('.testimonial__header');
						const ratingElement = testimonialElement.querySelector('.testimonial__rating');
						const textElement = testimonialElement.querySelector('.testimonial__text');

						if (headerElement) {
							// Change the content
							headerElement.innerHTML = headerHTML;
						}
						if (ratingElement) {
							// Change the content
							ratingElement.innerHTML = ratingHTML;
						}
						if (textElement) {
							// Change the content
							textElement.textContent = fullText;
						}
					}
				}
			}
		});
	</script>
	<script>
    document.addEventListener('DOMContentLoaded', function () {
		// Function to convert the last part of the id to uppercase
		function getLanguageCodeFromId(id) {
			const parts = id.split('-');
			return parts[parts.length - 1].toUpperCase();
		}

		// Update language names to two-letter codes
		const languageItems = document.querySelectorAll('.sub-menu li a');
		languageItems.forEach(item => {
			const listItem = item.parentElement;
			const id = listItem.id;
			if (id) {
					const languageCode = getLanguageCodeFromId(id);
					item.textContent = languageCode;
			}
		});

		// Define a mapping of full language names to their codes
		const languageMap = {
			'English': 'EN',
			'Magyar': 'HU',
			'Русский': 'RU',
			'Deutsch': 'DE',
			'Українська': 'UA'
			// Add other languages as needed
		};

		// Select the language switcher link
		const languageLink = document.querySelector('.languages > ul > li > a[href="#pll_switcher"]');
		
		// Check if the element exists before changing its text
		if (languageLink) {
			// Get the current text content
			const currentText = languageLink.textContent.trim();
			
			// Update text based on the mapping
			if (languageMap[currentText]) {
					languageLink.textContent = languageMap[currentText];
			}
		}

		// Select the element with the class 'pll-parent-menu-item'
		const menuItem = document.querySelector('.pll-parent-menu-item');
		
		// Check if the element exists before adding event listener
		if (menuItem) {
			// Add a click event listener to the element
			menuItem.addEventListener('click', function() {
				// Check if the clicked target is a link
				if (event.target.tagName === 'A') {
						// Check if the link is inside '.sub-menu'
						const isInsideSubMenu = event.target.closest('.sub-menu');
						
						// If the link is not inside '.sub-menu', prevent default action
						if (!isInsideSubMenu) {
							event.preventDefault();
						}
				}
				// Toggle the 'opened' class on and off
				this.classList.toggle('opened');
			});
		}
    });
</script>
	<?php wp_footer(); ?>
</body>

</html>





