<?php 
/*
Template Name: Attorney Bio (Updated)
*/ 

// ACF Fields
$bio_image = get_field('bio_headshot');
$acf_banner = get_field('banner_background_image');
$banner_url = $acf_banner ? $acf_banner['url'] : '/wp-content/uploads/2023/02/content-header-attorney-profile-city.jpg';

get_header(); ?>

<main id="page">
    
	<div class="in-page-nav-container">
		<p class="nav-title">On This Page</p>
		<div class="in-page-nav-dropdown">
			<a href="#main-content" class="nav-link">Main Content</a>
            <?php if( have_rows('attorney_awards') ) : ?>
			    <a href="#awards" class="nav-link">Awards</a>
            <?php endif; ?>
		
		</div>
	</div>
	
    <section id="hero" style="background-image: url('<?php esc_html_e($banner_url); ?>');">
        <div class="container">
            <div class="columns">
                <div class="column-full breadcrumb-container">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                </div>
                <div class="column-full">
                    <div class="column-50 direction-col">
                        <p class="title_subheader">About the Firm</p>
                        <h1><?php esc_html_e( get_field('first_name') . ' ' . get_field('last_name') ); ?></h1>
                        <div class="title_subtitle">
                            <p>To schedule a free and confidential consultion with attorney <?php the_field('first_name'); ?>, call <a href="tel:<?php the_field('phone'); ?>"><?php esc_html_e( readable_phone_numb( get_field('phone') ) ); ?></a>.</p>
                        </div>
                    </div>
                    <div class="column-50 image-container">
                        <?php if( $bio_image ) : ?>
                            <img src="<?php esc_html_e( $bio_image['url'] ); ?>" alt="<?php esc_html_e( $bio_image['alt'] ); ?>" title="<?php esc_html_e( $bio_image['title'] ); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="body">
        <span id="practice_area_lower_content"></span>
        <div class="container">
            <div class="columns" id="main-content">
                <?php if( have_rows('aside_qualifications') ) : ?>
                <aside class="column-25 direction-col">
                    <div class="attorney_bio_accordion">
                        <div class="accordion_holder accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset">
                        <?php while( have_rows('aside_qualifications') ) : the_row(); ?>
                            <div class="accordion_item">
                                <h5 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom"><?php the_sub_field('title') ?></h5>
                                <div class="accordion_content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
                                    <div class="accordion_content_inner">
                                        <?php the_sub_field('copy'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    </div>
                </aside>
                <?php endif; ?>
                <div class="column-75 direction-col">
                    <?php the_field('primary_bio_copy'); ?>
                    <?php if( have_rows('attorney_awards') ) : ?>
                        <p><span class="subheader_gold"><?php esc_html_e( get_field('first_name') . ' ' . get_field('last_name') ); ?> Awards</span></p>
                        <div id="awards" class="award-grid">
                            <?php while( have_rows('attorney_awards') ) : the_row(); 
                                $award_image = get_sub_field('award'); ?>
                                <img src="<?php esc_html_e( $award_image['url'] ); ?>" alt="<?php esc_html_e( $award_image['alt'] ); ?>" title="<?php esc_html_e( $award_image['title'] ); ?>" class="award">
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>






<?php get_footer(); ?>