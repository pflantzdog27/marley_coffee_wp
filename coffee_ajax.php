<?php
/*
Template Name: Ajax Coffee
*/
?>
<?php get_header(); ?>

    <div class="container">
        <div id="inner-template" class="no-white">
            <nav id="coffee-nav" class="hidden-xs row">
                <ul>
                    <li class="col-sm-3 jbm"><a href="#jamaica-blue-mountain"></a></li>
                    <li class="col-sm-3 organic"><a href="#organic"></a></li>
                    <li class="col-sm-3 real-cups"><a href="#real-cups"></a></li>
                    <li class="col-sm-3 packets"><a href="#packets"></a></li>
                </ul>
            </nav>

            <?php if (have_posts()) :?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php the_content();?>

                <?php endwhile;?>
            <?php endif; ?>


        </div> <!-- inner-template -->
    </div> <!-- container -->



<?php get_footer(); ?>
<script>
    sectionChunk('#jamaica-blue-mountain','<?php bloginfo('url')?>/jamaica-blue-mountain',' .grounds-section > *',finishLoad());
    sectionChunk('#organic','<?php bloginfo('url')?>/organic',' .grounds-section > *',finishLoad());
    sectionChunk('#real-cups','<?php bloginfo('url')?>/keurig-compatible',' .grounds-section > *',finishLoad());
    sectionChunk('#packets','<?php bloginfo('url')?>/packets',' .grounds-section > *',finishLoad());
</script>