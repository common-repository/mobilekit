<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


?>
<div id="mobile-meta">
    <!-- class content -->

    <p>
      <label>Page Transitions</label>
    <select name="<?php $metabox->the_name('mk_transitions') ?>">
        <?php
        $value = $metabox->the_value('mk_transitions');
        function mk_trans_selected($name) {
            if($value == $name);
            return 'selected="selected"';
        }
        ?>
        <option value="<?php $metabox->the_value('mk_transitions'); ?>"><?php ucfirst($metabox->the_value('mk_transitions')) ; ?></option>
        <option value="slide">Slide</option>
        <option value="slideup">SlideUp</option>
        <option value="slidedown">SlideDown</option>
        <option value="pop">Pop</option>
        <option value="fade">Fade</option>
        <option value="flip">Flip</option>
        <option></option>
        
    </select>  
    </p>

    <p>
    <label>Style / Swatch</label>
    <select name="<?php $metabox->the_name('mk_dialog') ?>"  >
        <option value="<?php $metabox->the_value('mk_dialog'); ?>"><?php ucfirst($metabox->the_value('mk_dialog')) ; ?></option>
        <option value="yes" >yes</option>
        <option value="no" >no</option>

    </select>
    </p>
     
    <p>
    <label>Style / Swatch</label>
    <select name="<?php $metabox->the_name('mk_swatch') ?>"  >
        <option value="<?php $metabox->the_value('mk_swatch'); ?>"><?php ucfirst($metabox->the_value('mk_swatch')) ; ?></option>
        <option value="a" >swatch a</option>
        <option value="b" >swatch b</option>
        <option value="c" >swatch c</option>
        <option value="d" >swatch d</option>
        <option value="e" >swatch e</option>
    </select>    
    </p>
    

</div>