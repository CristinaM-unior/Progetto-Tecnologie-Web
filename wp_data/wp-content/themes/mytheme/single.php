<?php get_header();?>

<section class="page-wrap questions-page">
<div class="container">
            
        <section class="row">
            <div class="col-lg-3">
                    <?php if(is_active_sidebar('page_sidebar') ):?>
                    
                            <?php dynamic_sidebar('page_sidebar');?>

                    <?php endif;?>
            </div>

            <div class="col-lg-9">
               <h1><?php the_title();?></h1>

                <?php get_template_part('includes/section','content');?>
            
            </div>
        </section>
</div>
</section>


<?php get_footer();?>