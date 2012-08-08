<?php
/**
 *
 * Template Name: old_mod_list5	
 * The template displays the Headline & Content of the Page and aftwerwards all Posts of the Category, which is chosen in the costum field 'newstopic'
 * New on vers.2: Limit the number of posts by chose the costum field 'anzahlposts'
 * New on vers.3: The Links to News Gallery and Team are implementet (last one gets called by custom field 'linkteam')
 * New on vers.4: Template for Teampage on same Template through costumfield 'team' (empty => no Teampage/ 1=>Teampage
 * New on vers.5: team is renamed to status (=1 => Teampage/ =2 => Newspage) Sites (normal/teampage/newspage) are devided to *.php
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 */

get_header();

$linkTeam = get_post_meta($posts[0] -> ID, 'linkTeam', true);
$linkNews = get_post_meta($posts[0] -> ID, 'linkNews', true);
$linkGallery = get_post_meta($posts[0] -> ID, 'linkGallery', true);
$status = get_post_meta($posts[0] -> ID, 'status', true);
$newstopic = get_post_meta($posts[0] -> ID, 'newstopic', true);
$anzahlposts = get_post_meta($posts[0] -> ID, 'anzahlposts', true);
?>
<div id="container">
	<div id="content" role="main">
		<?php if($status == 1){
			//Teampage
			include './mod_list5/teampage.php';
		}elseif($status == 2){
			//Newspage
			include './mod_list5/newspage.php';
		}else{
			//normal
			include './mod_list5/normal.php';
		}
			
			
		?>
	</div><!-- #content -->
</div><!-- #container -->
<?php get_sidebar();?>
<?php get_footer();?>

