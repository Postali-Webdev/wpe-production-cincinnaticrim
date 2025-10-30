<div class="recent-posts">
    <?php 
    $args = array( 
        'posts_per_page' => 2, 
        'category__in' => wp_get_post_categories( $post->ID ), 
        'post__not_in' => array( $post->ID )
    ); ?>

    <div class="posts-container">
        <h2 class="centered">Related Posts</h2>

        <?php $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <div class="post-container">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div id="post-bg" style="background-image: url('<?php echo $image[0]; ?>')">

                    </div>
                <?php endif; ?>
                    <div class="post-content">
                        <span class="post-date"><span data-nosnippet=""><?php the_date(); ?></span></span>
                        <h4><?php the_title(); ?></h4>
                </div>
                </a>
            </div>
        <?php endforeach; 
        wp_reset_postdata();?>

    </div>
</div>