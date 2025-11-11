<?php
/*
Template Name: Tutte le Risposte
*/
get_header();
?>

<section class="page-wrap risposte">
<div class="container">
                
        <section class="row">
            <div class="col-lg-3">
                    <?php if(is_active_sidebar('page_sidebar') ):?>
                    
                            <?php dynamic_sidebar('page_sidebar');?>

                    <?php endif;?>
            </div>

            <div class="col-lg-9">
            <h1>Archivio risposte</h1>

            <?php
            $args = array('post_type' => 'question_response', 'posts_per_page' => -1);
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="response-item">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>
                        <small>Pubblicata il <?php echo get_the_date();?> <?php echo get_the_time();?></small>
                    </article>
                    <hr>
                <?php endwhile;
            else :
                echo '<p>Nessuna risposta disponibile.</p>';
            endif;

            ?>
            </div>
        </section>
 </div>
</section>
<?php get_footer(); ?>