<?php $options = my_get_theme_options();?>
<div class="col-sm-12 hidden-xs">
	<div class="full-width find-wrapper">
		<div id="cars-container">
			<ul class="cars-list list-one">
				<div class="col-sm-2">
					<li>
						<a   href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_6']);?>/"><img src="<?php  bloginfo('stylesheet_directory'); ?>/assets/images/product-images/camionette.png" alt="<?php echo $options['vehicle_type_6'];?>" /></a>
						<a   href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_6']);?>/"><?php echo $options['vehicle_type_6'];?></a>
					 </li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_2']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/sportscars.png" alt="<?php echo $options['vehicle_type_2'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_2']);?>/"><?php echo $options['vehicle_type_2'];?></a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_4']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/minivans.png" alt="<?php echo $options['vehicle_type_4'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_4']);?>/"><?php echo $options['vehicle_type_4'];?></a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_5']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/pickuptrucks.png" alt="<?php echo $options['vehicle_type_5'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_5']);?>/"><?php echo $options['vehicle_type_5'];?></a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_7']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/sedanscoupes.png" alt="<?php echo $options['vehicle_type_7'];?>" /></a>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_7']);?>/"><strong><?php echo $options['vehicle_type_7'];?></strong></a>
						</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_8']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/crossover.png" alt="<?php echo $options['vehicle_type_8'];?>" /></a>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_8']);?>/"><strong><?php echo $options['vehicle_type_8'];?></strong></a>
					</li>
				</div>
			</ul>
		</div>
	</div>
</div>