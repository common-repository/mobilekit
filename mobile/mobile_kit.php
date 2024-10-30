<?php

        /**
	 * File: mobile.php
	 * Author: shawn sandy http://shawnsandy.com
	 * Last Modified:
	 * @version 1.9
	 * @package PegasusPHP
	 *
	 * Copyright (C) 2008-2010 Chris Schuld  (chris@chrisschuld.com)
	 *
	 * This program is free software; you can redistribute it and/or
	 * modify it under the terms of the GNU General Public License as
	 * published by the Free Software Foundation; either version 2 of
	 * the License, or (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details at:
	 * http://www.gnu.org/copyleft/gpl.html
         *
         *
	 **/

class mobile_kit {
    //put your code here

    private $browser;

    function __construct() {
        require_once(dirname(__FILE__).'/Browser.php');
        $this->browser = new Browser();
    }

   
    public function browser_dection(){

        //detect browser
        $mobile = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
        $devices = array();
        if(in_array($mobile, $devices)){
            return $mobile;
        }
    }

    public function is_iphone(){
        if($this->browser->getBrowser() == Browser::BROWSER_IPHONE)
        return true;
        else false;
    }

    public function is_ipad(){
        if($this->browser->getBrowser() == Browser::BROWSER_IPAD)
        return true;
        else false;
    }

    public function is_android(){
        if($this->browser->getBrowser() == Browser::BROWSER_ANDROID)
        return true;
        else false;
    }

    public function is_blackberry(){
        if($this->browser->getBrowser() == Browser::BROWSER_BLACKBERRY)
        return true;
        else false;
    }

    public function is_palm(){
        return FALSE;

    }

    public function is_nokia(){
        return FALSE;

    }

    public function is_chrome(){
        if($this->browser->getBrowser() == Browser::BROWSER_CHROME)
        return true;
        else false;
           
    }

    public function is_safari(){
        if($this->browser->getBrowser() ==  Browser::BROWSER_SAFARI)
        return true;
        else false;
    }

    public function get_browser(){

        $browser = false;
        
        if($this->is_android()) $browser = 'android';

        if($this->is_blackberry()) $browser = 'blackberry';

        if($this->is_chrome()) $browser = 'chrome';

        if($this->is_ipad()) $browser = 'ipad';

        if($this->is_iphone()) $browser = 'iphone';

        if($this->is_nokia()) $browser = 'nokia';

        if($this->is_palm()) $browser = 'palm';

        if($this->is_safari()) $browser = 'safari';

        return $browser;
        
    }

}

