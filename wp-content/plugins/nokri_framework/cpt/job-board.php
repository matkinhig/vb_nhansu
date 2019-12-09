<?php 
// Register post  type and taxonomy
add_action( 'init', 'sb_themes_custom_types', 0 );
function sb_themes_custom_types() {
	 //Register Post type
	 $args = array(
      'public' => true,
      'label'  =>  __( 'Nokri JobBoard', 'redux-framework' ),
	  'supports' => array(  'title', 'thumbnail', 'editor', 'author' ),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'has_archive' => true,
		'rewrite' => array('with_front' => false, 'slug' => 'job')
	  
    );
    register_post_type( 'job_post', $args );
	
	//add_filter('post_type_link', 'custom_event_permalink', 1, 3);
function custom_event_permalink($post_link, $id = 0, $leavename) {
	
    if ( strpos('%ad%', $post_link) === 'FALSE' ) {
        return $post_link;
    }
    $post = get_post($id);
    if ( is_wp_error($post) || $post->post_type != 'job_post' ) {
        return $post_link;
    }
    return str_replace('ad',  'ad/' . $post->ID, $post_link);
}
	
	//Ads Cats
	register_taxonomy('job_category',array('job_post'), array(
		'hierarchical' => true,
		'show_ui' => true,
		'label'  =>  __( 'Categories', 'redux-framework' ),
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_category' ),
  ));
	
	//Ads Type
	register_taxonomy('job_type',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Type', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_type' ),
  ));
  //Ads Type
	register_taxonomy('job_qualifications',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Qualifications', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_qualifications' ),
  ));
  //Job Level
	register_taxonomy('job_level',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Level', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_level' ),
  ));
  //Job Salary
	register_taxonomy('job_salary',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Salary', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_salary' ),
  ));
  //Job Salary Type
	register_taxonomy('job_salary_type',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Salary Type', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_salary_type' ),
  ));
  
  //Ad Experience 
	register_taxonomy('job_experience',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Experience', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_experience' ),
  ));
  //Job Currency 
	register_taxonomy('job_currency',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Currency', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_currency' ),
  ));
  //Job Shift
	register_taxonomy('job_shift',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Shift', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_shift' ),
  ));
  //Job Skills
	register_taxonomy('job_skills',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Skills', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_skills' ),
  ));
  //Ads tags
	register_taxonomy('job_tags',array('job_post'), array(
		'hierarchical' => false,
		'label'  => __( 'Tags', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_tag' ),
  ));
  //Job Class
	register_taxonomy('job_class',array('job_post'), array(
		'hierarchical' => true,
		'label'  => __( 'Job Class', 'redux-framework' ),
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'job_class' ),
  ));
	
	
  //Ads Locations
	register_taxonomy('ad_location',array('job_post'), array(
		'hierarchical' => true,
		'show_ui' => true,
		'label'  =>  __( 'Locations', 'redux-framework' ),
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'ad_location' ),
  ));
  
  // Register Post type for Map Countries
    $args = array(
      'public' => true,
	   'menu_icon' => 'dashicons-location',
      'label'  =>  __( 'Map Countries', 'redux-framework' ),
	  'supports' => array( 'thumbnail', 'title')
    );
    register_post_type( '_sb_country', $args );
	
	
	
}




add_action('job_class_add_form_fields', 'job_class_metabox_add', 10, 1);
add_action('job_class_edit_form_fields', 'job_class_metabox_edit', 10, 1);    

function job_class_metabox_add($tag) { ?>
<h3><?php echo __("Regular Job Info", "redux-framework"); ?></h3>
    <div class="form-field">
        <label for="emp_class_check"><?php echo __("Select regular for free jobs", "redux-framework"); ?></label>
        <select class="form-control" id="image2" name="emp_class_check">
            <option><?php echo __("Select Option", "redux-framework"); ?></option>
            <option><?php echo __("Regular", "redux-framework"); ?></option>
         </select>
    </div>
<?php }     

