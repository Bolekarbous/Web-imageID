<?php
/**
 * The Template for displaying Houses list
 *
 * @package Betheme
 * @author M.Mounir
 * @link http://mounirdesigns.com
 */

get_header();


?> 
<script>
 jQuery(function($) {
  // quick search regex
  var qsRegex;
  
  // init Isotope
  var $grid = $('.posts_group').isotope({
    itemSelector: '.post-item',
    layoutMode: 'fitRows',
    filter: function() {
      return qsRegex ? $(this).text().match( qsRegex ) : true;
    }
  });

  // use value of search field to filter
  var $quicksearch = $('.quicksearch').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $grid.isotope();
  }, 200 ) );
  
});

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}

</script>
<div id="Subheader" style="">
	<div class="container">
		<div class="column one">
			<h1 class="title">Houses</h1>
		</div>
	</div>
</div>
<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
						<div class="section_wrapper clearfix">
    <!-- Search -->
    <div id="Filters" class="column one">
        <ul class="filters_buttons">
            <li class="srSearchWrapper"><i class="icon-search"></i><input type="text" class="quicksearch" placeholder="Search for a house"></input></li>
        </ul>
        </div>
    </div>
			<div class="section full-width">
              
                    <div class="column one column_blog">
                        <div class="blog_wrapper isotope_wrapper">
							 <div class="posts_group lm_wrapper masonry tiles col-5 isotope">
							
								<?php
									$args = array( 'post_type' => 'house', 'posts_per_page' => -1 );
									$postslist = get_posts( $args );
									foreach ( $postslist as $post ) : setup_postdata( $post );

									
								?> 
								
								<div class="post-item isotope-item clearfix post type-post status-publish format-standard has-post-thumbnail hentry">
									<div class="post-photo-wrapper scale-with-grid">
										
										<img src="<?php echo get_field('thumbnail', $post->ID); ?>" class="scale-with-grid wp-post-image" itemprop="image">
										
										
										<div class="post-desc-wrapper">
                                        <div class="post-desc">
										   <div class="post-title">
                                                <h2 class="entry-title" itemprop="headline"><a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo $post->post_title; ?></a>
												</h2>
											</div>
                                        </div>
                                    </div>
									
									</div>
									</a>
								</div>
								</a>
								<?php
									endforeach; 
									wp_reset_postdata();
								?>
							 </div>
						</div>
				</div>
		
		</div>
	</div>
</div>

<?php get_footer(); ?>