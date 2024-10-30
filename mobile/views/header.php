<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <title>Page title  </title>
        <?php wp_head() ?>
        <?php mobile_head(); ?>
    </head>
    <body <?php body_class(); ?> >
   <div  data-role="page" id="Page" data-fullscreen="<?php echo uiOption::fullscreen(); ?>" data-theme="<?php echo uiOption::theme(); ?>" >
    <div data-role="header" data-position="<?php echo uiOption::position() ?>"   >
        <h1><?php bloginfo('title'); ?></h1>
    </div><!-- /header -->
