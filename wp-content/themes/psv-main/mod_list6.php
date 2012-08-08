<?php
/**
 *
 * Template Name: mod_list6
 * The template displays the Headline & Content of the Page and aftwerwards all Posts of the Category, which is chosen in the costum field 'newstopic'
 * New on vers.2: Limit the number of posts by chose the costum field 'anzahlposts'
 * New on vers.3: The Links to News Gallery and Team are implementet (last one gets called by custom field 'linkteam')
 * New on vers.4: Template for Teampage on same Template through costumfield 'team' (empty => no Teampage/ 1=>Teampage
 * New on vers.5: Added possibility to make a Page, whithout the includition of the normal title
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 * @author: Daniel Schmidt
 * @todo: Refacrtoren: States einführen für gesetzt - ungesetzt fälle => Logik am anfang
 * @todo: WTF ist der Unterschied zwischen $linkTeam und $newstopic
 */

get_header();


//holt sich alle Variablen vom Backend

$linkTeam = get_post_meta($posts[0] -> ID, 'linkTeam', true);
$linkNews = get_post_meta($posts[0] -> ID, 'linkNews', true);
$linkGallery = get_post_meta($posts[0] -> ID, 'linkGallery', true);
$team = get_post_meta($posts[0] -> ID, 'team', true);
$newstopic = get_post_meta($posts[0] -> ID, 'newstopic', true);
$anzahlposts = get_post_meta($posts[0] -> ID, 'anzahlposts', true);
$ohnetitel = get_post_meta($posts[0] -> ID, 'ohnetitel', true);



/* Dieses Template erstellt eine von 2 Seiten: Die Teamseite / Die normale Seite 
 * Optional werden 3 Toplinks eingeschaltet
 * Optional werden unten eine bestimmte Anzahl an Posts eingeblendet
 * Optional wird der Titel ausgeblendet
 */
?>
<div id="container">
	<div id="content" role="main">
		<?php
		if(isset($team)){
		//Teamseite ab hier
		?>
			<div id="news">
				<div class="entry-title">
					<h3>
						<?php the_title();?>
					</h3>
				</div>
				<?php
<<<<<<< HEAD
				 if ($newstopic):
=======
				 if ($newstopic){ 
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
				 	//holt den Inhalt anhand des Newstopic (Teamseite)
				 	//$cat = get_cat_ID($newstopic);
				 	//$cat_slug = get_category($cat)->slug;
				 	query_posts('&category_name=' . $newstopic); 
<<<<<<< HEAD
				 endif;
				 //Teampostschleife
				?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
=======
				 }
				 //Teampostschleife
				if ( have_posts() ) while ( have_posts() ) : the_post();
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
 				?>
 					<div class="teamwrapper">
					<!-- wrapper -->
						<div id="post-<?php the_ID();?>" <?php post_class();?>>
							<h2 class="entry-content-title">
								<a href="<?php the_permalink() ?>">
									<?php the_title();?>
								</a>
							</h2>
							<div class="entry-content">
								<?php the_content();?>
							</div><!-- .entry-content -->
						</div><!-- #post-## -->
 					</div><!-- teamwrapper ende -->
				<?php endwhile;?>
				<?php wp_reset_query(); //Queryreset für Teamseite?> 
<<<<<<< HEAD
				<?php endif;?>
=======
				<?php endif; //Endif von have:posts()?>
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
			</div><!--#news -->
			<?php
			//Ende der Teamseite
			}else{
				//normale Seite ab hier
<<<<<<< HEAD
				?>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php
				if (empty($ohnetitel)):
=======
				if ( have_posts() ) while ( have_posts() ) : the_post();
				if (empty($ohnetitel)){
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
				?>
					<div id="start">
						<div class="title">
							<h2>
								<?php the_title(); ?>
							</h2>
						</div>
			<?php
<<<<<<< HEAD
				endif;
			//ende von Ohnetitel 
				if(($newstopic) or ($linkTeam) or ($linkGallery)):
=======
			}
			//ende von Ohnetitel 
			if(($newstopic) or ($linkTeam) or ($linkGallery)){
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
				//start linkbox
			?>
			<div id="linkbox">
				<?php if($newstopic): ?>
					<div id="customlink">
						<a href="#news">News</a>
					</div>
				<?php endif;?>
				<?php if($linkTeam): ?>
					<div id="customlink">
						<a href="<?php echo $linkTeam;?>">Team</a>
					</div>
				<?php endif;?>
				<?php if($linkGallery): ?>
				<div id="customlink">
					<a href='<?php echo $linkGallery; ?>'>Bilder</a>
				</div>
				<?php endif; ?>
			</div>
			<br />
			<?php
				//end of linkbox
<<<<<<< HEAD
			endif;
=======
			} 
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
			//@todo: add </div> for start (change CSS that way)
			?>
			<div id="maincontent">
				<?php the_content();?>
			</div>
		</div> <!-- #start -->
		<?php
<<<<<<< HEAD
		endwhile;
		endif;
		}
		//vom mittleren else
		?>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_sidebar(sozial);?>
<?php get_footer(mod1);?>

=======
		endif;
		endwhile;
		?>
	</div><!-- #content -->
</div><!-- #container -->
	<?php get_sidebar(sozial);?>
	<?php get_footer(mod1);?>
>>>>>>> 125e1b8c5c8e57b322a43374fae72e399490e213
	