<?php
/*
Template Name: Coffee Page
*/
?>
<?php get_header(); ?>

<div class="container">
    <div id="inner-template" class="no-white">
        <?php if (have_posts()) :?>
            <?php $pageTitle = '';?>
             <section class="grounds-section">
                    <header>
                        <hgroup class="clearfix">
                            <div class="row">
                                <?php while (have_posts()) : the_post(); ?>
                                    <?php $pageTitle = get_the_title();?>
                                    <h2 class="col-sm-8"><?php the_field('type_of_coffee');?></h2>
                                    <h3 class="col-sm-3 "><?php the_title();?></h3>
                                    <?php if( get_field( "the_seal" ) ): ?>
                                        <img class="coffee-seal" src="<?php the_field( "the_seal" ); ?>" alt="<?php the_title()?>">
                                    <?php endif; ?>
                                <?php endwhile;?>
                            </div>
                        </hgroup>
                    </header>
                    <div class="grounds-main">
                        <div class="ground-items-wrap clearfix">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php if( get_field( "coffee_intro" ) ): ?>
                                    <article class="intro-item">
                                        <?php the_field('coffee_intro')?>
                                    </article>
                                <?php endif; ?>
                            <?php endwhile;?>
        <?php endif; wp_reset_query(); ?>
             <?php $coffeeItems = array( 'post_type' => 'coffee_item', 'coffee_group' => $pageTitle);?>
             <?php $coffee = new WP_Query( $coffeeItems );
                 if ( have_posts() ) :
                    while ( $coffee->have_posts() ) : $coffee->the_post();?>
                        <?php if($pageTitle == 'Keurig compatible'){?>
                            <div class="ground-item col-sm-3">
                                <figure class="col-sm-12 realcup">
                                    <img class="img-responsive" src="<?php the_field('coffee_image')?>" alt="<?php the_title();?>">
                                </figure>
                                <article class="col-sm-12">
                                    <h4><?php the_title()?></h4>
                                    <?php if(get_field('coffee_info')):?>
                                        <small><?php the_field('coffee_info')?></small>
                                    <?php endif; ?>
                                    <?php  $select_details = get_field( "coffee_details" );
                                    if( $select_details ){
                                        $select_details_list = array();
                                        foreach( $select_details as $select_detail):
                                            $select_details_list[] = '<li>' . $select_detail .'</li>';
                                        endforeach;
                                    } ?>

                                    <ul>
                                         <?php if( $select_details ){
                                            echo implode(' ',$select_details_list);
                                         } ?>
                                         <?php  $grade = get_field( "coffee_grade" ); ?>
                                         <?php switch ($grade) {
                                             case "Light":
                                                 echo '<li><img class="grade" src="' .get_bloginfo("template_url") . '/images/grade_light.jpg" alt="Grade Light></li>';
                                                 break;
                                             case "Light Medium":
                                                 echo '<li><img class="grade" src="' .get_bloginfo("template_url").'/images/grade_lt_medium.jpg" alt="Grade Light Medium></li>';
                                                 break;
                                             case "Medium":
                                                 echo '<li><img class="grade" src="'. get_bloginfo("template_url").'/images/grade_medium.jpg" alt="Grade Medium"></li>';
                                                 break;
                                             case "Medium Dark":
                                                 echo '<li><img class="grade" src="'.get_bloginfo("template_url").'/images/grade_med_dark.jpg" alt="Grade Medium Dark"></li>';
                                                 break;
                                             case "Dark":
                                                 echo '<li><img class="grade" src="'.get_bloginfo("template_url").'/images/grade_dark.jpg" alt="Grade Dark"></li>';
                                                 break;
                                         } ?>
                                    </ul>
                                </article>
                            </div>
                        <?php } else { ?>
                            <div class="ground-item col-sm-4">
                                <div class="row">
                                    <figure class="col-sm-5">
                                        <img class="img-responsive" src="<?php the_field('coffee_image')?>" alt="<?php the_title();?>">
                                    </figure>
                                    <article class="col-sm-7">
                                        <h4><?php the_title()?></h4>
                                        <?php if(get_field('coffee_info')):?>
                                            <small><?php the_field('coffee_info')?></small>
                                        <?php endif; ?>
                                        <?php  $select_details = get_field( "coffee_details" );
                                        if( $select_details ){
                                            $select_details_list = array();
                                            foreach( $select_details as $select_detail):
                                                $select_details_list[] = '<li>' . $select_detail .'</li>';
                                            endforeach;

                                        } ?>
                                        <?php  $select_kosher = get_field( "kosher_specification" );
                                        if( $select_kosher ){
                                            $select_kosher_list = array();
                                            foreach( $select_kosher as $select_koshery):
                                                $select_kosher_list[] = '<li>' . $select_koshery .'</li>';
                                            endforeach;

                                        } ?>
                                        <?php  $select_origins = get_field( "coffee_origins" );
                                        if( $select_origins ){
                                            $select_origins_list = array();
                                            foreach( $select_origins as $select_origin):
                                                $select_origins_list[] = '<li>' . $select_origin .'</li>';
                                            endforeach;

                                        } ?>

                                        <ul>
                                            <?php if( $select_details ){
                                                echo implode(' ',$select_details_list);
                                            } ?>
                                            <?php if( $select_kosher ){
                                                echo implode(' ',$select_kosher_list);
                                            } ?>
                                            <?php if( $select_origins ){
                                                echo implode(' ',$select_origins_list);
                                            } ?>
                                            <?php  $grade = get_field( "coffee_grade" ); ?>
                                            <?php switch ($grade) {
                                                case "Weak":
                                                    echo '<li><img class="grade" src="'.get_bloginfo("template_url") .'/images/grade_weak.jpg" alt="Grade Weak></li>';
                                                    break;
                                                case "Medium":
                                                    echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_medium.jpg" alt="Grade Medium"></li>';
                                                    break;
                                                case "Strong":
                                                    echo '<li><img class="grade" src="'. get_bloginfo("template_url") .'/images/grade_strong.jpg" alt="Grade Strong"></li>';
                                                    break;
                                            } ?>
                                        </ul>
                                    </article>
                                </div>
                            </div>
                        <?php } ?>


                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
                        </div>
                </div>
            </section>
    </div> <!-- inner-template -->
</div> <!-- container -->



<?php get_footer(); ?>