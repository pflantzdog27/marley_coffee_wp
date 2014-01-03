<?php require_once('header.php');?>
        <div class="container">
            <div id="inner-template" class="no-white">
                <section id="isotopes-container" class="media-container">
                    <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                            <?php $news_categories = wp_get_post_categories( $post->ID );
                            $newsCats = array();
                            foreach($news_categories as $nc){
                                $newsCat = get_category( $nc );
                                $newsCats[] = $newsCat->name;
                            }?>
                            <div class="item col-xs-6 col-sm-4 <?php echo implode(' ',$newsCats);?>">
                                <article>
                                    <?php $newsType = get_field( "news_type" ); ?>
                                    <?php if( $newsType == 'Video'  ) { ?>
                                        <a class="video-popup" href="<?php the_field( "embedded_video" )?>">
                                            <img class="col-sm-12 img-responsive" src="<?php the_field("featured_image_news" ); ?>" alt="<?php the_title(); ?>">
                                            <img class="play-overlay" src="<?php bloginfo('template_url');?>/images/play-overlay.png" alt="">
                                        </a>
                                    <?php } else if( $newsType == 'Content') { ?>
                                        <?php echo custom_field_excerpt('news_excerpt');?>
                                        <div class="panel-footer">
                                            <h3 class="media-heading">
                                                <a href="<?php the_field( "link_to_source" ); ?>" target="_blank">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                        </div>
                                    <?php } else { ?>
                                        <a href="<?php the_field( "link_to_source" ); ?>" target="_blank"><img class="col-sm-12 img-responsive" src="<?php the_field
                                            ("featured_image_news" ); ?>" alt="<?php the_title(); ?>"></a>
                                    <?php } ?>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </section>
            </div>
        </div>

<?php require_once('footer.php');?>