function job_class_metabox_edit($tag) { ?>
<h3><?php echo __("Regular Job Info", "redux-framework"); ?></h3>
    <table class="form-table">
        <tr class="form-field">
        <th scope="row" valign="top">
            <label for="emp_class_check"><?php echo __("Select regular for free jobs", "redux-framework"); ?></label>
        </th>
        <td>
				<?php 
                    $selectArrVal =  get_term_meta($tag->term_id, 'emp_class_check', true); 
                    $selectArr = array(
                        "1" => __("Regular", "redux-framework"),
                    );
                ?>
            	<select name="emp_class_check" id="emp_class_check" type="text" aria-required="true" >
                    <?php 
						echo '<option value="">'. __("Select Option", "redux-framework") .'</option>';
						foreach( $selectArr as $key => $val )
						{
							$selected = ( $key == $selectArrVal ) ? 'selected="selected"' : '';
							echo '<option value="'.esc_attr($key).'" '.$selected.'>'.esc_html($val).'</option>';
						}
					?>
                </select>
        </td>
        </tr>
    </table>
<?php }

add_action('created_job_class', 'save_job_class_metadata', 10, 1);
add_action('edited_job_class', 'save_job_class_metadata', 10, 1);

function save_job_class_metadata($term_id){
{
    if (isset($_POST['emp_class_check']))
        update_term_meta( $term_id, 'emp_class_check', $_POST['emp_class_check']);
}
}





add_action('menu_category_edit_form_fields','menu_category_edit_form_fields');
add_action('menu_category_add_form_fields','menu_category_edit_form_fields');
add_action('edited_menu_category', 'menu_category_save_form_fields', 10, 2);
add_action('created_menu_category', 'menu_category_save_form_fields', 10, 2);

function menu_category_save_form_fields($term_id) {
    $meta_name = 'order';
    if ( isset( $_POST[$meta_name] ) ) {
        $meta_value = $_POST[$meta_name];
        // This is an associative array with keys and values:
        // $term_metas = Array($meta_name => $meta_value, ...)
        $term_metas = get_option("taxonomy_{$term_id}_metas");
        if (!is_array($term_metas)) {
            $term_metas = Array();
        }
        // Save the meta value
        $term_metas[$meta_name] = $meta_value;
        update_option( "taxonomy_{$term_id}_metas", $term_metas );
    }
}

function menu_category_edit_form_fields ($term_obj) {
    // Read in the order from the options db
    $term_id = $term_obj->term_id;
    $term_metas = get_option("taxonomy_{$term_id}_metas");
    if ( isset($term_metas['order']) ) {
        $order = $term_metas['order'];
    } else {
        $order = '0';
    }
?>
    <tr class="form-field">
            <th valign="top" scope="row">
                <label for="order"><?php _e('Category Order', ''); ?></label>
            </th>
            <td>
                <input type="text" id="order" name="order" value="<?php echo esc_attr($order); ?>"/>
            </td>
        </tr>
<?php 
}


// Register metaboxes for Country CPT
add_action( 'add_meta_boxes', 'sb_meta_box_for_country' );
function sb_meta_box_for_country()
{
    add_meta_box( 'sb_metabox_for_country', 'County', 'sb_render_meta_country', '_sb_country', 'normal', 'high' );
}
function sb_render_meta_country( $post )
{
 // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce_country', 'meta_box_nonce_country' );
?>
<div class="margin_top">
	<input type="text" name="country_county" class="project_meta" placeholder="<?php echo esc_attr__('County', 'redux-framework' ); ?>" size="30" value="<?php echo get_the_excerpt($post->ID ); ?>" id="country_county" spellcheck="true" autocomplete="off">
    <p><?php echo __('This should be follow ISO2 like', 'redux-framework'); ?> <strong><?php echo __('US', 'redux-framework'); ?></strong> <?php echo __('for USA and', 'redux-framework' ); ?> <strong><?php echo __('CA', 'redux-framework'); ?></strong> <?php echo __('for Canada','redux-framework'); ?>, <a href="http://data.okfn.org/data/core/country-list" target="_blank"><?php echo __('Read More.', 'redux-framework' );?></a></p>
</div>

<?php
}
// Saving Metabox data 
add_action( 'save_post', 'sb_themes_meta_save_country' );
function sb_themes_meta_save_country( $post_id )
{
  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
// if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce_country'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_country'], 'my_meta_box_nonce_country' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
	
	// Make sure your data is set before trying to save it
    if( isset( $_POST['country_county'] ) )
	{
        //update_post_meta( $post_id, '_sb_country_county', $_POST['country_county'] );
		$my_post = array(
			'ID'           => $post_id,
			'post_excerpt'   => $_POST['country_county'],
		);
		global $wpdb;
		$county	=	$_POST['country_county'];
		$wpdb->query( "UPDATE $wpdb->posts SET post_excerpt = '$county' WHERE ID = '$post_id'" );
	}
		
		
}





