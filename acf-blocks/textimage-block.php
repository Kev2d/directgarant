<section class="textimage-block">

    <div class="textimage-block__item<?= get_field('image_left_or_right') ? ' right' : '' ?>">

        <?php if (get_field('title')) : ?>
            <h1 class="textimage-block__item-title"><?= get_field('title', false, false); ?></h1>
            <?php endif;
        if (get_field('desc_or_list')) :
            if (get_field('subtitle')) : ?>
                <?= get_field('subtitle'); ?>
            <?php endif;
             if (have_rows('text_repeater')) :
                $time = 0;
            ?>

                <ul class="textimage-block__item-list">
                    <?php while (have_rows('text_repeater')) : the_row();
                        if (get_sub_field('list_title') && get_sub_field('list_desc')) :
                    ?>
                            <li data-aos="fade-left" data-aos-delay="<?= $time; ?>">
                                <h3><?php the_sub_field('list_title'); ?></h3>
                                <?php the_sub_field('list_desc'); ?>
                            </li>
                    <?php endif;
                    endwhile;
                    $time += 150; ?>
                </ul>
            <?php endif;
        else :
            if (get_field('desc')) : ?>
                <?= get_field('desc'); ?>
            <?php endif;
            $link = get_field('button_link');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a class="button" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
        <?php endif;
        endif; ?>

    </div>

    <div class="textimage-block__item image">

        <?php
        $image = get_field('image');
        if ($image) : ?>
            <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
        <?php endif; ?>

    </div>

</section>