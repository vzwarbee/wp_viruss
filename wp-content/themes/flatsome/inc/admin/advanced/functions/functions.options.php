<?php
/**
 * Advanced Theme Options
 *
 * @package Flatsome/Admin/Options/Advanced
 */

add_action( 'init', 'of_options' );

if ( ! function_exists( 'of_options' ) ) {
	/**
	 * Advance Theme Options.
	 *
	 * @global array $of_options Description.
	 *
	 * @return void.
	 */
	function of_options() {
		// Access the WordPress Categories via an Array.
		$of_categories     = array();
		$of_categories_obj = get_categories( 'hide_empty=0' );
		foreach ( $of_categories_obj as $of_cat ) {
			$of_categories[ $of_cat->cat_ID ] = $of_cat->cat_name;
		}

		// Access the WordPress Pages via an Array.
		$of_pages      = array();
		$of_pages_obj  = get_pages( 'sort_column=post_parent,menu_order' );
		$of_pages['0'] = 'Select a page:';
		foreach ( $of_pages_obj as $of_page ) {
			$of_pages[ $of_page->ID ] = $of_page->post_title;
		}

		// Set the Options Array.
		global $of_options;
		$of_options = array();

		$of_options[] = array(
			'name' => 'Global Settings',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Header Scripts',
			'desc' => 'Add custom scripts inside HEAD tag. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_header',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Footer Scripts',
			'desc' => 'Add custom scripts you might want to be loaded in the footer of your website. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_footer',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Body Scripts - Top',
			'desc' => 'Add custom scripts just after the BODY tag opened. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_after_body',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Body Scripts - Bottom',
			'desc' => 'Add custom scripts just before the BODY tag closed. You need to have a SCRIPT tag around scripts.',
			'id'   => 'html_scripts_before_body',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Flatsome 2.0 Content Support',
			'id'   => 'flatsome_fallback',
			'desc' => 'Support content made in Flatsome 2.0. Disable to speed up site.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'Custom CSS',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'All screens',
			'desc' => 'Add custom CSS here',
			'id'   => 'html_custom_css',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Tablets and down',
			'desc' => 'Add custom CSS here for tablets and mobile',
			'id'   => 'html_custom_css_tablet',
			'std'  => '',
			'type' => 'textarea',
		);

		$of_options[] = array(
			'name' => 'Mobile only',
			'desc' => 'Add custom CSS here for mobile view',
			'id'   => 'html_custom_css_mobile',
			'std'  => '',
			'type' => 'textarea',
		);

		// Performance.
		$of_options[] = array(
			'name' => 'Performance',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:14px">Use with caution! Disable if you have plugin compatibility problems.</p>',
		);

		$of_options[] = array(
			'name' => 'Preload pages',
			'id'   => 'perf_instant_page',
			'desc' => 'Preload pages right before a user clicks on it for blazing fast browsing between pages.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'Lazy Load Images',
			'id'   => 'lazy_load_images',
			'desc' => 'Enable lazy loading for images. It will generate an inline blank Base64 image with the same aspect ratio as the original image.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'Disable theme style.css',
			'type' => 'checkbox',
			'id'   => 'flatsome_disable_style_css',
			'std'  => 0,
			'desc' => 'Disable loading of theme style.css. This file is only needed if you have added custom CSS to that file.',
		);

		$of_options[] = array(
			'name' => 'Disable Emoji script',
			'type' => 'checkbox',
			'id'   => 'disable_emoji',
			'std'  => 0,
			'desc' => 'Remove WP emoji scripts from front-end.',
		);

		$of_options[] = array(
			'name' => 'Disable Block library css',
			'type' => 'checkbox',
			'id'   => 'disable_blockcss',
			'std'  => 0,
			'desc' => 'Remove default block library css coming from WordPress',
		);

		$of_options[] = array(
			'name' => 'Disable jQuery Migrate',
			'type' => 'checkbox',
			'id'   => 'jquery_migrate',
			'std'  => 0,
			'desc' => 'Remove jQuery Migrate. Most up-to-date front-end code and plugins don’t require jquery-migrate.min.js. More often than not, keeping this - simply adds unnecessary load to your site.',
		);

		// Content delivery.
		$of_options[] = array(
			'name' => 'Content Delivery',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<h2 style="font-size:1rem; margin-top: 40px;">AJAX loading<span class="of-tag">Experimental</span></h2><p style="font-size:14px">Fetch content from the server without reloading the whole page. This is an experimental feature and is subject to change. <b>Disable if you experience plugin compatibility issues.</b></p><p><a target="_blank" rel="noopener" href="https://docs.uxthemes.com/article/430-pjax">Learn more</a></p>',
		);

		$of_options[] = array(
			'name'    => 'Blog pagination',
			'id'      => 'blog_pagination',
			'std'     => '',
			'type'    => 'select',
			'options' => array(
				''     => 'Normal navigation',
				'ajax' => 'AJAX navigation',
			),
		);

		if ( is_woocommerce_activated() ) {
			$of_options[] = array(
				'name'    => 'Shop pagination',
				'id'      => 'shop_pagination',
				'std'     => '',
				'type'    => 'select',
				'options' => array(
					''                => 'Normal navigation',
					'ajax'            => 'AJAX navigation',
					'infinite-scroll' => 'Infinite scroll',
				),
			);

			$of_options[] = array(
				'name' => 'Shop archive',
				'id'   => 'shop_filter_widgets_pjax',
				'desc' => 'Enable AJAX for product category widget & filter widgets',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		$of_options[] = array(
			'name' => 'Scroll to top',
			'id'   => 'pjax_scroll_to_top',
			'desc' => 'Scroll to top after AJAX navigation',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => '',
			'type' => '',
			'desc' => '<h2 style="font-size:1rem; margin-top: 40px;">Infinite scroll settings</h2>',
		);

		$of_options[] = array(
			'name'    => 'Loading type',
			'id'      => 'infinite_scroll_loader_type',
			'desc'    => 'Select loading type animation or on button click.',
			'std'     => 'spinner',
			'type'    => 'select',
			'options' => array(
				'button'  => 'Button (On click)',
				'spinner' => 'Spinner',
				'image'   => 'Custom Image',
			),
		);

		$of_options[] = array(
			'name' => 'Custom loader image',
			'desc' => "Upload or choose a custom loader image (for loading type 'Custom Image').",
			'id'   => 'infinite_scroll_loader_img',
			'std'  => '',
			'type' => 'upload',
		);

		$of_options[] = array(
			'name' => 'Site Loader',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name'    => 'Site Loader',
			'id'      => 'site_loader',
			'desc'    => 'Enable Site Loader overlay when loading the site.',
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''     => 'Disabled',
				'home' => 'Enable on homepage',
				'all'  => 'Enable on all pages',
			),
		);

		$of_options[] = array(
			'name'    => 'Color',
			'id'      => 'site_loader_color',
			'type'    => 'select',
			'std'     => 'light',
			'options' => array(
				'light' => 'Light',
				'dark'  => 'Dark',
			),
		);

		$of_options[] = array(
			'name' => 'Background Color',
			'id'   => 'site_loader_bg',
			'std'  => '',
			'type' => 'color',
		);

		$of_options[] = array(
			'name' => 'Site Search',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Live Search',
			'id'   => 'live_search',
			'desc' => 'Enable live search for products, pages and posts.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'Search placeholder',
			'desc' => 'Change the search field placeholder.',
			'id'   => 'search_placeholder',
			'type' => 'text',
		);

		$of_options[] = array(
			'name'    => 'Search results latency',
			'desc'    => 'Set the delay for live search results.',
			'id'      => 'search_result_latency',
			'std'     => '0',
			'type'    => 'select',
			'options' => array(
				'0'    => 'Instant',
				'500'  => '500 ms',
				'1000' => '1000 ms',
				'1500' => '1500 ms',
				'2000' => '2000 ms',
			),
		);

		if ( is_woocommerce_activated() ) {

			$of_options[] = array(
				'name' => 'Show Blog and pages in search results',
				'id'   => 'search_result',
				'desc' => 'Enable blog and pages in search results.',
				'std'  => 1,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name'    => 'Posts and pages list style',
				'id'      => 'search_result_style',
				'desc'    => 'Display results as row, masonry or slider style.',
				'type'    => 'select',
				'std'     => 'slider',
				'options' => array(
					'row'     => 'Row',
					'masonry' => 'Masonry',
					'slider'  => 'Slider',
				),
			);

			$of_options[] = array(
				'name'    => 'Products: Order by',
				'id'      => 'search_products_order_by',
				'type'    => 'select',
				'std'     => 'relevance',
				'options' => array(
					'relevance' => 'Relevance',
					'title'     => 'Title',
					'price'     => 'Price',
				),
			);

			$of_options[] = array(
				'name'    => 'Products: Order',
				'id'      => 'search_products_order',
				'type'    => 'select',
				'std'     => 'ASC',
				'options' => array(
					'ASC'  => 'Ascending',
					'DESC' => 'Descending',
				),
			);

			$of_options[] = array(
				'name' => 'Search Product SKU',
				'desc' => 'Allow searching by SKU in live search.',
				'id'   => 'search_by_sku',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Search Product Tag',
				'desc' => 'Allow searching by product tags in live search.',
				'id'   => 'search_by_product_tag',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		$of_options[] = array(
			'name' => 'Instagram',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Feed settings',
			'id'   => 'instagram_lazy_load',
			'desc' => 'Lazy load Instagram feeds when they appear in the viewport.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name' => 'Accounts',
			'std'  => flatsome_facebook_accounts_html(),
			'type' => 'info',
		);

		$of_options[] = array(
			'name' => 'Cache',
			'std'  => flatsome_facebook_cache_html(),
			'type' => 'info',
		);

		$of_options[] = array(
			'name' => 'Business Account',
			'desc' => flatsome_facebook_login_button_html(),
			'type' => 'info',
		);

		$of_options[] = array(
			'name' => 'Google APIs',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Google Maps API',
			'desc' => "Enter Google Maps API key here to enable Maps. You can generate one here: <a target='_blank' href='https://developers.google.com/maps/documentation/javascript/get-api-key'>Google Maps API</a>",
			'id'   => 'google_map_api',
			'std'  => '',
			'type' => 'text',
		);

		$maintenance_mode = apply_filters( 'flatsome_maintenance_mode', [ 'access_mode' => 'roles' ] );

		$of_options[] = array(
			'name' => 'Maintenance Mode',
			'type' => 'heading',
		);

		if ( ! empty( $maintenance_mode['access_mode'] ) ) {
			$access_mode = $maintenance_mode['access_mode'];

			$supported_modes = [ 'logged_in', 'roles', 'current_user_can' ];
			$display_mode    = in_array( $access_mode, $supported_modes, true )
				? $access_mode
				: sprintf( '%s (not supported)', $access_mode );

			$of_options[] = array(
				'name' => '',
				'type' => 'info',
				'desc' => sprintf( '<p style="font-size:14px">Access mode: %s</p>', $display_mode ),
			);
		}

		$of_options[] = array(
			'name' => 'Maintenance Mode',
			'id'   => 'maintenance_mode',
			'desc' => 'Enable Maintenance Mode.',
			'std'  => 0,
			'type' => 'checkbox',
		);

		if ( ! empty( $maintenance_mode['access_mode'] && $maintenance_mode['access_mode'] === 'roles' ) ) {
			$of_options[] = array(
				'name'    => 'Exclude roles',
				'id'      => 'maintenance_mode_excluded_roles',
				'desc'    => 'Exclude roles from maintenance mode (admin always has access).',
				'std'     => array(),
				'type'    => 'multicheck',
				'options' => flatsome_get_role_list( array(
					'exclude' => array(
						'super_admin',
						'administrator',
					),
				) ),
			);
		}

		$of_options[] = array(
			'name' => 'Bypass key',
			'id'   => 'maintenance_mode_bypass_key',
			'desc' => 'Enter a unique key here. This key, when appended as a parameter in the URL, allows a user to bypass the maintenance mode and access the website. For example, if you enter "key1234" as the key, you can bypass maintenance mode on any URL by appending the key f.ex.: https://example.com/?key1234 or https://example.com/shop/?key1234, etc.',
			'std'  => '',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => 'Admin Notice',
			'id'   => 'maintenance_mode_admin_notice',
			'desc' => 'Show admin notice when Maintenance Mode is enabled.',
			'std'  => 1,
			'type' => 'checkbox',
		);

		$of_options[] = array(
			'name'    => 'Custom Maintenance Page',
			'id'      => 'maintenance_mode_page',
			'desc'    => 'Set a custom page as maintenance page. Only this page will be visible for visitors.',
			'std'     => 0,
			'type'    => 'select',
			'options' => $of_pages,
		);

		$of_options[] = array(
			'name' => 'Maintenance Mode Text',
			'desc' => 'The text that will be visible to your customers when accessing maintenance screen.',
			'id'   => 'maintenance_mode_text',
			'std'  => 'Please check back soon..',
			'type' => 'text',
		);

		$of_options[] = array(
			'name' => '404 Page',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name'    => 'Custom 404 Block',
			'id'      => '404_block',
			'desc'    => 'Replace 404 page content with a Custom Block that you can edit in the Page Builder.',
			'std'     => 0,
			'type'    => 'select',
			'options' => flatsome_get_block_list_by_id( array( 'option_none' => '-- None --' ) ),
		);

		if ( is_woocommerce_activated() ) {

			$of_options[] = array(
				'name' => 'WooCommerce',
				'type' => 'heading',
			);

			$of_options[] = array(
				'name' => 'Product variations',
				'id'   => 'swatches',
				'desc' => 'Enable variation swatches.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'id'   => 'additional_variation_images',
				'desc' => 'Enable additional variation images (Flatsome gallery).',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Single product',
				'id'   => 'ajax_add_to_cart',
				'desc' => 'Enable AJAX add to cart buttons on single product page & quick view.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Disable Reviews Global',
				'id'   => 'disable_reviews',
				'desc' => 'Disable reviews globally.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'WooCommerce product gallery',
				'id'   => 'product_gallery_woocommerce',
				'desc' => 'Use the default WooCommerce gallery slider for plugin compatibility. <br>(This disables the Flatsome product gallery and multiple options for it)',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Shop header',
				'desc' => 'Enter HTML that should be placed on top of main shop page. Shortcodes are allowed. ',
				'id'   => 'html_shop_page',
				'std'  => '',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'Additional Global tab/section title',
				'id'   => 'tab_title',
				'std'  => '',
				'type' => 'text',
			);

			$of_options[] = array(
				'name' => 'Additional Global tab/section content',
				'id'   => 'tab_content',
				'std'  => '',
				'type' => 'textarea',
				'desc' => 'Add additional tab content here... Like Size Charts etc.',
			);

			$of_options[] = array(
				'name' => 'HTML before Add To Cart button (Global)',
				'desc' => 'Enter HTML and shortcodes that will show before Add to cart selections.',
				'id'   => 'html_before_add_to_cart',
				'std'  => ' ',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'HTML after Add To Cart button (Global)',
				'desc' => 'Enter HTML and shortcodes that will show after Add to cart button.',
				'id'   => 'html_after_add_to_cart',
				'std'  => '',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'Thank You Page Content / Scripts',
				'desc' => 'Enter scripts or custom HTML content for the thank you page here',
				'id'   => 'html_thank_you',
				'std'  => '',
				'type' => 'textarea',
			);

			$of_options[] = array(
				'name' => 'Catalog Mode',
				'type' => 'heading',
			);

			$of_options[] = array(
				'name' => 'Enable catalog mode',
				'id'   => 'catalog_mode',
				'desc' => 'Enable catalog mode. This will disable Add To Cart buttons / Checkout and Shopping cart.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Disable prices',
				'id'   => 'catalog_mode_prices',
				'desc' => 'Select to disable prices on category pages and product page.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Remove sale badge',
				'id'   => 'catalog_mode_sale_badge',
				'desc' => 'Select to remove sale badges.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Cart / Account replacement (header)',
				'id'   => 'catalog_mode_header',
				'std'  => '',
				'type' => 'textarea',
				'desc' => "Enter content you want to display instead of Account / Cart. Shortcodes are allowed. For search box enter <b>[search]</b>. For social icons enter: <b>[follow twitter='http://' facebook='http://' email='post@email.com' pinterest='http://']</b>",
			);

			$of_options[] = array(
				'name' => 'Add to cart replacement - Product page',
				'id'   => 'catalog_mode_product',
				'std'  => '',
				'type' => 'textarea',
				'desc' => 'Enter contact information or enquiry form shortcode here.',
			);

			$of_options[] = array(
				'name' => 'Add to cart replacement - Product Quick View',
				'id'   => 'catalog_mode_lightbox',
				'std'  => '',
				'type' => 'textarea',
				'desc' => 'Enter text that will show in product quick view',
			);
		}

		// Portfolio.
		$of_options[] = array(
			'name' => 'Portfolio',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Enable Portfolio',
			'id'   => 'fl_portfolio',
			'desc' => 'Enable portfolio',
			'std'  => 1,
			'type' => 'checkbox',
		);

		// Mobile.
		$of_options[] = array(
			'name' => 'Mobile',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Parallax Mobile Support',
			'id'   => 'parallax_mobile',
			'desc' => 'Enable parallax for mobile devices',
			'std'  => 0,
			'type' => 'checkbox',
		);

		// Integrations.
		$of_options[] = array(
			'name' => 'Integrations',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'info',
			'desc' => '<p style="font-size:14px">Additional options for integrated plugins will be shown here if they are activated.</p>',
		);

		$of_options[] = array(
			'name' => 'Flatsome Studio',
			'id'   => 'flatsome_studio',
			'desc' => 'Enable access to Flatsome Studio in UX Builder',
			'std'  => 1,
			'type' => 'checkbox',
		);

		if ( function_exists( 'ubermenu' ) ) {
			$of_options[] = array(
				'name' => 'Ubermenu',
				'id'   => 'flatsome_uber_menu',
				'desc' => 'Enable full width UberMenu. You can also insert this elsewhere by using the UberMenu options.',
				'std'  => 1,
				'type' => 'checkbox',
			);
		}

		// Yoast options.
		if ( class_exists( 'WPSEO_Options' ) ) {
			$of_options[] = array(
				'name' => 'Yoast Primary Category',
				'id'   => 'wpseo_primary_term',
				'desc' => 'Use on product category pages and elements.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => '',
				'id'   => 'wpseo_manages_product_layout_priority',
				'desc' => 'Manage custom product layout priority.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name'  => 'Yoast Breadcrumbs',
				'id'    => 'wpseo_breadcrumb',
				'desc'  => 'Use on product category pages, single product pages and elements.',
				'std'   => 0,
				'folds' => 1,
				'type'  => 'checkbox',
			);

			$of_options[] = array(
				'name' => '',
				'id'   => 'wpseo_breadcrumb_remove_last',
				'desc' => 'Remove the last static crumb on single product pages (product title).',
				'std'  => 1,
				'fold' => 'wpseo_breadcrumb',
				'type' => 'checkbox',
			);
		}

		// Rank Math options.
		if ( class_exists( 'RankMath' ) ) {
			$of_options[] = array(
				'name' => 'Rank Math Primary Category',
				'id'   => 'rank_math_primary_term',
				'desc' => 'Use on product category pages and elements.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => '',
				'id'   => 'rank_math_manages_product_layout_priority',
				'desc' => 'Manage custom product layout priority.',
				'std'  => 0,
				'type' => 'checkbox',
			);

			$of_options[] = array(
				'name' => 'Rank Math Breadcrumbs',
				'id'   => 'rank_math_breadcrumb',
				'desc' => 'Use on product category pages, single product pages and elements.',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		// All in one SEO options.
		if ( class_exists( 'AIOSEO\Plugin\AIOSEO' ) ) {
			$of_options[] = array(
				'name' => 'AIOSEO Breadcrumbs',
				'id'   => 'aioseo_breadcrumb',
				'desc' => 'Use on product category pages, single product pages and elements.',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		// SEOPress options.
		if ( defined( 'SEOPRESS_VERSION' ) ) {
			$of_options[] = array(
				'name' => defined( 'SEOPRESS_PRO_VERSION' ) ? 'SEOPress Breadcrumbs' : 'SEOPress Breadcrumbs (Requires SeoPress PRO)',
				'id'   => 'wpseopress_breadcrumb',
				'desc' => 'Use on product category pages, single product pages and elements.',
				'std'  => 0,
				'type' => 'checkbox',
			);
		}

		// Updates.
		$of_options[] = array(
			'name' => 'Updates',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name'    => 'Release channel',
			'id'      => 'release_channel',
			'std'     => 'stable',
			'type'    => 'select',
			'options' => array(
				'stable' => 'Stable',
				'beta'   => 'Beta',
			),
		);

		$of_options[] = array(
			'name' => '',
			'type' => 'warning',
			'desc' => '<p style="font-size:14px">Use with caution. Do not use prerelease versions on production sites. Beta releases may not be stable.</p>',
		);

		// Backup Options.
		$of_options[] = array(
			'name' => 'Backup and Import',
			'type' => 'heading',
		);

		$of_options[] = array(
			'name' => 'Backup and Restore Options',
			'id'   => 'of_backup',
			'std'  => '',
			'type' => 'backup',
			'desc' => 'You can use the buttons above to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
		);

		$of_options[] = array(
			'name' => 'Transfer Theme Options Data',
			'id'   => 'of_transfer',
			'std'  => '',
			'type' => 'transfer',
			'desc' => 'You can transfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
		);

	} // End of 'of_options()' function.
} // End check if function exists: of_options()
