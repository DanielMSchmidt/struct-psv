<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after.
 *
 * @package WordPress
 * @subpackage STTF
 * @since STTF 1.0
 */
?>
	</div><!-- #main -->
  <div id="site-info" class="clearfix">
    <a href="http://www.stylish-templates.de"><img src="<?php bloginfo('template_url'); ?>/images/st-logo.jpg" alt="Free Wordpress Themes" /></a>
    <span class="copyright">Copyright <?= date(Y); ?> <?php bloginfo( 'name' ); ?></span>
    </a>
  </div><!-- #site-info -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

<!-- #Google Analytics -->
<script type="text/javascript">

	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("UA-xxxxxx-x");
pageTracker._trackPageview();
} catch(err) {}

</script>
</body>
</html>
