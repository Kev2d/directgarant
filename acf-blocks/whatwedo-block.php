<section class="whatwedo-block">

    <?php if (get_field('title')) : ?>
        <h1><?= get_field('title', false, false); ?></h1>
    <?php endif;
     if (have_rows('list_repeater')) :
        $time = 0; ?>
        <ul>
            <?php while (have_rows('list_repeater')) : the_row();
                $icon = get_sub_field('icon');
                $title = get_sub_field('list_title');
                $desc = get_sub_field('list_desc');
                if ($icon && $title && $icon) :
            ?>
                    <li data-aos="fade-left" data-aos-delay="<?= $time; ?>">
                    <div class=" icon">
                        <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>" />
                        </div>
                        <div class="text-content">
                            <h3><?= $title; ?></h3>
                            <?= $desc; ?>
                        </div>
                    </li>
            <?php endif; $time += 150;
            endwhile; ?>
        </ul>
    <?php endif; ?>

</section>