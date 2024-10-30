<?php

/*
Plugin Name: MobileKit
Plugin URI: http://mobilekit.shawnsandy.com
Description: A jquerymobile powered toolkit for creating WordPress mobile web apps and themes for Touch-Optimized Smartphones & Tablets.
Version: 0.6 beta
Author: Shawn Sandy
Author URI: http://blog.shawnsandy.com
License: GPL2
 * 
*/

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : amobiletoolkit@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/** 
 *
 * *****************************************************************************
 * @Todo
 * Add localization
 * Create plugins widgets.
 *
 * *****************************************************************************
 */


/**
 * load some plugin functions
 */
require_once WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/mobile/mobile-actions.php';

define('MK_PATH', WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)));
define('MK_URL', WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)));

  /**
     * *************************************************************************
     * autoloaders
     * *************************************************************************
     */
    spl_autoload_register('s365_mobile_autoloader');
    spl_autoload_register('mobile_autoloader');

function s365_mobile_autoloader($class) {
    if (file_exists(WP_PLUGIN_DIR . '/studio365/includes/' . $class . '.php'))
        include_once WP_PLUGIN_DIR . '/studio365/includes/' . $class . '.php';
}



function mobile_autoloader($class) {
    if (file_exists(MK_PATH . '/mobile/' . $class . '.php'))
        include_once MK_PATH . '/mobile/' . $class . '.php';
}

class mobileKit {



    /**
     * Set the name of the plugin...
     * @var string
     */
    private $plugin_name = 'mobilekit';

    /**
     * Set the Title of the plugin...
     * @var string
     */
    private $plugin_title = 'Mobile Kit';

    /**
     * Set the plugin url
     * @var string
     */
    private $plugin_url;

    /**
     * Set the plugin path
     * @var string
     */
    private $plugin_path;

    /**
     *
     * @var <type> 
     */
    public $kit;
    

    public function  __construct() {

        $this->plugin_path = WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/';

        $this->plugin_url = WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/';

        /**
         * FOR INDIVIDUAL / STANDALONE PLUGINS
         * loading classes
         * checking for the studio365toolkit first
         * load form plugin directory if file not found
         * may need to to copy files if not found
         */

        
        
        $this->kit = new mobile_kit();

        $this->actions();

        add_image_size('image-32', 32,32,true);
        add_image_size('image-80', 80,80,true);
        add_image_size('image-16', 16,16,true);       

        
    }
    
  
    /**
     * Factory
     * @return mobileKit
     */
    public static function factory(){
        $factory = new mobileKit();
        return $factory;
    }



    /**
     * -----------------------------------
     * Plugin basics
     * -----------------------------------
     *
     */

    /**
     * Plugin actions here
     */
    public function actions() {


        /**
         * Run on admin startup
         */
        add_action('admin_init', array(&$this,'admin_init'));

        /**
         * Adds a plugin hook for the plugin
         * @example do_action('plugin_name');
         */
        add_action($this->plugin_name, array(&$this, 'plugin'));

        add_action('admin_menu', array(&$this,'menu_actions'));

        add_action('admin_head', array(&$this,'admin_styles'));

       // add_action('init', array(&$this,'mobilize'));

        $this->meta();

    }

    /**
     * stuff to run on admin init
     */
    public function admin_init() {

        /**
         * Creating plugin option group
         */
        register_setting($this->plugin_name . '_group', $this->plugin_name . '_options',array('mobileKit','validate_mobile_options'));

        register_setting ('mkui_group', 'mkui_options' );

    }


    /*
     * -------------------------------------
     * Plugin Menu
     * -------------------------------------     *
     */
    public function menu_actions(){
        /**
         * setup the plugin menus
         */
        /**
         * Add a Top Level menu
         */
        add_menu_page($this->plugin_name, ucfirst($this->plugin_title), 'manage_options', basename(__file__), array(&$this, 'plugin_menu') , $this->plugin_url.'includes/s365-icon.png');

        /**
         * Add a submenus
         */
        add_submenu_page(basename(__file__), 'MobileKit Settings', 'Settings', 'manage_options', $this->plugin_name.'_settings',array(&$this, 'plugin_option_menu'));

        /**
         * 
         */
        add_submenu_page(basename(__file__), 'MobileKit Options', 'UI Options', 'manage_options', 'js_settings',array(&$this, 'ui_option_menu'));

        
    }

