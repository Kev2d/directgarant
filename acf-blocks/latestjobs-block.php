<?php
$wp_query = new WP_Query(array(
    'post_type' => 'jobs',
    'posts_per_page' => 12,
));
 if ($wp_query->have_posts()) :
    $totalpost = $wp_query->found_posts;
    if ($totalpost > 1) : ?>

        <section class="latest-jobs">

            <?php if (get_field('title')) : ?>
                <h1><?= get_field('title', false, false); ?></h1>
            <?php endif; ?>

            <div class="latest-jobs__inside js-latest-jobs">
                <?php
                while ($wp_query->have_posts()) : $wp_query->the_post();
				 $postid = get_the_ID();
                ?>

                    <div class="latest-jobs__inside-post">
                        <div class="latest-jobs__inside-thumbnail">
                            <?php if (!get_the_post_thumbnail($postid, 'large-thumb')) : ?>
                                <img alt="job listing" src="<?= get_template_directory_uri(); ?>/assets/img/defaultimages/directgaranthumbnail..jpg" width="512" height="512">
                            <?php else : ?>
                                <?= get_the_post_thumbnail($postid, 'large-thumb'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="latest-jobs__inside-text">
                            <h4><?= the_title(); ?></h4>

                            <div class="latest-jobs__inside-desc"><?= wp_trim_words(get_the_content(), 30, '...'); ?></div>

                            <div class="latest-jobs__inside-info">

                                <a class="button" href="<?= get_permalink($postid); ?>"><?= __('I want this job', 'directgarant') ?></a>

                            </div>
                        </div>
                    </div>

            <?php endwhile;
            endif; ?>

            </div>

            <div class="slick-controls">
                <span class="js-slick-prev"><svg>
                        <use xlink:href="<?= get_template_directory_uri() ?>/assets/img/icons/arrow-left-icon.svg#arrow-left" href="<?= get_template_directory_uri(); ?>/assets/img/icons/arrow-left-icon.svg#arrow-left"></use>
                    </svg></span>
                <span class="js-slick-next"><svg>
                        <use xlink:href="<?= get_template_directory_uri() ?>/assets/img/icons/arrow-right-icon.svg#arrow-left" href="<?= get_template_directory_uri(); ?>/assets/img/icons/arrow-right-icon.svg#arrow-right"></use>
                    </svg></span>
            </div>
        </section>

    <?php
endif; ?>