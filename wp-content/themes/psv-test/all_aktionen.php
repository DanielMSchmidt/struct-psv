<?php
/**
 *
 * Template Name: all_aktionen
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 */

get_header();
?>

<div id="container">
	<div id="content" role="main">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		?><div id="start">
		<div class="title"><h2><?php the_title();?></h2></div>
		<?php the_content();?>
		</div>
		<?php endwhile;?>
		<div id="news">
			<?php query_posts('category_name=aktionen');?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			?>

			<div id="post-<?php the_ID();?>" <?php post_class();?>>
				<h2 class="entry-title"><?php the_title();?></h2>
				<div class="entry-content">
					<?php the_content();?>
					<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'stylish'), 'after' => '</div>'));?>
					<?php edit_post_link(__('Edit', 'stylish'), '<span class="edit-link">', '</span>');?>
				</div><!-- .entry-content -->
			</div><!-- #post-## -->
			<?php endwhile;?>
			<?php wp_reset_query();
				//NEU
			?>
		</div><!--#news -->
	</div><!-- #content -->
</div><!-- #container -->
<?php get_sidebar();?>
<?php get_footer();?>
