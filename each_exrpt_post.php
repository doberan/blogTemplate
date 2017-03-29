<div class="col-md-4">
	<section class="boxPad">
		<a href="<?php the_permalink(); ?>" style="color:#444; text-decoration: none;">
			<div class="box">
				<div class="shereBtn">
					<p class="count"><?php socialbutton(); ?></p>
					<p class="shere">SHERE</p>
				</div>
				<?php if(function_exists('get_scc_xxxx')) echo get_scc_xxxx; ?>
				<p class="imgArea"><?php the_post_thumbnail('', array( 'class' => 'img-responsive' )); ?></p>
				<p><time><?php the_time("Y/m/d(D)"); ?></time></p>
				<h3><?php the_title(); ?></h3>
                <p class="fontSize4">
                    <?php echo mb_substr(strip_tags($post-> post_content), 0, 40).'...'; ?>
                </p>
			</div>
		</a>
	</section>
</div>