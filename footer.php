<footer class="footer">

    <div class="footer__upper">

        <div class="footer__upper-item"><?php if (get_field('show_site_logo', 'option')) :
                                            if (has_custom_logo()) :
                                                the_custom_logo();
                                            else : ?>
                    <h1>
                        <a href="<?= get_home_url(); ?>"><?= get_bloginfo('name'); ?></a>
                    </h1>
            <?php
                                            endif;
                                        endif; ?>
        </div>
        <div class="footer__upper-item">

            <?php if (get_field('about_us_desc', 'option')) : ?>
                <h4><?= __('About us', 'directgarant'); ?></h4>
                <?= get_field('about_us_desc', 'option'); ?>
            <?php endif; ?>

        </div>


        <div class="footer__upper-item">

            <?php if (have_rows('contact', 'option')) : ?>

                <h4><?= __('Contact', 'directgarant'); ?></h4>

                <div class="links">

                    <?php while (have_rows('contact', 'option')) : the_row();
                        $valuetype = get_sub_field('value_type');
                        if ($valuetype === 'email') : ?>

                            <a href="mailto:<?= get_sub_field('email'); ?>"><?= get_sub_field('email'); ?></a>

                        <?php elseif ($valuetype === 'number') : ?>

                            <a href="tel:<?= get_sub_field('number'); ?>"><?= get_sub_field('number'); ?></a>

                        <?php elseif ($valuetype === 'text') : ?>

                            <span><?= get_sub_field('text'); ?></span>

                    <?php endif;
                    endwhile; ?>

                </div>

            <?php endif; ?>

        </div>
        <div class="footer__upper-item">

            <?php if (have_rows('page_links', 'option')) : ?>

                <h4><?= __('Info', 'directgarant'); ?></h4>

                <div class="page-links">

                    <?php while (have_rows('page_links', 'option')) : the_row();
                        $link = get_sub_field('link');
                        if ($link) :
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                            <a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a>
                    <?php endif;
                    endwhile; ?>

                </div>

            <?php endif; ?>

        </div>
        <div class="footer__upper-item">

            <?php if (have_rows('social_links', 'option')) : ?>

                <h4><?= __('Social', 'directgarant'); ?></h4>

                <div class="social-links">

                    <?php while (have_rows('social_links', 'option')) : the_row();
                        $img = get_sub_field('image');
                        $url = get_sub_field('url');
                        if ($img && $url) : ?>

                            <a href="<?= $url; ?>" target="_blank">
                                <img src="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt']); ?>" />
                            </a>

                    <?php endif;
                    endwhile; ?>

                </div>

            <?php endif; ?>
        </div>
    </div>

    <div class="footer__bottom">
        <p>© <?= date('Y') . ' ' . __('HassleRaccoon PTY', 'directgarant') ?></p>
    </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>