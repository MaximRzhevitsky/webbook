<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */




function max_wc_menucart($menu, $args)
{
    // Проверяем, установлен ли и активирован плагин WooCommerce и добавляем новый элемент в меню, назначенному основным меню навигации
    if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) || 'primary' !== $args->theme_location){
        return $menu;
    }
    ob_start();
    global $woocommerce;
    $viewing_cart = __('View your shopping cart', 'storefront');
    $start_shopping = __('Start shopping', 'storefront');
    $cart_url = $woocommerce->cart->get_cart_url();
    $shop_page_url = get_permalink(wc_get_page_id('shop'));
    $cart_contents_count = $woocommerce->cart->cart_contents_count;
    $cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'storefront'), $cart_contents_count);
    $cart_total = $woocommerce->cart->get_cart_total();
    // Раскомментируйте строку ниже для того, чтобы скрыть иконку корзины в меню, когда нет добавленных товаров в корзине.
   //  if ( $cart_contents_count > 0 ) {
    if ($cart_contents_count == 0) {
        $menu_item = '<li class="right"><a class="wcmenucart-contents" href="' . $shop_page_url . '" title="' . $start_shopping . '">';
    } else {
        $menu_item = '<li class="right"><a class="wcmenucart-contents" href="' . $cart_url . '" title="' . $viewing_cart . '">';
    }
    $menu_item .= '<i class="fa fa-shopping-cart"></i> ';
    $menu_item .= $cart_contents . ' - ' . $cart_total;
    $menu_item .= '</a></li>';
    // Раскомментируйте строку ниже для того, чтобы скрыть иконку корзины в меню, когда нет добавленных товаров в корзине.
   //  }
    echo $menu_item;
    $social = ob_get_clean();
    return $menu . $social;
}
add_filter('wp_nav_menu_items','max_wc_menucart', 10, 2);

/**
 * datatables
 */
//require get_stylesheet_directory() . '/inc/datatables.php';







