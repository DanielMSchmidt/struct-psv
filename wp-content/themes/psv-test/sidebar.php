<?php
/**
 * The social Sidebar containing Google Maps, Facebook and Twitter.
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 */
?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=171237259322";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<div id="sidebar">
	<div id="googlemaps">
		<div>
			<h3> 
				<a href="http://maps.google.de/maps/place?q=psv+kiel&hl=de&cid=4810402441153598294">Hier finden Sie uns: </a>
			</h3>
		</div>
		<table cellspacing="0" cellpadding="0" border="0"><tr><td><iframe src="http://map-generator.eu/map.php?id=23866&amp;ra=11" width="300" height="300" marginwidth="0" marginheight="0" frameborder="0" scrolling="no">Ihr Browser kann leider keine Frames anzeigen. <a href="http://map-generator.eu/map.php?id=23866">Bitte klicken Sie hier um zu der Karte zu gelangen.</a></iframe></td></tr><tr><td align="right"><a href="http://map-generator.eu" style="font-size:9px;">Google Maps einbinden</a></td></tr></table>	
	</div>
	<div id="facebook">
		<h3>
			Hier finden Sie uns auf Facebook:
		</h3>
		<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpsv.kiel&amp;width=300&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=171237259322" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:290px;" allowTransparency="true"></iframe>
	</div>
		<div id="twitter">
		<script src="http://widgets.twimg.com/j/2/widget.js"></script>
		<script>
		new TWTR.Widget({
		  version: 2,
		  type: 'profile',
		  rpp: 3,
		  interval: 30000,
		  width: 300,
		  height: 250,
		  theme: {
		    shell: {
		      background: '#0098c6',
		      color: '#ffffff'
		    },
		    tweets: {
		      background: '#c0deed',
		      color: '#000000',
		      links: '#0098c6'
		    }
		  },
		  features: {
		    scrollbar: true,
		    loop: false,
		    live: false,
		    behavior: 'default'
		  }
		}).render().setUser('PSVKiel').start();
		</script>
		</div>
</div>