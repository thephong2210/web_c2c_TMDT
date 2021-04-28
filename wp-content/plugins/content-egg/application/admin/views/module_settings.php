<?php defined('\ABSPATH') || exit; ?>

<?php if (\ContentEgg\application\Plugin::isFree() || \ContentEgg\application\Plugin::isInactiveEnvato()): ?>
    <div class="cegg-maincol">
    <?php endif; ?>
    <div class="wrap">
        <h2><?php _e('Module Settings', 'content-egg'); ?></h2>


        <h2 class="nav-tab-wrapper">
            <a href="?page=content-egg-modules" class="nav-tab<?php if (!empty($_GET['page']) && $_GET['page'] == 'content-egg-modules') echo ' nav-tab-active'; ?>">
                <span class="dashicons dashicons-menu-alt3"></span>
            </a>
            <?php foreach (ContentEgg\application\components\ModuleManager::getInstance()->getConfigurableModules(true) as $m): ?>
                <?php if ($m->isDeprecated() && !$m->isActive()) continue; ?>
                <?php $c = $m->getConfigInstance(); ?>
                <a href="?page=<?php echo \esc_attr($c->page_slug()); ?>" class="nav-tab<?php if (!empty($_GET['page']) && $_GET['page'] == $c->page_slug()) echo ' nav-tab-active'; ?>">
                    <span<?php if ($m->isDeprecated()): ?> style="color: darkgray;"<?php endif; ?>>
                        <?php echo \esc_html($m->getName()); ?>                    
                    </span>
                </a>
            <?php endforeach; ?>
        </h2> 

        <div class="cegg-wrap">
            <div class="cegg-maincol">

                <h3>
                    <?php echo \esc_html(sprintf(__('%s Settings', 'content-egg'), $module->getName())); ?>
                    <?php if ($docs_uri = $module->getDocsUri()) echo sprintf('<a target="_blank" class="page-title-action" href="%s">' . __('Documentation', 'content-egg') . '</a>', $docs_uri); ?>
                </h3>

                <?php if ($module->isDeprecated()): ?>
                    <div class="cegg-warning">

                        <?php if ($module->getId() == 'Amazon'): ?>
                            <?php echo __('WARNING:', 'content-egg'); ?>
                            <?php echo sprintf(__('Amazon PA-API v4 <a target="_blank" href="%s"> is deprecated</a>.', 'content-egg'), 'https://webservices.amazon.com/paapi5/documentation/faq.html'); ?>
                            <?php echo sprintf(__('Only <a target="_blank" href="%s">Content Egg Pro</a> has support for the new PA-API v5.', 'content-egg'), 'https://www.keywordrush.com/contentegg/pricing'); ?>
                            <?php echo _e('Please', 'content-egg'); ?> <a target="_blank" href="https://ce-docs.keywordrush.com/modules/affiliate/amazon#why-amazon-module-is-not-available-in-ce-free-version"><?php _e('read more...', 'content-egg'); ?></a>
                        <?php endif; ?>

                        <?php if ($module->getId() != 'Amazon'): ?>
                            <strong>
                                <?php echo __('WARNING:', 'content-egg'); ?>
                                <?php echo __('This module is deprecated', 'content-egg'); ?>
                                (<a target="_blank" href="<?php echo \ContentEgg\application\Plugin::pluginDocsUrl(); ?>/modules/deprecatedmodules"><?php _e('what does this mean', 'content-egg'); ?></a>).
                            </strong>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($module) && $requirements = $module->requirements()): ?>
                    <div class="cegg-warning">  
                        <strong>
                            <?php echo _e('WARNING:', 'content-egg'); ?>
                            <?php _e('This module cannot be activated!', 'content-egg') ?>
                            <?php _e('Please fix the following error(s):', 'content-egg') ?>
                            <ul>
                                <li><?php echo join('</li><li>', $requirements) ?></li>
                            </ul>

                        </strong>
                    </div>
                <?php endif; ?>                            

                <?php \settings_errors(); ?>   
                <form action="options.php" method="POST">
                    <?php \settings_fields($config->page_slug()); ?>
                    <table class="form-table">
                        <?php \do_settings_sections($config->page_slug()); ?>								
                    </table>        
                    <?php \submit_button(); ?>
                </form>

            </div>

            <div class="cegg-rightcol">
                <div>
                    <?php
                    if (!empty($description))
                        echo '<p>' . $description . '</p>';
                    ?>

                    <?php if (!empty($module) && $module->isFeedModule()): ?>
                        <?php if ($last_date = $module->getLastImportDateReadable()): ?>
                            <li><?php echo sprintf(__('Last feed import: %s.'), $last_date); ?></li>
                            <li><?php echo sprintf(__('Total products: %d.'), $module->getProductCount()); ?></li>
                        <?php endif; ?>
                        <li title="<?php echo \esc_attr(__('Your unzipped feed must be smaller than this.', 'content-egg')); ?>"><?php echo sprintf(__('WordPress memory limit: %s'), WP_MAX_MEMORY_LIMIT); ?>
                            (<a href="https://wordpress.org/support/article/editing-wp-config-php/#increasing-memory-allocated-to-php" target="_blank">?</a>)
                        </li>                                        
                        <?php if ($last_error = $module->getLastImportError()): ?>
                            <li style="color: red;"><?php echo sprintf(__('Last error: %s'), $last_error); ?></li>
                            <?php endif; ?>       
                        <?php endif; ?>
                </div>
            </div>
        </div>


    </div>


    <?php if (\ContentEgg\application\Plugin::isFree() || \ContentEgg\application\Plugin::isInactiveEnvato()): ?>
    </div>    
    <?php include('_promo_box.php'); ?>
<?php endif; ?>