<section class="header-banner">

    <?php
    $headerVideoDesktop = get_field('desktop_video');
    $headerVideoMobile = get_field('mobile_video');
    if (get_field('desktop_video')) :
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

        <?php if (get_field('title')) : ?>
            <h1 class="header-banner__item-title"><?= get_field('title', false, false); ?></h1>
        <?php endif;
         if (get_field('desc')) : ?>
            <?= get_field('desc'); ?>
        <?php endif;
         if (have_rows('buttons_links')) : ?>

            <div class="header-banner__item-buttons">

                <?php while (have_rows('buttons_links')) : the_row();
                    $link = get_sub_field('link');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="button" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                    <?php endif; endwhile; ?>
            </div>
        <?php endif; ?>

    </div>

    <div class="header-banner__form">

        <?php if (get_field('form_title')) : ?>
            <h2 class="header-banner__form-title"><?= get_field('form_title'); ?></h2>
        <?php endif; if (get_field('contact_form')) : ?>
            <?= get_field('contact_form'); ?>
        <?php endif; ?>

    </div>

</section>