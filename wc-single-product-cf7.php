add_action( 'woocommerce_single_product_summary', 'mrc_woocommerce_cf7_single_product', 30 );
  
function mrc_woocommerce_cf7_single_product() {
   echo '<button type="submit" id="trigger_cf" class="single_add_to_cart_button button alt">Richiedi info</button>';
   echo '<div id="product_inq" style="display:none">';
   echo do_shortcode('[contact-form-7 id="1884" title="Modulo di contatto"]');
   echo '</div>';
   wc_enqueue_js( "
      $('#trigger_cf').on('click', function(){
         if ( $(this).text() == 'Richiedi info' ) {
            $('#product_inq').css('display','block');
            $('input[name=\"your-subject\"]').val('".get_the_title()."');
            $('#trigger_cf').html('Chiudi');
         } else {
            $('#product_inq').hide();
            $('#trigger_cf').html('Richiedi info');
         }
      });
   " );
}
