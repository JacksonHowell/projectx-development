<?php
if (!function_exists( 'woo_options')) {
function woo_options() {

// THEME VARIABLES
$themename = "Merchant";
$themeslug = "merchant";

// STANDARD VARIABLES. DO NOT TOUCH!
$shortname = "woo";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/'.$themeslug.'/';

//Access the WordPress Categories via an Array
$woo_categories = array();
$woo_categories_obj = get_categories( 'hide_empty=0' );
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:" );

//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; } 
$woo_pages_raw = $woo_pages;
$woo_pages_raw[0] = "Select a page:";
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:" );

//Stylesheets Reader
$alt_stylesheet_path = get_template_directory() . '/styles/';
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) {
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }
    }
}

//More Options
$other_entries = array( "0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19" );

// THIS IS THE DIFFERENT FIELDS
$options = array();

// General

		$options[] = array( 'name' => __( 'General Settings', 'woothemes' ),
			'type' => 'heading',
			'icon' => 'general' );

		$options[] = array( 'name' => __( 'Quick Start', 'woothemes' ),
					'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Theme Stylesheet', 'woothemes' ),
			'desc' => __( 'Select your themes alternative color scheme.', 'woothemes' ),
			'id' => $shortname . '_alt_stylesheet',
			'std' => 'default.css',
			'type' => 'select',
			'options' => $alt_stylesheets );

		$options[] = array( 'name' => __( 'Custom Logo', 'woothemes' ),
			'desc' => __( 'Upload a logo for your theme, or specify an image URL directly.', 'woothemes' ),
			'id' => $shortname . '_logo',
			'std' => '',
			'type' => 'upload' );

		$options[] = array( 'name' => __( 'Text Title', 'woothemes' ),
			'desc' => sprintf( __( 'Enable text-based Site Title and Tagline. Setup title & tagline in %1$s.', 'woothemes' ), '<a href="' . home_url() . '/wp-admin/options-general.php">' . __( 'General Settings', 'woothemes' ) . '</a>' ),
			'id' => $shortname . '_texttitle',
			'std' => 'false',
			'class' => 'collapsed',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Site Title', 'woothemes' ),
			'desc' => __( 'Change the site title typography.', 'woothemes' ),
			'id' => $shortname . '_font_site_title',
			'std' => array( 'size' => '32', 'unit' => 'px', 'face' => 'Muli', 'style' => 'bold', 'color' => '#fff' ),
			'class' => 'hidden',
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Site Description', 'woothemes' ),
			'desc' => __( 'Enable the site description/tagline under site title.', 'woothemes' ),
			'id' => $shortname . '_tagline',
			'class' => 'hidden',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Site Description', 'woothemes' ),
			'desc' => __( 'Change the site description typography.', 'woothemes' ),
			'id' => $shortname . '_font_tagline',
			'std' => array( 'size' => '14', 'unit' => 'px', 'face' => 'Muli', 'style' => 'bold', 'color' => '#6E1811' ),
			'class' => 'hidden last',
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Custom Favicon', 'woothemes' ),
			'desc' => __( 'Upload a 16px x 16px <a href="http://www.faviconr.com/">ico image</a> that will represent your website\'s favicon.', 'woothemes' ),
			'id' => $shortname . '_custom_favicon',
			'std' => '',
			'type' => 'upload' );

		$options[] = array( 'name' => __( 'Tracking Code', 'woothemes' ),
			'desc' => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'woothemes' ),
			'id' => $shortname . '_google_analytics',
			'std' => '',
			'type' => 'textarea' );

		$options[] = array( 'name' => __( 'Subscription Settings', 'woothemes' ),
					'type' => 'subheading' );

		$options[] = array( 'name' => __( 'RSS URL', 'woothemes' ),
			'desc' => __( 'Enter your preferred RSS URL. (Feedburner or other)', 'woothemes' ),
			'id' => $shortname . '_feed_url',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'E-Mail Subscription URL', 'woothemes' ),
			'desc' => __( 'Enter your preferred E-mail subscription URL. (Feedburner or other)', 'woothemes' ),
			'id' => $shortname . '_subscribe_email',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Contact Form E-Mail', 'woothemes' ),
			'desc' => __( 'Enter your E-mail address to use on the Contact Form Page Template. Add the contact form by adding a new page and selecting "Contact Form" as page template.', 'woothemes' ),
			'id' => $shortname . '_contactform_email',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Display Options', 'woothemes' ),
					'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Custom CSS', 'woothemes' ),
			'desc' => __( 'Quickly add some CSS to your theme by adding it to this block.', 'woothemes' ),
			'id' => $shortname . '_custom_css',
			'std' => '',
			'type' => 'textarea' );

		$options[] = array( 'name' => __( 'Post/Page Comments', 'woothemes' ),
			'desc' => __( 'Select if you want to enable/disable comments on posts and/or pages.', 'woothemes' ),
			'id' => $shortname . '_comments',
			'std' => 'both',
			'type' => 'select2',
			'options' => array( "post" => __( 'Posts Only', 'woothemes' ), "page" => __( 'Pages Only', 'woothemes' ), "both" => __( 'Pages / Posts', 'woothemes' ), "none" => __( 'None', 'woothemes' ) ) );

		$options[] = array( 'name' => __( 'Post Content', 'woothemes' ),
			'desc' => __( 'Select if you want to show the full content or the excerpt on posts.', 'woothemes' ),
			'id' => $shortname . '_post_content',
			'type' => 'select2',
			'options' => array( "excerpt" => __( 'The Excerpt', 'woothemes' ), "content" => __( 'Full Content', 'woothemes' ) ) );

		$options[] = array( 'name' => __( 'Post Author Box', 'woothemes' ),
			'desc' => sprintf( __( 'This will enable the post author box on the single posts page. Edit description in %1$s.', 'woothemes' ), '<a href="' . home_url() . '/wp-admin/profile.php">' . __( 'Profile', 'woothemes' ) . '</a>' ),
			'id' => $shortname . '_post_author',
			'std' => 'true',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Display Breadcrumbs', 'woothemes' ),
			'desc' => __( 'Display dynamic breadcrumbs on each page of your website.', 'woothemes' ),
			'id' => $shortname . '_breadcrumbs_show',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Display Pagination', 'woothemes' ),
			'desc' => __( 'Display pagination on the blog.', 'woothemes' ),
			'id' => $shortname . '_pagenav_show',
			'std' => 'true',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Pagination Style', 'woothemes' ),
			'desc' => __( 'Select the style of pagination you would like to use on the blog.', 'woothemes' ),
			'id' => $shortname . '_pagination_type',
			'type' => 'select2',
			'options' => array( "paginated_links" => __( 'Numbers', 'woothemes' ), "simple" => __( 'Next/Previous', 'woothemes' ) ) );

		// Styling
		$options[] = array( 'name' => __( 'Styling Options', 'woothemes' ),
			'type' => 'heading',
			'icon' => 'styling' );
			
		$options[] = array( 'name' => __( 'Header', 'woothemes' ),
			'type' => 'subheading' );
			
		$options[] = array( 'name' => __( 'Header Background Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for the background color of the header e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_header_bg_color',
			'std' => '',
			'type' => 'color' );
			
		$options[] = array( 'name' => __( 'Header Navigation Font Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for the font color of the main navigation e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_header_font_color',
			'std' => '',
			'type' => 'color' );
			
		$options[] = array( 'name' => __( 'Header Navigation Hover & Drop Downs Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for the hover & drop downs color of the main navigation e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_header_hover_color',
			'std' => '',
			'type' => 'color' );
			
		$options[] = array( 'name' => __( 'Header Navigation Active Link Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for the active link color of the main navigation e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_header_active_color',
			'std' => '',
			'type' => 'color' );
			
		$options[] = array( 'name' => __( 'Disable Perforated Edge', 'woothemes' ) ,
			'desc' => __( 'Disable the perforated edge on the header background', 'woothemes' ) ,
			'id' => $shortname . '_header_plain',
			'std' => 'false',
			'type' => 'checkbox' );
		
		$options[] = array( 'name' => __( 'Background', 'woothemes' ),
			'type' => 'subheading' );
		
		$options[] = array( 'name' => __( 'Body Background Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for background color of the theme e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_body_color',
			'std' => '',
			'type' => 'color' );

		$options[] = array( 'name' => __( 'Body background image', 'woothemes' ),
			'desc' => __( 'Upload an image for the theme\'s background', 'woothemes' ),
			'id' => $shortname . '_body_img',
			'std' => '',
			'type' => 'upload' );

		$options[] = array( 'name' => __( 'Background image repeat', 'woothemes' ),
			'desc' => __( 'Select how you would like to repeat the background-image', 'woothemes' ),
			'id' => $shortname . '_body_repeat',
			'std' => 'no-repeat',
			'type' => 'select',
			'options' => array( "no-repeat", "repeat-x", "repeat-y", "repeat" ) );

		$options[] = array( 'name' => __( 'Background image position', 'woothemes' ),
			'desc' => __( 'Select how you would like to position the background', 'woothemes' ),
			'id' => $shortname . '_body_pos',
			'std' => "top",
			'type' => 'select',
			'options' => array( "top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right" ) );
			
		$options[] = array( "name" => "Background Attachment",
            "desc" => "Select whether the background should be fixed or move when the user scrolls",
            "id" => $shortname."_body_attachment",
            "std" => "scroll",
            "type" => "select",
            "options" => array( "scroll","fixed"));

		$options[] = array( 'name' => __( 'Links', 'woothemes' ),
			'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Link Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for links or add a hex color code e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_link_color',
			'std' => '',
			'type' => 'color' );

		$options[] = array( 'name' =>  __( 'Link Hover Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for links hover or add a hex color code e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_link_hover_color',
			'std' => '',
			'type' => 'color' );

		$options[] = array( 'name' =>  __( 'Button Color', 'woothemes' ),
			'desc' => __( 'Pick a custom color for buttons or add a hex color code e.g. #697e09', 'woothemes' ),
			'id' => $shortname . '_button_color',
			'std' => '',
			'type' => 'color' );

		/* Typography */

		$options[] = array( 'name' => __( 'Typography', 'woothemes' ),
			'type' => 'heading',
			'icon' => 'typography' );

		$options[] = array( 'name' => __( 'Enable Custom Typography', 'woothemes' ) ,
			'desc' => __( 'Enable the use of custom typography for your site. Custom styling will be output in your sites HEAD.', 'woothemes' ) ,
			'id' => $shortname . '_typography',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'General Typography', 'woothemes' ) ,
			'desc' => __( 'Change the general font.', 'woothemes' ) ,
			'id' => $shortname . '_font_body',
			'std' => array( 'size' => '13', 'unit' => 'px', 'face' => 'Muli', 'style' => '', 'color' => '#372E2E' ),
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Navigation', 'woothemes' ) ,
			'desc' => __( 'Change the navigation font.', 'woothemes' ),
			'id' => $shortname . '_font_nav',
			'std' => array( 'size' => '14', 'unit' => 'px', 'face' => 'Muli', 'style' => 'bold', 'color' => '#6E1811' ),
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Page Title', 'woothemes' ) ,
			'desc' => __( 'Change the page title.', 'woothemes' ) ,
			'id' => $shortname . '_font_page_title',
			'std' => array( 'size' => '24', 'unit' => 'px', 'face' => 'Muli', 'style' => 'bold', 'color' => '#00000' ),
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Post Title', 'woothemes' ) ,
			'desc' => __( 'Change the post title.', 'woothemes' ) ,
			'id' => $shortname . '_font_post_title',
			'std' => array( 'size' => '24', 'unit' => 'px', 'face' => 'Muli', 'style' => 'bold', 'color' => '#000000' ),
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Post Meta', 'woothemes' ),
			'desc' => __( 'Change the post meta.', 'woothemes' ) ,
			'id' => $shortname . '_font_post_meta',
			'std' => array( 'size' => '13', 'unit' => 'px', 'face' => 'Muli', 'style' => '', 'color' => '#372E2E' ),
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Post Entry', 'woothemes' ) ,
			'desc' => __( 'Change the post entry.', 'woothemes' ) ,
			'id' => $shortname . '_font_post_entry',
			'std' => array( 'size' => '13', 'unit' => 'px', 'face' => 'Muli', 'style' => '', 'color' => '#372E2E' ),
			'type' => 'typography' );

		$options[] = array( 'name' => __( 'Widget Titles', 'woothemes' ) ,
			'desc' => __( 'Change the widget titles.', 'woothemes' ) ,
			'id' => $shortname . '_font_widget_titles',
			'std' => array( 'size' => '13', 'unit' => 'px', 'face' => 'Muli', 'style' => 'bold', 'color' => '#000000' ),
			'type' => 'typography' );

		/* Layout */

		$options[] = array( 'name' => __( 'Layout Options', 'woothemes' ),
			'type' => 'heading',
			'icon' => 'layout' );

		$url =  get_template_directory_uri() . '/functions/images/';
		$options[] = array( 'name' => __( 'Main Layout', 'woothemes' ),
			'desc' => __( 'Select which layout you want for your site.', 'woothemes' ),
			'id' => $shortname . '_site_layout',
			'std' => "layout-left-content",
			'type' => 'images',
			'options' => array(
				'layout-left-content' => $url . '2cl.png',
				'layout-right-content' => $url . '2cr.png' )
		);

		$options[] = array( "name" => "Floated Header",
		                    "desc" => "Enable to float the header to the left of the site content. Will only display on widescreen displays (1400px and higher)",
		                    "id" => $shortname."_floated_header",
		                    'std' => 'false',
							'class' => 'collapsed',
							'type' => 'checkbox' );
							
		$options[] = array( "name" => "Fix Floated Header",
		                    "desc" => "Enable to fix the floated header. The header will stay floated on the right as you scroll.",
		                    "id" => $shortname."_floated_fixed_header",
		                    'std' => 'true',
							'class' => 'hidden last',
							'type' => 'checkbox' );
							
		$options[] = array( "name" => "Content Width",
		                    "desc" => "Set the width (in px) that you would like your content column to be (recommended max-width is 960px)",
		                    "id" => $shortname."_content_width",
		                    "std" => "960",
							"min" => "600",
							"max" => "1600",
							"increment" => "40",
							"type" => 'slider' );
		
		$options[] = array( "name" => "Header - Search Field",
		                    "desc" => "Enable the search field in the header area.",
		                    "id" => $shortname."_header_search",
		                    "std" => "true",
		                    "class" => "collapsed",
		                    "type" => "checkbox");
		if ( is_woocommerce_activated() ) {
		$options[] = array( "name" => "Search scope",
							"desc" => "Select whether you want the search in the header to search for products or posts",
							"id" => $shortname."_header_search_scope",
							"type" => "select2",
							"class" => "hidden last",
							"options" => array( "product" => "Products", "post" => "Posts" ) );
		}

		$options[] = array( 'name' => __( 'Category Exclude - Homepage', 'woothemes' ),
			'desc' => __( 'Specify a comma seperated list of category IDs or slugs that you\'d like to exclude from your homepage (eg: uncategorized).', 'woothemes' ),
			'id' => $shortname . '_exclude_cats_home',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Category Exclude - Blog Page Template', 'woothemes' ),
			'desc' => __( 'Specify a comma seperated list of category IDs or slugs that you\'d like to exclude from your \'Blog\' page template (eg: uncategorized).', 'woothemes' ),
			'id' => $shortname . '_exclude_cats_blog',
			'std' => '',
			'type' => 'text' );
					
		/* Homepage Settings */
		$options[] = array( "name" => "Homepage Options",
							"type" => "heading",
							"icon" => "homepage" );
		
		/* Homepage Setup */
		$options[] = array( 'name' => __( 'Homepage Setup', 'woothemes' ),
    						'type' => 'subheading');

		$options[] = array( 'name' => __( 'Homepage Setup', 'woothemes' ),
                    		'desc' => '',
                    		'id' => $shortname . '_homepage_notice',
                    		'std' => sprintf( __( 'You can optionally customise the homepage by adding widgets to the "Homepage" widgetized area on the "%sWidgets%s" screen with the "Woo - Component" widget.', 'woothemes' ), '<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">', '</a>' ) . '<br /><br />' . __( 'If you do so, this will override the options below.', 'woothemes' ),
                    		'type' => 'info' );	
         
        $options[] = array( "name" => "Enable Homepage Intro",
                    		"desc" => "Enable the intro message area on the homepage.",
                    		"id" => $shortname."_custom_intro_message",
                    		"std" => "true",
                    		"type" => "checkbox");
                    
        $options[] = array( "name" => "Enable Features Area",
		                    "desc" => "Enable the features area on the homepage.",
		                    "id" => $shortname."_features_area",
		                    "std" => "true",
		                    "type" => "checkbox");
		
		$options[] = array( "name" => "Enable Portfolio Area",
		                    "desc" => "Enable the portfolio area on the homepage.",
		                    "id" => $shortname."_home_portfolio",
		                    "std" => "true",
		                    "type" => "checkbox");
		
		$options[] = array( "name" => "Enable Homepage Promotion Slider",
                   			"desc" => "Enable the promotion slider on the homepage.",
                   			"id" => $shortname."_home_promotion",
                   			"std" => "true",
                   			"type" => "checkbox");
        			
		$options[] = array( "name" => "Enable Homepage Feedback",
                   			"desc" => "Enable the feedback slider area on the homepage.",
                   			"id" => $shortname."_home_feedback",
                   			"std" => "true",
                   			"type" => "checkbox");
        
		$options[] = array( "name" => "Enable Content Area",
		                    "desc" => "Enable the content area on the homepage.",
		                    "id" => $shortname."_content_area",
		                    "std" => "false",
		                    "type" => "checkbox");
		                    
		$options[] = array( "name" => "Enable Blog Area",
		                    "desc" => "Enable the horizontal blog area on the homepage.",
		                    "id" => $shortname."_blog_area",
		                    "std" => "false",
		                    "type" => "checkbox");
		if ( is_woocommerce_activated() ) {            
		$options[] = array( "name" => "Enable Shop Area",
		                    "desc" => "Enable the shop area on the homepage.",
		                    "id" => $shortname."_shop_area",
		                    "std" => "false",
		                    "type" => "checkbox");
		}
		                                            			
		/* Featured Slider */
		$options[] = array( "name" => "Featured Slider",
							"icon" => "slider",
							"type" => "subheading");
							
		$options[] = array( "name" => "Enable Featured Slider",
		                    "desc" => "Enable the featured post slider on the homepage.",
		                    "id" => $shortname."_featured",
		                    "std" => "true",
		                    "type" => "checkbox");
		
		$options[] = array( "name" => "Slider Title",
		                    "desc" => "Set the title to be displayed at the top of the slider. ",
		                    "id" => $shortname."_slider_header_text",
		                    "std" => "Slider",
		                    "type" => "text");

		$options[] = array( "name" => "Slider Title Sub Heading",
		                    "desc" => "Set the title sub heading to be displayed next to the slider title. ",
		                    "id" => $shortname."_slider_sub_header_text",
		                    "std" => "Slider Subheading",
		                    "type" => "text");

		$options[] = array(    "name" => "Slider Entries",
		                    "desc" => "Select the number of entries that should appear in the home page slider.",
		                    "id" => $shortname."_featured_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries);
		
		$options[] = array( "name" => "Slider Image/Video Height",
		                    "desc" => "Set the initial height of the slider images/video. Note: The images need to be 960px+ wide for them to be dynamically resized. The full width slider scales the height responsively. ",
		                    "id" => $shortname."_featured_height",
		                    "std" => "380",
		                    "type" => "text");
		
		$options[] = array(    "name" => __( 'Slides Post Order', 'woothemes' ),
		                    "desc" => __( 'Select which way you wish to order your slider posts.', 'woothemes' ),
		                    "id" => $shortname."_featured_order",
		                    "std" => "DESC",
							"type" => "select2",
							"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );
							
		$options[] = array(    "name" => __( 'Slider Animation', 'woothemes' ),
		                    "desc" => __( 'Select the type of animation you want to use.', 'woothemes' ),
		                    "id" => $shortname."_featured_animation",
		                    "std" => "Fade",
							"type" => "select2",
							"options" => array("fade" => __( 'Fade', 'woothemes' ), "slide" => __( 'Slide', 'woothemes' )) );   
							
		
		$options[] = array( "name" => "Disable Slider Title/Description on Video Posts",
		                    "desc" => "Don't show the title and description if you have a video post in the slider.",
		                    "id" => $shortname."_slider_video_title",
		                    "std" => "true",
		                    "type" => "checkbox"); 
		
		$options[] = array( "name" => "Slider Next/Prev Navigation",
		                    "desc" => "Select to enable next/prev slider for the featured slider.",
		                    "id" => $shortname."_featured_nextprev",
		                    "std" => "true",
		                    "type" => "checkbox");
		
		$options[] = array( "name" => "Slider Pagination",
		                    "desc" => "Select to enable pagination for the featured slider.",
		                    "id" => $shortname."_featured_pagination",
		                    "std" => "true",
		                    "type" => "checkbox");
		
		$options[] = array( "name" => "Slider Hover Pause",
		                    "desc" => "Hovering over featured slider will pause it.",
		                    "id" => $shortname."_featured_hover",
		                    "std" => "true",
		                    "type" => "checkbox");                     
		
		$options[] = array( "name" => "Auto Slide Interval",
		                    "desc" => "The time in <b>seconds</b> each slide pauses for, before transitioning to the next.",
		                    "id" => $shortname."_featured_speed",
		                    "std" => "7",
							"type" => "select",
							"options" => array( 'Off', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ) );
		                    
		$options[] = array( "name" => "Slider Animation Speed",
		                    "desc" => "The time in <b>seconds</b> the animation between slides will take.",
		                    "id" => $shortname."_featured_animation_speed",
		                    "std" => "0.6",
							"type" => "select",
							"options" => array( '0.0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0' ) );
					
		$options[] = array( "name" => "Intro Message",
					"type" => "subheading" );
					
		$options[] = array( "name" => "Homepage Intro Message",
                    "desc" => "Enter a welcome message for your homepage to be displayed under the slider area.",
                    "id" => $shortname."_custom_intro_message_text",
                    "std" => 'Whitelight features a full width slider and a widgetized homepage, allowing you full control over how you showcase your business. <a href="http://woothemes.com/2012/02/whitelight/">Read more</a> about all the cool features!',
                    "type" => "textarea" );
                    
        $options[] = array( "name" => "Homepage Intro Social Icons",
                    "desc" => "Choose to display social media links with intro message. These are set under Subscribe &amp; Connect -> Connect",
                    "id" => $shortname."_custom_intro_social",
                    "std" => 'false',
                    "type" => "checkbox" );
                    
		/* Features Settings */           
		$options[] = array( "name" => "Features Area",
					"type" => "subheading" );
					
		$options[] = array( "name" => "Features Area Heading",
							"desc" => "Enter the title for the features area to be displayed on your homepage.",
							"id" => $shortname."_features_area_heading",
							"std" => "Some of our Features",
							"type" => "text" );
												
		$options[] = array( "name" => "Features Area Sub Heading",
		                    "desc" => "Enter the sub heading for the features area to be displayed on your homepage.",
		                    "id" => $shortname."_features_area_sub",
		                    "std" => 'What makes Merchant great?',
		                    "type" => "text" );
		
		$options[] = array( "name" => "Features Area Link Text",
							"desc" => "Enter the text for the link to the features archive page in the features area to be displayed on your homepage.",
							"id" => $shortname."_features_area_link_text",
							"std" => "View all our Features",
							"type" => "text" );
		
		$options[] = array( "name" => "Features Area Link URL (optional)",
							"desc" => "Enter an custom URL for the features archive page link.",
							"id" => $shortname."_features_area_link_URL",
							"std" => "",
							"type" => "text" );		
		
		$options[] = array( "name" => "Number of Features",
		                    "desc" => "Select the number of features that should appear in the features area on the home page.",
		                    "id" => $shortname."_features_area_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries);
		
		$options[] = array( "name" => __( 'Features Order', 'woothemes' ),
		                    "desc" => __( 'Select which way you wish to order your features.', 'woothemes' ),
		                    "id" => $shortname."_features_area_order",
		                    "std" => "DESC",
							"type" => "select2",
							"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );   
		
		$options[] = array( "name" => __( 'Features Items URL Base', 'woothemes' ),
								"desc" => sprintf( __( 'The base of all feature item URLs (re-save the %s after changing this setting).', 'woothemes' ), '<a href="' . admin_url( 'options-permalink.php' ) . '">' . __( 'Permalinks', 'woothemes' ) . '</a>' ),
								"id" => $shortname."_features_rewrite",
								"std" => "features",
								"type" => "text");
								
		/* Portfolio Settings */           
		$options[] = array( "name" => "Portfolio",
					"type" => "subheading" );
					
		$options[] = array( "name" => "Portfolio Area Heading",
							"desc" => "Enter the title for the portfolio area to be displayed on your homepage.",
							"id" => $shortname."_home_portfolio_heading",
							"std" => "Our Work",
							"type" => "text" );
												
		$options[] = array( "name" => "Portfolio Area Sub Heading",
		                    "desc" => "Enter the sub heading for the portfolio area to be displayed on your homepage.",
		                    "id" => $shortname."_home_portfolio_sub",
		                    "std" => 'What makes Merchant great?',
		                    "type" => "text" );
		
		$options[] = array( "name" => "Portfolio Area Link Text",
							"desc" => "Enter the text for the link to the portfolio archive page in the portfolio area to be displayed on your homepage.",
							"id" => $shortname."_home_portfolio_link_text",
							"std" => "View all our Work",
							"type" => "text" );
		
		$options[] = array( "name" => "Portfolio Area Link URL (optional)",
							"desc" => "Enter an custom URL for the portfolio archive page link.",
							"id" => $shortname."_home_portfolio_link_URL",
							"std" => "",
							"type" => "text" );		
		
		$options[] = array( "name" => "Number of Portfolio Items",
		                    "desc" => "Select the number of portfolio items that should appear in the portfolio area on the home page.",
		                    "id" => $shortname."_home_portfolio_entries",
		                    "std" => "4",
		                    "type" => "select",
		                    "options" => $other_entries);
		
		$options[] = array( "name" => __( 'Portfolio Order', 'woothemes' ),
		                    "desc" => __( 'Select which way you wish to order your portfolio.', 'woothemes' ),
		                    "id" => $shortname."_home_portfolio_order",
		                    "std" => "DESC",
							"type" => "select2",
							"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );
								
		/* Promotion Banner Slider */
		$options[] = array( "name" => "Promotions Slider",
							"type" => "subheading" );
					
		$options[] = array( "name" => "Number of Promotion items",
		                    "desc" => "Select the number of promotions that should appear in the promotions slider on the home page.",
		                    "id" => $shortname."_home_promotion_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries);
		
		$options[] = array( "name" => __( 'Promotion items order', 'woothemes' ),
		                    "desc" => __( 'Select which way you wish to order your promotions.', 'woothemes' ),
		                    "id" => $shortname."_home_promotion_order",
		                    "std" => "DESC",
							"type" => "select2",
							"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );
                    
		/* Testimonials */

		$options[] = array( "name" => "Feedback Area",
							"type" => "subheading" );
		
		$options[] = array( "name" => "Homepage Feedback Heading",
                   			"desc" => "Enter a heading for the feedback area.",
                   			"id" => $shortname."_home_feedback_heading",
                   			"std" => 'Feedback',
                   			"type" => "text" );
                    
        $options[] = array( "name" => "Homepage Feedback Sub Heading",
                    		"desc" => "Enter a sub-heading for the feedback area",
                    		"id" => $shortname."_home_feedback_sub",
                    		"std" => 'People love Merchant',
                    		"type" => "text" );
                    		
		$options[] = array( "name" => "All Feedback Link Text",
							"desc" => "Enter the text for the link to the feedback archive page in the feedback area to be displayed on your homepage.",
							"id" => $shortname."_home_feedback_link_text",
							"std" => "View all Feedback",
							"type" => "text" );
		
		$options[] = array( "name" => "All Feedback Link URL (optional)",
							"desc" => "Enter an custom URL for the feedback archive page link.",
							"id" => $shortname."_home_feedback_link_URL",
							"std" => "",
							"type" => "text" );	
                    
		$options[] = array( "name" => "Number of Feedback items",
		                    "desc" => "Select the number of features that should appear in the features area on the home page.",
		                    "id" => $shortname."_home_feedback_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries);
		
		$options[] = array( "name" => __( 'Feedback items order', 'woothemes' ),
		                    "desc" => __( 'Select which way you wish to order your features.', 'woothemes' ),
		                    "id" => $shortname."_home_feedback_order",
		                    "std" => "DESC",
							"type" => "select2",
							"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );
                    
		$options[] = array( "name" => "Content Area",
					"type" => "subheading" );
		
		$options[] = array( "name" => "Content Area Heading",
							"desc" => "Enter the heading for the content area to be displayed on your homepage.",
							"id" => $shortname."_content_area_heading",
							"std" => "Merchant News",
							"type" => "text" );
										
		$options[] = array( "name" => "Content Area Sub Heading",
		                    "desc" => "Enter the sub heading for the content area to be displayed on your homepage.",
		                    "id" => $shortname."_content_area_sub",
		                    "std" => 'Homepage content section',
		                    "type" => "text" );
		                    
		$options[] = array( "name" => "Content Area Link Text",
							"desc" => "Enter the text for the link to the blog archive page.",
							"id" => $shortname."_content_area_link_text",
							"std" => "View all our blog posts",
							"type" => "text" );
		
		$options[] = array( "name" => "Content Area Link URL (optional)",
							"desc" => "Enter an custom URL for the blog archive page link.",
							"id" => $shortname."_content_area_link_URL",
							"std" => "",
							"type" => "text" );		
						
		$options[] = array( "name" => "Content Area Content",
		                    "desc" => "Choose to display either content posts or a page in the content area.",
		                    "id" => $shortname."_content_area_content",
		                    "std" => "blog",
							"type" => "select2",
							"options" => array( 'blog' => 'Blog Posts', 'page' => 'Page Content' ) );
							
		$options[] = array( "name" => "Number of Blog posts",
		                    "desc" => "Select the number of blog posts that should appear in the blog area on the home page.",
		                    "id" => $shortname."_content_area_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries); 
		
		$options[] = array( "name" => "Page Content",
		                    "desc" => "Select the page to display in the blog area.",
		                    "id" => $shortname."_content_area_page",
		                    "std" => "",
		                    "type" => "select2",
		                    "options" => $woo_pages_raw);
		                    
		$options[] = array( "name" => "Blog Area",
					"type" => "subheading" );

		$options[] = array( "name" => "Blog Area Heading",
							"desc" => "Enter the heading for the blog area to be displayed on your homepage.",
							"id" => $shortname."_blog_area_heading",
							"std" => "Some of our Blog Posts",
							"type" => "text" );
												
		$options[] = array( "name" => "Blog Area Sub Heading",
		                    "desc" => "Enter the sub heading for the blog area to be displayed on your homepage.",
		                    "id" => $shortname."_blog_area_sub",
		                    "std" => 'A horizontal blog layout',
		                    "type" => "text" );
		
		$options[] = array( "name" => "Blog Area Link Text",
							"desc" => "Enter the text for the link to the blog archive page in the features area to be displayed on your homepage.",
							"id" => $shortname."_blog_area_link_text",
							"std" => "View all our blog posts",
							"type" => "text" );
		
		$options[] = array( "name" => "Blog Area Link URL (optional)",
							"desc" => "Enter an custom URL for the blog archive page link.",
							"id" => $shortname."_blog_area_link_URL",
							"std" => "",
							"type" => "text" );
		
		$options[] = array( "name" => "Number of Blog posts",
		                    "desc" => "Select the number of blog posts that should appear in the blog area on the home page.",
		                    "id" => $shortname."_blog_area_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries); 
		
		$options[] = array( "name" => "Blog Area Thumbnail Image Dimensions",
							"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
							"id" => $shortname."_blog_image_dimensions",
							"std" => "",
							"type" => array(
											array(  'id' => $shortname. '_blog_thumb_w',
													'type' => 'text',
													'std' => 215,
													'meta' => 'Width'),
											array(  'id' => $shortname. '_blog_thumb_h',
													'type' => 'text',
													'std' => 120,
													'meta' => 'Height')
										  ));
		
		$options[] = array( "name" => "Blog Area Thumbnail Alignment",
							"desc" => "Select how to align your thumbnails with posts.",
							"id" => $shortname."_blog_thumb_align",
							"std" => "aligncenter",
							"type" => "select2",
							"options" => array( "alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"));
							
		$options[] = array(    "name" => __( 'Blog Area Order', 'woothemes' ),
		                    "desc" => __( 'Select which way you wish to order your blog posts.', 'woothemes' ),
		                    "id" => $shortname."_blog_area_order",
		                    "std" => "DESC",
							"type" => "select2",
							"options" => array("DESC" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );
		
		if ( is_woocommerce_activated() ) {					
		$options[] = array( "name" => "Shop Area",
							"type" => "subheading" );				
		
		$options[] = array( "name" => "Number of Products",
		                    "desc" => "Select the number of products that should appear in the shop area on the home page.",
		                    "id" => $shortname."_shop_area_entries",
		                    "std" => "3",
		                    "type" => "select",
		                    "options" => $other_entries);
		                    
		$options[] = array( "name" => "Shop Area Title Text",
							"desc" => "Enter the title for the shop area to be displayed on your homepage.",
							"id" => $shortname."_shop_area_title",
							"std" => "New in store",
							"type" => "text" );
												
		$options[] = array( "name" => "Shop Area Message",
		                    "desc" => "Enter the message for the shop area to be displayed on your homepage.",
		                    "id" => $shortname."_shop_area_message",
		                    "std" => 'Take a look at our new stock',
		                    "type" => "textarea" );
		
		$options[] = array( "name" => "Shop Area Link Text",
							"desc" => "Enter the text for the link to the products archive page in the shop area to be displayed on your homepage.",
							"id" => $shortname."_shop_area_link_text",
							"std" => "View all our products",
							"class" => "last",
							"type" => "text" );
		}
							
		/* Portfolio */
		
		$options[] = array( "name" => __( 'Portfolio Settings', 'woothemes' ),
		                    "icon" => "portfolio",
							"type" => "heading");
							
		$options[] = array( "name" => __( 'Portfolio Items URL Base', 'woothemes' ),
								"desc" => sprintf( __( 'The base of all portfolio item URLs (re-save the %s after changing this setting).', 'woothemes' ), '<a href="' . admin_url( 'options-permalink.php' ) . '">' . __( 'Permalinks', 'woothemes' ) . '</a>' ),
								"id" => $shortname."_portfolioitems_rewrite",
								"std" => "portfolio-items",
								"type" => "text");
								
		$options[] = array( "name" => __( 'Exclude Galleries from the Portfolio Navigation', 'woothemes' ),
								"desc" => __( 'Optionally exclude portfolio galleries from the portfolio gallery navigation switcher. Place the gallery slugs here, separated by commas <br />(eg: one, two, three)', 'woothemes' ),
								"id" => $shortname."_portfolio_excludenav",
								"std" => "",
								"type" => "text");
		
		$options[] = array( "name" => __( 'Exclude Portfolio Items from Search Results', 'woothemes' ),
							"desc" => __( 'Exclude portfolio items from results when searching your website.', 'woothemes' ),
							"id" => $shortname."_portfolio_excludesearch",
							"std" => "false",
							"type" => "checkbox");
		
		$options[] = array( "name" => __( 'Portfolio Items Link To', 'woothemes' ),
		                    "desc" => __( 'Do the portfolio items link to the lightbox, or to the single portfolio item screen?', 'woothemes' ),
		                    "id" => $shortname."_portfolio_linkto",
		                    "std" => "post",
							"type" => "select2",
							"options" => array( 'lightbox' => __( 'Lightbox', 'woothemes' ), 'post' => __( 'Portfolio Item', 'woothemes' ) ) );	
		
		$options[] = array( "name" => __( 'Enable Pagination in Portfolio', 'woothemes' ),
							"desc" => __( 'Enable pagination in the portfolio section (disables JavaScript filtering by category)', 'woothemes' ),
							"id" => $shortname."_portfolio_enable_pagination",
							"std" => "false", 
							"class" => 'collapsed', 
							"type" => "checkbox");
							
		$options[] = array( "name" => __( 'Number of posts to display on "Portfolio" page template', 'woothemes' ),
								"desc" => __( 'The number of posts to display per page, when pagination is enabled, in the "Portfolio" page template.', 'woothemes' ),
								"id" => $shortname."_portfolio_posts_per_page",
								"std" => get_option( 'posts_per_page' ), 
								"class" => 'hidden last', 
								"type" => "text");

		/* Dynamic Images */
		$options[] = array( 'name' => __( 'Dynamic Images', 'woothemes' ),
			'type' => 'heading',
			'icon' => 'image' );

		$options[] = array( 'name' => __( 'Resizer Settings', 'woothemes' ),
			'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Dynamic Image Resizing', 'woothemes' ),
			'desc' => '',
			'id' => $shortname . '_wpthumb_notice',
			'std' => __( 'There are two alternative methods of dynamically resizing the thumbnails in the theme, <strong>WP Post Thumbnail</strong> or <strong>TimThumb - Custom Settings panel</strong>. We recommend using WP Post Thumbnail option.', 'woothemes' ),
			'type' => "info" );

		$options[] = array( 'name' => __( 'WP Post Thumbnail', 'woothemes' ),
			'desc' => __( 'Use WordPress post thumbnail to assign a post thumbnail. Will enable the <strong>Featured Image panel</strong> in your post sidebar where you can assign a post thumbnail.', 'woothemes' ),
			'id' => $shortname . '_post_image_support',
			'std' => 'true',
			'class' => "collapsed",
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'WP Post Thumbnail - Dynamic Image Resizing', 'woothemes' ),
			'desc' => __( 'The post thumbnail will be dynamically resized using native WP resize functionality. <em>(Requires PHP 5.2+)</em>', 'woothemes' ),
			'id' => $shortname . '_pis_resize',
			'std' => 'true',
			'class' => "hidden",
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'WP Post Thumbnail - Hard Crop', 'woothemes' ),
			'desc' => __( 'The post thumbnail will be cropped to match the target aspect ratio (only used if "Dynamic Image Resizing" is enabled).', 'woothemes' ),
			'id' => $shortname . '_pis_hard_crop',
			'std' => 'true',
			'class' => "hidden last",
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'TimThumb - Custom Settings Panel', 'woothemes' ),
			'desc' => sprintf( __( 'This will enable the %1$s (thumb.php) script which dynamically resizes images added through the <strong>custom settings panel below the post</strong>. Make sure your themes <em>cache</em> folder is writable. %2$s', 'woothemes' ), '<a href="http://code.google.com/p/timthumb/">TimThumb</a>', '<a href="http://www.woothemes.com/2008/10/troubleshooting-image-resizer-thumbphp/">Need help?</a>' ),
			'id' => $shortname . '_resize',
			'std' => 'true',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Automatic Image Thumbnail', 'woothemes' ),
			'desc' => __( 'If no thumbnail is specifified then the first uploaded image in the post is used.', 'woothemes' ),
			'id' => $shortname . '_auto_img',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Thumbnail Settings', 'woothemes' ),
			'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Thumbnail Image Dimensions', 'woothemes' ),
			'desc' => __( 'Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.', 'woothemes' ),
			'id' => $shortname . '_image_dimensions',
			'std' => '',
			'type' => array(
				array(  'id' => $shortname . '_thumb_w',
					'type' => 'text',
					'std' => 180,
					'meta' => __( 'Width', 'woothemes' ) ),
				array(  'id' => $shortname . '_thumb_h',
					'type' => 'text',
					'std' => 110,
					'meta' => __( 'Height', 'woothemes' ) )
			) );

		$options[] = array( 'name' => __( 'Thumbnail Alignment', 'woothemes' ),
			'desc' => __( 'Select how to align your thumbnails with posts.', 'woothemes' ),
			'id' => $shortname . '_thumb_align',
			'std' => 'alignright',
			'type' => 'select2',
			'options' => array( 'alignleft' => __( 'Left', 'woothemes' ), 'alignright' => __( 'Right', 'woothemes' ), 'aligncenter' => __( 'Center', 'woothemes' ) ) );

		$options[] = array( 'name' => 'Single Post - Show Thumbnail',
			'desc' => __( 'Show the thumbnail in the single post page.', 'woothemes' ),
			'id' => $shortname . '_thumb_single',
			'class' => 'collapsed',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Single Post - Thumbnail Dimensions', 'woothemes' ),
			'desc' => __( 'Enter an integer value i.e. 250 for the image size. Max width is 576.', 'woothemes' ),
			'id' => $shortname . '_image_dimensions',
			'std' => '',
			'class' => 'hidden last',
			'type' => array(
				array(  'id' => $shortname . '_single_w',
					'type' => 'text',
					'std' => 200,
					'meta' => __( 'Width', 'woothemes' ) ),
				array(  'id' => $shortname . '_single_h',
					'type' => 'text',
					'std' => 200,
					'meta' => __( 'Height', 'woothemes' ) )
			) );

		$options[] = array( 'name' => __( 'Single Post - Thumbnail Alignment', 'woothemes' ),
			'desc' => __( 'Select how to align your thumbnail with single posts.', 'woothemes' ),
			'id' => $shortname . '_thumb_single_align',
			'std' => 'alignright',
			'type' => 'select2',
			'class' => 'hidden',
			'options' => array( 'alignleft' => __( 'Left', 'woothemes' ), 'alignright' => __( 'Right', 'woothemes' ), 'aligncenter' => __( 'Center', 'woothemes' ) ) );

		$options[] = array( 'name' => __( 'Add thumbnail to RSS feed', 'woothemes' ),
			'desc' => __( 'Add the the image uploaded via your Custom Settings panel to your RSS feed', 'woothemes' ),
			'id' => $shortname . '_rss_thumb',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Enable Lightbox', 'woothemes' ),
					'desc' => __( 'Enable the PrettyPhoto lighbox script on images within your website\'s content.', 'woothemes' ),
					'id' => $shortname . '_enable_lightbox',
					'std' => 'false',
					'type' => 'checkbox' );

		/* Footer */
		$options[] = array( "name" => "Footer Customization",
							"type" => "heading",
							"icon" => "footer" );
		
		
		$url =  get_template_directory_uri() . '/functions/images/';
		$options[] = array( "name" => "Footer Widget Areas",
							"desc" => "Select how many footer widget areas you want to display.",
							"id" => $shortname."_footer_sidebars",
							"std" => "4",
							"type" => "images",
							"options" => array(
								'0' => $url . 'layout-off.png',
								'1' => $url . 'footer-widgets-1.png',
								'2' => $url . 'footer-widgets-2.png',
								'3' => $url . 'footer-widgets-3.png',
								'4' => $url . 'footer-widgets-4.png')
							);
		
		$options[] = array( "name" => "Custom Affiliate Link",
							"desc" => "Add an affiliate link to the WooThemes logo in the footer of the theme.",
							"id" => $shortname."_footer_aff_link",
							"std" => "",
							"type" => "text" );
		
		$options[] = array( "name" => "Enable Custom Footer (Left)",
							"desc" => "Activate to add the custom text below to the theme footer.",
							"id" => $shortname."_footer_left",
							"std" => "false",
							"type" => "checkbox" );
		
		$options[] = array( "name" => "Custom Text (Left)",
							"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
							"id" => $shortname."_footer_left_text",
							"std" => "",
							"type" => "textarea" );
		
		$options[] = array( "name" => "Enable Custom Footer (Right)",
							"desc" => "Activate to add the custom text below to the theme footer.",
							"id" => $shortname."_footer_right",
							"std" => "false",
							"type" => "checkbox" );
		
		$options[] = array( "name" => "Custom Text (Right)",
							"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
							"id" => $shortname."_footer_right_text",
							"std" => "",
							"type" => "textarea" );
		
		/* Subscribe & Connect */
		$options[] = array( 'name' => __( 'Subscribe & Connect', 'woothemes' ),
			'type' => 'heading',
			'icon' => 'connect' );

		$options[] = array( 'name' => __( 'S&C Setup', 'woothemes' ),
					'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Enable Subscribe & Connect - Single Post', 'woothemes' ),
			'desc' => sprintf( __( 'Enable the subscribe & connect area on single posts. You can also add this as a %1$s in your sidebar.', 'woothemes' ), '<a href="' . home_url() . '/wp-admin/widgets.php">widget</a>' ),
			'id' => $shortname . '_connect',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Subscribe Title', 'woothemes' ),
			'desc' => __( 'Enter the title to show in your subscribe & connect area.', 'woothemes' ),
			'id' => $shortname . '_connect_title',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Text', 'woothemes' ),
			'desc' => __( 'Change the default text in this area.', 'woothemes' ),
			'id' => $shortname . '_connect_content',
			'std' => '',
			'type' => 'textarea' );

		$options[] = array( 'name' => __( 'Enable Related Posts', 'woothemes' ),
			'desc' => __( 'Enable related posts in the subscribe area. Uses posts with the same <strong>tags</strong> to find related posts. Note: Will not show in the Subscribe widget.', 'woothemes' ),
			'id' => $shortname . '_connect_related',
			'std' => 'true',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Subscribe', 'woothemes' ),
					'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Subscribe By E-mail ID (Feedburner)', 'woothemes' ),
			'desc' => __( 'Enter your <a href="http://www.woothemes.com/tutorials/how-to-find-your-feedburner-id-for-email-subscription/">Feedburner ID</a> for the e-mail subscription form.', 'woothemes' ),
			'id' => $shortname . '_connect_newsletter_id',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Subscribe By E-mail to MailChimp', 'woothemes', 'woothemes' ),
			'desc' => __( 'If you have a MailChimp account you can enter the <a href="http://woochimp.heroku.com" target="_blank">MailChimp List Subscribe URL</a> to allow your users to subscribe to a MailChimp List.', 'woothemes' ),
			'id' => $shortname . '_connect_mailchimp_list_url',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Connect', 'woothemes' ),
					'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Enable RSS', 'woothemes' ),
			'desc' => __( 'Enable the subscribe and RSS icon.', 'woothemes' ),
			'id' => $shortname . '_connect_rss',
			'std' => 'true',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Twitter URL', 'woothemes' ),
			'desc' => __( 'Enter your  <a href="http://www.twitter.com/">Twitter</a> URL e.g. http://www.twitter.com/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_twitter',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Facebook URL', 'woothemes' ),
			'desc' => __( 'Enter your  <a href="http://www.facebook.com/">Facebook</a> URL e.g. http://www.facebook.com/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_facebook',
			'std' => '',
			'type' => 'text' );
			
		$options[] = array( 'name' => __( 'Dribbble URL', 'woothemes' ),
			'desc' => __( 'Enter your  <a href="http://www.dribbble.com/">Dribbble</a> URL e.g. http://www.dribbble.com/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_dribbble',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'YouTube URL', 'woothemes' ),
			'desc' => __( 'Enter your  <a href="http://www.youtube.com/">YouTube</a> URL e.g. http://www.youtube.com/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_youtube',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Flickr URL', 'woothemes' ),
			'desc' => __( 'Enter your  <a href="http://www.flickr.com/">Flickr</a> URL e.g. http://www.flickr.com/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_flickr',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'LinkedIn URL', 'woothemes' ),
			'desc' => __( 'Enter your  <a href="http://www.www.linkedin.com.com/">LinkedIn</a> URL e.g. http://www.linkedin.com/in/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_linkedin',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Delicious URL', 'woothemes' ),
			'desc' => __( 'Enter your <a href="http://www.delicious.com/">Delicious</a> URL e.g. http://www.delicious.com/woothemes', 'woothemes' ),
			'id' => $shortname . '_connect_delicious',
			'std' => '',
			'type' => 'text' );

		$options[] = array( 'name' => __( 'Google+ URL', 'woothemes' ),
			'desc' => __( 'Enter your <a href="http://plus.google.com/">Google+</a> URL e.g. https://plus.google.com/104560124403688998123/', 'woothemes' ),
			'id' => $shortname . '_connect_googleplus',
			'std' => '',
			'type' => 'text' );

		/* Advertising */
		$options[] = array( 'name' => __( 'Advertising', 'woothemes' ),
			'type' => 'heading',
			'icon' => "ads" );

		$options[] = array( 'name' => __( 'Top Ad (468x60px)', 'woothemes' ),
			'type' => 'subheading' );

		$options[] = array( 'name' => __( 'Enable Ad', 'woothemes' ),
			'desc' => __( 'Enable the ad space. Will only display if Layout Options > Header Search is not enabled.', 'woothemes' ),
			'id' => $shortname . '_ad_top',
			'std' => 'false',
			'type' => 'checkbox' );

		$options[] = array( 'name' => __( 'Adsense code', 'woothemes' ),
			'desc' => __( 'Enter your adsense code (or other ad network code) here.', 'woothemes' ),
			'id' => $shortname . '_ad_top_adsense',
			'std' => '',
			'type' => 'textarea' );

		$options[] = array( 'name' => __( 'Image Location', 'woothemes' ),
			'desc' => __( 'Enter the URL to the banner ad image location.', 'woothemes' ),
			'id' => $shortname . '_ad_top_image',
			'std' => "http://www.woothemes.com/ads/468x60b.jpg",
			'type' => 'upload' );

		$options[] = array( 'name' => __( 'Destination URL', 'woothemes' ),
			'desc' => __( 'Enter the URL where this banner ad points to.', 'woothemes' ),
			'id' => $shortname . '_ad_top_url',
			'std' => "http://www.woothemes.com",
			'type' => 'text' );
									
		/* Contact Template Settings */
		
		$options[] = array( 'name' => "Contact Page",
							'icon' => 'maps',
						    'type' => 'heading');    
		
		$options[] = array( 'name' => "Contact Information",
							'type' => 'subheading');
		
		$options[] = array( "name" => "Enable Contact Information Panel",
							"desc" => "Enable the contact informal panel",
							"id" => $shortname."_contact_panel",
							"std" => "false",
							"class" => 'collapsed',
							"type" => "checkbox" );
		
		$options[] = array( 'name' => "Your Twitter username",
							'desc' => "Enter your Twitter username. Example: woothemes",
							'id' => $shortname . '_contact_twitter',
							'std' => '',
							'type' => 'text' );
						    
		$options[] = array( 'name' => "Location Name",
							'desc' => "Enter the location name. Example: London Office",
							'id' => $shortname . '_contact_title',
							'std' => '',
							'type' => 'text' );
		
		$options[] = array( 'name' => "Location Address",
							'desc' => "Enter your company's address",
							'id' => $shortname . '_contact_address',
							'std' => '',
							'type' => "textarea" );
		
		$options[] = array( 'name' => "Telephone",
							'desc' => "Enter your telephone number",
							'id' => $shortname . '_contact_number',
							'std' => '',
							'type' => 'text' );
		
		$options[] = array( 'name' => "Fax",
							'desc' => "Enter your fax number",
							'id' => $shortname . '_contact_fax',
							'std' => '',
							'type' => 'text' );
		
		$options[] = array( 'name' => "Email Address",
							'desc' => "Enter your email address",
							'id' => $shortname . '_contact_email',
							'std' => '',
							'type' => 'text' );
		
		$options[] = array( "name" => "Enable Subscribe and Connect",
							"desc" => "Enable the subscribe and connect functionality on the contact page template",
							"id" => $shortname."_contact_subscribe_and_connect",
							"std" => "false",
							"type" => "checkbox" );
		
		$options[] = array( 'name' => "Maps",
							'type' => 'subheading');
							
		$options[] = array( 'name' => "Contact Form Google Maps Coordinates",
							'desc' => 'Enter your Google Map coordinates to display a map on the Contact Form page template and a link to it on the Contact Us widget. You can get these details from <a href="http://www.getlatlon.com/" target="_blank">Google Maps</a>',
							'id' => $shortname . '_contactform_map_coords',
							'std' => '',
							'type' => 'text' );
							
		$options[] = array( 'name' => "Disable Mousescroll",
							'desc' => "Turn off the mouse scroll action for all the Google Maps on the site. This could improve usability on your site.",
							'id' => $shortname . '_maps_scroll',
							'std' => '',
							'type' => 'checkbox');
		
		$options[] = array( 'name' => "Map Height",
							'desc' => "Height in pixels for the maps displayed on Single.php pages.",
							'id' => $shortname . '_maps_single_height',
							'std' => "250",
							'type' => 'text');
							
		$options[] = array( 'name' => "Default Map Zoom Level",
							'desc' => "Set this to adjust the default in the post & page edit backend.",
							'id' => $shortname . '_maps_default_mapzoom',
							'std' => "9",
							'type' => 'select2',
							'options' => $other_entries);
		
		$options[] = array( 'name' => "Default Map Type",
							'desc' => "Set this to the default rendered in the post backend.",
							'id' => $shortname . '_maps_default_maptype',
							'std' => 'G_NORMAL_MAP',
							'type' => 'select2',
							'options' => array( 'G_NORMAL_MAP' => 'Normal', 'G_SATELLITE_MAP' => 'Satellite','G_HYBRID_MAP' => 'Hybrid', 'G_PHYSICAL_MAP' => 'Terrain' ) );
		
		$options[] = array( 'name' => "Map Callout Text",
							'desc' => "Text or HTML that will be output when you click on the map marker for your location.",
							'id' => $shortname . '_maps_callout_text',
							'std' => "",
							'type' => 'textarea');

// Add extra options through function
if ( function_exists( "woo_options_add") )
	$options = woo_options_add($options);

if ( get_option( 'woo_template') != $options) update_option( 'woo_template',$options);
if ( get_option( 'woo_themename') != $themename) update_option( 'woo_themename',$themename);
if ( get_option( 'woo_shortname') != $shortname) update_option( 'woo_shortname',$shortname);
if ( get_option( 'woo_manual') != $manualurl) update_option( 'woo_manual',$manualurl);

// Woo Metabox Options
// Start name with underscore to hide custom key from the user
global $post;
$woo_metaboxes = array();

// Shown on both posts and pages


// Show only on specific post types or page

if ( ( get_post_type() == 'post') || get_post_type() == 'slide' || ( !get_post_type() ) ) {

	// TimThumb is enabled in options
	if ( get_option( 'woo_resize') == "true" ) {
	
		$woo_metaboxes[] = array (	'name' => "image",
									"label" => "Image",
									'type' => "upload",
									'desc' => "Upload an image or enter an URL." );

		$woo_metaboxes[] = array (	'name' => "_image_alignment",
									'std' => "Center",
									"label" => "Image Crop Alignment",
									'type' => 'select2',
									'desc' => "Select crop alignment for resized image",
									'options' => array(	"c" => "Center",
														"t" => "Top",
														"b" => "Bottom",
														"l" => "Left",
														"r" => "Right"));
	// TimThumb disabled in the options
	} else {
	
		$woo_metaboxes[] = array (	'name' => "_timthumb-info",
									"label" => "Image",
									'type' => "info",
									'desc' => "<strong>TimThumb</strong> is disabled. Use the <strong>Featured Image</strong> panel in the sidebar instead, or enable TimThumb in the options panel." );

	}

	$woo_metaboxes[] = array (  'name'  => "embed",
					            'std'  => '',
					            "label" => "Embed Code",
					            'type' => "textarea",
					            'desc' => "Enter the video embed code for your video (YouTube, Vimeo or similar)" );

} // End post

if ( get_post_type() == 'slide' || !get_post_type() ) {
	
	$woo_metaboxes[] = array (	"name" => "url",
								"label" => "Slide URL",
								"type" => "text",
								"desc" => "Enter an URL to link the slider title and image to a page e.g. http://yoursite.com/pagename/ (optional) ");

} // End Slide

if( get_post_type() == 'features' || !get_post_type() ){	

	$woo_metaboxes[] = array (	
					"name" => "feature_icon",
					"label" => "Features Icon",
					"type" => "upload",
					"desc" => "Upload icon for use with the Feature ara on the homepage (optimal size: 32x32px) (optional)"
				);
	 
	$woo_metaboxes[] = array (	
					"name" => "feature_excerpt",
					"label" => "Features Excerpt",
					"type" => "textarea",
					"desc" => "Enter the text to show in your Feature on your homepage. If nothing is specified, an excerpt of your post will be output."
				);
	
	$woo_metaboxes[] = array (	
					"name" => "feature_readmore",
					"std" => "",
					"label" => "Features URL",
					"type" => "text",
					"desc" => "Add an alternative URL for your Feature title link. By default it will link to your feature post."
				);

} // End features

if( get_post_type() == 'feedback' || !get_post_type()){
							
	$woo_metaboxes['feedback_author'] = array (	
								"name" => "feedback_author",
								"label" => __( 'Feedback Author', 'woothemes' ),
								"type" => "text",
								"desc" => __( 'Enter the name of the author of the feedback e.g. Joe Bloggs', 'woothemes' )
			);
 
	$woo_metaboxes['feedback_gravatar'] = array (	
								"name" => "feedback_gravatar",
								"label" => __( 'Feedback Gravatar Email', 'woothemes' ),
								"type" => "text",
								"desc" => __( '(optional) Enter the email address for the gravatar to be used e.g. guy@website.com', 'woothemes' )
			);
	
	$woo_metaboxes['feedback_website_title'] = array (	
								"name" => "feedback_website_title",
								"label" => __( 'Feedback Website Title', 'woothemes' ),
								"type" => "text",
								"desc" => __( '(optional) Enter the title of the website of the feedback author e.g. WooThemes', 'woothemes' )
			);
	
	$woo_metaboxes['feedback_url'] = array (	
								"name" => "feedback_url",
								"label" => __( 'Feedback URL', 'woothemes' ),
								"type" => "text",
								"desc" => __( '(optional) Enter the URL to the feedback author e.g. http://www.woothemes.com', 'woothemes' )
			);
							

} // End feedback

if ( ( get_post_type() == 'promotion' ) || ( ! get_post_type() ) ) {

    $woo_metaboxes[] = array ( 'name' => 'image',
    	'label' => __( 'Image', 'woothemes' ),
    	'type' => 'upload',
    	'desc' => __( 'Upload an image or enter an URL.', 'woothemes' ) );

    if ( get_option( 'woo_resize' ) == 'true' ) {
    	$woo_metaboxes[] = array ( 'name' => '_image_alignment',
    		'std' => 'c',
    		'label' => __( 'Image Crop Alignment', 'woothemes' ),
    		'type' => 'select2',
    		'desc' => __( 'Select crop alignment for resized image', 'woothemes' ),
    		'options' => array( 'c' => __( 'Center', 'woothemes' ),
    			't' => __( 'Top', 'woothemes' ),
    			'b' => __( 'Bottom', 'woothemes' ),
    			'l' => __( 'Left', 'woothemes' ),
    			'r' => __( 'Right', 'woothemes' ) ) );
    }

    $woo_metaboxes[] = array ( 'name' => '_button_text',
    	'label' => __( 'Call To Action Button Text', 'woothemes' ),
    	'type' => 'text',
    	'desc' => __( 'The text on your "call to action" button (leave empty to disable the button).', 'woothemes' ) );

    $woo_metaboxes[] = array ( 'name' => '_button_url',
    	'label' => __( 'Call To Action Button URL', 'woothemes' ),
    	'type' => 'text',
    	'desc' => __( 'The URL on your "call to action" button (leave empty to point to the promotion\'s detail screen).', 'woothemes' ) );

} // End Promotion

elseif ( get_post_type() == 'portfolio' || !get_post_type() ) {

	$woo_metaboxes[] = array (  "name"  => "embed",
					            "std"  => "",
					            "label" => __( "Embed Code", 'woothemes' ),
					            "type" => "textarea",
					            "desc" => __( "Enter the video embed code for your video (YouTube, Vimeo or similar)", 'woothemes' ) );


	$woo_metaboxes[] = array (	
					"name" => "_portfolio_url",
					"std" => "",
					"label" => "Portfolio URL",
					"type" => "text",
					"desc" => "Enter an alternative URL for your Portfolio item. By default it will link to your portfolio post or lightbox."
				);
	
	$woo_metaboxes['lightbox-url'] = array (	
								"name" => "lightbox-url",
								"label" => __( 'Lightbox URL', 'woothemes' ),
								"type" => "text",
								"desc" => sprintf( __( 'Enter an optional URL to show in the %s for this portfolio item.', 'woothemes' ), '<a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/">' . __( 'PrettyPhoto lightbox', 'woothemes' ) . '</a>' ) );

} // End portfolio

$woo_metaboxes[] = array (	'name' => "_layout",
							'std' => "normal",
							"label" => "Layout",
							'type' => "images",
							'desc' => "Select the layout you want on this specific post/page.",
							'options' => array(
										'layout-default' => $url . 'layout-off.png',
										'layout-full' => get_template_directory_uri() . '/functions/images/' . '1c.png',
										'layout-left-content' => get_template_directory_uri() . '/functions/images/' . '2cl.png',
										'layout-right-content' => get_template_directory_uri() . '/functions/images/' . '2cr.png'));

// Add extra metaboxes through function
if ( function_exists( "woo_metaboxes_add") )
	$woo_metaboxes = woo_metaboxes_add($woo_metaboxes);

if ( get_option( 'woo_custom_template' ) != $woo_metaboxes) update_option( 'woo_custom_template', $woo_metaboxes );

} // END woo_options()
} // END function_exists()

// Add options to admin_head
add_action( 'admin_head','woo_options' );

//Enable WooSEO on these Post types
$seo_post_types = array( 'post','page' );
define( "SEOPOSTTYPES", serialize($seo_post_types));

//Global options setup
add_action( 'init','woo_global_options' );
function woo_global_options(){
	// Populate WooThemes option in array for use in theme
	global $woo_options;
	$woo_options = get_option( 'woo_options' );
}

?>