<div data-role="content">
    <ul data-role="listview" >
        <?php if ($query) query_posts($query); ?>
        <?php
        if (have_posts ()) :
            while (have_posts ()):
                the_post();

                $options = get_option('mkui_options');
        ?>
                <!-- page -->

                <li>
                    <h2><?php the_post_thumbnail('image-80'); ?></h2>
                    <?php $dialog = mobileKit::post_meta(get_the_ID(), 'mk_dialog'); ?>
                    <a href="<?php the_permalink() ?>" data-transition="<?php echo mobileKit::post_meta(get_the_ID()); ?>" <?php echo ($dialog == 'yes') ? 'data-rel="dialog"' : Null ?> >
                        <h2><?php the_title() ?></h2>
                   
                    </a>
                        <?php the_excerpt(); ?>
                </li>

        <?php
                endwhile;

            endif;
        ?>
    </ul>
</div>
   