<div class="container-fluid footer">

    <div class="row">
        <div class="col-sm-12">
            <div id="footer">
                <?php if ( ! dynamic_sidebar( 'type' ) ) : endif; ?>
                <?php if ( ! dynamic_sidebar( 'find-cars' ) ) : endif; ?> 
            </div>
        </div>
        <div id="footer" class="col-sm-12" >
            <?php if ( ! dynamic_sidebar( 'footer' )) : ?>
            <?php endif; ?>
        </div>
        <a href="#" class="crunchify-top"><i class="fa fa-arrow-up "></i></a>
    </div>	
</div>
	<div class="container-fluid hidden-xs">
		<div class="row">
			<div class="bottom-bar-wrapper">
				<div class="bottom-bar">
					<p>Auto-new-deal, tous droits réservés
					</p>
				</div>
			</div>
			
<?php wp_footer(); ?>
</body>
</html>