add_filter('manage_job_post_posts_columns', function ( $columns ) 
{
	unset($columns['job_qualifications']);
	return $columns;
} );





/* Remove Extra Columns Starts */
if ( ! function_exists( 'nokri_job_post_remove_columns' ) ) {	 
function nokri_job_post_remove_columns( $columns ) {
	$arr = array("job_type", "job_qualifications", "job_salary", "job_skills", "job_experience", "job_currency", "job_shift", "job_class", "ad_location","job_level");
	foreach( $arr as $r )
	{	
		$column_remove = '';
		$column_remove = 'taxonomy-'.$r;
		unset( $columns["$column_remove"] );
	}	
	return $columns;
}
}
add_filter ( 'manage_edit-job_post_columns', 'nokri_job_post_remove_columns' );



/* ========================= */
/* Add Custom Colours To Job Type */
/* ========================= */


 add_action( 'admin_enqueue_scripts', 'nokri_mw_enqueue_color_picker' );
 function nokri_mw_enqueue_color_picker( $hook_suffix ) 
 {
	 wp_enqueue_style( 'wp-color-picker' );
	 wp_enqueue_script( 'wp-color-picker-alpha', trailingslashit( get_template_directory_uri () )  . 'js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), false, true );
	 wp_enqueue_script( 'nokri-admin-js', trailingslashit( get_template_directory_uri () )  . 'js/admin.js', array( 'wp-color-picker' ), false, true );
  }
 
 function nokri_add_color_to_category( $term )
 {
	 
		if(isset($term->taxonomy))
		{
			$tax_type = ($term->taxonomy);
		}
		else
		{
			$tax_type = ($term);
		}
	$tax_type_meta = '_'.$tax_type.'_term_color';
	$tax_type_meta_bg = '_'.$tax_type.'_term_color_bg';
	 
	$field_name =  $tax_type.'_term_color';
	$field_name_bg = $tax_type.'_term_color_bg';
	 
 	$termID   = isset($term->term_id) ? $term->term_id : '';
  	$termMeta = get_term_meta($termID, $tax_type_meta, true );
	
	$termMeta_bg = get_term_meta($termID, $tax_type_meta_bg, true );
	
	
    
	 $customfield = $termMeta;
	 $cname = ( $customfield  && $customfield != "" ) ? $customfield : "#fff";
	 
	 $customfieldbg = $termMeta_bg;
	 $cname_bg = ( $customfieldbg  && $customfieldbg != "" ) ? $customfieldbg : "#fff";
	 
	 echo "<table class='form-table'><tbody> <tr class='form-field term-parent-wrap'><th scope='row'><label for='".$field_name_bg."'>".__ ('Select BG Color','opportunities')."</label></th><td><input type='text' value='".esc_attr($cname_bg)."' class='my-color-field color-picker'  data-default-color='#effeff' data-alpha='true' name='".$field_name_bg."' id='".$field_name_bg."' /></td></tr></tbody></table>";
	 
	 
	  echo "<table class='form-table'><tbody> <tr class='form-field term-parent-wrap'><th scope='row'><label for='".$field_name."'>".__ ('Select Font Color','opportunities')."</label></th><td><input type='text' value='".esc_attr($cname)."' class='my-color-field color-picker'  data-default-color='#effeff' data-alpha='true' name='".$field_name."' id='".$field_name."' /></td></tr></tbody></table>";
 
 }
 
function save_custom_tax_color_field( $termID )
{
	
	$taxonomy_data = get_term($termID);
	$taxonomy_type = ($taxonomy_data->taxonomy);
	$post_data     = $taxonomy_type.'_term_color';
	
	$post_data_bg     = $taxonomy_type.'_term_color_bg';
	
	
if ( isset( $_POST[$post_data] ) ) 
{
	$termMeta = $_POST[$post_data];
	$tax_type_meta = '_'.$taxonomy_type.'_term_color';
	
	update_term_meta( $termID, $tax_type_meta, '');
	if($termMeta != "" )
	{
		update_term_meta( $termID, $tax_type_meta, $termMeta);
	}

 }
 
 
if ( isset( $_POST[$post_data_bg] ) ) 
{
	$termMeta_bg = $_POST[$post_data_bg];
	
	
	$tax_type_meta_bg = '_'.$taxonomy_type.'_term_color_bg';
	
	update_term_meta( $termID, $tax_type_meta_bg, '');
	if($termMeta_bg != "" )
	{
		update_term_meta( $termID, $tax_type_meta_bg, $termMeta_bg);
	}

 } 
 
}

	$array_terms = array('job_type', 'job_class');

	if(count((array)$array_terms) > 0 )
	{
		
		foreach( $array_terms as $type )
		{
			if( $type != "" )
			{
				add_action($type.'_add_form_fields', 'nokri_add_color_to_category' );
				add_action($type.'_edit_form_fields', 'nokri_add_color_to_category' );
				add_action( "create_".$type, 'save_custom_tax_color_field' );
				add_action( "edited_".$type, 'save_custom_tax_color_field' );
			}
		}
	}
// Register metaboxes for Products
add_action( 'add_meta_boxes', 'sb_adforest_ad_meta_box' );
function sb_adforest_ad_meta_box()
{
    add_meta_box('sb_thmemes_adforest_metaboxes_for_ad', __('Assign job','redux-framework' ), 'sb_render_meta_for_ads', 'job_post', 'normal', 'high' );
}
function sb_render_meta_for_ads( $post )
{
 // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce_ad', 'meta_box_nonce_product' );
?>

<div class="margin_top">
<p><?php echo __('Select Author','redux-framework' ); ?></p>
    <select name="sb_change_author" style="width:100%; height:40px;">
<?php
$users = get_users( array( 'fields' => array( 'display_name', 'ID' ),'meta_query' => array( 'key' => '_sb_reg_type', 'value' => '1','compare' => '=') ));
foreach ( $users as $user ) {
	if( get_user_meta( $user->ID, '_sb_reg_type', true ) != '1' )
		continue;
	echo '<span>' . esc_html( $user->display_name ) . '</span>';
?>
    	<option value="<?php echo esc_attr( $user->ID ); ?>" <?php if( $post->post_author == $user->ID ) echo 'selected'; ?>>
			<?php echo esc_html( $user->display_name ); ?>
		</option>
<?php
}
?>
    </select>
</div>
<?php
}
// Saving Metabox data 
add_action( 'save_post', 'sb_themes_meta_save_for_ad' );
function sb_themes_meta_save_for_ad( $post_id )
{
  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
// if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce_product'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_product'], 'my_meta_box_nonce_ad' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
	
	// Make sure your data is set before trying to save it
    if( isset( $_POST['sb_change_author'] ) )
	{
		$my_post = array(
		'ID' => $post_id,
		'post_author' => $_POST['sb_change_author'],
		);
		// unhook this function so it doesn't loop infinitely
        remove_action('save_post', 'sb_themes_meta_save_for_ad');

        // update the post, which calls save_post again
        wp_update_post( $my_post );

        // re-hook this function
        add_action('save_post', 'sb_themes_meta_save_for_ad');
	}
		
		
}

/* Job post static feilds */



// Register metaboxes for Products
add_action( 'add_meta_boxes', 'nokri_job_post_feilds' );
function nokri_job_post_feilds()
{
    add_meta_box('nokri_job_post_feilds', __('Static feilds','redux-framework' ), 'nokri_job_post_feilds_renders', 'job_post', 'normal', 'high' );
}
function nokri_job_post_feilds_renders( $post )
{
 // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce_ad', 'meta_box_nonce_product' );
	
	$ad_map_lat = $ad_map_long = '';
	
	/* Getting post meta values */
	$job_apply_with	=	   get_post_meta($post->ID, '_job_apply_with', true);
    $job_ext_url	=	   get_post_meta($post->ID, '_job_apply_url', true); 
	$job_deadline   =      get_post_meta($post->ID, '_job_date', true);
	$job_ext_mail   =	   get_post_meta($post->ID, '_job_apply_mail', true);
	$ad_mapLocation =      get_post_meta($post->ID, '_job_address', true);
	$ad_map_lat		=      get_post_meta($post->ID, '_job_lat', true);
	$ad_map_long	=      get_post_meta($post->ID, '_job_long', true);
	if($ad_map_lat == '')
	{
		$ad_map_lat = Redux::getOption('nokri', 'sb_default_lat');
	}
	if($ad_map_long == '')
	{
    	$ad_map_long = Redux::getOption('nokri', 'sb_default_long');
	}
?>
<div class="row">
	<div class="margin_top clear-custom">
		<div class="col-4">
			<div class="form-group">
				<p>
					<?php echo __( 'Number of vacancies', 'redux-framework' ); ?>
				</p>
				<input type="number" class="form-control" placeholder="<?php echo esc_html__( 'Number of vacancies', 'nokri' ); ?>" name="job_posts" value="<?php echo get_post_meta( $post->ID, '_job_posts', true); ?>">
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				<p>
					<?php echo __( 'Application deadline', 'redux-framework' ); ?>
				</p>
				<input type="text" value="<?php echo esc_html($job_deadline); ?>" class="form-control datepickerhere" data-parsley-required="true" data-language="en" name="job_date" placeholder="<?php echo esc_html__( 'Application deadline*', 'nokri' ); ?>" >
			</div>
		</div>
		<!--Apply With -->
		<div class="col-4">
			<div class="form-group">
				<p>
					<?php echo esc_html__( 'Apply With Link', 'redux-framework' ); ?>
				</p>
				<select class="js-example-basic-single" data-allow-clear="true" data-placeholder="<?php echo esc_html__( 'Select an option', 'nokri' ); ?>" name="job_apply_with" data-parsley-required="true" id="ad_external" >
					<option value="0">
						<?php echo esc_html__( 'Select Option', 'redux-framework' ); ?>
					</option>
					<option value="exter" <?php if($job_apply_with=="exter" ){ echo 'selected="selected"';}?>>
						<?php echo esc_html__( 'External Link', 'nokri' ); ?>
					</option>
					<option value="inter" <?php if($job_apply_with=="inter" ){ echo 'selected="selected"'; }?>>
						<?php echo esc_html__( 'Internal Link', 'nokri' ); ?>
					</option>
					<option value="mail" <?php if($job_apply_with=="mail" ){ echo 'selected="selected"'; }?>>
						<?php echo esc_html__( 'Email', 'nokri' ); ?>
					</option>
				</select>
			</div>
		</div>
		<!--Apply With Extra Feild-->
		<div class="col-4" id="job_external_link_feild" <?php if($job_ext_url=="" ){echo 'style="display: none;"';}?>>
			<div class="form-group">
				<p>
					<?php echo esc_html__( 'Put Link Here', 'nokri' ); ?>
				</p>
				<input type="text" class="form-control" placeholder="<?php echo esc_html__( 'Put Link Here', 'redux-framework' ); ?>" name="job_external_url" value="<?php echo esc_attr($job_ext_url); ?>" id="job_external_url" data-parsley-type="url" >
			</div>
		</div>
		<!--Apply With Email-->
		<div class="col-4" id="job_external_mail_feild" <?php if($job_ext_mail=="" ){echo 'style="display: none;"';}?>>
			<div class="form-group">
				<p>
					<?php echo esc_html__( 'Enter Email', 'redux-framework' ); ?>
				</p>
				<input type="email" class="form-control" placeholder="<?php echo esc_html__( 'Enter valid email', 'redux-framework' ); ?>" name="job_external_mail" value="<?php echo esc_attr($job_ext_mail); ?>" id="job_external_mail" >
			</div>
		</div>
        <div class="col-4">
		<div class="form-group">
			<p>
				<?php echo esc_html__( 'Select address', 'redux-framework' ); ?>
			</p>
            <?php //if($mapType=='google_map' ) { ?> <a href="javascript:void(0);" id="your_current_location" title="<?php echo esc_html__('You Current Location', 'nokri' ); ?>"><i class="fa fa-crosshairs"></i></a>
			<?php //} ?>
			<input type="text" class="form-control" data-parsley-required="true" name="sb_user_address" id="sb_user_address" value="<?php echo esc_attr($ad_mapLocation); ?>" placeholder="<?php echo esc_html__('Enter map address', 'nokri' ); ?>" >
			
		</div>
        </div>
        
        
        <div class="col-12">
		<div class="form-group">
			<div id="dvMap" style="width:100%; height: 300px"></div>
		</div>
        </div>
        
        <div class="col-4">
		<div class="form-group">
			<input class="form-control" name="ad_map_long" id="ad_map_long" value="<?php echo esc_attr($ad_map_long); ?>" type="text" >
		</div>
        </div>
        
        <div class="col-4">
		<div class="form-group">
			<input class="form-control" type="text" name="ad_map_lat" id="ad_map_lat" value="<?php echo esc_attr($ad_map_lat); ?>">
		</div>
        </div>
	</div>
</div>
<?php
}

// Saving Metabox data 
add_action( 'save_post', 'nokri_job_post_feilds_saved' );
function nokri_job_post_feilds_saved( $post_id )
{
  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
// if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce_product'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_product'], 'my_meta_box_nonce_ad' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
	
	// Make sure your data is set before trying to save it
    if( isset( $_POST ) )
	{
		
	   // unhook this function so it doesn't loop infinitely
        remove_action('save_post', 'nokri_job_post_feilds_saved');
       // update the post, which calls save_post again
       update_post_meta( $post_id, '_job_posts', sanitize_text_field($_POST['job_posts']));
	   update_post_meta( $post_id, '_job_date', sanitize_text_field($_POST['job_date']));
	   update_post_meta( $post_id, '_job_apply_with', sanitize_text_field(($_POST['job_apply_with'])));
	   update_post_meta( $post_id, '_job_apply_with', sanitize_text_field(($_POST['job_apply_with'])));
	   update_post_meta( $post_id, '_job_apply_url', sanitize_text_field($_POST['job_external_url']));
	   if( isset( $_POST ) && $_POST['job_apply_with'] == 'inter')
	   { 
	   		update_post_meta( $post_id, '_job_apply_url', '');
	   }
	   if(isset( $_POST ) && $_POST['job_apply_with'] == 'mail')
	   { 
	   			   update_post_meta( $post_id, '_job_apply_mail',sanitize_text_field( ($_POST['job_external_mail'])));

	   }
	   if (isset( $_POST ) && $_POST['sb_user_address'] != '')
		{
			update_post_meta( $post_id, '_job_address', sanitize_text_field($_POST['sb_user_address']));
		}
		if (isset( $_POST ) && $_POST['ad_map_lat'] != '')
		{
			update_post_meta( $post_id, '_job_lat', sanitize_text_field($_POST['ad_map_lat'])); 
		}
		if (isset( $_POST ) && $_POST['ad_map_long'] != '')
		{
			update_post_meta( $post_id, '_job_long', sanitize_text_field($_POST['ad_map_long'])); 
		}
		
		update_post_meta($post_id, '_job_status', sanitize_text_field('active' ));
		
        // re-hook this function
        add_action('save_post', 'nokri_job_post_feilds_saved');
	}
		
		
}
/* Job post static feilds */
/* Google map */
function nokri_loading_scripts_wrong() {
	$map_type	 =	$allow_cntry = '';
	$map_type = Redux::getOption('nokri', 'map-setings-map-type');
	$allow_cntry = Redux::getOption('nokri', 'sb_list_allowed_country');
	$stricts = '';
	if( isset( $data['sb_location_allowed'] ) && !$data['sb_location_allowed'] && isset ($data['sb_list_allowed_country'] ) )
	{
		$stricts = "componentRestrictions: {country: ". json_encode( $allow_cntry ) . "}";
	} 
	
	
echo " <script>

	   function nokri_location() {
      var input = document.getElementById('sb_user_address');
	  var action_on_complete	=	'1';
	  var options = { ".$stricts."
 };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
	  if( action_on_complete )
	  {
	   new google.maps.event.addListener(autocomplete, 'place_changed', function() {
	  // document.getElementById('sb_loading').style.display	= 'block';
    var place = autocomplete.getPlace();
	document.getElementById('ad_map_lat').value = place.geometry.location.lat();
	document.getElementById('ad_map_long').value = place.geometry.location.lng();
	var markers = [
        {
            'title': '',
            'lat': place.geometry.location.lat(),
            'lng': place.geometry.location.lng(),
        },
    ];
	my_g_map(markers);
	
	//document.getElementById('sb_loading').style.display	= 'none';
});
	   }

   }
   
   function my_g_map(markers1) {
	
	var my_map;
			var marker;
			var markers = [
				{
					'title': '',
					'lat': '37.090240',
					'lng': '-95.712891',
				},
			];
	
	var mapOptions = {
		center: new google.maps.LatLng(markers1[0].lat, markers1[0].lng),
		zoom: 15,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var infoWindow = new google.maps.InfoWindow();
	var latlngbounds = new google.maps.LatLngBounds();
	var geocoder = geocoder = new google.maps.Geocoder();
	my_map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
	var map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
	var data = markers1[0]
	var myLatlng = new google.maps.LatLng(data.lat, data.lng);
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: data.title,
		draggable: true,
		animation: google.maps.Animation.DROP
	});


	(function (marker, data) {

		google.maps.event.addListener(marker, 'click', function (e) {
			infoWindow.setContent(data.description);
			infoWindow.open(map, marker);
		});


		google.maps.event.addListener(marker, 'dragend', function (e) {
			jQuery('.cp-loader').show();
			//document.getElementById('sb_loading').style.display	= 'block';
			var lat, lng, address;
			geocoder.geocode({
				'latLng': marker.getPosition()
			}, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					lat = marker.getPosition().lat();
					lng = marker.getPosition().lng();
					address = results[0].formatted_address;
					document.getElementById('ad_map_lat').value = lat;
					document.getElementById('ad_map_long').value = lng;
					document.getElementById('sb_user_address').value = address;
				}

			});
		});
	})(marker, data);
	latlngbounds.extend(marker.position);
	jQuery(document).ready(function($) {
			$('#your_current_location').click(function() {
				$.ajax({
				url: 'https://geoip-db.com/jsonp',
				jsonpCallback: 'callback',
				dataType: 'jsonp',
				success: function( location ) {
					var pos = new google.maps.LatLng(location.latitude, location.longitude);
					my_map.setCenter(pos);
					my_map.setZoom(12);
					
					$('#sb_user_address').val(location.city + ', ' + location.state + ', ' + location.country_name );
					document.getElementById('ad_map_long').value = location.longitude;
					document.getElementById('ad_map_lat').value = location.latitude;
					
				var markers2 = [
				{
					title: '',
					lat: location.latitude,
					lng: location.longitude,
				},
			];
			my_g_map(markers2);
				}
			});		
			});	
				});
}	
   </script>";

