<section class="boxbutton-block">

    <?php if (have_rows('box')) :
        while (have_rows('box')) : the_row(); ?>

            <div class="boxbutton-block__item">

                <?php if (get_sub_field('title')) : ?>
                    <h3><?= get_sub_field('title'); ?></h3>
                <?php endif; if (get_sub_field('desc')) : ?>
                    <?= get_sub_field('desc'); ?>
                <?php endif; ?>

                <div class="boxbutton-block__item-buttons">

                    <?php if (have_rows('buttons')) : 
                     while (have_rows('buttons')) : the_row();
                            $link = get_sub_field('button');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                                <a class="button" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                            <?php endif; endwhile; endif; ?>

                </div>
            </div>
        <?php endwhile; endif; ?>

</section>