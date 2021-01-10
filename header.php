<!DOCTYPE html>
<html lang="en" data-theme="bright-pixels">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7114076/6732832/css/fonts.css" media="print" onload="this.media='all'" />

  <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<header class="site-header">
  <div class="wrapper">
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
  </div>
</header>
