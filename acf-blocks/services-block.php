<section class="services-block">

    <?php if (get_field('title')) : ?>
        <h4> <?= get_field('title'); ?></h4>
    <?php endif; if (get_field('desc')) : ?>
        <p><?= get_field('desc'); ?></p>
    <?php endif; ?>

    <div class="services-block__inside">

        <?php if (have_rows('services')) :
            $time = 0;
            while (have_rows('services')) : the_row();
                $image = get_sub_field('image');
                $link = get_sub_field('link');
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
                <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>">
                    <div class="services-block__inside-item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="<?= $time; ?>">
                        <span class="title"><?= esc_html($link_title); ?></span>
                        <?php if ($image) : ?>
                            <div class="services-block__inside-thumbnail">
                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                    </div>
                </a>

            <?php $time += 100;
            endwhile; endif; ?>
    </div>

</section>