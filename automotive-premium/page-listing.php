<?php

/**
 * 
 * Template Name: Sell your Car
 */
?>
<?php get_header(); ?>


		<div class="col-sm-9 col-sm-push-3" id="content-form">
				<?php cps_ajax_search_results(); ?>	
			<div style="border-bottom:none;" class="detail-page-content hideOnSearch">

       
          <div class="blog-post">

      <h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
      <!-- Sell your car form -->
      <div class="gorilla-form-wrapper">
        <form id="sell-your-car" name="sell_your_car" method="post" action="" class="gt-form" enctype="multipart/form-data">
          <h3 class="form-title"><?php _e('Your Vehicle Information &raquo;', 'language'); ?></h3>

          <!-- Listing title -->
          <div class="form-group">
            <label class="gt-title" for="gt-title"><?php _e('Your listing title', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-title" value="" tabindex="2" name="title" placeholder="<?php _e('Enter listing title', 'language'); ?>" required/>
          </div>

          <!-- Make & Model -->
          <div class="form-group">
	          
	          <label class="sr-only" for="gt-state"><?php _e('Your State', 'language'); ?></label>
            <?php gt_form_sell_your_car_field_location(3); ?>
          </div>
           <div class="form-group">
            
            <label class="sr-only" for="gt-city"><?php _e('City', 'language'); ?></label><span class="gt-loading makemodel"></span>
            <select name="city" id="gt-city" tabindex="4" class="gt-select" disabled="disabled" data-value="">
              <option value="" data-value="-1"><?php _e('Select State First', 'language'); ?></option>
            </select>

           </div>
	          <div class="form-group">
            <label class="sr-only" for="gt-make"><?php _e('Make', 'language'); ?></label>
            <?php gt_form_sell_your_car_field_make(3); ?>
	          </div>
	          <div class="form-group">
            <label class="sr-only" for="gt-model"><?php _e('Model', 'language'); ?></label><span class="gt-loading makemodel"></span>
            <select name="model" id="gt-model" tabindex="4" class="gt-select" disabled="disabled" data-value="">
              <option value="" data-value="-1"><?php _e('Select Make First', 'language'); ?></option>
            </select>
	          </div>
<div class="form-group">
            <label class="sr-only" for="gt-year"><?php _e('Year', 'language'); ?></label>
            <?php echo gt_form_sell_your_car_field_year(5); ?>
          </div>

          <!-- Price, Miles -->
          <div class="form-group">
            <label  class="gt-price" for="gt-price"><?php _e('Price', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-price" value="" tabindex="6" name="price" placeholder="<?php _e('Enter vehicle price', 'language'); ?>" required number/>
          </div>
          <div class="form-group">
            <label class="gt-miles" for="gt-miles"><?php _e('Miles', 'language'); ?></label>
            <input class="form-control" type="number" id="gt-miles" min="0" value="" tabindex="7" name="miles" placeholder="<?php _e('Enter vehicle miles', 'language'); ?>" required digits/>
          </div>

          <!-- Colors, Drive -->
          <div class="form-group">
            <label class="gt-ext" for="gt-exterior"><?php _e('Exterior', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-exterior" value="" tabindex="8" name="exterior" placeholder="<?php _e('Enter exterior color', 'language'); ?>" required/>
          </div>
          <div class="form-group">
            <label class="gt-int" for="gt-interior"><?php _e('Interior', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-interior" value="" tabindex="9" name="interior" placeholder="<?php _e('Enter interior color', 'language'); ?>" required/>
          </div>
          <div class="form-group">
            <label class="gt-drive" for="gt-drive"><?php _e('Drive', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-drive" value="" tabindex="10" name="drive" placeholder="<?php _e('Enter vehicle drive', 'language'); ?>" />
          </div>

          <!-- VIN, Features -->
          <div class="form-group">
            <label class="gt-vin" for="gt-vin"><?php _e('VIN', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-vin" value="" tabindex="11" name="vin" placeholder="<?php _e('Enter VIN number', 'language'); ?>" />
          </div>
          <div class="form-group">
            <label class="gt-features" for="gt-features"><?php _e('Features', 'language'); ?></label>
            <input class="form-control" type="text" id="gt-features" value="" tabindex="12" name="features" placeholder="<?php _e('Separate with commas (feature1, feature2, etc)', 'language'); ?>" />
          </div>

          <!-- Transmission, Type -->
          <div class="form-group">
            <label class="sr-only" for="gt-transmission"><?php _e('Transmission', 'language'); ?></label>
            <?php echo gt_form_sell_your_car_field_transmission(13); ?>
          </div>
          <div class="form-group">
            <label class="sr-only" for="gt-type"><?php _e('Vehicle Type', 'language'); ?></label>
            <?php echo gt_form_sell_your_car_field_type(14); ?>
          </div>

          <!-- Description -->
          <div class="form-group">
            <textarea placeholder="<?php _e('Enter vehicle listing description.', 'language'); ?>" id="gt-description" name="description" tabindex="20" cols="50" rows="10" class="textarea medium"></textarea>
          </div>

          <h3 class="form-subtitle"><?php _e('Image Gallery &raquo;', 'language'); ?></h3>

          <!-- Images -->
          <div class="form-group">
	          
	          
	           
	          <label  class="btn btn-default btn-file">
    <?php _e('Upload Photos', 'language'); ?> <input class="form-control" id="fileupload" type="file" name="images[]" class="button round secondary" tabindex="21"  style="display:none" value="<?php _e('Upload Photos', 'language'); ?>" multiple />
</label> 

	          
	          
<!--             <input class="form-control" id="fileupload" type="file" name="images[]" class="button round secondary" tabindex="21" multiple> -->
            <div class="upload-instructions">
            <p class="instructions"><?php _e('Images will be automatically resized to fit the listing layout. We recommend that you upload photos in full resolution for better results.','language');?></p> 
            <p class="instructions-cont"><?php _e('You may upload up to 12 images and each image may be no larger than 5MB','language');?></div>
            <div id="upload-result">
              <table id="uploaded-files">
                <thead>
                  <tr>
                    <th><?php _e('Preview','language');?></th>
                    <th><?php _e('Name','language');?></th>
                    <th><?php _e('Size','language');?></th>
                    <th><?php _e('Status','language');?></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>

          <?php if (!is_user_logged_in()): ?>
            <h3 class="form-subtitle"><?php _e('Personal Information &raquo;', 'language'); ?></h3>

            <!-- Name -->
            <div class="form-group">
              <label class="sr-only" for="gt-firstname"><?php _e('First name', 'language'); ?></label>
              <input class="form-control" type="text" id="gt-firstname" value="" tabindex="22" name="firstname" placeholder="<?php _e('Enter your first name', 'language'); ?>" required/>
            </div>
            <div class="form-group">
              <label class="sr-only" for="gt-lastname"><?php _e('Last name', 'language'); ?></label>
              <input class="form-control" type="text" id="gt-lastname" value="" tabindex="23" name="lastname" placeholder="<?php _e('Enter your last name', 'language'); ?>" required/>
            </div>

            <!-- Contact -->
            <div class="form-group">
              <label class="sr-only" for="gt-email"><?php _e('Email', 'language'); ?></label>
              <input class="form-control" type="email" id="gt-email" value="" tabindex="24" name="email" placeholder="<?php _e('Enter your e-mail', 'language'); ?>" required/>
            </div>
            <div class="form-group">
              <label class="sr-only" for="gt-phone"><?php _e('Phone number', 'language'); ?></label>
              <input class="form-control" type="text" id="gt-phone" value="" tabindex="25" name="phone" placeholder="<?php _e('Enter your phone number', 'language'); ?>" required/>
            </div>
          <?php endif; ?>

          <!-- Security -->
            <div class="securityImage1"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/captcha/CaptchaSecurityImages3.php?width=100&height=40&characters=5"/></div>
            <label class="sr-only" for="security_code3"><?php _e('Security Code', 'language'); ?></label>
            <input class="form-control" id="security_code3" name="security_code3" type="text" required autocomplete="off" tabindex="27" placeholder="<?php _e('Enter security code', 'language'); ?>"/>
            <input class="form-control" type="text" name="referringurl" id="gt-url" />

          <!-- Submit -->
          <div class="form-group">
	          
	          <label  class="btn btn-success btn-file">
    <?php _e('Submit & Pay for your listing', 'language'); ?> <input type="submit" style="display:none" value="<?php _e('Submit & Pay for your listing', 'language'); ?>" tabindex="30" id="gt-submit" name="gt-submit" />
</label> 

<!--             <input class="form-control" type="submit" value="<?php _e('Submit & Pay for your listing', 'language'); ?>" tabindex="30" id="gt-submit" name="gt-submit" class="button radius success"/> -->
            <span class="gt-loading submit"><?php _e($gt_form_waiting_message, 'language') ;?></span>
            
<!--             <input class="form-control" type="reset" value="<?php _e('Clear form', 'language'); ?>" tabindex="31" id="gt-clear" name="gt-clear" class="button radius  secondary"/> -->
            
             <span class="gt-paypal-img"><img  src="<?php echo get_template_directory_uri();?>/assets//sell-your-car/assets/img/paypal.png" alt="PayPal" /></span>
          </div>

          <?php wp_nonce_field('gt-sell-your-car', 'nonce'); ?>
        </form>

        <!-- Confirmation message -->
        <div style="clear: both"></div>
        <div class="gt-paypal">
          <div data-alert class="gt-message success alert-box radius"><?php _e($gt_form_success_message, 'language') ;?></div>
          <?php echo gt_paypal_form(); ?>
        </div>
      </div>
      <!-- / End sell your car form -->
     <?php //Form ends here. I hope you didn't break anything above! :) ?>

		</div>
          
          </div>
          
</div>         
    <div class="col-sm-3 col col-sm-pull-9"><!-- Start Col 3 -->
			<?php if ( ! dynamic_sidebar( 'search' ) ) : ?>
			<?php endif; ?>
			<?php if ( ! dynamic_sidebar('sidebar')) : ?>
			<?php endif; ?>
		</div><!-- End Col 3 -->
	</div><!-- End Row -->
</div><!-- End Container -->
<?php get_footer(); ?>