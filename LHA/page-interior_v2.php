<?php 
/* Template Name: Interior (Updated) */ 
 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_passage['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_passage['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_passage['title_image'];
}

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_passage['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

?>
	<?php get_header(); ?>
    <div class="title animate" style="background-image:url(<?php the_field('background_image'); ?>);">
        <div class="container" id="header-panel">
            <div class="container_inner clearfix">
                <div class="spacer-15">&nbsp;</div>
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                <div class="spacer-15">&nbsp;</div>
                <div class="header-main">
                    <p class="subtitle gold"><?php the_field('subtitle'); ?></p>
                    <h1><?php the_field('title'); ?></h1>
                    <p><?php the_field('intro'); ?></p>
                </div>
            </div>
        </div>
    </div>
		
	<div class="full_width">
		<div class="container" id="panel1">
            <div class="container_inner clearfix">
                <p><?php the_field('p1_intro'); ?></p>
                <p class="big-text"><?php the_field('p1_cta'); ?></p>
                <a class="button" href="tel:513-338-1890" title="Call LHA Today">(513) 338-1890</a>
                <div class="spacer-15">&nbsp;</div>
            </div>
        </div>

        <div class="container" id="panel2">
            <div class="container_inner clearfix">
                <div class="location">
                <h2><?php the_field('p2_title'); ?></h2>
                    <?php if ( have_rows('locations') ): ?>
                        <div class="locations">
                        <?php while ( have_rows('locations') ): the_row(); 
                            $name = get_sub_field('location');
                            $desc = get_sub_field('description');
                            $address = get_sub_field('address');
                            $phone = get_sub_field('main_phone');
                            $directions = get_sub_field('directions_link');
                            $map = get_sub_field('map_embed');
                        ?>
                            <div class="locations_block">
                                <div class="upper">
                                    <div class="upper_left">
                                        <h3><?php echo $name; ?></h3>
                                        <p><?php echo $desc; ?></p>
                                        <div class="details">
                                            <div class="contact">
                                                <span class="icon location-pin"><?php echo do_shortcode('[svg-icons custom_icon="map-pin-icon" wrap="i"]'); ?></span>
                                                <div class="contact_details">
                                                    <p><?php echo $address; ?></p>
                                                    <a href="tel:<?php echo $phone; ?>" title="Call <?php echo $name; ?>"><?php echo $phone; ?></a>
                                                </div>
                                            </div>
                                            <div class="directions">
                                                <a href="<?php echo $directions; ?>" title="Driving directions to <?php echo $name; ?>">Driving Directions »</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="upper_right">
                                        <?php echo $map; ?>
                                    </div>
                                </div>
                                <?php if ( have_rows('additional_phones') ): ?>
                                <div class="lower">
                                    <p>Other important phone numbers include:</p>
                                    <div class="spacer-15">&nbsp;</div>
                                    <div class="column-list">
                                        <?php while ( have_rows('additional_phones')): the_row();
                                            $label = get_sub_field('label');
                                            $add_phone = get_sub_field('add_phone');
                                        ?>
                                        <div class="column-list_item">
                                            <p><span class="gold"><strong><?php echo $label; ?></strong></span> – <a href="tel:<?php echo $add_phone; ?>" title="Call <?php echo $label; ?>"><?php echo $add_phone; ?></a></p>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="container" id="panel3">
            <div class="container_inner clearfix">
                <h2><?php the_field('p3_title'); ?></h2>
                <p><?php the_field('p3_intro'); ?></p>
                <?php if ( have_rows('faq') ): ?>
                    <div class="accordions">
                        <?php while ( have_rows('faq')): the_row(); 
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');
                        ?>
                        <div class="accordions_title">
                            <h3><?php echo $question; ?></h3><span class="icon plus"></span>
                        </div>
                        <div class="accordions_content">
                            <?php echo $answer; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="container" id="panel4">
            <div class="container_inner clearfix">
                <h2><?php the_field('p4_title'); ?></h2>
                <p><?php the_field('p4_intro'); ?></p>
                <div class="cases">
                    <div class="cases_left">
                        <?php if ( have_rows('common_cases') ): ?>
                            <p><strong>Common Cases Include:</strong></p>
                            <div class="block-list">
                                <?php while ( have_rows('common_cases')): the_row(); 
                                    $case = get_sub_field('case');
                                    $link = get_sub_field('page_link');
                                ?>
                                    <a class="block-list_item" href="<?php echo $link; ?>" title="<?php echo $case; ?>">
                                        <span class="text"><?php echo $case; ?></span>
                                        <span class="icon arrow"><?php echo do_shortcode('[svg-icons custom_icon="right-arrow" wrap="i"]'); ?></span>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="cases_right">
                        <?php if ( have_rows('additional_cases') ): ?>
                            <p><strong>Other Cases We Handle:</strong></p>
                            <ul class="link-list">
                                <?php while ( have_rows('additional_cases')): the_row(); 
                                    $case = get_sub_field('case');
                                    $link = get_sub_field('page_link');
                                ?>
                                <li class="link-list_item">
                                    <a href="<?php echo $link; ?>" title="<?php echo $case; ?>"><?php echo $case; ?></a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <?php the_field('p4_content'); ?>
            </div>
        </div>
		
		<a href="#" class="to-top-btn"></a>
	</div>
	<?php get_footer(); ?>	