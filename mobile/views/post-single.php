<div  data-role="content">
    <!-- class content -->
    <?php
    if (have_posts ()) :
        while (have_posts ()):
            the_post();

            $options = get_option('mkui_options');
    ?>
            <!-- page -->
            <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>

    <?php comments_template(); ?>
    <?php
            endwhile;

        endif;
    ?>
</div>