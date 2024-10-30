<?php if($query) : $page = new WP_Query($query); else : $page = new WP_Query('showposts=5'); endif;   ?>
<?php $pagenumber = 0 ?>
<?php if($page->have_posts()) :
        while($page->have_posts()):
        $page->the_post();
        $pagenumber ++;
        $options = get_option('mkui_options');
        ?>
<!-- page -->

<div  data-role="page" id="Page<?php echo $pagenumber; ?>" <?php echo uiOption::fullscreen() .  uiOption::theme(); ?>
            >

    <div data-role="header" data-icon="gear" <?php echo uiOption::position()  ?> >
                <h1><?php the_title() ?></h1>
            </div><!-- /header -->

            <div data-role="content">
                <!-- functions before your content -->
        <?php mk_before_content(); ?>
        <p><?php the_content(); ?></p>
        <p><a href="#Page<?php echo $pagenumber + 1; ?>">next </a></p>
        <!-- function after your content -->
        <?php mk_after_content(); ?>
    </div>
    <!-- /content -->
    <div data-role="footer" <?php echo uiOption::position() ?> >
        <h4>Page Footer</h4>
    </div>

    <!-- /header -->
</div>
<!-- /page -->
<?php endwhile;
    endif;
    wp_reset_query();
?>