<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mobile_shotcode
 *
 * @author Studio365
 */
class mobile_shortcode {
    //put your code here
    public function __construct() {

        $this->shortcode_actions();

    }

    public function shortcode_actions(){
        // short code actions here
        // add_shortcode( 'baztag', array('MyPlugin', 'baztag_func') );

        // navar bar
        add_shortcode('mk_navbar', array('mobile_shortcode','navbar'));


        // dialog
        add_shortcode('mk_dialog', array('mobile_shortcode','dialog'));


        //button
        add_shortcode('mk_button', array('mobile_shortcode','button'));


        //grid
        add_shortcode('mk_grid', array('mobile_shortcode','grid'));

        //collaspe
        add_shortcode('mk_collaspe', array('mobile_shortcode','collaspe'));

        //collaspe
        add_shortcode('mk_collaspe', array('mobile_shortcode','collaspe'));


       }

    public static function navbar($atts, $content=null) {
        $theme = ($atts['theme']) ? $atts['class_name'] : uiOption::theme();
        $bar = '<div data-role="navbar" data-theme="'.$theme.'"  >'.$content.'</div>';
        return $bar;
        
    }

    public static function dialog($atts,$content){

        $url = $atts['url'];
        $transition = $atts['transition'];
        $theme = ($atts['theme']) ? $atts['class_name'] : uiOption::theme();
        $data = '<a href="'.$url.'" data-rel="dialog" data-transition="'.$transition.'" data="'.$theme.'">Open dialog</a>';
    }

    public static function grid($atts,$content){
        
        $class = ($atts['class_name']) ? $atts['class_name'] : 'a';
        $theme = ($atts['theme']) ? $atts['class_name'] : uiOption::theme();
        $data = '<div class="ui-grid-'.$class.'" data-theme="'.$theme.'">'.$content.'</div>';
        return $data;
    }

    public static function button($atts,$content){

        $url = $atts['url'];
        $theme = ($atts['theme']) ? $atts['class_name'] : uiOption::theme();
        if (in_array('inline', $atts) AND $atts['inline'] == false)
            $inline = 'false';
        else
            $inline = 'data-inline="true"';
        $data = '<a href="' . $url . '" data-role="button" data-theme="' . $theme . '" ' . $inline . ' >' . $content . '</a>';
        return $data;
    }
    
    public static function collaspe($atts,$content){
        
        $theme = ($atts['theme']) ? $atts['class_name'] : uiOption::theme();
        $collasped = ($atts['collaspe']) ? $atts['collaspe'] : 'true';
        $data = '<div data-role="collapsible" data-collapsed="' . $collapsed . '" data-theme="' . $theme . '>' . $content . '</div>';
        
    }

        public static function gallery($atts) {
            //$id = NULL, $class = "post-gallery", $rel = "lightbox", $size = 'thumbnail'
            $id = $atts['id'];
            $class = ($atts['classs']) ? $atts['class'] : NULL;
            $rel = $atts['rel'];
            $size = $atts['$size'];

        global $wp_query;
        if ($id == null)
            $id = $wp_query->post->ID;

        $attachments = get_children(array('post_parent'=>$id, 'post_type'=>'attachment',
            'post_mime_type'=>'image', 'order'=>'ASC', 'orderby'=>'menu_order'));
        if ( empty($attachments))
            return false;
        foreach ($attachments as $attachment_id=>$attachment) {
            $title = apply_filters('the_title', $attachment->post_title);
            $img = '<div class="'.$class.'">';
            $img .= '<a href="'.wp_get_attachment_url($attachment_id).'" rel="'.$rel.'['.$id.']" title="'.$title.'" ';
            $img .= wp_get_attachment_image($attachment_id, $size);
            $img .= '</a>';
            $img .= '</div>';
            return $img;
        }
    }


}