    /**
     * Place your plugin support info here
     */
    public function plugin_help(){
        /**
         * Be sure and plugin support here information here
         */
        echo '<div class="wrap">';
        echo '<h2>' . ucfirst($this->plugin_name) . ' Support </h2>';
        echo '<p> Description goes here...</p>';
        echo '</div>';
    }

    public function plugin_menu(){
        /**
         * Create custom / top-level menu function
         */
        include_once MK_PATH .'/mobile/views/main.php';
    }

    public function plugin_sub_menu(){
        /**
         * Code/Function foryour custom menu
         */
       
    }

    public function plugin_option_menu(){
        /**
         * Code/Function for you default settings display menu
         */
        $option_name = $this->plugin_name.'_options';
        ?>
         <div class="wrap">
            <h2>Mobile Settings </h2>
            <?php include_once $this->plugin_path.'mobile/options.php'; ?>            
        </div>
        <?
    }


    public function ui_option_menu(){
    include_once MK_PATH . '/mobile/js_options.php';
    }

    /**
     *
     * @param string $filename Location of the file to include must be placed in hte login views folder
     * @param string $title
     */
    public function menu_display($filename=null, $title=null) {
        if ($filename != null AND file_exists($this->plugin_path. '/mobile/' . $filename)):
            include_once $this->plugin_path. '/moblie/' . $filename ;
        else :
            echo '<div class="wrap">';
            echo '<h2>' . ucfirst($this->plugin_name) . ' ' . $title . ' </h2>';
            echo '<p> Description goes here...</p>';
            echo '</div>';
        endif;
    }

      public function meta() {
        // add custom meta to custom post type 'portfolio'
        //add_meta_box( 'attachments_list', __( 'Attachments', 'attachments_textdomain' ), array(&$this,'attachemnt'), 'product', 'normal' );
        $mobile_info = new WPAlchemy_MetaBox(array(
                    'id' => 'mk_meta',
                    'title' => 'MobileKit Options',
                    'context' => 'side',
                    'types' => array('post'),
                    'priority' => 'low',
                    'template' => MK_PATH."/mobile/mobile-transitions.php"
                ));
    }

    /**
     *
     * @param string $value
     * @return string
     */
    public static function post_meta($id,$meta_value="mk_transitions",$default='fade'){
        $meta = get_post_meta($id, 'mk_meta', TRUE);
        if(!empty ($meta))
        return $meta["{$meta_value}"];
        else return $default;
    }

    
    public function device_image_array(){
        $tablets = array('android','ipad','blackberry');
        $phones = array('iphone');
    }

    public static function the_post_thumbnail($size = 'thumbnail',$attr=null,$use_file= false){
        $device = $this->device();
        $img = $device.'-'.$size['size'];

    if($use_file):

        else:

endif;

    }

    public static function css($stylesheet='less.css'){
        $css_file = MKP_URL."/css/".$stylesheet;
        if(file_exists(STYLESHEETPATH.'/less.css'))
            $css_file = STYLESHEETPATH.'/less';
        elseif(file_exists(TEMPLATEPATH.'/less'))
            $css_file = TEMPLATEPATH.'/'.$stylesheet;
        ?>       
	<link rel="stylesheet" href="<?php echo $css_file ; ?>" type="text/css" media="screen" />
        <link rel="stylesheet" media="screen" href="less.css"/>
	<meta name="viewport" content="width=device-width; initial-scale=1"/>

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<![endif]-->
	
        <?php
    }

    public static function mk_css(){
        if(!is_admin()) add_action ('mobile_head', array(&$this,'css'));
    }

    /**
     * ------------------------------------
     * Plugin Functions
     * ------------------------------------
     *
     */

     
    public function validate_mobile_options($input){
        $input['url'] = esc_url_raw($input['url'], array('http','https'));
        $input['app_on'] = ($input['app_on'] == 'ON') ? esc_html($input['app_on']) : Null;
        $input['web_view'] = ($input['web_view'] == 'ON') ? esc_html($input['web_view']) : Null;
        $input['default'] = wp_filter_nohtml_kses($input['default']);
        $input['iphone'] = wp_filter_nohtml_kses($input['iphone']);
        $input['ipad'] = wp_filter_nohtml_kses($input['ipad']);
        $input['android'] = wp_filter_nohtml_kses($input['android']);
        $input['blackberry'] = wp_filter_nohtml_kses($input['blackberry']);
        $input['palm'] = wp_filter_nohtml_kses($input['palm']);
        $input['safari'] = wp_filter_nohtml_kses($input['safari']);
        $input['chrome'] = $input['chrome'];

        return $input;
    }

