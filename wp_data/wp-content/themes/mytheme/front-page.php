<?php get_header();?>


<section class="page-wrap">
<div class="container">
            <?php if ( !is_user_logged_in() ) : ?>
                <h1><?php the_title();?></h1>
                <p> Benvenuto su Mental Journal, inserisci i tuoi dati per iniziare </p>
                <?php echo do_shortcode('[ultimatemember form_id="218"]'); ?>

            <?php else : ?>
                <h1>Bentornato</h1>
                <p><?php echo wp_get_current_user()->display_name; ?>, bentornato su Mental Journal, sentiti libero di condividere i tuoi pensieri.</p> 
                <?php get_template_part('includes/section','content');?>
            <?php endif; ?>
            
</div>
</section>


<?php get_footer();?>