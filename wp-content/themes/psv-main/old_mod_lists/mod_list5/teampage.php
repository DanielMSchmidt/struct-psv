<?php echo $team

?>
<?php echo $linkTeam
?>
<div id="news">
	<div class="entry-title">
		<h3><?php the_title();?></h3>
	</div>
	<?php

if ($newstopic) : //Loop für den Fall, dass dies eine Teamseite ist//

$cat = get_cat_ID($newstopic);
$cat_slug = get_category($cat)->slug;

	?>
	<?php query_posts('&category_name=' . $newstopic);?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	?>

	<div class="teamwrapper">
		<!-- wrapper -->
		<div id="post-<?php the_ID();?>" <?php post_class();?>>
			<h2 class="entry-content-title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
			<div class="entry-content">
				<?php the_content();?>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->
	</div><!-- wrapper ende -->
	<?php endwhile;?>
	<?php wp_reset_query();
		//NEU
	?>
	<?php endif; //ende vom if ($category) : bereich//?>
</div><!--#news -->

		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		?><div id="start">
		<div class="title"><h2><?php the_title();?></h2></div>
		<div id="linkbox">
		<?php if($newstopic): ?> <div id="customlink"><a href="#news">News</a></div><?php endif;?>
		<?php $linkTeam = get_post_meta($posts[0] -> ID, 'linkTeam', true);?>
		<?php if($linkTeam): ?>
		<div id="customlink"><a href="<?php echo $linkTeam;?>">Team</a></div>
		<?php endif;?>
		<?php if($linkGallery): ?><div id="customlink"><a href='<?php echo $linkGallery; ?>'>Bilder</a></div><?php endif; ?></div><br /><div id="maincontent">
		<?php the_content();?>
		</div></div>
		<?php endwhile;?>
		<?php //Keine Teamseite ab hier ->
