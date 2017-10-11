<?php theme_include('header'); ?>

<section class="content">
		<ul class="items">
			<!-- Loop through all posts, if any -->
			<?php if (has_posts()) : while (posts()) : ?>
				<li>
					<article class="wrap">
						<?php if (article_custom_field('article_image') && article_custom_field('article_image') != "/content/content") :?>
							<div class="blog-image-header"
									 style="background-image: url('<?=article_custom_field('article_image', article_id())?>')">
							</div>
						<?php endif; ?>
						<div class="article-body">
							<h1>
								<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>"><?php echo article_title(); ?></a>
							</h1>
							<div class="content">
								<?php echo article_html(); ?>
							</div>
							<footer>
								Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.
							</footer>
						</div>
						<div class="article-seperator"></div>
					</article>
				</li>
			<?php endwhile; endif; ?>
			<!-- End Loop through all posts -->
		</ul>

		<!-- Include Pagination if article count is bigger than defined in settings -->
		<?php if (has_pagination()): ?>
		<nav class="pagination">
			<div class="wrap">
				<div class="previous">
					<?php echo posts_prev(); ?>
				</div>
				<div class="next">
					<?php echo posts_next(); ?>
				</div>
			</div>
		</nav>
		<?php endif; ?>

		<!-- Show this if no posts are found -->
		<?php if (!has_posts()) : ?>
			<div class="wrap">
				<h1>No posts yet!</h1>
				<p>Looks like you have some writing to do!</p>
			</div>
		<?php endif; ?>

</section>

<?php theme_include('footer'); ?>
