<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mobileLayout
 *
 * @author Studio365
 */
class mobileLayout {
    //put your code here
    public function  __construct() {

    }

       /**
     * *************************************************************************
     * Mobile Page layout
     * *************************************************************************
     */


     /**
      *
      * @param <type> $view
      * @param <type> $array
      * @return <type>
      */
    public static function view($view=Null, $array = array('query' => 'showposts=3')) {
        // self::views($view);
        if($view == NULL)
            return "View not Specified";
        if(file_exists(STYLESHEETPATH.'/views/'.$view.'.php')){
            $dir = STYLESHEETPATH.'/views';
        }
        elseif(file_exists(TEMPLATEPATH.'/views/'.$view.'.php')) {
            //ctTemplate::setBaseDir(TEMPLATEPATH.'/views/');
            $dir = TEMPLATEPATH.'/views';
        }elseif(file_exists(MK_PATH.'/mobile/views/'.$view.'.php')) {
            //ctTemplate::setBaseDir(S365_DIR.'/views/');
            $dir = MK_PATH.'/mobile/views';
        } else {
            return "View Error";
        }
        $views = new ctTemplate();
        $_view = $views->loadTemplate($view, $array, $dir);
        return $_view;
    }

    public static function header($view='header'){
        return self::view('header');
    }

    public static function footer($view='footer'){
        return self::view('footer');
    }

    /**
     *
     * @param string $view
     * @param array $array
     * @return 
     */
    public static function page($view='page', $array = array()){
        return self::view($view, $array);
    }

    public static function button($icon = Null){
        return self::view('button',$icon);
    }

    public static function toolbar_nav($query,$icon_size='icon-32'){
        $arr['query']=$query;
        $arr['icon_size'] = $icon_size;
        return self::view('toolbar_nav',$arr);
    }




}
?>
