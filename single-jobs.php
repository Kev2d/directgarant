<?php get_header(); ?>

<div class="content">

    <div class="job-post">

        <div class="job-post__details">

            <h2><?= __('Details', 'directgarant'); ?></h2>

            <div class="job-position">
                <h4><?= __('Position', 'directgarant') . ': ' ?></h4>
                <?= get_the_title(); ?>
            </div>


            <div class="job-info">
                <h4><?= __('Info', 'directgarant') . ': ' ?></h4>
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>


            <?php if (get_field('location')) : ?>
                <div class="job-location">
                    <h4><?= __('Location', 'directgarant') . ': '; ?></h4>
                    <?= get_field('location'); ?>
                </div>
            <?php endif;
            if (have_rows('contact_person')) : ?>
                <div class="contact-details">

                    <h4><?= __('Contact', 'directgarant') . ': ' ?></h4>

                    <?php while (have_rows('contact_person')) : the_row();

                        $email = get_sub_field('email');
                        $number = get_sub_field('number');
                        $name = get_sub_field('name');
                    ?>

                        <div class="contact-details__info">

                            <?php if ($name) : ?>
                                <span><?= $name; ?></span>
                            <?php endif;
                            if ($email) : ?>
                                <a href="email:<?= $email; ?>"><?= $email; ?></a>
                            <?php endif;
                            if ($number) : ?>
                                <a href=" tel:<?= $number; ?>"><?= '+' . $number; ?></a>
                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

            <?php
			$postid = get_the_ID();
            $reuse_block = get_post(137);
            if ($reuse_block) {
                $reuse_block_content = apply_filters('the_content', $reuse_block->post_content);
                echo $reuse_block_content;
            }
            ?>

        </div>

        <div class="job-post__side">

            <div class="job-post__side-thumbnail">

                <?php if (!get_the_post_thumbnail($postid, 'large-thumb')) : ?>
                    <img alt="job offer thumbnail" src="<?= get_template_directory_uri(); ?>/img/defaultimages/directgaranthumbnail..jpg" width="512" height="512">
                <?php else : ?>
                    <?= get_the_post_thumbnail($postid, 'large-thumb'); ?>
                <?php endif; ?>

            </div>

            <div class="job-post__side-buttons">

                <button class="button js-apply">Apply now</button>

                <a href="<?= get_post_type_archive_link('jobs'); ?>" class="button">See all job offers</a>

            </div>

        </div>

    </div>

    <?php
    $currentPostId = get_the_ID();
    $categories = get_the_terms($currentPostId, 'jobs_categories');
    $termArr = [];
    foreach ($categories as $value) {
        array_push($termArr, $value->name);
    }

    $wp_query = new WP_Query(array(
        'post_type' => 'jobs',
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => 'jobs_categories',
                'field' => 'slug',
                'terms' => $termArr
            )
        )
    ));
    if ($wp_query->have_posts()) :
        $totalpost = $wp_query->found_posts;

        if ($totalpost > 1) : ?>

            <section class="similar-jobs">

                <h2><?= __('Browse similar jobs', 'directgarant'); ?></h2>

                <div class="similar-jobs__inside">
                    <?php

                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        if ($currentPostId === $postid) {
                            continue;
                        }
                    ?>

                        <div class="similar-jobs__inside-post">
                            <div class="similar-jobs__inside-thumbnail">
                                <?php if (!get_the_post_thumbnail($postid, 'large-thumb')) : ?>
                                    <img alt="job listing" src="<?= get_template_directory_uri(); ?>/assets/img/defaultimages/directgaranthumbnail..jpg" width="512" height="512">
                                <?php else : ?>
                                    <?= get_the_post_thumbnail($postid, 'large-thumb'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="similar-jobs__inside-text">
                                <h4><?= the_title(); ?></h4>

                                <div class="similar-jobs__inside-desc"><?= wp_trim_words(get_the_content(), 30, '...'); ?></div>

                                <div class="similar-jobs__inside-info">

                                    <a class="button" href="<?= get_permalink($postid->ID); ?>"><?= __('I want this job', 'directgarant') ?></a>

                                </div>
                            </div>
                        </div>

                <?php endwhile;
                endif; ?>

                </div>

            </section>

        <?php
    endif; ?>

</div>

<?php get_footer(); ?>