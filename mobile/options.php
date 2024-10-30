<form method="post" action="options.php">
    <?php settings_fields($this->plugin_name . '_group'); ?>
    <?php $options = get_option($this->plugin_name . '_options'); ?>

        <div class="mobile-note">
      App Settings:  <!-- class content -->
    </div>

    <p><label>App Url:</label></p>
    <input type="text" name="<?php echo $option_name ?>[url]" value="<?php echo $options['url'] ?>"  class="mobile-input"/>
    <span class="op-desc">Url of your mobile App</span>



    <p><label>Default to Mobile-app</label></p>
    <input type="checkbox" name="<?php echo $option_name ?>[app_on]" value="ON" <?php if($options['app_on'] == 'ON') :  ?> checked="checked" <?php endif ; ?>  />
    <span class="op-desc">Check this if you do not to use mobile themes</span>

    <p><label>Web View</label></p>
    <input type="checkbox" name="<?php echo $option_name ?>[web_view]" value="ON" <?php if($options['web_view'] == 'ON') :  ?> checked="checked" <?php endif ; ?>  />
    <span class="op-desc">Enable mobile themes on Desktops/laptop</span>
    <div class="mobile-note">
      Theme Settings:  <!-- class content -->
    </div>


    <h3>Mobile Themes</h3>
    <span class="op-desc">Select Mobile Themes For Each Device or use the default theme MobileKit</span>
    
    <p class="device-select" >
        <select name="<?php echo $option_name ?>[default]">
            <option> </option>
            <?php $this->installed_themes('default'); ?>
        </select>
        <span class="device-name"> Default / Others </span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[iphone]">
            <option > </option>
             <?php $this->installed_themes('iphone'); ?>
        </select>
        <span class="device-name"> Iphone     </span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[ipad]">
            <option> </option>
             <?php $this->installed_themes('ipad'); ?>
        </select>
        <span class="device-name"> iPad     </span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[android]">
           <option> </option>
             <?php $this->installed_themes('android'); ?>
        </select>
        <span class="device-name"> Android  </span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[blackberry]">
            <option> </option>
             <?php $this->installed_themes('blackberry'); ?>

        </select>
        <span class="device-name">Black Berry</span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[palm]">
            <option> </option>
             <?php $this->installed_themes('palm'); ?>

        </select>
        <span class="device-name"> Palm / WebOS    </span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[safari]">
            <option> </option>
             <?php $this->installed_themes('safari'); ?>

        </select>
        <span class="device-name"> Safari   </span>
    </p>

    <p class="device-select" >
        <select name="<?php echo $option_name ?>[chrome]">
            <option> </option>
             <?php $this->installed_themes('chrome'); ?>

        </select>
        <span class="device-name"> Chrome   </span>
    </p>
    <!-- end -->

    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
     <div class="mobile-note">
      Additional browser support will coming soon:  <!-- class content -->
    </div>
</form>
