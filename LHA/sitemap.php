<?php 
/*
Template Name: Sitemap
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

							<span class="title_subheader">Luftman, Heck & Associates LLP</span>	

					<h1><?php the_title(); ?></h1>
					<?php if($title_in_grid){ ?>
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
		
	<div class="full_width">
		<div class="container_inner">

                               <!-- SITEMAP -->
                                <div id="sitemap">
                                <div class="content_width_75">
                                <div class="two_columns_50_50 clearfix">
									<div class="column1">
										<div class="column_inner">
                                <h3 class="green">Pages</h3> 
                                    <ul><?php wp_list_pages("title_li=" ); ?></ul> 
                                    </div></div>
 									<div class="column2">
										<div class="column_inner">                                                                      
                                <h3 class="green">Blog Posts</h3> 
                                <ul>
                                <?php wp_get_archives('type=postbypost'); ?>
                                </ul>
                                </div></div>
                                </div>
                                </div> 	
                            	</div>

		</div>
	</div>

	<?php get_footer(); ?>			