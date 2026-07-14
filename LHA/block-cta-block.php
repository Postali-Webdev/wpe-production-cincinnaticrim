<?php if ( $args['class'] ) { ?>

<div class="cta-block <?php echo $args ['class']; ?>">
    <a href="tel:<?php the_field('global_phone', 'options'); ?>" class="btn"><?php the_field('global_phone', 'options'); ?></a> <a href="/contact/" class="form-link">Contact Us Online</a> 
</div>

<?php } else { ?>

<div class="cta-block">
    <a href="tel:<?php the_field('global_phone', 'options'); ?>" class="btn"><?php the_field('global_phone', 'options'); ?></a> <a href="/contact/" class="form-link">Contact Us Online</a> 
</div>

<?php } ?>