/* Google map end */   
$map_type = Redux::getOption('nokri', 'map-setings-map-type');
?>
<input type="hidden" name="check_map" id="check_map" value="<?php echo esc_attr($map_type);?>" />
<?php 
}
add_action('admin_print_scripts', 'nokri_loading_scripts_wrong', 0, 99);
add_action('admin_footer-edit.php', 'nokri_loading_scripts_wrong'); // Fired on the page with the posts table
add_action('admin_footer-post.php', 'nokri_loading_scripts_wrong'); // Fired on post edit page
add_action('admin_footer-post-new.php', 'nokri_loading_scripts_wrong'); // Fired on add new post page
/* Nokri new job post message starts */
function nokri_job_post_admin_notice(){
      $screen = get_current_screen();
    //If not on the screen with ID 'edit-post' abort.
    if( $screen->id !='job_post' )
        return;
      ?>
  <div class="updated">
  <input type="hidden" value="2" name="edit_job_post" id="edit_job_post">
    <p>
    <?php  echo esc_html__( 'Please check only one taxonomy except categories,location,job class and skills', 'redux-framework' ); ?>
    </p>
  </div>

  <div class="error">
    <p>
    <?php  echo esc_html__( 'More than one will not work', 'redux-framework' ); ?>
    </p>
  </div>
     <?php

 }
 add_action('admin_notices','nokri_job_post_admin_notice');
 /* Nokri new job post message starts */
 
