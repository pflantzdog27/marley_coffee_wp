<?php require_once('header.php');?>
        <div class="container">
            <div id="inner-template">
                <section id="recipe-list">
                    <ul>
                        <?php if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); ?>
                               <li>
                                   <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                   <?php if(get_field('recipe_intro')):?>
                                       <p><?php the_field( "recipe_intro" ); ?></p>
                                   <?php endif; ?>
                               </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </section>
            </div>
        </div>
<?php require_once('footer.php');?>