    public function validate_js_options($input){
        $input['swatch'] = wp_filter_nohtml_kses($input['swatch']);
        $input['tbar_postion'] = wp_filter_nohtml_kses($input['tbar_postion']);
        $input['tbar_fullscreen'] = wp_filter_nohtml_kses($input['tbar_fullscreen']);
        //$input['tbar_position'] = wp_filter_nohtml_kses($input['tbar_position']);
        $input['iconpos'] = wp_filter_nohtml_kses($input['iconpos']);
        return $input;
    }

    public function admin_styles(){
        /**
         * TODO
         * Fix: Only load on plugin page.
         */
        ?>
<link rel='stylesheet' id='mobile-options'   href='<?php echo MK_URL.'/mobile/mobilekit.css' ?>' type='text/css' media='all' />
         <?
    }


     /**
     *
     */
    public function mobilize(){
        if ($this->kit->get_browser()):
            $this->jquery_mobile();
            $this->switch_mobile_theme();                
        endif;
        }



    public function jquery_mobile(){
        /*
         * http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css
         * http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js
         */
        if(!is_admin()):
        wp_enqueue_style('jquery_moblie', 'http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css');
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.4.4.min.js');
        wp_enqueue_script('jquery_mobile', 'http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js', array('jquery'));
        endif;
    }

    /**
     * *************************************************************************
     * mobile themes
     * *************************************************************************
     */ 


    public function installed_themes($device) {
            $installed = get_themes();
            $_options = get_option($this->plugin_name . '_options');
            foreach ($installed as $name => $theme): ?>
            <option value="<?php echo $theme['Template'] ?>"
            <?php if ($_options["{$device}"] == $theme['Template']) echo 'selected="selected"'; ?> >
            <?php echo $name; ?>(<?php echo $theme['Template'] ?> )</option>
            <?php
            endforeach;

        }
        
        public function device(){
            $device = $this->kit->get_browser();
            return $device;
        }

        public function get_mobile_theme() {
            $device = $this->device();
            $theme = get_option('mobilekit_options');
            $mobiletheme = $theme["{$device}"];
            $default = $theme['default'];
            if($mobiletheme  AND !empty ($mobiletheme) ):
                add_action('init', array('mobileKit','jquery_mobile'));
                $mobile_theme = $mobiletheme;
            elseif($default AND !empty ($default)):
                add_action('init', array('mobileKit','jquery_mobile'));
                $mobile_theme = $default;
            endif;
            return $mobile_theme;
        }

        public function theme(){
            $theme = $this->get_mobile_theme();
            return $theme;
        }


        public function demo(){
            add_action('init', array('mobileKit','jquery_mobile'));
            return 'mobile-kit';
           
        }

        /**
         * Use filter to switch themes
         */
        public function switch_mobile_theme() {
            $kit = $this->kit->get_browser();
            $theme = $this->get_mobile_theme();
            $options = get_option($this->plugin_name . '_options');
            if($kit AND $theme){
               if($options['app_on'] == "ON" ):
                   //do stuff
                   add_action('template_redirect', array(&$this,'mobile_app'));
                   //return '';
                   else :
                   //do stuff
                add_filter('stylesheet', array(&$this, 'get_mobile_theme'));
                add_filter('template', array(&$this,  'get_mobile_theme'));
                endif;                
            }            
        }

    /**
     * *************************************************************************
     * Mobile Apps
     * http://apps.studio365prouctions.com
     * *************************************************************************
     */


        public function mobile_app(){
            $_url = get_option($this->plugin_name.'_options');
            $url = $_url['url'];
            if($url):
                wp_redirect($url);
            exit;
            endif;
        }


    
    
    /**
     * ------------------------------------
     * Plugin activation /deavtivation
     * ------------------------------------
     */

    public function activation(){

    }

    public function deactivation(){

        /**
         * remove plugin options
         */
         delete_option($this->plugin_name . '_options');
    }

}

/**
 * instantiate plugin
 */
$mobile = mobileKit::factory();
$mobile->switch_mobile_theme();

$mk_shortcodes = new mobile_shortcode();

