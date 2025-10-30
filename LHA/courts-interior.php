<?php 
/*
Template Name: Courts Interior
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
		<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
			<div class="title animate <?php if($content_animation == 'no'){ echo 'no_entering_animation '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
				<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>

					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

					<?php if($title_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
					<?php } ?>
 
							<span class="title_subheader">Courts</span>	

					<h1><?php the_title(); ?></h1>
					
					<?php if( get_field('sub_title') ): ?>
						<div class="title_subtitle"><?php the_field('sub_title'); ?></div>
					<?php endif; ?>

					<?php if($title_in_grid){ ?>
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } ?>
		
	<div class="full_width">

		<!-- COURT INFO PANEL -->
		<div class="textpanel" id="courts_information"><div class="container_inner">

			<?php the_content(); ?>	

		</div></div>

		
		<!-- COURT PROCESS PANEL -->
		<div class="textpanel" id="courts_process"><div class="container_inner">

			<?php the_field('courts_process'); ?>	

		</div></div>		

		
	</div>
	<?php get_footer(); ?>			