<?php

/*
Template Name: Answers
*/

?>
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
                        <?php if (function_exists('usp_display_posts')) echo usp_display_posts(array('userid' => 'all', 'numposts' => -1)); ?>
                        <?php if (function_exists('usp_get_images')) $images = usp_get_images(); foreach ($images as $image) echo $image; ?>
                </div>
        </section>
</div>
</section>


<?php get_footer();?>

