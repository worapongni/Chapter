	<footer class="site-footer">

        <?php if(get_theme_mod('cht-footer-callout-display') == "Yes") { ?>

        <div class="footer-callout clearfix">
            <div class="footer-callout-image">
                <img src="<?php echo wp_get_attachment_url(get_theme_mod('cht-footer-callout-image')); ?>">
            </div>
            <div class="footer-callout-text">
                <h2><a href="<?php echo get_permalink(get_theme_mod('cht-footer-callout-link')); ?>"><?php echo get_theme_mod('cht-footer-callout-headline'); ?></a></h2>
                <?php echo wpautop(get_theme_mod('cht-footer-callout-text')); ?>
            </div>
        </div>
        <?php } ?>

        <!-- Footer Widget Area -->
        <div class="footer-widgets clearfix">

            <?php if( is_active_Sidebar('footer1') ) { ?>

                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer1'); ?>
                </div>

            <?php } ?>

            <?php if( is_active_Sidebar('footer2') ) { ?>

               <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer2'); ?>
                </div>

            <?php } ?>

            <?php if( is_active_Sidebar('footer3') ) { ?>

                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer3'); ?>
                </div>

            <?php } ?>

            <?php if( is_active_Sidebar('footer4') ) { ?>

                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer4'); ?>
                </div>

            <?php } ?><!-- /Footer Widget Area -->

        </div>
        
	    <nav class="site-nav">
			
            <?php 
                $args = array( 
                    'theme_location' => 'footer',
                );
            ?>
            <?php wp_nav_menu($args); ?>

        </nav>
			
		<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>

	</footer>

</div>


<?php wp_footer(); ?>
</body>
</html>
