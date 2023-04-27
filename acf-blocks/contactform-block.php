<section class="contact-form js-contact-form">
    <?php if (get_field('title')) : ?>
        <h2><?= get_field('title'); ?></h2>
    <?php endif;
     if (get_field('form')) : ?>
        <?= get_field('form'); ?>
    <?php endif; ?>
</section>