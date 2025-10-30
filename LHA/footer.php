<?php global $qode_options_passage; ?>
				
		</div>
	</div>
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('google-review-schema') ) : ?><?php endif; ?>
		

<!-- footer contact widget -->
 <?php if( !is_page_template( 'page-contact.php' ) ) : ?>
<div class="footer_contact">
	<div class="container_inner">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-contact') ) : ?><?php endif; ?>
	</div>
</div>
<?php endif; ?>


		<footer>
			
		<!-- Google font call -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,600i,700" rel="stylesheet">
			
			<div class="footer_holder clearfix">
				
					
						<?php	
						$display_footer_widget = false;
						if ($qode_options_passage['footer_widget_area'] == "yes") $display_footer_widget = true;
						if($display_footer_widget): ?> 
						<div class="footer_top_holder">
							<div class="footer_top">
								
								
									<?php
										$header_in_grid = false;
										if ($qode_options_passage['header_in_grid'] == "yes") $header_in_grid = true;

									?>
									

								<div class="container">
                                    <div class="columns">
                                        <div class="footer-left">
                                            <div class="column-full block">
                                                <?php dynamic_sidebar( 'footer_column_1' ); ?>
                                            </div>
                                        </div>
                                        <div class="footer-right">
                                            <div class="column-66 menus">
                                                <div class="footer-menu-block">
                                                    <?php dynamic_sidebar( 'footer_column_3' ); ?>
                                                </div>
                                                <div class="footer-menu-block">
                                                    <?php dynamic_sidebar( 'footer_column_2' ); ?>
                                                </div>
                                            </div>
                                            <div class="column-33 address">
                                                <?php dynamic_sidebar( 'footer_column_4' ); ?>
                                            </div>
                                            <div class="spacer-30"></div>
                                            <div class="footer-bottom">
                                            <?php dynamic_sidebar( 'footer_text' ); ?>
                                            <?php if(is_page(26)) { ?>
                                            <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:17px 0;"></a>
                                            <?php } ?>    
                                            </div>
                                        </div>
                                    </div>

                                </div>
							</div>
						</div>
						<?php endif; ?>

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