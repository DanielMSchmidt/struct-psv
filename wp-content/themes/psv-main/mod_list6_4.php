<?php
/**
 *
 * Template Name: mod_list6.4
 * The template displays the Headline & Content of the Page and aftwerwards all Posts of the Category, which is chosen in the costum field 'newstopic'
 * New on vers.2:     Limit the number of posts by chose the costum field 'anzahlposts'
 * New on vers.3:     The Links to News Gallery and Team are implementet (last one gets called by custom field 'linkteam')
 * New on vers.4:     Template for Teampage on same Template through costumfield 'team' (empty => no Teampage/ 1=>Teampage
 * New on vers.5:     Added possibility to make a Page, whithout the includition of the normal title
 * New on vers.6:     Refactored whole template
 * New on vers.6.1:   Bugfixes
 * New on vers.6.2:   added Slugs before News
 * New on vers. 6.3:  Newsboxes clickable from now on
 * New on vers. 6.4:  with the Tag newsname, the heading of the "News" is changeable now, remains "News" on default
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 * @author: Daniel Schmidt
 */

get_header();

$linkTeam = get_post_meta($posts[0] -> ID, 'linkTeam', true);
$linkNews = get_post_meta($posts[0] -> ID, 'linkNews', true);
$linkGallery = get_post_meta($posts[0] -> ID, 'linkGallery', true);
$team = get_post_meta($posts[0] -> ID, 'team', true);
$newstopic = get_post_meta($posts[0] -> ID, 'newstopic', true);
$anzahlposts = get_post_meta($posts[0] -> ID, 'anzahlposts', true);
$ohnetitel = get_post_meta($posts[0] -> ID, 'ohnetitel', true);
$slug_on = get_post_meta($posts[0] -> ID, 'slug_on', true);
$newsname = get_post_meta($posts[0] -> ID, 'newsname', true);

?>
<div id="container">
	<div id="content" role="main">
		<?php if ($team == 1):
		?>
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
			<?php
				if ( have_posts() ) while ( have_posts() ) : the_post();
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
		<?php else:?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
		<?php if (empty($ohnetitel)) : ?>
			<div id="start">
			<div class="title"><h2><?php the_title();?></h2></div>
			<?php
				if (($newstopic) or ($linkTeam) or ($linkGallery)):
			?>
		    		<div id="linkbox">
		    		<?php if ($newstopic): ?>
						<div id="customlink"><a href="#news">News</a></div>
					<?php endif;?>
		    		<?php if ($linkTeam): ?>
		    			<div id="customlink"><a href="<?php echo $linkTeam;?>">Team</a></div>
					<?php endif;?>
					<?php if ($linkGallery): ?>
						<div id="customlink"><a href='<?php echo $linkGallery; ?>'>Bilder</a></div>
					<?php endif; ?>
				</div><br />
				<?php endif; ?>
			<div id="maincontent">
		<?php the_content();?>
			</div>
		</div>
		<?php
		endif;
		?>
		<?php endwhile;?>
		<?php //Keine Teamseite ab hier ->
		if ($newstopic) : //der zweite loop wird nur verwendet wenn das benutzerfeld ausgefuellt ist//
			$cat = get_cat_ID($newstopic);
			$cat_slug = get_category($cat)->slug;
		?>
		<div id="news">
			<div class="entry-title">
				<?php
				if (empty($ohnetitel)) :
				?>
				<h3>
				<?php
			    if (empty($newsname)){
			      $news = "News";
			    }else{
			      $news = $newsname;
			    }
				  if ($linkNews): ?>
				  <a href='<?php echo $linkNews; ?>'><?php echo($news) ?></a> <?php else:?><?php echo($news) ?><?php endif;?></h3>
				<?php
				else :
				?>
				<h3><?php echo $ohnetitel; ?></h3>
				<?
				endif;
				?>
			</div>
			<?php query_posts('posts_per_page=' . $anzahlposts . '&category_name=' . $newstopic);?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			?>

			<div class="newswrapper">
				<!-- wrapper -->
				<div id="post-<?php the_ID();?>" <?php post_class();?> onClick="location.href='<?php the_permalink() ?>'">
					<h2 class="entry-content-title"><a href="<?php the_permalink() ?>"><?php

           if($slug_on == 'ja'){
             $von_sparte = get_post_custom_values('von_sparte');
             if($von_sparte != ""){
              echo $von_sparte[0]." : ";
            }
          }
					 the_title();
					 ?></a></h2>
					<div class="entry-content">
						<?php $teaser = get_post_custom_values('teaser');?>
						<?php
						if (!(empty($teaser))):
							echo $teaser[0];
						endif;
						?>
						<a href="<?php the_permalink() ?>"> Mehr erfahren &raquo;</a>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
			</div><!-- wrapper ende -->
			<?php endwhile;?>
			<?php wp_reset_query();
				//NEU
			?>
			<?php endif; //ende vom if ($category) : bereich//?>
		</div><!--#news -->
		<?php endif;?>
	</div><!-- #content -->
  <?php if ($newstopic == NULL){ get_sidebar(sozial); }?>
</div><!-- #container -->
<?php if ($newstopic != NULL){ get_sidebar(sozial); }?>
<?php get_footer(mod1);?>

