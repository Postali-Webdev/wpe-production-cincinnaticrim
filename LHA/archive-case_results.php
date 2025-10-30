<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = $qode_options_passage['category_blog_sidebar'];

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

$blog_hide_comments = "";
if (isset($qode_options_passage['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_passage['blog_hide_comments'];

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_passage['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

if(get_post_meta($id, "qode_content-animation", true) != ""){
 $content_animation = get_post_meta($id, "qode_content-animation", true);
}else{
	if(isset($qode_options_passage['content_animation'])){
		$content_animation = $qode_options_passage['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}

?>
	<div class="title animate <?php if($content_animation == 'no'){ echo 'no_entering_animation '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
			<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>	

				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

				<?php if($title_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
				<?php } ?>
				<h1>Case Results</h1>
				<?php if($title_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
	</div>
	
	<?php if($qode_options_passage['show_back_button'] == "yes") { ?>
		<a id='back_to_top' href='#'>
			<span class='back_to_top_inner'>
				<span>&nbsp;</span>
			</span>
		</a>
	<?php } ?>

		<div class="container top_move <?php if($content_animation == 'no'){ echo 'no_entering_animation'; }  ?>">
		<div class="container_inner clearfix">
			<div class="container_inner2 clearfix">

				<div class="content_width_75">
					<p class="intro_text_green">We are mindful of the fact that every time we enter a courtroom on behalf of our clients, there is a great deal at stake. Please review our criminal and OVI / DUI case results listed below. We are proud of the work we do and the lives we effect each day. If you are in need of assistance, please feel free to contact us at <a href="tel:513-338-1890" class="ibp" title="Call Luftman Heck Today">(513) 338-1890</a>.</p>
				</div>

							<div class="blog_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<article <?php if ( !has_post_thumbnail() ) { echo "class='no_image'"; } ?>>
										<?php if ( has_post_thumbnail() ) { ?>
											<div class="post_image">
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail('blog-type-1'); ?>
												</a>
											</div>
										<?php } ?>
										<div class="post_text_holder" style="height: auto !important;">
											<div class="post_text_inner">

												<!-- <span class="result_date"><?php the_time('F jS, Y'); ?></span> -->

												<h4><?php the_title(); ?></h4>
												<span class="create">
													Category: <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name;?></span>
												</span>
												<?php the_content(); ?>
												<div class="spacer-15">&nbsp;</div>
											</div>
										</div>	
									</article>
								<?php endwhile; ?>
								<div class="pagination"><?php postali_paging_nav(); ?></div>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>
							</div>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>