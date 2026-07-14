<?php global $qode_options_passage; ?>
				
		</div>
	</div>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('google-review-schema') ) : ?><?php endif; ?>
		

<?php if(!is_page_template('page-contact.php')) { ?>

<!-- footer contact widget -->
<div class="footer_contact">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="eyebrow">
                    <?php the_field('pf_eyebrow_text','options'); ?>
                </div>
                <h2><?php the_field('pf_headline','options'); ?></h2>
                <div class="spacer-30"></div>
                <a href="tel:<?php the_field('global_phone','options'); ?>" class="btn"><?php the_field('global_phone','options'); ?></a>
            </div>
            <div class="column-50">
                <?php echo do_shortcode(  get_field('pf_form_shortcode','options')  ); ?>
            </div>
        </div>
	</div>
</div>

<?php } ?>


<footer>
    <!-- Google font call -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700" rel="stylesheet">
    <div class="container">
        <div class="columns top">
            <div class="column-50 block">
                <div class="footer-logo">
                    <a href="/" title="Luftman Heck and Associates">
                        <img src="/wp-content/uploads/2018/09/logo-footer.png" alt="Luftman Heck and Associates">
                    </a>
                </div>
                <div class="spacer-30"></div>
                <p class="phone"><a href="tel:<?php the_field('cin_phone','options'); ?>"><?php the_field('cin_phone','options'); ?></a></p>
                <p class="email"><a href="mailto:<?php the_field('global_email','options'); ?>"><?php the_field('global_email','options'); ?></a></p>
                <div class="spacer-15"></div>
                <div class="social-media">
                    <a href="<?php the_field('social_fb','options'); ?>" target="blank"><span class="wp-svg-custom-facebook-share-icon"></span></a>
                    <a href="<?php the_field('social_twitter','options'); ?>" target="blank"><span class="wp-svg-custom-twitter-share-icon"></span></a>
                </div>
            </div>
            <div class="column-25 block">
                <div class="eyebrow">
                    Practice Areas
                </div>
                <nav>
                <?php
                    // The parent theme menu has way too many complications, lets use a simple wp_menu, primary-nav, set in the functions.php file
                    $args = array(
                        'container' => false,
                        'theme_location' => 'practice-areas-footer'
                    );
                    wp_nav_menu( $args );
                    ?>
                </nav>
            </div>
            <div class="column-25 block">
                <div class="eyebrow">
                    Let Us Help
                </div>
                <nav>
                <?php
                    // The parent theme menu has way too many complications, lets use a simple wp_menu, primary-nav, set in the functions.php file
                    $args = array(
                        'container' => false,
                        'theme_location' => 'help-footer'
                    );
                    wp_nav_menu( $args );
                    ?>
                </nav>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns bottom">
            <div class="column-50">
                <div class="location">
                    <div class="left">
                        <div class="eyebrow white">Cincinnati Office</div>
                        <p><a href="<?php the_field('cin_driving','options'); ?>" target="blank"><?php the_field('cin_address','options'); ?></a></p>
                        <p><a href="tel:<?php the_field('cin_phone','options'); ?>"><?php the_field('cin_phone','options'); ?></a></p>
                    </div>
                    <div class="right">
                        <iframe src="<?php the_field('cin_map','options'); ?>" title="Cincinnati map" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="column-50">
                <div class="location">
                    <div class="left">
                        <div class="eyebrow white">Monfort Heights Office</div>
                        <p><a href="<?php the_field('mon_driving','options'); ?>" target="blank"><?php the_field('mon_address','options'); ?></a></p>
                        <p><a href="tel:<?php the_field('mon_phone','options'); ?>"><?php the_field('mon_phone','options'); ?></a></p>
                    </div>
                    <div class="right">
                        <iframe src="<?php the_field('mon_map','options'); ?>" title="Montfort Heights map" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer-30"></div>
        <div class="columns disclaimer">
            <div class="column-full">
                <p><?php the_field('disclaimer_text','options'); ?></p>
            </div>
        </div>
        <div class="columns utility">
            <div class="column-50">
                <p>©<?php echo date("Y"); ?> Copyright by Luftman, Heck & Associates LLP. All rights reserved.</p>
            </div>
            <div class="column-50 utility-links">
            <?php if( have_rows('utility_links','options') ): ?>
                <ul class="utility">
                <?php while( have_rows('utility_links','options') ): the_row(); ?>  

                    <?php
                        $link = get_sub_field('page_link');
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            echo '<li><a href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . esc_html($link_title) . '</a></li>';
                        endif;
                    ?>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?> 
            </div>
        </div>
    </div>
</footer>


    </div>
<?php
global $qode_toolbar;
if(isset($qode_toolbar)) include("toolbar.php")
?>

<?php wp_footer(); ?>
<script type="text/javascript" src="//cdn.callrail.com/companies/201022555/5751fd6384ee2ca49201/12/swap.js"></script> 

<script>(function (w,d,s,v,odl){(w[v]=w[v]||{})['odl']=odl;;
var f=d.getElementsByTagName(s)[0],j=d.createElement(s);j.async=true;
j.src='https://intaker.azureedge.net/widget/chat.min.js';
f.parentNode.insertBefore(j,f);
})(window, document, 'script','Intaker', 'luftmanheck');
</script>


</body>
</html>