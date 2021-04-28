<?php
defined('\ABSPATH') || exit;

use ContentEgg\application\helpers\TemplateHelper;
?>

<div class="row">
    <div class="col-md-6 text-center cegg-image-container cegg-mb20">
        <?php if ($item['img']): ?>
            <a<?php TemplateHelper::printRel(); ?> target="_blank" href="<?php echo $item['url']; ?>">                    
                <img src="<?php echo $item['img']; ?>" alt="<?php echo esc_attr($item['title']); ?>" />
            </a>
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <h3 class="cegg-item-title"><?php echo $item['title']; ?></h3>
        <?php if ($item['rating']): ?>
            <div class="cegg-mb5">
                <?php echo TemplateHelper::printRating($item, 'default'); ?>
            </div>
        <?php endif; ?>

        <div class="cegg-price-row">

            <?php if ($item['price']): ?>
                <span class="cegg-price cegg-price-color">            
                    <?php if ($item['priceOld']): ?>
                        <span class="text-muted"><strike><?php echo TemplateHelper::formatPriceCurrency($item['priceOld'], $item['currencyCode'], '<small>', '</small>'); ?></strike></span><br>
                    <?php endif; ?>
                    <?php echo TemplateHelper::formatPriceCurrency($item['price'], $item['currencyCode'], '<span class="cegg-currency">', '</span>'); ?></span>
            <?php endif; ?>


            <?php if ($stock_status = TemplateHelper::getStockStatusStr($item)): ?>
                <mark title="<?php echo \esc_attr(sprintf(__('Last updated on %s', 'content-egg-tpl'), TemplateHelper::getLastUpdateFormatted($module_id, $post_id))); ?>" class="stock-status status-<?php echo \esc_attr(TemplateHelper::getStockStatusClass($item)); ?>">
                    &nbsp;<?php echo \esc_html($stock_status); ?>
                </mark>
            <?php endif; ?>            
            <?php if ($cashback_str = TemplateHelper::getCashbackStr($item)): ?>
                <div class="cegg-cashback"><?php echo sprintf(__('Plus %s Cash Back', 'content-egg-tpl'), $cashback_str); ?></div>                            
            <?php endif; ?>
        </div>

        <?php $this->renderBlock('item_after_price_row', array('item' => $item)); ?>

        <div class="cegg-btn-row cegg-mb5">
            <div><a<?php TemplateHelper::printRel(); ?> target="_blank" href="<?php echo $item['url']; ?>" class="btn btn-danger cegg-btn-big"><?php TemplateHelper::buyNowBtnText(true, $item, $btn_text); ?></a></div>
            <span class="title-case text-muted"><?php TemplateHelper::getMerhantName($item, true); ?></span>
        </div>
        <div class="cegg-last-update-row cegg-mb15">
            <span class="text-muted">
                <small>
                    <?php _e('as of', 'content-egg-tpl'); ?> <?php echo TemplateHelper::getLastUpdateFormatted($module_id, $post_id); ?>
                    <?php if ($module_id == 'Amazon') TemplateHelper::printAmazonDisclaimer(); ?>
                </small>
            </span>                    
        </div>
    </div>
</div>

