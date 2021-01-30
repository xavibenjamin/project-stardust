<!DOCTYPE html>
<html lang="en" data-theme="halcyon">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7114076/6936832/css/fonts.css" />

  <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<header class="site-header">
  <div class="[ site-header__wrapper ] [ wrapper ]">
    <div class="[ site-id ] [ h-card ]">
      <div class="site-id__image">
        <img class="u-photo" src="<?php site_icon_url(200); ?>" alt="Tim Smith Avatar Illustration">
      </div>
      <div class="site-id__info">
        <h1 class="site-name">
          <a class="p-name u-url" rel="me" href="/">
            <?php bloginfo('name'); ?>
          </a>
          <span class="site-pronouns"><?php esc_html_e( 'he/him', 'stardust' ); ?></span>
        </h1>
        <p class="site-bio"><?php bloginfo( 'description' ); ?></p>
      </div>
    </div>
    <a href="/subscribe/" class="button"><?php esc_html_e( 'Subscribe', 'stardust' ); ?></a>
  </div>
  <div class="wrapper">
    <nav class="site-nav">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'menu_class'     => 'site-nav__menu',
            'menu_id'        => 'primary-nav',
          )
        );
        ?>
    </nav>
  </div>
  
</header>
