<?php

/**
 * Description of uiOption
 *
 * @author Studio365
 */
class uiOption {

    private static  $options = array();

    private static  $settings = array();
    
   
    
    public function __construct() {
        $this->options = get_option('mkui_options');
        $this->settings = get_option('mobilekit_options');

    }


    /**
     * *************************************************************************
     * options
     * *************************************************************************
     */


    /**
     * settings: url, app_on, default, iphons, ipad, android, blackberry, palm, safari, chrome
     * @param string $option
     * @return <type>
     */
     public static function setting($option=array(),$default=null){
        $array =  get_option('mobilekit_options');
        if(!empty($array["{$option}"]))
        return $array["{$option}"];
        else
        return $default;
    }

    

    /**
     * *************************************************************************
     * setting
     * *************************************************************************
     */


    /**
     * options: tabr_fullscreen, tbar_position, swatch, iconpos
     * @param string $option
     * @return string  / false
     */
    public static function option($option=array(),$default=null){
        $array =  get_option('mkui_options');
        if(!empty($array["{$option}"]))
        return $array["{$option}"];
        else
        return $default;
    }

    /**
     * Data-position html element
     * @return string
     */
    public static function position(){
        //data-position="<?php echo uiOption::option('tbar_position', 'inline');        
        $data = uiOption::option('tbar_position', 'inline');
        return $data;        
    }

    /**
     * data-fullscreen html element
     * @return string
     */
    public static function fullscreen(){
        //data-position="<?php echo uiOption::option('tbar_position', 'inline');
        $data =  uiOption::option('tbar_fullscreen', 'false');
        return $data;
    }

    /**
     * data-position html element
     * @return string
     */
    public static function theme(){
        //data-position="<?php echo uiOption::option('tbar_position', 'inline');
        $data = uiOption::option('swatch', 'c');
        return $data;
    }

    /**
     * data-position html element
     * @param strion $icon 
     * @return string
     */
    public static function icon($icon){
        //data-position="<?php echo uiOption::option('tbar_position', 'inline');
        $data =  uiOption::option('$icon', null);
        return $data;
    }

    /**
     * data-iconpos html element
     * @return string
     */
    public static function iconpos(){
        //data-position="<?php echo uiOption::option('tbar_position', 'inline');
        $data = uiOption::option('iconpos', 'top');
        return $data;
    }

    /**
     * data-iconpos html element
     * @return string
     */
    public static function nobackbtn(){
        //data-position="<?php echo uiOption::option('tbar_position', 'inline');
        $data = uiOption::option('nobackbtn', 'false');
        return $data;
    }





    
}
?>