// Register metaboxes for questions
add_action( 'add_meta_boxes', 'nokri_question_meta_box' );
function nokri_question_meta_box()
{
    add_meta_box('nokri_question_meta_box', __('Add Questionnaire','redux-framework' ), 'nokri_question_render_meta_box', 'job_post', 'normal', 'high' );
}
function nokri_question_render_meta_box( $post )
{
 // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce_ad', 'meta_box_nonce_product' );
/* Job Questions */
$job_questions  =  $jobs_question ='';
$job_questions  =  get_post_meta( $post->ID, '_job_questions',true);
$jobs_question  =  get_post_meta( $post->ID, '_job_questions_en',true);
$jobs_question_area = ($jobs_question == 'no') ? 'style="display:none;"' : '';
?>
 <div class="margin_top">
	<select class="js-example-basic-single" data-allow-clear="true" data-placeholder="<?php echo esc_html__( 'Select an option', 'nokri' ); ?>" name="job_questions" id="job_questions">
		<option value="0">
			<?php echo esc_html__( 'Select Option', 'redux-framework' ); ?>
		</option>
		<option value="yes" <?php if($jobs_question=="yes" ){ echo 'selected="selected"';}?>>
			<?php echo esc_html__( 'Yes', 'nokri' ); ?>
		</option>
		<option value="no" <?php if($jobs_question=="no" ){ echo 'selected="selected"'; }?>>
			<?php echo esc_html__( 'No', 'nokri' ); ?>
		</option>
	</select>
</div>

<div class="margin_top custom-questions" <?php echo ($jobs_question_area); ?>>
	<div id="custom_feilds_wrapper">
		<div class="custom_feilds_repeats">
        <?php if( isset($job_questions) && !empty($job_questions) )
			{
				foreach($job_questions as $questions)
				{
		?>
			<p class="custom_feilds_labels">
				<label for="custom_feilds_values">
					<?php _e( 'Enter Question', 'redux-framework' ); ?>
				</label>
				<br>
				<textarea rows="2" cols="156" name="job_qstns[]"><?php echo esc_html($questions); ?></textarea>
			</p>
            <?php } } else { ?>
            <p class="custom_feilds_labels">
				<label for="custom_feilds_values">
					<?php _e( 'Enter Question', 'redux-framework' ); ?>
				</label>
				<br>
				<textarea rows="2" cols="156" name="job_qstns[]"></textarea>
			</p>
            <?php } ?>
		</div>
	</div>
	<p>
		<input type="button" class="btn-admin btn-add " onclick="add_row();" value="<?php echo esc_attr__('+ Add More','redux-framework');?>">
	</p>
</div>
<?php
}
// Saving Metabox data 
add_action( 'save_post', 'nokri_question_save_meta_box' );
function nokri_question_save_meta_box( $post_id )
{
  // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
// if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce_product'] ) || !wp_verify_nonce( $_POST['meta_box_nonce_product'], 'my_meta_box_nonce_ad' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
	
	
	if( isset($_POST['job_questions']) && !empty($_POST['job_questions']) )
	{
			update_post_meta( $post_id, '_job_questions_en', sanitize_text_field($_POST['job_questions']));
	}
	
	
	// Make sure your data is set before trying to save it
	if( isset( $_POST['job_qstns'] ) )
	{
		$questions_sanatize = array();
		if( isset($_POST['job_qstns']) && !empty($_POST['job_qstns']) )
		{
			foreach($_POST['job_qstns'] as $key)
			{
				$questions_sanatize[] = sanitize_text_field($key);
			}
		}
	    update_post_meta( $post_id, '_job_questions', ($questions_sanatize));
		// unhook this function so it doesn't loop infinitely
        remove_action('save_post', 'nokri_question_save_meta_box');
        // re-hook this function
        add_action('save_post', 'nokri_question_save_meta_box');
	}
}

