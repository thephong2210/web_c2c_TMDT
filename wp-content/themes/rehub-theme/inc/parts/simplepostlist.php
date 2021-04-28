<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $post;?>
<?php $nometa = (isset($nometa)) ? $nometa : '';?>
<?php $image = (isset($image)) ? $image : '';?>
<?php $border = (isset($border)) ? $border : '';?>
<?php $excerpt = (isset($excerpt)) ? $excerpt : '';?>
<?php $priceenable = (isset($priceenable)) ? $priceenable : '';?>
<?php $compareenable = (isset($compareenable)) ? $compareenable : '';?>
<?php $hotenable = (isset($hotenable)) ? $hotenable : '';?>
<?php $fullsizeimage = (isset($fullsizeimage)) ? $fullsizeimage : '';?>
<?php $center = (isset($center)) ? $center : '';?>
<?php $imageheight = (!empty($imageheight)) ? (int)$imageheight : '';?>
<?php $imagewidth = (!empty($imagewidth)) ? (int)$imagewidth : '';?>
<?php if (rehub_option('theme_subset') == 'recash') {
	$hotenable = $priceenable = true;
}?>
<?php $producttype = ('product' == get_post_type($post->ID)) ? true : false;?>

<div class="col_item item-small-news flowhidden<?php if($image):?> item-small-news-image<?php endif;?><?php if($border):?> border-lightgrey pl10 pr10 mb20 pt10 pb10<?php else:?> pb15<?php endif;?><?php if($center):?> two_column_mobile<?php endif;?>">
	
	<?php if($image):?>
		<figure class="<?php if($border):?>img-centered-flex rh-flex-eq-height rh-flex-justify-center<?php else:?>text-center<?php endif;?><?php if($center):?> margincenter mb20<?php else:?> floatleft<?php endif;?><?php if(!$imagewidth && !$center):?> width-80<?php endif;?><?php if(!$imageheight && !$fullsizeimage):?> height-80<?php endif;?> img-width-auto position-relative"><a href="<?php the_permalink();?>">
			<?php if($fullsizeimage):?>
				<?php echo WPSM_image_resizer::show_wp_image('medium_grid', '', array('emptyimage'=>get_template_directory_uri() . '/images/default/noimage_336_220.png', 'css_class'=> 'rehub-sec-smooth')); ?>
			<?php else:?>
				<?php wpsm_thumb('minithumb'); ?>
			<?php endif;?>
		</a>
		</figure>
	<?php endif;?>
	<div class="item-small-news-details position-relative<?php if($image && !$center):?> floatright width-80-calc pl15 rtlpr15<?php endif;?>">
	    <?php if ($nometa !='1' && $producttype) :?>
    		<div class="post-meta mb10 upper-text-trans changeonhover"> 
	            <?php $categories = wc_get_product_terms($post->ID, 'product_cat');  ?>
	            <?php if (!empty($categories)) {
	                $first_cat = $categories[0]->term_id;
	                echo '<a href="'.get_term_link((int)$categories[0]->term_id, 'product_cat').'" class="woocat greycolor">'.$categories[0]->name.'</a>'; 
	            } ?> 
    		</div>     	
	    <?php endif;?>
	    <h3 class="<?php if ($priceenable && $producttype) :?>mb5<?php else:?>mb10<?php endif;?> mt0"><?php do_action('rehub_in_title_post_list');?><?php if($hotenable && rehub_option('hotmeter_disable') !='1') {echo getHotLikeTitle($post->ID);}?><a href="<?php the_permalink();?>" class="mr10"><?php the_title();?></a>
	    	<?php if ($priceenable && !$producttype) :?><?php rehub_create_price_for_list($post->ID);?><?php endif;?>
	    </h3>
	    <?php if ($priceenable && $producttype) :?><?php rehub_create_price_for_list($post->ID);?><?php endif;?>
	    <?php if($compareenable && $producttype && (rehub_option('compare_page') != '' || rehub_option('compare_multicats_textarea') != '')) {echo'<div class="woo-btn-actions-notext mb10">';echo wpsm_comparison_button(array('class'=>'rhwoosinglecompare', 'id'=>$post->ID)); echo '</div>';} ?>
	    <?php if ($nometa !='1' && !$producttype) :?>
	    	<div class="post-meta changeonhover"> <?php meta_small( true, false, true ); ?> </div> 	    	
	    <?php endif;?>
	    <?php if ($excerpt) :?>
	    	<div class="list_excerpt changeonhover font90 lineheight20"><?php kama_excerpt('maxchar=160'); ?> </div> 	    	
	    <?php endif;?>	    	    
	    <?php do_action('rehub_after_meta_post_list');?>    
    </div>
    <div class="clearfix"></div>
</div>