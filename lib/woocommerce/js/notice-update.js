/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 2.3.0
 *
 * @author MaiTem
 * @license 
 * @package GenesisSample
 */

jQuery( document ).on(
	'click', '.crossfit-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'func_crossfit_dismiss_woocommerce_notice'
				}
			}
		);

	}
);
