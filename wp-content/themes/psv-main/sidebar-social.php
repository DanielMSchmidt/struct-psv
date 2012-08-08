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
				Hier finden sie uns: 
			</h3>
		</div>
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.de/maps?oe=utf-8&amp;client=firefox-a&amp;ie=UTF8&amp;q=psv+kiel&amp;fb=1&amp;gl=de&amp;hq=psv+kiel&amp;cid=0,0,4810402441153598294&amp;ll=54.35147,10.13086&amp;spn=0.006295,0.006295&amp;t=m&amp;vpsrc=0&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.de/maps?oe=utf-8&amp;client=firefox-a&amp;ie=UTF8&amp;q=psv+kiel&amp;fb=1&amp;gl=de&amp;hq=psv+kiel&amp;cid=0,0,4810402441153598294&amp;ll=54.35147,10.13086&amp;spn=0.006295,0.006295&amp;t=m&amp;vpsrc=0&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">Größere Kartenansicht</a></small>
	</div>
	<div id="facebook">
		<h3>
			Hier finden sie uns auf Facebook
		</h3>
		<div class="fb-like-box" data-href="http://www.facebook.com/psv.kiel" data-width="300" data-height="400" data-show-faces="true" data-stream="false" data-header="false"></div>
	</div>
	<div id="twitter">
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 3,
	  interval: 30000,
	  width: 250,
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