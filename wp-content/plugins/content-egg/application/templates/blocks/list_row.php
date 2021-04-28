<?php
defined('\ABSPATH') || exit;

use ContentEgg\application\helpers\TemplateHelper;
?>
<div class="cegg-list-logo-title cegg-mt5 cegg-mb5 visible-xs text-center">
    <a<?php TemplateHelper::printRel(); ?> target="_blank" href="<?php echo $item['url']; ?>"><?php echo esc_html(TemplateHelper::truncate($item['title'], 100)); ?></a>
</div>
<div class="row-products">
    <div class="col-md-2 col-sm-2 col-xs-12 cegg-image-cell">
        <?php if ($item['img']): ?>
            <a<?php TemplateHelper::printRel(); ?> target="_blank" href="<?php echo $item['url']; ?>"><img src="<?php echo $item['img']; ?>" alt="<?php echo \esc_attr($item['title']); ?>" /></a>
        <?php endif; ?>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-12 cegg-desc-cell hidden-xs">
        <div class="cegg-no-top-margin cegg-list-logo-title">
            <a<?php TemplateHelper::printRel(); ?> target="_blank" href="<?php echo $item['url']; ?>"><?php echo esc_html(TemplateHelper::truncate($item['title'], 100)); ?></a>
        </div>
        
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 cegg-price-cell text-center">
        <div class="cegg-price-row">

            <?php if ($item['price']): ?>
                <div class="cegg-price cegg-price-color cegg-price-<?php echo \esc_attr(TemplateHelper::getStockStatusClass($item)); ?>"><?php echo TemplateHelper::formatPriceCurrency($item['price'], $item['currencyCode']); ?></div>
            <?php endif; ?> 
            <?php if ($item['priceOld']): ?>
                <div class="text-muted"><strike><?php echo TemplateHelper::formatPriceCurrency($item['priceOld'], $item['currencyCode']); ?></strike></div>
            <?php endif; ?>
            <?php if ($stock_status = TemplateHelper::getStockStatusStr($item)): ?>
                <div title="<?php echo \esc_attr(sprintf(__('Last updated on %s', 'content-egg-tpl'), TemplateHelper::getLastUpdateFormatted($item['module_id'], $post_id))); ?>" class="cegg-lineheight15 stock-status status-<?php echo \esc_attr(TemplateHelper::getStockStatusClass($item)); ?>">
                    <?php echo \esc_html($stock_status); ?>
                </div>
            <?php endif; ?>

            <?php if ($item['module_id'] == 'Amazon'): ?>
                <?php if (!empty($item['extra']['totalNew']) && $item['extra']['totalNew'] > 1): ?>
                    <div class="cegg-font60 cegg-lineheight15">
                        <?php echo $item['extra']['totalNew']; ?>
                        <?php _e('new', 'content-egg-tpl'); ?> 
                        <?php if ($item['extra']['lowestNewPrice']): ?>
                            <?php _e('from', 'content-egg-tpl'); ?> <?php echo TemplateHelper::formatPriceCurrency($item['extra']['lowestNewPrice'], $item['currencyCode']); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($item['extra']['totalUsed'])): ?>
                    <div class="cegg-font60 cegg-lineheight15">
                        <?php echo $item['extra']['totalUsed']; ?>
                        <?php _e('used', 'content-egg-tpl'); ?> <?php _e('from', 'content-egg-tpl'); ?>
                        <?php echo TemplateHelper::formatPriceCurrency($item['extra']['lowestUsedPrice'], $item['currencyCode']); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($amazon_last_updated)): ?>
                    <div class="cegg-font60 cegg-lineheight15">
                        <?php _e('as of', 'content-egg-tpl'); ?> <?php echo $amazon_last_updated; ?>
                        <?php TemplateHelper::printAmazonDisclaimer(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div> 
    </div>                    
    <div class="col-md-2 col-sm-2 col-xs-12 cegg-btn-cell">        
        <div class="cegg-btn-row">
            <a<?php TemplateHelper::printRel(); ?> target="_blank" href="<?php echo $item['url']; ?>" class="btn btn-danger btn-block"><span><?php TemplateHelper::buyNowBtnText(true, $item, $btn_text); ?></span></a> 
        </div>  
        <?php if ($merchant = TemplateHelper::getMerhantName($item)): ?>
            <div class="text-center">
                <small class="text-muted title-case"><?php echo \esc_html($merchant); ?></small>
            </div>
        <?php endif; ?>

    </div>
</div>