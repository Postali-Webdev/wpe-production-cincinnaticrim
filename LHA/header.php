<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_passage;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_passage['disable_qode_seo'])) $disable_qode_seo = $qode_options_passage['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php
	$responsiveness = "yes";
	if (isset($qode_options_passage['responsiveness'])) $responsiveness = $qode_options_passage['responsiveness'];
	if($responsiveness != "no"):
	?>
	<meta name=viewport content="width=device-width,initial-scale=1">
	<?php 
	endif;
	?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	<?php if ($disable_qode_seo != "yes") { ?>
	<?php if($seo_description) { ?>
	<meta name="description" content="<?php echo $seo_description; ?>">
	<?php } else if($qode_options_passage['meta_description']){ ?>
	<meta name="description" content="<?php echo $qode_options_passage['meta_description'] ?>">
	<?php } ?>
	<?php if($seo_keywords) { ?>
	<meta name="keywords" content="<?php echo $seo_keywords; ?>">
	<?php } else if($qode_options_passage['meta_keywords']){ ?>
	<meta name="keywords" content="<?php echo $qode_options_passage['meta_keywords'] ?>">
	<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_passage['favicon_image']; ?>">

    <?php if (has_post_thumbnail()) {
    $attachment_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
    <link rel="preload" as="image" href="<?php echo $attachment_image; ?>">
    <link rel="preload" as="image" href="<?php echo $attachment_image; ?>.webp">
    <?php } ?>

    <link rel="preload" as="image" href="/wp-content/uploads/2018/09/content-header-blog-interior.jpg">
    <link rel="preload" as="image" href="/wp-content/uploads/2018/09/content-header-blog-interior.jpg.webp">

	<?php wp_head(); ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5H2XR3');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
    // Global Schema
    $global_schema = get_field('global_schema', 'options');
    if ( !empty($global_schema) ) :
        echo '<script type="application/ld+json">' . strip_tags($global_schema) . '</script>';
    endif;

    // Single Page Schema
    $single_schema = get_field('single_schema');
    if ( !empty($single_schema) ) :
        echo '<script type="application/ld+json">' . strip_tags($single_schema) . '</script>';
    endif;
?>

<!-- Global site tag (gtag.js) - Google Ads: 10862922622 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10862922622"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10862922622');
</script>
<!-- Google Ads Phone Snippet -->
<script>
  gtag('config', 'AW-10862922622/NYiTCNv_46YDEP6W7Lso', {
    'phone_conversion_number': '5133381890'
  });
</script>
<!-- End Google Ads Site Tags --> 
	
<?php if ( is_page_template( 'homepage.php' ) ) : ?>
<!-- Detect for touchscreen -->
<script>
jQuery(function($){
	// Touch Device Detection
	var isTouchDevice = 'ontouchstart' in document.documentElement;
	if( isTouchDevice ) {
		$('body').removeClass('no-touch');
	}
});
</script>
<?php endif; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H2XR3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
<?php
	$header_in_grid = false;
	if ($qode_options_passage['header_in_grid'] == "yes") $header_in_grid = true;

	$centered_logo = false;
	if (isset($qode_options_passage['center_logo_image'])){ if($qode_options_passage['center_logo_image'] == "yes") { $centered_logo = true; }};
?>
<div class="wrapper">
	

<!-- header search bar -->
<div class="header_top_bar">
	<div class="banner-utility">
        <div class="header_phone">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-phone') ) : ?><?php endif; ?>
        </div>
        <div class="header_search">
            <ul class="menu search">
                <li class="menu-item menu-item-search search-holder">
                    <form class="navbar-form-search" role="search" method="get" action="/">
                        <div class="search-form-container hdn" id="search-input-container">
                            <div class="search-input-group">
                                <div class="form-group">
                                <input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
                    </form>	
                </li>
            </ul>
        </div>
    </div>
</div>
	
<header>
    <div id="header-top" class="container">
        <div id="header-top_left">
            <div class="main-logo"><a href="<?php echo home_url(); ?>/" title="Luftman Heck and Associates"><img src="<?php echo $qode_options_passage['logo_image']; ?>" alt="Luftman Heck and Associates"/></a></div>
        </div>
        
        <div id="header-top_right">

            <div id="header-top_right_menu" class="mobile-nav">
                <?php
                    $args = array(
                        'container' => false,
                        'theme_location' => 'primary-nav'
                    );
                    wp_nav_menu( $args );
                ?>	
                <div id="header-top_mobile">
                    <div id="menu-icon" class="toggle-nav">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div>
                </div>
                <div class="text">menu</div>
            </div>

            <a id="header-top_right_chat" class="mobile-nav" href="/bradley-j-groene/">
                <img src="/wp-content/uploads/2024/05/about.svg" alt="About The Firm">
                <div class="text">about</div>
            </a>

            <a id="header-top_right_phone" class="mobile-nav" href="tel:5134685477">
                <img src="/wp-content/uploads/2024/05/phone.svg" alt="Give Us A Call">
                <div class="background"></div>
            </a>

            <a id="header-top_right_results" class="mobile-nav" href="/case-results/">
                <img src="/wp-content/uploads/2024/05/results.svg" alt="Our Results">
                <div class="text">results</div>
            </a>

            <div id="header-top_right_chat" class="mobile-nav"  onclick="window['Intaker'] && Intaker.openChat()">
                <img src="/wp-content/uploads/2024/05/chat.svg" alt="Chat with us">
                <div class="text">chat</div>
            </div>            
        </div>
    </div>
</header> 

	
	
<div class="content">
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$animation = get_post_meta($id, "qode_show-animation", true);

?>
			<?php if($qode_options_passage['page_transitions'] == "1" || $qode_options_passage['page_transitions'] == "2" || $qode_options_passage['page_transitions'] == "3" || $qode_options_passage['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">				
					<?php if($seo_title){ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php echo $seo_title; ?></div>
					<?php } else{ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>
					<?php } ?>
					<?php if($seo_description){ ?>
						<div class="seo_description"><?php echo $seo_description; ?></div>
					<?php } else if($qode_options_passage['meta_description']){?>
						<div class="seo_description"><?php echo $qode_options_passage['meta_description']; ?></div>
					<?php } ?>
					<?php if($seo_keywords){ ?>
						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>
					<?php }else if($qode_options_passage['meta_keywords']){?>
						<div class="seo_keywords"><?php echo $qode_options_passage['meta_keywords']; ?></div>
					<?php }?>
					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
				
			