<?php
/**
 * Testimonials Archive
 * @package Postali Child
 * @author Postali LLC
 */

//Protect against arbitrary paged values
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array (
    'post_type' => 'testimonials',

    'post_status' => 'publish',
    'order' => 'DESC',
    'paged' => $paged
);
$the_query = new WP_Query($args);
get_header(); ?>

	<div class="title animate <?php if($content_animation == 'no'){ echo 'no_entering_animation '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
			<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>	


				<?php if($title_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
				<?php } ?>

				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
				<div class="container">
					<div class="container_inner clearfix">
						<h1>Client Testimonials</h1>
						<div class="title_subtitle">	
							We fight for our clients. Our reviews tell the story of successful outcomes.
						</div>
					</div>
				</div>
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
	
	<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			echo do_shortcode($revslider);
		}
	?>
	
		<div class="container top_move <?php if($content_animation == 'no'){ echo 'no_entering_animation'; }  ?>">
		<div class="container_inner clearfix">
			<div class="container_inner2 clearfix">

				<div class="content_width_75">
					<p class="intro_text_white-small">At Luftman, Heck, & Associates LLP, our <a class="intro-link" href="/" title="Cincinnati Criminal Defense Attorneys">Cincinnati criminal defense attorneys</a> pride ourselves on being constant professionals and delivering exceptional legal representation for people when they need it most. We take our responsibility very seriously and strive to obtain the best possible result for every client in our care. We encourage you to review what some of our past clients had to say about working with the criminal defense team at LHA.</p>
				</div>

				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
				<?php switch ($qode_options_passage['blog_style']) {
					case 1: ?>
							<div class="blog_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<article <?php if ( !has_post_thumbnail() ) { echo "class='no_image'"; } ?>>

										<div class="post_text_holder">
											<div class="post_text_inner">

												<?php the_content(); ?>

											</div>
										</div>	
									</article>
								<?php endwhile; ?>

							</div>
							
								<div class="pagination"><?php postali_paging_nav(); ?></div>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>

					 <?php	break;
					case 2: ?>
						<div class="blog_holder2">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article <?php post_class(); ?>>
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post_image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('blog-type-2'); ?>
											</a>
										</div>
									<?php } ?>
									<div class="post_text_holder">
										<div class="post_text_inner">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<span class="create">
												<span class="date"><?php the_time('d.m.Y'); ?></span>
												<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
											</span>
											<?php the_content(); ?>
											<span class="info">
												<?php if($blog_hide_comments != "yes"){ ?>
													<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
												<?php } ?>	
												<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
											</span>
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
					<?php	break;
					case 3: ?>
						<div class="blog_holder_list">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article class="mix">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post_image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('blog-type-3'); ?>
											</a>
										</div>
									<?php } ?>
									<div class="post_text_holder">
										<div class="post_text_inner">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<span class="create">
												<span class="date"><?php the_time('d.m.Y'); ?></span>
												<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
											</span>
											<?php the_content(); ?>
											<span class="info">
												<?php if($blog_hide_comments != "yes"){ ?>
													<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
												<?php } ?>	
												<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
											</span>
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
						<?php	break;
					case 4: ?>
						<div class="blog_holder2">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article <?php post_class(); ?>>
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post_image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('blog-type-2'); ?>
											</a>
										</div>
									<?php } ?>
									<div class="post_text_holder">
										<div class="post_text_inner">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<span class="create">
												<span class="date"><?php the_time('d.m.Y'); ?></span>
												<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
											</span>
											<?php the_content(); ?>
											<span class="info">
												<?php if($blog_hide_comments != "yes"){ ?>
													<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
												<?php } ?>	
												<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
											</span>
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
				<?php break;
				} ?>
			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
						<div class="column_inner">
							<?php switch ($qode_options_passage['blog_style']) {
							case 1: ?>
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
											<div class="post_text_holder">
												<div class="post_text_inner">
													<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
													<span class="create">
														<span class="date"><?php the_time('d.m.Y'); ?></span>
														<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
													</span>
													<?php the_content(); ?>
													<span class="info">
														 <?php if($blog_hide_comments != "yes"){ ?>
															 <span class="left">
																	<a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a>
															 </span>
														<?php } ?>
														<span class="right"><a href="<?php the_permalink(); ?>" class="read_more"></a></span>
													</span>
												</div>
											</div>	
										</article>
									<?php endwhile; ?>
									<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
									<?php endif; ?>
									<div class="pagination"><?php postali_paging_nav(); ?></div>
								</div>
							<?php	break;
							case 2: ?>
									<div class="blog_holder2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-2'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
														</span>
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
								<?php	break;
							case 3: ?>
									<div class="blog_holder_list">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article class="mix">
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-3'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
														</span>
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
								<?php	break;
							case 4: ?>
								<div class="blog_holder2">
									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
										<article <?php post_class(); ?>>
											<?php if ( has_post_thumbnail() ) { ?>
												<div class="post_image">
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail('blog-type-2'); ?>
													</a>
												</div>
											<?php } ?>
											<div class="post_text_holder">
												<div class="post_text_inner">
													<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
													<span class="create">
														<span class="date"><?php the_time('d.m.Y'); ?></span>
														<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
													</span>
													<?php the_content(); ?>
													<span class="info">
														<?php if($blog_hide_comments != "yes"){ ?>
															<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
														<?php } ?>	
														<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
													</span>
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
							<?php	break;
						}
						
						?>		
						</div>
					</div>
					<div class="column2">
					<?php get_sidebar(); ?>	
					</div>
				</div>
		<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
					<?php get_sidebar(); ?>	
					</div>
					<div class="column2">
						<div class="column_inner">
								<?php switch ($qode_options_passage['blog_style']) {
								case 1: ?>
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
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															 <?php if($blog_hide_comments != "yes"){ ?>
																 <span class="left">
																		<a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a>
																 </span>
															<?php } ?>
															<span class="right"><a href="<?php the_permalink(); ?>" class="read_more"></a></span>
														</span>
													</div>
												</div>	
											</article>
										<?php endwhile; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
										<?php if($qode_options_passage['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
										<?php endif; ?>
									</div>
								 <?php	break;
								case 2: ?>
									<div class="blog_holder2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-2'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
														</span>
													</div>
												</div>
											</article>
										<?php endwhile; ?>
										<?php if($qode_options_passage['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
										<?php endif; ?>
										<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
										<?php endif; ?>
									</div>
								<?php	break;
								case 3: ?>
									<div class="blog_holder_list">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article class="mix">
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-3'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
														</span>
													</div>
												</div>
											</article>
										<?php endwhile; ?>
										<?php if($qode_options_passage['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
										<?php endif; ?>
										<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
										<?php endif; ?>
									</div>
								<?php	break;
								case 4: ?>
									<div class="blog_holder2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-2'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
														</span>
													</div>
												</div>
											</article>
										<?php endwhile; ?>
										<?php if($qode_options_passage['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
										<?php endif; ?>
										<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
										<?php endif; ?>
									</div>
								<?php	break;
								
								
						}
						
						?>		
						</div>
					</div>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>