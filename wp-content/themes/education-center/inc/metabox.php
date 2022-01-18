<?php
/**
 * Education Center Pro Meta Box
 * 
 * @package Education_Center
 */

 add_action('add_meta_boxes', 'education_center_add_layout_box');

function education_center_add_layout_box(){ 

    add_meta_box( 
        'education_center_sidebar_layout',
        __( 'Sidebar Layout', 'education-center' ),
        'education_center_sidebar_layout_callback', 
        array( 'page', 'post' ),
        'normal',
        'high'
    );

} 

$ecp_sidebar_layout = array(    
    'default-sidebar'=> array(
    	 'value'     => 'default-sidebar',
    	 'label'     => __( 'Default Sidebar', 'education-center' ),
    	 'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar/general-Default.jpg'
   	),
    'no-sidebar'     => array(
    	 'value'     => 'no-sidebar',
    	 'label'     => __( 'Full Width', 'education-center' ),
    	 'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar/general-full.jpg'
    ),
    'left-sidebar' => array(
         'value'     => 'left-sidebar',
    	 'label'     => __( 'Left Sidebar', 'education-center' ),
    	 'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar/general-left.jpg'         
    ),
    'right-sidebar' => array(
         'value'     => 'right-sidebar',
    	 'label'     => __( 'Right Sidebar', 'education-center' ),
    	 'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar/general-right.jpg'         
     )    
);

function education_center_sidebar_layout_callback(){
    global $post , $ecp_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'ecp_sidebar_nonce' );
    ?>     
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'education-center' ); ?></em></td>
        </tr>    
        <tr>
            <td>
                <?php  
                    foreach( $ecp_sidebar_layout as $field ){  
                        $layout = get_post_meta( $post->ID, '_education_center_sidebar_layout', true ); ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="ecp_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />                               
                            </label>
                        </div>
                        <?php 
                    } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>
 <?php 
}

function education_center_save_sidebar_layout( $post_id ){
    global $ecp_sidebar_layout;

    // Verify the nonce before proceeding.
    if( !isset( $_POST[ 'ecp_sidebar_nonce' ] ) || !wp_verify_nonce( $_POST[ 'ecp_sidebar_nonce' ], basename( __FILE__ ) ) )
        return;
    
    // Stop WP from clearing custom fields on autosave
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    
    $layout = isset( $_POST['ecp_sidebar_layout'] ) ? sanitize_key( $_POST['ecp_sidebar_layout'] ) : 'default-sidebar';

    if( array_key_exists( $layout, $ecp_sidebar_layout ) ){
        update_post_meta( $post_id, '_education_center_sidebar_layout', $layout );
    }else{
        delete_post_meta( $post_id, '_education_center_sidebar_layout' );
    }
      
}
add_action( 'save_post' , 'education_center_save_sidebar_layout' );