<?php
get_header();
?>
<div class="content">
    <div class="jobs">
        <aside class="jobs__categories">
            <h2><?= _('Categories', 'directgarant') ?></h2>
            <div class="jobs__categories-item">
                <?php
                $args = array(
                    'taxonomy' => 'jobs_categories',
                    'orderby' => 'name',
                    'order'   => 'ASC'
                );
                $cats = get_categories($args);
                foreach ($cats as $cat) :
                ?>
                    <a href="<?= get_category_link($cat->term_id) ?>">
                        <?= $cat->name; ?> <span> (<?= $cat->category_count; ?>)</span>
                    </a>
                <?php
                endforeach;
                $term = get_queried_object();
                ?>
            </div>
        </aside>

        <section class="jobs__offers">
            <h2><?= $term->name . ' ' . __('jobs', 'directgarant'); ?></h2>
            <div class="jobs__offers-jobs">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $wp_query = new WP_Query(array(
                    'post_type' => 'jobs',
                    'posts_per_page' => 24,
                    'paged'   => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'jobs_categories',
                            'field' => 'slug',
                            'terms' => $term->slug
                        )
                    )
                ));
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        $postid = get_the_ID();
                ?>
                        <div class="jobs__offers-jobs-post">
                            <div class="jobs__offers-jobs-thumbnail">
                                <?php if (!get_the_post_thumbnail($postid, 'large-thumb')) : ?>
                                    <img alt="job listing" src="<?= get_template_directory_uri(); ?>/assets/img/defaultimages/directgaranthumbnail..jpg" width="512" height="512">
                                <?php else : ?>
                                    <?= get_the_post_thumbnail($postid, 'large-thumb'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="jobs__offers-jobs-text">
                                <h4><?= the_title(); ?></h4>
                                <div class="jobs__offers-jobs-desc"><?= wp_trim_words(get_the_content(), 30, '...'); ?></div>
                                <div class="jobs__offers-jobs-info">
                                    <a class="button" href="<?= get_permalink($postid->ID); ?>"><?= __('I want this job', 'directgarant') ?></a>
                                </div>
                            </div>
                        </div>

                <?php endwhile;
                endif; ?>

            </div>
            <div class="pagination">

                <?php
                $totalpages = $wp_query->max_num_pages;
                $middlepage = (int)($totalpages / 2);

                $prev_page = '<a class="pagination-item pagination-prev" href="' . get_pagenum_link() . 'page/' . ($paged - 1) . '"><svg>
<use xlink:href="' . get_template_directory_uri() . '/assets/img/icons/arrow-left-icon.svg#arrow-left" href="' . get_template_directory_uri() . '/assets/img/icons/arrow-left-icon.svg#arrow-left"></use>
</svg></a>';
                $next_page = '<a class="pagination-item pagination-next" href="' . get_pagenum_link() . 'page/' . ($paged + 1) . '"><svg>
<use xlink:href="' . get_template_directory_uri() . '/assets/img/icons/arrow-right-icon.svg#arrow-right" href="' . get_template_directory_uri() . '/assets/img/icons/arrow-right-icon.svg#arrow-right"></use>
</svg></a>';

                $unactive_prev_page = '<span class="unactive-pagination-prev unactive-pagination"><svg>
<use xlink:href="' . get_template_directory_uri() . '/assets/img/icons/arrow-left-icon.svg#arrow-left" href="' . get_template_directory_uri() . '/assets/img/icons/arrow-left-icon.svg#arrow-left"></use>
</svg></span>';
                $unactive_next_page = '<span class="unactive-pagination-next unactive-pagination"><svg>
<use xlink:href="' . get_template_directory_uri() . '/assets/img/icons/arrow-right-icon.svg#arrow-right" href="' . get_template_directory_uri() . '/assets/img/icons/arrow-right-icon.svg#arrow-right"></use>
</svg></span>';

                if ($wp_query->max_num_pages > 1) :
                    if (1 === $paged) :
                        echo $unactive_prev_page;
                    else :
                        echo $prev_page;
                    endif;
                    if (($wp_query->max_num_pages > 6) && ($paged !== 1 && $paged != $totalpages)) :
                        if ($paged > 2) : ?>
                            <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/1">1</a>

                            <?php if ($paged > 3) : ?>
                                <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= (int)($paged / 2); ?>">...</a>
                        <?php endif;
                        endif; ?>

                        <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= $paged - 1; ?>"><?= $paged - 1; ?></a>
                        <a class="pagination-item active-page" href="<?= get_pagenum_link();  ?>page/<?= $paged; ?>"><?= $paged; ?></a>
                        <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= $paged + 1; ?>"><?= $paged + 1; ?></a>

                        <?php if ($paged < ($totalpages - 1)) :
                            if ($paged != ($totalpages - 2)) : ?>
                                <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= (int)(($totalpages + $paged) / 2); ?>">...</a>
                            <?php endif; ?>

                            <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= $totalpages ?>"><?= $totalpages ?></a>
                        <?php endif;
                    elseif ($wp_query->max_num_pages > 6) : ?>

                        <a class="pagination-item <?= $paged == 1 ? "active-page" : ""; ?>" href="<?= get_pagenum_link();  ?>page/1">1</a>
                        <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/2">2</a>
                        <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= $middlepage; ?>">...</a>
                        <a class="pagination-item" href="<?= get_pagenum_link();  ?>page/<?= $totalpages - 1 ?>"><?= $totalpages - 1 ?></a>
                        <a class="pagination-item <?= $paged == $totalpages ? "active-page" : ""; ?>" href="<?= get_pagenum_link();  ?>page/<?= $totalpages ?>"><?= $totalpages ?></a>

                        <?php else :
                        for ($i = 1; $i < $totalpages + 1; $i++) : ?>
                            <a class="pagination-item <?= $paged == $i ? "active-page" : ""; ?>" href="<?= get_pagenum_link();  ?>page/<?= $i ?>"><?= $i ?></a>
                <?php endfor;
                    endif;

                    if ($wp_query->max_num_pages == $paged) :
                        echo $unactive_next_page;
                    else :
                        echo $next_page;
                    endif;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </section>
    </div>
</div>
<?php
get_footer(); ?>