<?php

/*
Template Name: Questions
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
                <h1>Cosa senti?</h1>

                    <form id="myForm" name="myform" action="<?php echo esc_attr( admin_url('admin-post.php') ); ?>" method="POST">
                        <input type="hidden" name="action" value="save_my_custom_form" />

                        <p>Che colore è la tua emozione?</p>
                        <select name="risposta[emozione]">
                            <option selected value="">Seleziona</option>
                            <option value="Rosso">Rosso</option>
                            <option value="Verde">Verde</option>
                            <option value="Blu">Blu</option>
                            <option value="Giallo">Giallo</option>
                            <option value="altro">Altro</option>
                        </select>

                        <p>Che grandezza ha?</p>
                        <select name="risposta[grandezza]">
                            <option selected value="">Seleziona</option>
                            <option value="piccolo">Piccola</option>
                            <option value="medio">Media</option>
                            <option value="grande">Grande</option>
                            <option value="enorme">Enorme</option>
                            <option value="altro">Altro</option>
                        </select>
                    
                        <p>Dove la senti?</p>
                         <select name="risposta[luogo]">
                            <option selected value="">Seleziona</option>
                            <option value="testa">Testa</option>
                            <option value="petto">Petto</option>
                            <option value="stomaco">Stomaco</option>
                            <option value="intestini">Intestini</option>
                            <option value="gambe">Gambe</option>
                            <option value="altro">Altro</option>
                          </select>

                        <p>Quale forma ha?</p>
                        <select name="risposta[forma]">
                            <option selected value="">Seleziona</option>
                            <option value="quadrato">Quadrato</option>
                            <option value="cerchio">Cerchio</option>
                            <option value="triangolo">Triangolo</option>
                            <option value="rettangolo">Rettangolo</option>
                            <option value="linea">Linea</option>
                            <option value="punto">Punto</option>
                            <option value="altro">Altro</option>
                        </select>

                        <p>Quale consistenza ha?</p>
                        <select name="risposta[consistenza]">
                            <option selected value="">Seleziona</option>
                            <option value="liquida">Liquida</option>
                            <option value="solida">Solida</option>
                            <option value="gassosa">Gassosa</option>
                            <option value="soffice">Soffice</option>
                            <option value="dura">Dura</option>
                            <option value="altro">Altro</option>
                        </select>

                        <p>Se dovesse essere un oggetto che oggetto sarebbe?</p>
                            <input type="text" name="risposta[oggetto]" style="width:50%;">

                            
                        <br><br>
                        <input type="submit" value="Submit" />

                    </form> 
            
            </div>

        </section>

</div>
</section>


<?php get_footer();?>