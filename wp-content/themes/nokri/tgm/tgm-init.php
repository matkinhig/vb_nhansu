<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme eblog for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'nokri_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function nokri_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
        array(
            'name' => esc_html__('WP Bakery Visual Composer', 'nokri'),
            'slug' => 'js_composer',
            'source' => get_template_directory() . '/required-plugins/js_composer.zip',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => ''
        ),
        array(
            'name' => esc_html__('Nokri Framework', 'nokri'),
            'slug' => 'nokri_framework',
            'source' => get_template_directory_uri() . '/required-plugins/nokri_framework.zip',
            'required' => true,
            'version' => '1.2.3',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => ''
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'nokri'),
            'slug' => 'contact-form-7',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'https://downloads.wordpress.org/plugin/contact-form-7.5.1.4.zip',
            'is_callable' => ''
        ),	
		array(
            'name' => esc_html__('Post Views Counter', 'nokri'),
            'slug' => 'post-views-counter',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'https://downloads.wordpress.org/plugin/post-views-counter.1.3.1.zip',
            'is_callable' => ''
        ),
		
		array(
            'name' => esc_html__('Add To Any', 'nokri'),
            'slug' => 'add-to-any',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'https://downloads.wordpress.org/plugin/add-to-any.1.7.39.zip',
            'is_callable' => ''
        ),
		array(
            'name' => esc_html__('One Click Demo Import', 'nokri'),
            'slug' => 'one-click-demo-import',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => 'https://downloads.wordpress.org/plugin/one-click-demo-import.2.5.2.zip',
            'is_callable' => ''
        ),
		
		array(
			'name'               => esc_html__( 'Woocommerce', 'nokri' ), // The plugin name.
			'slug'               => 'woocommerce', // The plugin slug (typically the folder name).
			'source'             => '', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.   
			'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/woocommerce.3.7.1.zip'
			 ), // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
  );
    
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'nokri', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => false, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '' // Message to output right before the plugins table.
    );
    
    tgmpa($plugins, $config);
}