<?php
/*
Template Name: Practice Area (New)
*/ ?>

<?php 
//ACF Fields
$banner_img = get_field('hero_background_image');
$icon_img = get_field('hero_banner_icon');
$featured_award = get_field('p2_best_lawyer_award');

$featured_award_url = $featured_award['url'] ? $featured_award['url'] : '/wp-content/uploads/2022/02/Lawyer-of-the-Year-Contemporary-Logo.png';
$featured_award_alt = $featured_award['alt'] ? $featured_award['alt'] : "Ben Luftman's Best Lawyers award";
$featured_award_title = $featured_award['title'] ? $featured_award['title'] : "Ben Luftman's Best Lawyers award";

$banner_cta_group = get_field('banner_cta_group');
$banner_cta_copy = $banner_cta_group['copy'];
$banner_cta_phone = $banner_cta_group['phone_number'];
$banner_cta_contact = $banner_cta_group['contact_page'];

get_header(); ?>

<div class="title">
    <div class="background-image">
        <?php echo wp_get_attachment_image($banner_img['ID'], 'full', '', ['class' => 'banner-img']) ?>
    </div>
    <div class="container">
        <div class="container_inner clearfix">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            <span class="title_subheader">Practice Areas</span>
            <h1><?php the_field('hero_banner_title'); ?></h1>
            <div class="header-sub-title">
                <?php the_field('banner_intro_cta_text') ?> 
            </div>

            <?php if( $banner_cta_copy && $banner_cta_phone && $banner_cta_contact ) : ?>
                <div class="cta-group-wrapper">
                    <?php if( $banner_cta_copy ) : ?>
                        <div class="cta-group cta-copy">
                            <?php echo $banner_cta_copy; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $banner_cta_phone ) : ?>
                        <div class="cta-group cta-phone">
                            <p class="subheader_gold">Call Today</p>
                            <a href="tel:<?php echo $banner_cta_phone; ?>"><?php echo $banner_cta_phone; ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if( $banner_cta_contact ) : ?>
                        <div class="cta-group cta-contact">
                            <p class="subheader_gold">Contact us Online</p>
                            <a href="<?php echo $banner_cta_contact; ?>">Online Form</a>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else : ?>

                <div class="cta-group-wrapper">
                    <div class="cta-group cta-copy">
                        <p>If you have been charged with a crime, contact us TODAY for a <span>FREE consultation</span></p>
                    </div>
                    <div class="cta-group cta-phone">
                        <p class="subheader_gold">Call Today</p>
                        <a href="tel:6145003836">(614) 500-3836</a>
                    </div>
                    <div class="cta-group cta-contact">
                        <p class="subheader_gold">Contact us Online</p>
                        <a href="/contact/">Online Form</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="full_width">
    <div id="practice_area_intro" class="textpanel">
        <div class="container_inner">
            <div class="two_columns_66_33 clearfix">
                <div class="column1">
                    <div class="column_inner">
                        <div class="practice-intro-text"><?php the_field('p1_intro_text'); ?></div>
                    </div>
                </div>

                <div class="column2">
                    <div class="column_inner">
                        <?php if(get_field('add_on_page_cta')) { ?>
                        <p class="subheader_gold attention">ATTENTION</p>
                        <div class="callout_box">
                            <p><?php the_field('p1_cta_intro_text'); ?></p>
                            <p><a class="ibp" title="Luftman, Heck and Associates" href="tel:<?php the_field('p1_cta_phone_number'); ?>"><?php the_field('p1_cta_phone_number'); ?></a></p>
                            <div class="box-separator"></div>
                            <p><?php the_field('p1_cta_bottom_text'); ?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="practice_area_awards" class="textpanel">
        <div class="container_inner">
            <div class="content_width_75">
                <a href="<?php the_field('p2_best_lawyer_link'); ?>"> 
                    <img src="<?php esc_html_e($featured_award_url); ?>" alt="<?php esc_html_e($featured_award_alt); ?>" title="<?php esc_html_e($featured_award_title); ?>">
                </a>
                
                <?php $all_awards = get_field('p2_all_awards'); 
                if( $all_awards ) : 
                    $all_awards_mobile_url = $all_awards['mobile_version'] ? $all_awards['mobile_version'] : '/wp-content/uploads/2018/03/dui-awards-mobile.png';
                    $all_awards_desktop_url = $all_awards['desktop_version'] ? $all_awards['desktop_version'] : '/wp-content/uploads/2018/03/dui-awards.png'; ?>
                    <img src="<?php esc_html_e( $all_awards_mobile_url ); ?>" alt="attorney award icons" title="attorney award icons" class="mobile_show">
                    <img src="<?php esc_html_e( $all_awards_desktop_url ); ?>" alt="attorney award icons" title="attorney award icons" class="mobile_hide">
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="practice_area_content" class="textpanel">
        <div class="container_inner">
            <div class="two_columns_66_33 clearfix">
                <?php if( have_rows('p3_main_body') ) : ?>
                <div class="column1">
                    <div class="column_inner"> 
                        
                        <?php while( have_rows('p3_main_body') ) : the_row(); ?>    
                            <?php if( get_row_layout() === 'section_title' ) :
                                //prepare string for anchor link
                                $anchor_link = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', get_sub_field('section_title_h2')));
                                $anchor_link = str_replace('--', '-', $anchor_link);
                                ?>
                                <h2 id="<?php echo strtolower($anchor_link); ?>"><?php the_sub_field('section_title_h2'); ?></h2>
                            <?php endif; ?>

                            <?php if( get_row_layout() === 'copy_block' ) : ?> 
                                <div class="copy-block"><?php the_sub_field('copy'); ?></div>
                            <?php endif; ?>

                            <?php if( get_row_layout() === 'cta_block' ) : ?>
                                <div class="contact_tab">    
                                    <div class="row1">
                                        <?php the_sub_field('cta_text'); ?>
                                    </div>
                                    
                                    <div class="row2">
                                        <div class="cta-group cta-phone">
                                            <p class="subheader_gold">Call Today</p>
                                            <a href="tel:6145003836">(614) 500-3836</a>
                                        </div>
                                        <div class="cta-group cta-contact">
                                            <p class="subheader_gold">Contact us Online</p>
                                            <a href="/contact/">Online Form</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if( get_row_layout() === 'video_embed') : ?>
                                <div id="schema-videoobject" class="video-container"><iframe title="<?php the_sub_field('video_title') ?>" src="<?php the_sub_field('youtube_embed_url'); ?>" width="100%" height="420" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
                            <?php endif; ?>

                            <?php if( get_row_layout() === 'accordions_block' ) : ?>
                                <div class="accordions-wrapper">
                                    <?php while ( have_rows('accordions')): the_row(); 
                                        $title = get_sub_field('title');
                                        $copy = get_sub_field('copy');
                                    ?>
                                    <div class="accordions">
                                        <div class="accordions_title">
                                            <h3><?php echo $title; ?></h3>
                                        </div>
                                        <div class="accordions_content">
                                            <?php echo $copy; ?>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( get_row_layout() === 'resource_links_block' ) : ?>
                                <div class="links-wrapper">
                                    <?php while( have_rows('links') ) : the_row(); $link = get_sub_field('link'); ?>
                                        <div class="link">
                                            <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url'] ?>"><?php echo $link['title']; ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( get_row_layout() === 'attorney_callout' ) : 
                                $image = get_sub_field('image');
                                $name = get_sub_field('attorney_name');
                                $title = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                $copy = get_sub_field('copy');
                                $link = get_sub_field('link');
                                ?>
                                <div class="attorney-callout">
                                    <div class="column1">
                                        <?php if( $image) echo wp_get_attachment_image($image['ID'], 'full'); ?>
                                        <p class="attorney-name"><?php echo $name; ?></p>
                                    </div>
                                    <div class="column2">
                                        <p class="subheader_gold"><?php echo $title; ?></p>
                                        <p class="subtitle"><?php echo $subtitle; ?></p>
                                        <p class="copy"><?php echo $copy; ?></p>
                                        <?php if($link) : ?>
                                            <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="column2"><div class="column_inner">
                    <div class="practice_area_submenu">
                        <p class="subheader_gold">On This Page:</p>
                        <?php if( have_rows('p3_main_body') ) : ?>
                            <ul>
                            <?php while( have_rows('p3_main_body') ) : the_row(); ?>
                                <?php if( get_sub_field('section_title_h2') ) :
                                    //prepare string for anchor link
                                    $anchor_link = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', get_sub_field('section_title_h2')));
                                    $anchor_link = str_replace('--', '-', $anchor_link);
                                    ?>
                                    <li><a href="#<?php echo strtolower($anchor_link); ?>"><?php the_sub_field('section_title_h2'); ?></a></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                            <li class="call-list-item"><a href="tel:6145003836">Call Today (614) 500-3836</a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        $large_cta = get_field('p4_large_cta');
        $title = $large_cta['title'];
        $copy = $large_cta['copy'];
        $background_img = $large_cta['background_image'];
    ?>
        <div class="large-cta-block">
            <?php if( $background_img ) {
                echo '<div class="p4-cta-image">' . wp_get_attachment_image($background_img['ID'], 'full') . '</div>';
            } ?>
            <div class="copy-wrapper">
                <div class="row1">
                    <h2><?php echo $title; ?></h2>
                    <div class="copy">
                        <?php echo $copy; ?>
                    </div>
                </div>
                <div class="row2">
                <?php if( $banner_cta_phone ) : ?>
                    <div class="cta-group cta-phone">
                        <p class="subheader_gold">Call Today</p>
                        <a href="tel:<?php echo $banner_cta_phone; ?>"><?php echo $banner_cta_phone; ?></a>
                    </div>
                <?php endif; ?>

                <?php if( $banner_cta_contact ) : ?>
                    <div class="cta-group cta-contact">
                        <p class="subheader_gold">Contact us Online</p>
                        <a href="<?php echo $banner_cta_contact; ?>">Online Form</a>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    

        <!-- -->
        <div id="practice_area_lower_content" class="textpanel">
            <div class="container_inner">
                <div class="two_columns_66_33 clearfix">
                    <?php if( have_rows('p4_main_body_copy') ) : ?>
                    <div class="column1">
                        <div class="column_inner"> 
                            
                            <?php while( have_rows('p4_main_body_copy') ) : the_row(); ?>    
                                <?php if( get_row_layout() === 'section_title' ) :
                                    //prepare string for anchor link
                                    $anchor_link = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', get_sub_field('section_title_h2')));
                                    $anchor_link = str_replace('--', '-', $anchor_link);
                                    ?>
                                    <h2 id="<?php echo strtolower($anchor_link); ?>"><?php the_sub_field('section_title_h2'); ?></h2>
                                <?php endif; ?>

                                <?php if( get_row_layout() === 'copy_block' ) : ?> 
                                    <div class="copy-block"><?php the_sub_field('copy'); ?></div>
                                <?php endif; ?>

                                <?php if( get_row_layout() === 'cta_block' ) : ?>
                                    <div class="contact_tab">    
                                        <div class="row1">
                                            <?php the_sub_field('cta_text'); ?>
                                        </div>
                                        
                                        <div class="row2">
                                            <div class="cta-group cta-phone">
                                                <p class="subheader_gold">Call Today</p>
                                                <a href="tel:6145003836">(614) 500-3836</a>
                                            </div>
                                            <div class="cta-group cta-contact">
                                                <p class="subheader_gold">Contact us Online</p>
                                                <a href="/contact/">Online Form</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if( get_row_layout() === 'video_embed') : ?>
                                    <div id="schema-videoobject" class="video-container"><iframe title="<?php the_sub_field('video_title') ?>" src="<?php the_sub_field('youtube_embed_url'); ?>" width="100%" height="420" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
                                <?php endif; ?>

                                <?php if( get_row_layout() === 'accordions_block' ) : ?>
                                    <div class="accordions-wrapper">
                                        <?php while ( have_rows('accordions')): the_row(); 
                                            $title = get_sub_field('title');
                                            $copy = get_sub_field('copy');
                                        ?>
                                        <div class="accordions">
                                            <div class="accordions_title">
                                                <h3><?php echo $title; ?></h3>
                                            </div>
                                            <div class="accordions_content">
                                                <?php echo $copy; ?>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( get_row_layout() === 'resource_links_block' ) : ?>
                                <div class="links-wrapper">
                                    <?php while( have_rows('links') ) : the_row(); $link = get_sub_field('link'); ?>
                                        <div class="link">
                                            <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url'] ?>"><?php echo $link['title']; ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>

                                <?php if( get_row_layout() === 'attorney_callout' ) : 
                                $image = get_sub_field('image');
                                $name = get_sub_field('attorney_name');
                                $title = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                $copy = get_sub_field('copy');
                                $link = get_sub_field('link');
                                ?>
                                <div class="attorney-callout">
                                    <div class="column1">
                                        <?php if( $image ) { echo wp_get_attachment_image($image['ID'], 'full'); } ?>
                                        <p class="attorney-name"><?php echo $name; ?></p>
                                    </div>
                                    <div class="column2">
                                        <p class="subheader_gold"><?php echo $title; ?></p>
                                        <p class="subtitle"><?php echo $subtitle; ?></p>
                                        <p class="copy"><?php echo $copy; ?></p>
                                        <?php if($link) : ?>
                                            <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- -->





    <a href="#" class="to-top-btn"></a>
</div>

<?php get_footer(); ?>		