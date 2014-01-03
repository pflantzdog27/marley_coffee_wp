<?php get_header(); ?>


    <div class="container">
        <div id="inner-template" class="row">
            <?php if (have_posts()) :?>
                <?php while (have_posts()) : the_post(); ?>
                    <aside class="inner-sidebar col-sm-3">
                        <figure class="sidebar-graphic">
                            <?php  if ( has_post_thumbnail() ) {
                                the_post_thumbnail('left-column-image', array('class' => 'img-responsive'));
                            } ?>
                        </figure>
                    </aside>
                    <div class="main-inner col-sm-9">
                        <header class="page-title">
                            <h2><?php the_title();?></h2>
                        </header>
                        <section id="page-content">
                           <?php the_content();?>
                        </section>
                    </div>
                <?php endwhile;?>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>
