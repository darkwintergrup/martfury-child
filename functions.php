<?php
add_action( 'wp_enqueue_scripts', 'martfury_child_enqueue_scripts', 20 );
function martfury_child_enqueue_scripts() {
	wp_enqueue_style( 'martfury-child-style', get_stylesheet_uri() );
	if ( is_rtl() ) {
		wp_enqueue_style( 'martfury-rtl', get_template_directory_uri() . '/rtl.css', array(), '20180105' );
	}
}



// Ayni Gun Kargo Png Ekleme
// 1. Add new checkbox to product edit page (General tab)
  
add_action( 'woocommerce_product_options_general_product_data', 'bbloomer_add_badge_checkbox_to_products' );        
  
function bbloomer_add_badge_checkbox_to_products() {           
woocommerce_wp_checkbox( array( 
'id' => 'custom_badge', 
'class' => '', 
'label' => 'Aynı Gün Kargo'
) 
);      
}
// -----------------------------------------
// 2. Save checkbox via custom field
  
add_action( 'save_post', 'bbloomer_save_badge_checkbox_to_post_meta' );
  
function bbloomer_save_badge_checkbox_to_post_meta( $product_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if ( isset( $_POST['custom_badge'] ) ) {
            update_post_meta( $product_id, 'custom_badge', $_POST['custom_badge'] );
    } else delete_post_meta( $product_id, 'custom_badge' );
}

// 3. Display badge @ single product page if checkbox checked
  
add_action( 'woocommerce_single_product_summary', 'bbloomer_display_badge_if_checkbox', 6 );
  
function bbloomer_display_badge_if_checkbox() {
    global $product;     
    if ( get_post_meta( $product->get_id(), 'custom_badge', true ) ) {
        echo '<img id="cargo" src="http://localhost/martfurydwn/wp-content/uploads/2018/11/aynigk_badge.png" />';
    }
}





// Ucretsiz Kargo Png Ekleme
// 1. Add new checkbox to product edit page (General tab)
  
add_action( 'woocommerce_product_options_general_product_data', 'bbloomer_add_badge_checkbox_to_productsu' );        
  
function bbloomer_add_badge_checkbox_to_productsu() {           
woocommerce_wp_checkbox( array( 
'id' => 'custom_badgeu', 
'class' => '', 
'label' => 'Ücretsiz Kargo'
) 
);      
}
// -----------------------------------------
// 2. Save checkbox via custom field
  
add_action( 'save_post', 'bbloomer_save_badge_checkbox_to_post_metau' );
  
function bbloomer_save_badge_checkbox_to_post_metau( $product_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if ( isset( $_POST['custom_badgeu'] ) ) {
            update_post_meta( $product_id, 'custom_badgeu', $_POST['custom_badgeu'] );
    } else delete_post_meta( $product_id, 'custom_badgeu' );
}

// 3. Display badge @ single product page if checkbox checked
  
add_action( 'woocommerce_single_product_summary', 'bbloomer_display_badge_if_checkboxu', 6 );
  
function bbloomer_display_badge_if_checkboxu() {
    global $product;     
    if ( get_post_meta( $product->get_id(), 'custom_badgeu', true ) ) {
        echo '<img id="cargotwo" src="http://localhost/martfurydwn/wp-content/uploads/2018/11/ucretsiz-kargo_badge.png" />';
    }
}

