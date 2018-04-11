        <?php get_header('home'); ?>

        <div id="header_home">
            <?php if ( ! dynamic_sidebar( 'type' ) ) : endif; ?>
            <?php if ( ! dynamic_sidebar( 'find-cars' ) ) : endif; ?>
        </div>

        <div class="col-sm-9 home col-sm-push-3" id="content">
            <?php cps_ajax_search_results(); ?>
            <?php require_once('arrivals.php'); ?>
        </div>
        <div class="col-sm-3 col col-sm-pull-9" id="left-sidebar">
            <?php if ( ! dynamic_sidebar( 'search' ) ) : endif; ?>
            <div class= "hidden-xs">
                <?php if ( ! dynamic_sidebar('sidebar')) : endif; ?>
            </div>
        </div>
	</div>
</div>

<!--
<div class="container-fluid hidden-xs">
    <div class="full-width find-wrapper">
        <div class="col-sm-12" id="footer-gallery">
            <?php //echo do_shortcode('[gallery display="owlcolumns" columns="6" gutterwidth="10" link="file" size="small" captions="hide" bottomspace="five" ids="123,120,121,122,117,118,124,119,116,115,113,114"]'); ?>
        </div>
    </div>
</div>
-->

<?php get_footer('home'); ?>