/* Job post static feilds */
/* Google map end */ 
/* Add Javascript/Jquery Code Here */
function nokri_this_screen() {
  $current_screen = get_current_screen();
  if( $current_screen ->id === "job_post") {
   add_action('admin_footer','nokri_admin_scripts_enqueue_custom_questions');	
  }
}
add_action( 'current_screen', 'nokri_this_screen' );
function nokri_admin_scripts_enqueue_custom_questions()
{
?>
<script type="text/javascript">
;
function add_row()
{
		$rowno = jQuery("#custom_feilds_wrapper .custom_feilds_repeats").length;
	    $rowno = $rowno+1;
		jQuery("#custom_feilds_wrapper").append('<div class="custom_feilds_repeats" id="custom_repeat'+$rowno+'"><p class="custom_feilds_values"><label for="custom_feilds_values"><?php _e( 'Enter Question', 'redux-framework' ); ?></label><br><textarea rows="2" cols="156" name="job_qstns[]" required></textarea></p><input type="button" class="btn-admin btn-remove" value="<?php _e( 'DELETE', 'redux-framework' ); ?>" onclick=delete_row("custom_repeat'+$rowno+'")></div>');
}

function delete_row(rowno)
{
	var conBox = confirm("<?php _e( 'Are You Sure ?', 'redux-framework' ); ?>");
    if(conBox)
	{ 
       jQuery('#'+rowno).remove();
    }
    else
    return;
}

jQuery(document.body).on('change', '#job_questions', function(e){
var selectVal = jQuery(this).val();
if( selectVal == 'yes')
{
	 jQuery('.custom-questions').show(); 
} 
else
{
	jQuery('.custom-questions').hide();
}
});


</script>
<?php } 