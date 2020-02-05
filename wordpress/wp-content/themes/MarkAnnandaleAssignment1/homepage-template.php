<?php
/**
 * Template Name: Homepage Template
 * Front page template file
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php $masthead_background = wp_get_attachment_file_src(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
        <section class="masthead" style="background-image: url(<?php echo $masthead_background['0'];?>);">
            <article>
                <h1><?php echo esc_html(get_the_title()); ?></h1>
            </article>
        </section>
        <section class="the-page-content">
            <?php
                while(have_posts()) : the_post();
            ?>
            <div class="entry-content-page">
                <?php the_content(); ?>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?>
        </section>
        <section class="display-posts">
            <?php $the_query = new WP_query('posts_per_page=5'); ?>
            <?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <li>
                <a href="<?php the_permalink() ?>">
                    <div><?php the_title(); ?></div>
                    <div><?php the_post_thumbnail(); ?></div>
                    <div><?php the_excerpt(__('(more...)')); ?></div>
                </a>
            </li>
            <?php
                endwhile;
                wp_reset_postdata();
            ?>
        </section>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
get_footer();
