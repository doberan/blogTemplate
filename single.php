<?php get_header(); ?>
<div id="wrapper">
		<div id="contents">
				<div class="articlebox box bs">
						<?php if(have_posts()): while ( have_posts() ) : the_post(); ?>
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, true);
?>
						<div class="articlebox-in">
								<h2 class="bl"><?php the_title(); ?></h2>
								<ul class="tag">
<li><a href="" ><?php the_category(', '); ?></a></li>
								</ul>
								<p class="articleImage"><img src="<?php echo $image_url[0]; ?>" class="thunb"></p>
								<p><?php the_content(); ?></p>
						</div>
<!-- 						<div class="articlebox-in">
								<h3 class="bl">ここにh3が入ります。</h3>
								<p>ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。</p>
						</div>
						<div class="articlebox-in">
								<h4 class="bl">ここにh4が入ります。</h4>
								<p>ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。ここに短文が入ります。</p>
						</div> -->
						<div class="sns">
										<ul>
												<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/f_icon_facebook.png" alt="#"></a></li>
												<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/f_icon_twitter.png" alt="#"></a></li>
												<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/f_icon_google.png" alt="#"></a></li>
										</ul>
						</div>
						<div class="writer">
								<p class="title">この記事を書いたライター</p>
								<div class="writer-in">
										<div class="portlate"><a href="<?php echo get_author_posts_url( get_the_author_id() ); ?>"><?php echo get_avatar( get_the_author_id() ); ?></a></div><!--portlate-->
										<div class="writer-in-in">
												<div class="author-name"><a href="<?php echo get_author_posts_url( get_the_author_id() ); ?>"><?php the_author(); ?></a></div>
												<div class="text">
														<p><?php the_author_meta('description'); ?></p>
											</div><!--text-->
										</div><!--writer-in-in-->
								</div><!--writer-in-->
						</div><!--writer-->
						<?php endwhile; endif; ?>
				</div><!--articlebox-->
		</div><!--contents-->
		<?php get_sidebar(); ?>
</div><!--wrapper-->
<?php get_footer(); ?>
