<?php
/**
 *
 * Template Name: mod_list
 * The template displays the Headline & Content of the Page and aftwerwards all Posts of the Category, which is chosen in the costum field 'newstopic'
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
			<div class="entry-title">
				<h3>News</h3>
			</div>
			<?php $newstopic = get_post_meta($posts[0]->ID, 'newstopic', true);

if ($newstopic) : //der zweite loop wird nur verwendet wenn das benutzerfeld ausgefuellt ist//
$cat = get_cat_ID($newstopic);
$cat_slug = get_category($cat)->slug;
			?>

			<?php query_posts('category_name=' . $cat_slug);?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			?>
			<div class="newswrapper"><!-- wrapper -->
			<div id="post-<?php the_ID();?>" <?php post_class();?>>
				<h2 class="entry-content-title"><?php the_title();?></h2>
				<div class="entry-content">
					<?php $teaser = get_post_custom_values('teaser');?>
					<?php if(!(empty($teaser))) { ?><?php echo $teaser[0];?><?php }?>
					<a href="<?php the_permalink() ?>"> Mehr erfahren &raquo;</a>
				</div><!-- .entry-content -->
			</div><!-- #post-## -->
			</div><!-- wrapper ende -->
			<?php endwhile;?>
			<?php wp_reset_query();
				//NEU
			?>
			<?php endif; //ende vom if ($category) : bereich// ?>
		</div><!--#news -->
	</div><!-- #content -->
</div><!-- #container -->
<?php get_sidebar();?>
<?php get_footer();?>
