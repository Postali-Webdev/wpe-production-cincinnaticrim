<?php 
/*
Template Name: Practice Area
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

	<?php if( have_rows('in_page_navigation') ) : ?>
		<div class="in-page-nav-container">
			<p class="nav-title">On This Page</p>
			<div class="in-page-nav-dropdown">
			<?php while( have_rows('in_page_navigation') ) : the_row(); ?>
				<a href="#<?php the_sub_field('anchor'); ?>" class="nav-link"><?php the_sub_field('title'); ?></a>
			<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

		<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
			<div class="title animate <?php if($content_animation == 'no'){ echo 'no_entering_animation '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
				<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>

					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

					<?php if($title_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
					<?php } ?>
 
							<span class="title_subheader">Practice Areas</span>	

					<h1><?php the_title(); ?></h1>

					<?php if( get_field('sub_title') ): ?>
						<div class="title_subtitle"><?php the_field('sub_title'); ?></div>
					<?php endif; ?>

					<?php if($title_in_grid){ ?>
						</div>
						<div class="contact-cta">
							<a href="tel:513-338-1890" class="button_green pa" title="Call Luftman Heck Today">(513) 338-1890</a>
							<a class="white" href="/contact/" title="Contact Luftman Heck Today">Contact Us Online</a>
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if($qode_options_passage['show_back_button'] == "yes") { ?>
			<a id='back_to_top' href='#'>
				<span class='back_to_top_inner'>
					<span>&nbsp;</span>
				</span>
			</a>
		<?php } ?>
		
	<div>

		<!-- INTRO TEXT PANEL -->
		<div class="textpanel" id="practice_area_intro"><div class="container_inner">

			<?php the_content(); ?>	

		</div></div>

		<!-- ATTORNEY PHOTO PANEL -->
		<div id="practice_area_attorney"></div>


		<!-- BOTTOM TEXT PANEL -->
		<div class="textpanel" id="practice_area_lower_content"><div class="container_inner">
			<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
				<div class="column1"><div class="column_inner">
				<?php the_field('practice_area_lower_content'); ?>	
			</div></div>
			<div class="column2">
				<div class="column_inner">
				<?php get_sidebar(); ?>
			</div></div>
			</div>

		</div>
    </div>

    <?php get_template_part('block','recent-posts'); ?>

	</div>

	<a href="#" class="scroll-top"></a>

	<?php get_footer(); ?>			