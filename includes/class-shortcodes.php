<?php
/**
 * GoDaddy Reseller Store shortcode class.
 *
 * Handles the GoDaddy Reseller Store shortcode processing.
 *
 * @class    Reseller_Store/Shortcodes
 * @package  Reseller_Store/Plugin
 * @category Class
 * @author   GoDaddy
 * @since    1.1.0
 */

namespace Reseller_Store;

if ( ! defined( 'ABSPATH' ) ) {

	// @codeCoverageIgnoreStart
	exit;
	// @codeCoverageIgnoreEnd
}

final class Shortcodes {

	/**
	 * Widgets args.
	 *
	 * @since 1.1.0
	 *
	 * @var array
	 */
	private $args = [
		'before_widget' => '',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		'after_widget'  => '</div>',
	];

	/**
	 * Class constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {

		/**
		 * Register the domain search shortcode
		 *
		 * @shortcode [rstore-domain-search]
		 *
		 * @since  1.0.0
		 *
		 * @param  array $atts Defualt shortcode parameters.
		 *
		 * @return mixed Returns the HTML markup for the domain search container.
		 */
		add_shortcode( 'rstore-domain-search', [ $this, 'domain_search' ] );

		/**
		 * Register the domain search shortcode
		 *
		 * @shortcode [rstore_domain_search]
		 *
		 * @since  1.1.0
		 *
		 * @param  array $atts Defualt shortcode parameters.
		 *
		 * @return mixed Returns the HTML markup for the domain search container.
		 */
		add_shortcode( 'rstore_domain_search', [ $this, 'domain_search' ] );

		/**
		 * Register the add to cart shortcode
		 *
		 * @shortcode [rstore_cart_button]
		 *
		 * @since  1.1.0
		 *
		 * @param  array $atts Defualt shortcode parameters.
		 *
		 * @return mixed Returns the HTML markup for the cart button
		 */
		add_shortcode( 'rstore_cart_button', [ $this, 'cart_button' ] );

		/**
		 * Register the add to product shortcode
		 *
		 * @shortcode [rstore_product]
		 *
		 * @since  1.1.0
		 *
		 * @param  array $atts Defualt shortcode parameters.
		 *
		 * @return mixed Returns the HTML markup for the product pod
		 */
		add_shortcode( 'rstore_product', [ $this, 'product' ] );

		/**
		 * Register the login shortcode
		 *
		 * @shortcode [rstore_login]
		 *
		 * @since  1.1.0
		 *
		 * @param  array $atts Defualt shortcode parameters.
		 *
		 * @return mixed Returns the HTML markup for the product pod
		 */
		add_shortcode( 'rstore_login', [ $this, 'login' ] );

		/**
		 * Register the domain transfer shortcode
		 *
		 * @shortcode [rstore-domain-transfer]
		 *
		 * @since NEXT
		 *
		 * @param  array $atts Defualt shortcode parameters.
		 *
		 * @return mixed Returns the HTML markup for the domain transfer container.
		 */
		add_shortcode( 'rstore_domain_transfer', [ $this, 'domain_transfer' ] );

	}

	/**
	 * Render the domain search widget.
	 *
	 * @since 1.1.0
	 *
	 * @param array $atts        The shortcode attributes.
	 *
	 * @return mixed Returns the HTML markup for the domain search container.
	 */
	public function domain_search( $atts ) {

		$this->args['before_widget'] = '<div class="widget rstore-domain">';

		$domain = new Widgets\Domain_Search();

		return $domain->widget( $this->args, $atts );

	}

	/**
	 * Render the cart button widget.
	 *
	 * @since 1.1.0
	 *
	 * @param array $atts        The shortcode attributes.
	 *
	 * @return mixed Returns the HTML markup for the cart button container.
	 */
	public function cart_button( $atts ) {

		$this->args['before_widget'] = '<div class="widget rstore-cart">';

		$cart = new Widgets\Cart();

		return $cart->widget( $this->args, $atts );

	}

	/**
	 * Render the product widget.
	 *
	 * @since 1.1.0
	 *
	 * @param array $atts        The shortcode attributes.
	 *
	 * @return mixed Returns the HTML markup for the product container.
	 */
	public function product( $atts ) {

		$this->args['before_widget'] = '<div class="widget rstore-product">';

		$product = new Widgets\Product();

		return $product->widget( $this->args, $atts );

	}

	/**
	 * Render the login widget.
	 *
	 * @since 1.1.0
	 *
	 * @param array $atts        The shortcode attributes.
	 *
	 * @return mixed Returns the HTML markup for the login container.
	 */
	public function login( $atts ) {

		$this->args['before_widget'] = '<div class="widget rstore-login">';

		$login = new Widgets\Login();

		return $login->widget( $this->args, $atts );

	}

	/**
	 * Render the domain transfer widget.
	 *
	 * @since NEXT
	 *
	 * @param array $atts        The shortcode attributes.
	 *
	 * @return mixed Returns the HTML markup for the domain transfer container.
	 */
	public function domain_transfer( $atts ) {

		$this->args['before_widget'] = '<div class="widget rstore-domain-transfer">';

		$domain = new Widgets\Domain_Transfer();

		return $domain->widget( $this->args, $atts );

	}

	/**
	 * Checks if the shortcode is being rendered as a widget.
	 *
	 * @since 1.3.0
	 *
	 * @param array $atts Shortcode attributes.
	 *
	 * @return boolean    True is id key is set, else false.
	 */
	public static function is_widget( $atts = [] ) {

		return isset( $atts['widget_id'] );

	}

}
