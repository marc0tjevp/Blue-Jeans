<?php theme_include('header'); ?>

<section class="content">

	<?php if (has_posts()): ?>
		<ul class="items">
			<?php posts(); ?>

			<li>
				<article class="wrap">
					<h1>
						<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>"><?php echo article_title(); ?></a>
					</h1>

					<?php if (article_custom_field('article_image') && article_custom_field('article_image') != "/content/content") :?>
						<div class="blog-image-header"
								 style="background-image: url('<?=article_custom_field('article_image', article_id())?>')">
						</div>
					<?php endif; ?>

					<div class="content">
						<?php echo article_html(); ?>
					</div>

					<footer>
						Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.
					</footer>

					<div class="article-seperator"></div>

				</article>
			</li>

			<?php $i = 0; while (posts()): ?>
			<?php $bg = sprintf('background: hsl(215, 28%%, %d%%);', round(((++$i / posts_per_page()) * 20) + 20)); ?>
			<li>
				<article class="wrap">
					<h1>
						<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>"><?php echo article_title(); ?></a>
					</h1>

					<?php if (article_custom_field('article_image')) :?>
						<div class="blog-image-header"
								 style="background-image: url('<?=article_custom_field('article_image', article_id())?>')">
						</div>
					<?php endif; ?>


					<div class="content">
						<?php echo article_html(); ?>
					</div>

					<footer>
						Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.
					</footer>

					<div class="article-seperator"></div>

				</article>
			</li>
			<?php endwhile; ?>

		</ul>

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

	<?php else: ?>
		<div class="wrap">
			<h1>No posts yet!</h1>
			<p>Looks like you have some writing to do!</p>
		</div>
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>
