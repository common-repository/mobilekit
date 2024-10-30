<div id="toolbar-nav">
    <!-- class content -->
    <ul>
        <?php $nav_query = new WP_Query($query) ?>
        <?php if ($nav_query->have_posts()) : while ($nav_query->have_posts()) : the_post(); ?>
                <li class="tollbar-nav-li">
                    <a href="<?php the_permalink() ?> ">
                <?php the_post_thumbnail($icon_size) ?>
            </a>
        </li>
        <?php
                endwhile;
            endif;
            wp_reset_query();
        ?>
    </ul>      
</div>