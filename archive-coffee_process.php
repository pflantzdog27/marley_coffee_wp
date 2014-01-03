<?php get_header(); ?>
    <div class="container">
        <div id="inner-template" class="no-white">
            <header class="sub-page-header">
                        <h1>Page Title</h1>
                        <p>Lorem ipsum text.</p>
            </header>
            <div class="expandable-content-wrap">
               <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                        <section class="tab-item">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="panel-title"><?php the_field( "inactive_tab" ); ?></h2>
                                    <span class="glyphicon glyphicon-plus"></span>
                                </div>
                                <div class="panel-body">
                                    <?php the_field( "active_tab" ); ?>
                                </div>
                            </div>
                        </section>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>