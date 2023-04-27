<section class="contact">

    <div class="contact__item">

        <?php
        $video = get_field('video');
        if (get_field('video')) :
        ?>

            <video class="contact__item-video" width="1680" autoplay muted playsinline loop>
                <source src="<?= $video; ?>" type="video/mp4">
            </video>

            <div class="contact__item-darkoverlay"></div>

        <?php endif; ?>

    </div>

    <div class="contact__item">

        <?php if (get_field('form')) : ?>
            <?= get_field('form'); ?>
        <?php endif; ?>

    </div>

</section>