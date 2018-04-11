<?php get_header(); ?>
	<?php if (have_posts()) :  while (have_posts()) : the_post();?>	 
		<?php 
			  global $options;$fields;$options2;$options3;
			  $fields = get_post_meta($post->ID, 'mod1', true);
			  $options = my_get_theme_options();
			  $options2 = get_post_meta($post->ID, 'mod2', true);
			  $options3 = get_post_meta($post->ID, 'mod3', true);
			  ?>	
			  <?php cps_ajax_search_results_single(); ?>
			  <div class="col-sm-9  col-sm-push-3 hideOnSearch">
			  	<div class="row">
			  		<div class="col-sm-8">	
					<div id="wrap">
						<div id="myCarousel" class="carousel slide hideOnSearch single" data-interval="false" data-ride="carousel">
							<div class="carousel-inner">
								<?php gallery_single ($post->ID,'full'); ?>
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
								<i class="fa fa-angle-left fa-2x"></i></a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
								<i class="fa fa-angle-right fa-2x"></i></a>
						</div> 
						<div id="my-thumbs-list" class="carousel">
							<ul class="carousel-thumbs hideOnSearch thumbnail">
								<?php gallery_thumbs ($post->ID,'thumbnail'); ?>
							</ul>    
 						</div>
 					</div>
 				<div style="clear: both"></div>
 				<ul class="nav nav-tabs hideOnSearch" role="tablist" id="myTabs">
 					<li class="active">
 						<a href="#overview" role="tab" data-toggle="tab">
 							<?php _e('Overview','language');?>
          				</a>
		  			</li>
                    <!--
		  			<li><a href="#features" role="tab" data-toggle="tab">
		  					</?php _e('Features','language');?>
          				</a>
		  			</li>
		  			<li>
		  				<a href="#video" role="tab" data-toggle="tab">
		  					</?php _e('Video','language');?>
          				</a>
		  			</li> -->
		  			<li>
		  				<a href="#contact" role="tab" data-toggle="tab">
		  					<?php _e('Contact Us','language');?>
          				</a>
		  			</li>
          		</ul>
		  	<div class="tab-content hideOnSearch">
			  	<div class="tab-pane active" id="overview">
			<ul class="overview">
			<?php 
				$content = get_the_content();
				$content = preg_replace("/<img[^>]+\>/i", " ", $content);          
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				?><h1><?php if ( $fields['year']){ echo $fields['year'];}else {  echo ''; }?></span> <?php  $terms_child = get_the_terms($post->ID,'makemodel');
					$terms = get_the_terms($post->ID,'makemodel');
					$sorted_terms = array();
					$find_parent = 0;
					for( $i = 0; $i < sizeof($terms); ++$i) {
						if (is_array($terms))
					{
					foreach ($terms as $term) {
					      if ($term->parent == $find_parent) {
					         $find_parent = $term->term_id;
					         $sorted_terms[] = $term; }
					   		}
						}
					}
					if ( ! isset($sorted_terms[0])) {
					$sorted_terms[0] = null; } else {
				    echo $sorted_terms[0]->name.' ';}
				    $sorted_terms_child = array();
				    $find_child = 0;
				    for( $i = 0; $i < sizeof($terms_child); ++$i) {
						if (is_array($terms_child)) {
						foreach ($terms_child as $term_child) {
					      if ($term_child->parent == $find_child) {
					         $find_child = $term_child->term_id;
					         $sorted_terms_child[] = $term_child; }
							}
						}
					}
					if ( ! isset($sorted_terms_child[1])) {
				  $sorted_terms_child[1] = null; } else {
				  echo $sorted_terms_child[1]->name;} ?></p></h1><?php
				echo '<span class="car-overview"><h2>'.the_title().'</h2></span>';
				echo '<span class="car-overview">'.wpautop(the_content()).'</span>';
			?>
			</ul>
    </div>
    <div class="tab-pane fade" id="features">
    <div class="item-list">								
		<ul class="features  features-list">
		<?php	if (get_the_terms($post->ID, 'features')) {
				$taxonomy = get_the_terms($post->ID, 'features');									
				foreach ($taxonomy as $taxonomy_term) {
			?> <li><?php echo $taxonomy_term->name;?></li><?php }  														
			}
			?>
        </ul>    
	</div>
    </div>
<div class="tab-pane fade" id="contact">
<?php echo do_shortcode('[contact-form-7 id="68" title="Formulaire de contact 1"]');?> 
	<div style="clear:both"></div>
</div>
	<div class="tab-pane fade" id="video">
		<ul class="video">
			<li><?php $video_source = get_post_meta($post->ID, 'video_meta_box_source', true);
$video_id = get_post_meta($post->ID, 'video_meta_box_videoid', true);		if(($video_source == "vimeo") && !empty($video_id)){ ?>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&amp;portrait=0&amp;color=e275c7" class="embed-responsive-item" webkitAllowFullScreen allowFullScreen></iframe>
			</div>
			<?php } elseif(( $video_source == "youtube") && !empty($video_id)){ ?>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" class="embed-responsive-item" allowfullscreen></iframe>
			</div>
			<?php  } ?>
			</li>
		</ul>
    </div>
    </div>
	<div style="clear: both"></div>
