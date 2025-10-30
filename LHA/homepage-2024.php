<?php 
/*
Template Name: Homepage 2024
*/ 
?>

<?php 
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
		
		
	<div class="full_width">

		<section class="banner">
            <div class="container">
                <div class="columns">
                    <div class="column-50 banner-text">
                        <div class="banner-content">
                            <h1><?php the_title(); ?></h1>
                            <span class="headline"><?php the_field('banner_headline'); ?></span>
                            <span class="cta"><?php the_field('banner_cta'); ?></span>
                            <div class="spacer-60"></div>
                            <div class="cta-block">
                                <a href="tel:513-338-1890" class="btn ibp">513-338-1890</a><a href="/contact/">Contact Us Online</a>
                            </div>
                            <div class="spacer-60"></div>
                        </div>
                    </div>

                    <div class="mobile-logo">
                        <img src="/wp-content/uploads/2018/09/logo.png" alt="Luftman Heck and Associates">
                    </div>

                    <div class="column-50 banner-img">
                        <?php 
                        $image = get_field('banner_image');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_1 blue">
            <div class="container">
                <div class="columns">
                    <div class="column-50">
                        <p class="section_title"><?php the_field('section_1_title'); ?></p>
                        <h2><?php the_field('section__1_headline'); ?></h2>
                        
                        <?php if( have_rows('section_1_tout_boxes') ): ?>
                        <div class="tout-boxes mobile">
                        <?php while( have_rows('section_1_tout_boxes') ): the_row(); ?>  
                            <div class="spacer-30"></div>
                            <div class="tout-box">
                                <p class="tout-headline"><?php the_sub_field('section_headline'); ?></p>
                                <?php the_sub_field('section_content'); ?>
                                <a href="<?php the_sub_field('section_link'); ?>" class="highlight-link"><?php the_sub_field('section_link_text'); ?></a>
                            </div>
                        
                        <?php endwhile; ?>
                        </div>
                        <?php endif; ?> 

                        <?php the_field('section__1_copy'); ?>
                        <div class="cta-block">
                            <a href="tel:513-338-1890" class="btn ibp">513-338-1890</a><a href="/contact/">Contact Us Online</a>
                        </div>
                    </div>
                    <div class="column-50 touts">

                    <?php if( have_rows('section_1_tout_boxes') ): ?>
                    <?php while( have_rows('section_1_tout_boxes') ): the_row(); ?>  
                    
                        <div class="tout-box">
                            <p class="tout-headline"><?php the_sub_field('section_headline'); ?></p>
                            <?php the_sub_field('section_content'); ?>
                            <a href="<?php the_sub_field('section_link'); ?>" class="highlight-link"><?php the_sub_field('section_link_text'); ?></a>
                        </div>
                    
                    <?php endwhile; ?>
                    <?php endif; ?> 

                    </div>
                </div>
                <div class="spacer-60"></div>
                <div class="columns">
                    <div class="column-33">
                        <?php 
                        $image = get_field('section_1_attorney_photo');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="column-66 block">
                        <h3><?php the_field('section_1_attorney_bio_headline'); ?></h3>
                        <?php 
                        $atty_name = get_field('section_1_attorney_name');
                        $arr = explode(' ',trim($atty_name));
                        ?>
                        <p class="accent green"><?php echo $atty_name; ?></p>
                        <?php the_field('section_1_attorney_bio'); ?>
                        <a href="<?php the_field('attorney_bio_link'); ?>" class="btn">Read <?php echo $arr[0]; ?>'s Bio</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_2 blue awards-box">
            <div class="container">
                <div class="columns tout-box awards">
                    <div class="column-25">
                        <p class="tout-headline"><?php the_field('awards_block_headline'); ?></p>
                    </div>
                    <div class="column-75">
                    <?php if( have_rows('awards') ): ?>
                    <?php while( have_rows('awards') ): the_row(); ?>  
                    
                    <?php 
                    $image = get_sub_field('award');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                </div>
            </div>
        </section>

        <section class="section_3 blue no-top">
            <div class="container">
                <div class="columns">
                    <div class="column-full centered center">
                        <h3><?php the_field('section_3_headline'); ?></h3>
                    </div>
                </div>
                <div class="spacer-60 mobile"></div>
                <div class="columns">
                <?php if( have_rows('section_3_top_content_blocks') ): ?>
                <?php while( have_rows('section_3_top_content_blocks') ): the_row(); ?>  
                
                    <div class="column-50">
                        <p class="accent"><?php the_sub_field('block_headline'); ?></p>
                        <p><?php the_sub_field('block_copy'); ?></p>
                    </div>
                
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </section>

        <section class="section_4 blue no-top">
            <div class="container">
                <div class="columns">
                    <div class="column-50 centered center">
                        <h4><?php the_field('section_4_headline_copy'); ?></h4>
                        <p><?php the_field('section_4_intro_copy'); ?></p>
                    </div>
                </div>
                <div class="spacer-30"></div>
                <div class="columns">
                    <div class="column-50 center results">
                    <p class="accent">NOTEWORTHY RESULTS</p>
                    <?php if( have_rows('case_results') ): ?>
                    <?php while( have_rows('case_results') ): the_row(); ?>  
                        <?php $post_object = get_sub_field('result'); ?>
                        <?php if( $post_object ): ?>
                            <?php // override $post
                            $post = $post_object;
                            setup_postdata( $post );
                            ?>

                            <a class="results-box" href="<?php the_permalink(); ?>">
                                <div class="result-headline">
                                    <?php the_title(); ?>
                                </div>
                                <div class="result-link"></div>
                            </a>

                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>
                    
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    <div class="spacer-60"></div>
                    <a href="/case-results/" class="btn">More Successful Cases</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_5 blue no-top">
            <div class="container">
                <div class="columns">
                    <div class="column-full centered center">
                        <h3><?php the_field('section_5_headline'); ?></h3>
                    </div>
                </div>
                <div class="spacer-60"></div>
                <div class="columns center">

                    <?php if( have_rows('practice_areas') ): ?>
                    <?php while( have_rows('practice_areas') ): the_row(); ?>  
                    
                        <a class="column-20 practice-area" href="<?php the_sub_field('practice_area'); ?>">
                            <p><?php the_sub_field('practice_area_name'); ?></p>
                        </a>
                    
                    <?php endwhile; ?>
                    <?php endif; ?> 

                    <div class="spacer-60"></div>
                    <a href="/practice-areas/" class="btn">VIEW ALL PRACTICE AREAS</a>

                </div>
            </div>
        </section>

        <section class="section_6 blue no-top">
            <div class="container">
                <div class="columns">
                    <div class="column-full centered center">
                        <p class="accent green"><?php the_field('section_6_section_headline'); ?></p>
                    </div>
                </div>
                <div class="spacer-30"></div>
                <div class="columns center">

                    <?php if( have_rows('section_6_review_logos') ): ?>
                    <div class="review-logos">
                    <?php while( have_rows('section_6_review_logos') ): the_row(); ?>  

                    <?php 
                    $image = get_sub_field('review_logo');
                    if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="review-logo" />
                    <?php endif; ?>
                    
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?> 

                </div>
            </div>
        </section>

        <section class="section_6_quote">
            <div class="container">
                <div class="columns">
                    <div class="column-66 centered center">
                        <p><?php the_field('section_6_review_text'); ?></p>
                    </div>
                </div>
            </div>
            <div class="section-link">
                <a href="/testimonials/" class="highlight-link">View More Client Reviews</a>
            </div>
        </section>

        <section class="section_7 blue">
            <div class="container">
                <div class="columns">
                    <div class="column-66 centered center">
                        <h3><?php the_field('section_7_section_headline'); ?></h3>
                        <p><?php the_field('section_7_intro_text'); ?></p>
                    </div>
                    <div class="spacer-30"></div>
                    <div class="column-50 block">
                        <?php the_field('section_7_left_column_copy'); ?>
                    </div>
                    <div class="column-50">
                        <?php 
                        $image = get_field('section_7_right_column_image');
                        if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="map-img" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_8 white">
            <div class="container">
                <div class="columns">
                    <div class="column-50 block">
                        <?php the_field('section_8_left_column_copy'); ?>
                        <div class="cta-block">
                            <a href="tel:513-338-1890" class="btn ibp">513-338-1890</a><a href="/contact/">Contact Us Online</a>
                        </div>
                    </div>
                    <div class="column-50 second">
                        <?php 
                        $image = get_field('section_8_right_column_image');
                        if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                        <?php endif; ?>
                    </div>
                    <div class="spacer-60"></div>
                    <div class="column-66 centered center">
                        <?php the_field('section_8_bottom_text'); ?>
                        <div class="spacer-30 mobile"></div>
                        <div class="map-address">
                            <div class="map">
                                <iframe src="<?php the_field('section_8_map_embed'); ?>" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="address">
                                <?php the_field('section_8_map_address'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_9 blue">
            <div class="container">
                <div class="columns">
                    <div class="column-66 center">
                        <h3><?php the_field('section_9_section_headline'); ?></h3>
                        <div class="spacer-30"></div>
                        <?php if( have_rows('section_9_faqs') ): ?>
                        <?php while( have_rows('section_9_faqs') ): the_row(); ?>  
                        
                            <p class="accent"><?php the_sub_field('faq_question'); ?></p>
                            <?php the_sub_field('faq_answer'); ?>
                        
                        <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </section>

        <section class="section_10_quote blue">
            <div class="container">
                <div class="columns">
                    <div class="column-66 centered center">
                        <p class="accent green">CLIENT TESTIMONIAL</p>
                        <p><?php the_field('section_10_review_text'); ?></p>
                    </div>
                </div>
            </div>
            <div class="section-link">
                <a href="/testimonials/" class="highlight-link">View More Client Reivews</a>
            </div>
        </section>

	</div>
  
	<?php get_footer(); ?>