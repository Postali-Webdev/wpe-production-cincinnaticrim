// Read More code
	jQuery(document).ready(function() {

$j('.post_text_inner').readmore({
  speed: 200,
  maxHeight: 290,
  collapsedHeight: 290,
  moreLink: '<a href="#" class="read_more" title="Read more about article">Read more</a>',
  lessLink: '<a href="#" class="read_more close" title="Close article">Close</a>'
});
	
});