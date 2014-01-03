<?php get_header(); ?>

    <div class="container">
        <section id="isotopes-container">
            <!-- SLIDESHOW -->
            <?php $slideshowBlocks = array( 'post_type' => 'slideshow_blocks');
            $slideshows = new WP_Query( $slideshowBlocks );
            if ( have_posts() ) :
                while ( $slideshows->have_posts() ) : $slideshows->the_post();?>
                    <?php $slideshow_categories = wp_get_post_categories( $post->ID );
                    $slideshowCats = array();
                    foreach($slideshow_categories as $sc){
                        $slideshowCat = get_category( $sc );
                        $slideshowCats[] = $slideshowCat->name;
                    }?>
                    <div class="item <?php echo implode(' ',$slideshowCats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article class="inner-isotope-contents">
                            <div id="slideshow-<?php the_ID();?>" class="slideshow" data-width="255" data-height="540">
                               <?php $images = get_field( "slideshow_images" );?>
                                <?php if($images ) {
                                    foreach( $images as $image ): ?>
                                        <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php if($image['alt']){echo $image['alt'];} else {echo 'Slideshow Image';}?>">
                                    <?php endforeach;
                                }?>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>

            <!-- VIDEO -->
            <?php $videoBlocks = array( 'post_type' => 'video_blocks');
            $videos = new WP_Query( $videoBlocks );
            if ( have_posts() ) :
                while ( $videos->have_posts() ) : $videos->the_post();?>
                    <?php $video_categories = wp_get_post_categories( $post->ID );
                    $cats = array();
                    foreach($video_categories as $vc){
                        $cat = get_category( $vc );
                        $cats[] = $cat->name;
                    }?>
                    <div class="item <?php echo implode(' ',$cats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article class="inner-isotope-contents">
                            <img class="img-responsive col-sm-12" src="<?php the_field( "video_poster" ); ?>" alt="<?php the_title();?>">
                            <a class="video-popup" href="<?php the_field( "video_url" ); ?>"><img class="play-overlay" src="<?php bloginfo('template_url');?>/images/play-overlay.png" alt=""></a>
                        </article>
                        <?php include_once('share.php');?>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>


            <!-- IMAGE -->
            <?php $graphicBlocks = array( 'post_type' => 'image_blocks');
            $graphics = new WP_Query( $graphicBlocks );
            if ( have_posts() ) :
                while ( $graphics->have_posts() ) : $graphics->the_post();?>
                    <?php $graphic_categories = wp_get_post_categories( $post->ID );
                    $graphicCats = array();
                    foreach($graphic_categories as $gc){
                        $graphicCat = get_category( $gc );
                        $graphicCats[] = $graphicCat->name;
                    }?>
                    <div id="image-<?php the_ID(); ?>" class="item <?php echo implode(' ',$graphicCats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article>
                            <?php if( get_field( "image_overlay" ) ){ ?>
                                <a class="popup" href="<?php the_field( "image_overlay" ); ?>"><img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>"></a>
                            <?php } elseif (get_field( "more_content" )) {?>
                                <a href="<?php the_permalink();?>"><img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>"></a>
                            <?php } else { ?>
                                <img class="col-xs-12 img-responsive" src="<?php the_field('image_upload_select');?>">
                            <?php } ?>
                            <?php include_once('share.php');?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>

            <!-- spotify
            <div class="item overview coffee col-xs-12 col-sm-3" data-order="8">
                <article>
                    <iframe src="https://embed.spotify.com/?uri=spotify:track:4bz7uB4edifWKJXSDxwHcs" height="80" frameborder="0" allowtransparency="true"></iframe>
                </article>
            </div>-->

            <!-- NOTE -->
            <?php $noteBlocks = array( 'post_type' => 'note_blocks');
            $notes = new WP_Query( $noteBlocks );
            if ( have_posts() ) :
                while ( $notes->have_posts() ) : $notes->the_post();?>
                    <?php $note_categories = wp_get_post_categories( $post->ID );
                    $noteCats = array();
                    foreach($note_categories as $nc){
                        $noteCat = get_category( $nc );
                        $noteCats[] = $noteCat->name;
                    }?>
                    <div id="image-<?php the_ID(); ?>" class="item <?php echo implode(' ',$noteCats);?> col-xs-<?php the_field('isotope_width_mobile');?>  col-sm-<?php the_field('isotope_width');?>" data-order="<?php the_field('sort_priority')?>">
                        <article class="inner-isotope-contents">
                            <div class="post-it-wrap">
                                <?php the_field('note_content');?>
                                <footer class="signature"></footer>
                            </div>
                            <?php include_once('share.php');?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>
        </section>
    </div>

<?php get_footer(); ?>