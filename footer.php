			</div><!--end div main-->
			<div id="footer">
			<div id="footerSocial">
				
			</div>
			<div id="footerCopy">
				<div class="wrapper">
					<div id="footerLeft">
						<p>&copy; <?php echo date('Y'); ?> - Kenaz Template - Proudly made at <a href="http://plavatvornica.com/">Plava tvornica Croatia</a></p>
					</div>
					<div id="footerRight">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
		<?php
			include "includes/bxSlider.php";//bxSlider
			include "includes/flexSlider.php";//flexSlider
			include "includes/toggle_search.php";//toogle search
			include "includes/preload.php";//preload
		?>
	</body>
</html>