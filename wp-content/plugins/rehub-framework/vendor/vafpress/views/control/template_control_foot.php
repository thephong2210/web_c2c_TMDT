<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
		<?php VP_Util_Text::print_if_exists($description, '<div class="description">%s</div>'); ?>
		</div>
		<div class="vp-js-bind-loader vp-field-loader vp-hide"><img src="<?php VP_Util_Res::img_out('ajax-loader.gif', ''); ?>" /></div>
		<div class="validation-msgs"><ul></ul></div>
	</div>
</div>