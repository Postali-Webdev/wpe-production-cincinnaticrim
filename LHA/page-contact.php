<?php 

/*
Template Name: Contact Page
*/ 
get_header(); ?>

<div class="body-wrapper">

    <section id="banner">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <?php $banner_img = get_post_thumbnail_id(); 
            if( $banner_img ) {
                echo wp_get_attachment_image( $banner_img, 'full', false, array( 'class' => 'banner-image ignore-lazy' ) );
            }
        ?>
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <p class="title_subheader"><?php the_field('banner_subtitle') ?></p>
                    <h1><?php the_field('banner_title') ?></h1>
                    <div class="cta-wrapper">
                        <p><?php the_field('banner_cta_copy') ?></p>
                        <?php $cta_button = get_field('banner_cta_button'); if( $cta_button ) : ?>
                            <a href="<?php echo $cta_button['url']; ?>" class="btn" title="<?php echo $cta_button['title']; ?>"><?php echo $cta_button['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-body">
        <div class="container">
            <div class="columns body-columns">
                <div class="column-50 card-column">
                    <div class="contact-card">
                        <?php $contact_card = get_field('body_contact_card'); 
                            $subtitle_1 = $contact_card['subtitle_1'];
                            $subtitle_2 = $contact_card['subtitle_2'];
                            $phone_number = $contact_card['phone_number'];
                            $email = $contact_card['email'];
                            $address = $contact_card['address'];
                            $map_embed_url = $contact_card['map_embed_url'];
                            $copy = $contact_card['copy'];
                        ?>
                        <p class="subtitle"><?php echo $subtitle_1; ?></p>
                        <p class="phone"><span>PH: </span><a href="<?php echo $phone_number['url'] ?>"><?php echo $phone_number['title'] ?></a></p>
                        <p class="email"><span>EM: </span><a href="<?php echo $email['url'] ?>"><?php echo $email['title'] ?></a></p>
                        <div class="columns address-columns">
                            <div class="column-50 block address">
                                <p class="subtitle"><?php echo $subtitle_2; ?></p>
                                <?php echo $address; ?>
                            </div>
                            <div class="column-50">
                                <div class="responsive-iframe">
                                    <iframe src="<?php echo $map_embed_url; ?>"></iframe>
                                </div>
                            </div>
                        </div>
                        <?php echo $copy; ?>
                    </div>
                </div>
                <div class="column-50 block">
                    <p class="subtitle">Online Form</p>
                    <?php echo do_shortcode(get_field('body_form_embed')); ?>
                </div>
            </div>
        </div>
    </section>





</div>



<?php get_footer(); ?>