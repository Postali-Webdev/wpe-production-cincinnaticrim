<?php 
/*
Template Name: Homepage 2020
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

		<!-- HOMEPAGE HERO PANEL -->
		<div class="textpanel" id="homepage_slider"><div class="container_inner">

			<?php the_field('homepage_hero_content'); ?>	

		</div></div>


		<!-- HOMEPAGE INTRO PANEL -->
		<div class="textpanel" id="homepage_intro"><div class="container_inner">

			<?php the_field('homepage_intro_content'); ?>	

		</div></div>


		<!-- HOMEPAGE PRACTICE AREAS PANEL -->
		<div class="textpanel" id="homepage_practice_areas">

			<?php the_field('homepage_practice_areas_content'); ?>	

		</div>


		<!-- HOMEPAGE WHEN TO HIRE PANEL -->
		<div class="textpanel homepage_when_to_hire" id="homepage_when_to_hire_top">
			<div class="container_inner">
				<div class="columns">
					<div class="column-66">
						<?php the_field('homepage_hire_top_content'); ?>	
					</div>
				</div>
			</div>
		</div>

		<!-- HOMEPAGE WHEN TO HIRE PANEL -->
		<div class="textpanel homepage_when_to_hire" id="homepage_when_to_hire_middle">
			<div class="columns">
				<div class="misdemeanors_felonies">
					<div class="column-50" id="left">
						<div class="column-content">
							<?php the_field('homepage_hire_misdemeanors_content'); ?>	
						</div>
					</div>
					<div class="column-50" id="right">
						<div class="column-content">
							<?php the_field('homepage_hire_felonies_content'); ?>	
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- HOMEPAGE WHEN TO HIRE PANEL -->
		<div class="textpanel homepage_when_to_hire" id="homepage_when_to_hire_bottom">
			<div class="container_inner">
				<div class="columns">
					<div class="column-66">
						<?php the_field('homepage_hire_bottom_content'); ?>
					</div>
				</div>
			</div>
		</div>


		<!-- HOMEPAGE ATTORNEY PANEL -->
		<?php if( have_rows('homepage_featured_attorney') ) : $count = 0; $total = count(get_field('homepage_featured_attorney')); ?>
		<div class="textpanel" id="homepage_attorney">
			<!-- <img src="/wp-content/uploads/2018/10/homepage-attorney-profile-headshot-mobile.jpg" alt="Attorney Bradley Groene" class="mobile_show"> -->
			<div class="container_inner">
				<?php while( have_rows('homepage_featured_attorney') ) : the_row(); $count++; 
				$image = get_sub_field('image');?>
					<div class="attorney-row columns <?php echo  $count % 2 != 0 ? '' : 'attorney-row_reverse'; echo $count == $total ? ' attorney-row_last' : ''; ?>">
						<div class="column-50">
							<img src="<?php esc_html_e($image['url']); ?>" alt="<?php esc_html_e($image['alt']); ?>" class="attorney-bio-photo">
						</div>
						<div class="column-50 direction-col">
							<h2><?php the_sub_field('title'); ?></h2>
							<?php the_sub_field('copy'); ?>
							<a href="<?php the_sub_field('page_link'); ?>" class="button_green">Read Bio</a>
						</div>
					</div>
					
				<?php  endwhile; ?>
			</div>
		</div>
		<?php endif; ?>

		<!-- HOMEPAGE AWARDS PANEL -->
		<div class="textpanel" id="homepage_awards"><div class="container_inner">

		<?php the_field('homepage_awards_content'); ?>	

		</div></div>
		
		<!-- HOMEPAGE LEGAL PROCESS PANEL -->
		<div class="textpanel" id="homepage_legal_process"><div class="container_inner">

			<?php the_field('homepage_legal_process_content'); ?>	

		</div></div>


		<!-- HOMEPAGE WHY HIRE PANEL -->
		<div class="textpanel" id="homepage_why_hire"><div class="container_inner">

			<?php the_field('homepage_why_hire_content'); ?>	

		</div></div>

	</div>
  
	<?php get_footer(); ?>