<?php
/**
 * @package Mobile Kit
 * options: toolbar: fullscreen=true, data-position="fixed,inline" swatch="a,b,c,d"
 * iconpos="top,bottom,left,right,notext",
 */
?>
<div class="wrap">
    <h2>UI Options</h2>
    <div id="message" class="updated below-h2">...</div>
    <div class="mobile-note">
        Theme Settings:  <!-- class content -->
    </div>
    <form method="post" action="options.php">
    <?php 
     $option_name = 'mkui_options';
        settings_fields('mkui_group');
    ?>
        <?php $options = get_option('mkui_options'); ?>
        <p><label>Fullscreen:</label></p>
        <p class="device-select">
           
            <select name="mkui_options[tbar_fullscreen]"  >
                <option></option>
                <option value="true" <?php echo ($options['tbar_fullscreen'] == 'true') ? 'selected="selected"' : null;  ?> >Yes</option>
            <option value="false" <?php echo ($options['tbar_fullscreen'] == 'false') ? 'selected="selected"' : null;  ?> >No</option>
        </select> Enables Toolbar Fullscreen
        </p>
        
        <p><label>Toolbar Position:</label></p><p class="device-select">
            
            <select name="mkui_options[tbar_position]"  >
                <option></option>
                <option value="fixed" <?php echo ($options['tbar_position'] == 'fixed') ? 'selected="selected"' : null;  ?> >Fixed</option>
            <option value="inline" <?php echo ($options['tbar_position'] == 'inline') ? 'selected="selected"' : null;  ?> >Inline</option>
        </select>Sets Toolbar Position
        </p>

        <p><label>Theme Style / Swatch:</label></p><p class="device-select">
            
            <select name="mkui_options[swatch]"  >
                <option></option>
                <option value="a" <?php echo ($options['swatch'] == 'a') ? 'selected="selected"' : null;  ?> >swatch a</option>
                <option value="b" <?php echo ($options['swatch'] == 'b') ? 'selected="selected"' : null;  ?> >swatch b</option>
                <option value="c" <?php echo ($options['swatch'] == 'c') ? 'selected="selected"' : null;  ?> >swatch c</option>
                <option value="d" <?php echo ($options['swatch'] == 'd') ? 'selected="selected"' : null;  ?> >swatch d</option>
                <option value="e" <?php echo ($options['swatch'] == 'e') ? 'selected="selected"' : null;  ?> >swatch e</option>
        </select> UI Style (Swatch)
        </p>
           <p><label>Icon Position:</label></p>
           <p class="device-select">
            <select name="mkui_options[iconpos]"  >
                <option></option>
                <option value="left" <?php echo ($options['iconpos'] == 'left') ? 'selected="selected"' : null;  ?> >left</option>
            <option value="right" <?php echo ($options['iconpos'] == 'right') ? 'selected="selected"' : null;  ?> >right</option>
            <option value="top" <?php echo ($options['iconpos'] == 'top') ? 'selected="selected"' : null;  ?> >top</option>
            <option value="bottom" <?php echo ($options['iconpos'] == 'bottom') ? 'selected="selected"' : null;  ?> >bottom</option>
            <option value="notext" <?php echo ($options['iconpos'] == 'notext') ? 'selected="selected"' : null;  ?> >notext</option>
        </select> Default Icon Position
        </p>

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>