<!DOCTYPE html>
<html lang="en" data-theme="bright-pixels">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>tim</title>

   <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7114076/6732832/css/fonts.css" />

  <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<header class="site-header">
  <div class="wrapper">
    <div class="[ site-id ] [ h-card ]">
      <div class="site-id__image">
        <img class="u-photo" src="<?php echo get_template_directory_uri(); ?>/assets/img/tim-smith-avatar.jpg" alt="Tim Smith Avatar Illustration">
      </div>
      <div class="site-id__info">
        <h1 class="site-name">
          <a class="p-name u-url" rel="me" href="/">
            Timothy Smith
          </a>
          <span class="site-pronouns">he/him</span>
        </h1>
        <p class="site-bio">Geek, coffee snob, and maker of stuff.</p>
      </div>
    </div>
  </div>
</header>
