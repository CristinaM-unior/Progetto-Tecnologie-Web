<?php

/*
Template Name: Calendar
*/
?>

<?php get_header();?>

<section class="page-wrap">
   
<div class="container">  
      <h1><?php the_title();?></h1>
      <?php get_template_part('includes/section','content');?>
</div>

<div class="container text-center">
      <div id="calendar-header" class="calendar-header"></div>
      <div id="calendar" class="calendar-grid"></div>
            
      <div id="icon-picker" class="icon-picker hidden">
            <h3>Come ti senti oggi?</h3>
            <div class="icons">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/happy11.png" data-icon="Very Good">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/smile2.png" data-icon="Good">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/upset3.png" data-icon="Ok">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/depressed4.png" data-icon="Bad">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/crying5.png" data-icon="Very Bad">
            </div>
      </div>
</div>
</section>


<?php get_footer();?>