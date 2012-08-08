<?php
if ($newstopic) : //der zweite loop wird nur verwendet wenn das benutzerfeld ausgefuellt ist//

$cat = get_cat_ID($newstopic);
$cat_slug = get_category($cat)->slug; 

		?>
		<div id="news">
			<div class="entry-title">
				<h3><?php if ($linkNews): ?><a href='<?php echo $linkNews; ?>'>News</a> <?php else:?>News<?php endif;?></h3>
			</div>
			<?php query_posts('posts_per_page=' . $anzahlposts . '&category_name=' . $newstopic);?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			?>

			<div class="newswrapper">
				<!-- wrapper -->
				<div id="post-<?php the_ID();?>" <?php post_class();?>>
					<h2 class="entry-content-title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
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
			<?php endif; //ende vom if ($category) : bereich//?>
		</div><!--#news -->