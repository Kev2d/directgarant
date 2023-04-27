<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="description" content="HassleRaccoon is a recruitment agency committed to connecting people with the right jobs and employers with specialized talent.">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HassleRaccoon | HR we do</title>
  <?php wp_head(); ?>

</head>

<div class="header">

  <div class="header__logo">
    <?php
    if (has_custom_logo()) :
      the_custom_logo();
    else : ?>
      <h1>
        <a href="<?= get_home_url(); ?>"><?= get_bloginfo('name'); ?></a>
      </h1>
    <?php
    endif;
    ?>

    <div class="header__logo-burger">
      <div class="js-hamburger">
        <span></span><span></span><span></span>
      </div>
    </div>
  </div>

  <nav class="header__navigation">

    <div class="header__navigation-inside js-primary-menu">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary', // Defined when registering the menu
        'menu_id'        => 'primary-menu',
        'container'      => false,
        'depth'          => 1,
      ));

      ?>

    </div>

  </nav>

</div>
<?php if (is_front_page()) : ?>
  <section class="header-banner">

    <?php
    $headerVideoDesktop = get_field('desktop_video', 'option');
    $headerVideoMobile = get_field('mobile_video', 'option');
    if (get_field('desktop_video', 'option')) :
    ?>

      <video class="header-banner__desktop" width="1680" autoplay muted playsinline loop>
        <source src="<?= $headerVideoDesktop; ?>" type="video/mp4">
      </video>
      <video class="header-banner__mobile" width="864" autoplay muted playsinline loop>
        <source src="<?= $headerVideoMobile; ?>" type="video/mp4">
      </video>

      <div class="header-banner__darkoverlay"></div>

    <?php endif; ?>

    <div class="header-banner__item">

      <?php if (get_field('title', 'option')) : ?>
        <h1 class="header-banner__item-title"><?= get_field('title', 'option', false, false); ?></h1>
      <?php endif;
      if (get_field('desc', 'option')) : ?>
        <?= get_field('desc', 'option'); ?>
      <?php endif;
      if (have_rows('buttons_links', 'option')) : ?>

        <div class="header-banner__item-buttons">

          <?php while (have_rows('buttons_links', 'option')) : the_row();
            $link = get_sub_field('link', 'option');
            if ($link) :
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
              <a class="button" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
          <?php endif;
          endwhile; ?>
        </div>
      <?php endif; ?>

    </div>

    <div class="header-banner__form">

      <?php if (get_field('form_title', 'option')) : ?>
        <h2 class="header-banner__form-title"><?= get_field('form_title', 'option'); ?></h2>
      <?php endif;
      if (get_field('contact_form', 'option')) : ?>
        <?= get_field('contact_form', 'option'); ?>
      <?php endif; ?>

    </div>

  </section>

<?php endif; ?>

<body>