</div>
<?php endwhile; endif; ?>   
<div class="col-sm-4 single-sidebar hideOnSearch">	
	<span class="info-single">
		<h3 class="price-single"><?php $options['price_text'];?>
			<?php if (is_numeric( $fields['price'])){ echo $options['currency_text'].number_format($fields['price']);}else {  echo  $fields['price']; }?>
		</h3>
		<div class="buttons-action">
		
			<a  type="button" class="btn btn-default btn-lg offer" href="/nous-contacter/">
					<i class="fa fa-envelope-o"></i> <?php _e('Request Information','language');?>
			</a>
		</div>
		<ul class="quick-list quick-glance hideOnSearch ">
		<?php echo do_shortcode('[socialbuttons]');?>
		<?php $terms_child = get_the_terms($post->ID,'location');
				$sorted_terms_child = array();
				$find_child = 0;
				for( $i = 0; $i < sizeof($terms_child); ++$i) {
				if (is_array($terms_child)) {
				foreach ($terms_child as $term_child) {
				  if ($term_child->parent == $find_child) {
				     $find_child = $term_child->term_id;
				     $sorted_terms_child[] = $term_child;
							}
						}
					}
				}
				if ( ! isset($sorted_terms_child[1])) {
				$sorted_terms_child[1] = null; } else {
				echo '<li><p>'.$sorted_terms_child[1]->name;}
				$terms = get_the_terms($post->ID,'location');
				$sorted_terms = array();
				$find_parent = 0;
				for( $i = 0; $i < sizeof($terms); ++$i) {
					if (is_array($terms)) {
				
				foreach ($terms as $term) {
				      if ($term->parent == $find_parent) {
				         $find_parent = $term->term_id;
				         $sorted_terms[] = $term;
				      		}
				   		}
					}
				}
				if ( ! isset($sorted_terms[0])) {
				$sorted_terms[0] = null; } else {
				echo ', '.$sorted_terms[0]->name.'</p><div style="clear:both"></div></li>';} 
				global $user_ID;
				if  (get_the_author_meta('phone',$user_ID)  == true ) {
				echo '<li><p>'.__('Phone: ','language').'</p>'.get_the_author_meta('phone').'</li>';  }else {  echo ''; }
				if ((is_numeric( $fields['price']))){ echo '<li><p>'.$options['price_text'].':</p> '.$options['currency_text']; echo number_format($fields['price']).'</li>';}else {  echo '<li><p>'.$options['price_text'].':</p> '.$fields['price'].'<li>'; }
				if (!empty( $fields['miles'])){ echo '<li><p>'.$options['miles_text'].':</p> '.$fields['miles'].'</li>';}else {  echo ''; }
           		if (!empty( $fields['vehicle_type'])){ echo '<li><p>'.$options['vehicle_type_text'].':</p> '.$fields['vehicle_type'].'</li>';}else {  echo ''; }
            	if (!empty( $fields['drive'])){ echo '<li><p>'.$options['drive_text'].':</p> '.$fields['drive'].'</li>';}else {  echo ''; }
            	if (!empty( $fields['transmission'])){ echo '<li><p>'.$options['transmission_text'].':</p> '.$fields['transmission'].'</li>';}else {  echo ''; }
            	if (!empty( $fields['exterior'])){ echo '<li><p>'.$options['exterior_text'].':</p> '.$fields['exterior'].'</li>';}else {  echo ''; }
   				if (!empty( $fields['interior'])){ echo '<li><p>'.$options['interior_text'].':</p> '.$fields['interior'].'</li>';}else {  echo ''; }
   				if (!empty( $fields['epamileage'])){ echo '<li><p>'.$options['epa_mileage_text'].':</p> '.$fields['epamileage'].'</li>';}else {  echo ''; }
   				if (!empty($fields['stock'])){ echo '<li><p>'.$options['stock_text'].':</p> '.$fields['stock'].'</li>';}else {  echo ''; }
   				if (!empty( $fields['vin'])){ echo '<li><p>'.$options['vin_text'].':</p> '.$fields['vin'].'</li>';}else {  echo ''; }?>
   				<div style="clear: both"></div>
   				<div><?php if (!empty( $fields['vin'])){ ?> 
            <div style="background: white;padding: 10px;margin: 20px auto 10px auto !important;text-align: center !important;display: block;">
                <a href='http://www.carfax.com/cfm/ccc_DisplayHistoryRpt.cfm?partner=WDB_0&vin=<?php echo $fields['vin'];?>'><img style="background:white;padding:10px;" src='http://www.carfaxonline.com/img/new_blk_logo.gif' width='155' height='42' border='0'></a>
                    </div>
                    <?php  }else {   echo '';  }?>            
            </div>		
   			</ul>
			<?php if ( ! dynamic_sidebar( 'specs' )) : ?>
			<?php endif; ?>     
				</span>
			</span>
		</div>
	</div>
</div>  
<div class="col-sm-3 col-sm-pull-9">
	<?php if ( ! dynamic_sidebar( 'search' ) ) : endif; ?>
	<?php if ( ! dynamic_sidebar('sidebar')) :   endif; ?>
</div>    
<div class="col-sm-12">
	<?php if ( ! dynamic_sidebar('featured')) : endif; ?>
</div>
</div>
<?php get_footer(); ?>
