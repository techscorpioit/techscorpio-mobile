<?php

class TechScorpio_Mobile_Controller extends WP_REST_Controller {
    
	public function register_routes(){
		$namespace = 'ts_api/v1';
		$slider_image_path = 'get_slider_image';
		$free_content_path = 'get_free_content';
		$profile_image_path = 'get_profile_image/(?P<user_id>\\d+)';
		$subscription_plans = 'get_subscription_plans';

		$register_user_path = 'register_new_user';
		
		//Slider Image
		register_rest_route( $namespace, '/' . $slider_image_path, [
		array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'get_slider_image' ),
			'permission_callback' => array( $this, 'get_items_permissions_check' )
            ),

		]);  
		
		//Free Content
		register_rest_route( $namespace, '/' . $free_content_path , [
			array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'get_free_content' ),
			'permission_callback' => array( $this, 'get_items_permissions_check' )
			),
	
		]);
			
		//Profile Image
		register_rest_route( $namespace, '/' . $profile_image_path, [
			array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'get_profile_image' ),
			'permission_callback' => array( $this, 'get_items_permissions_check' )
			),
	
		]);

		//Subscription Plans
		register_rest_route( $namespace, '/' . $subscription_plans , [
			array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'get_subscription_plans' ),
			'permission_callback' => array( $this, 'get_items_permissions_check' )
			),
	
		]);

		// register_rest_routes($namespace, '/' . $register_user_path, [
		// 	array(
		// 	'methods'             => 'POST',
		// 	'callback'            => array( $this, 'get_subscription_plans' ),
		// 	'permission_callback' => array( $this, 'get_items_permissions_check' )
		// 	),
		// ]);
	}
	
	//TODO:
	public function get_items_permissions_check($request) {
		return true;
	}
	
	public function get_slider_image($request) {
		
		global $wpdb;
		$table_name = '_ts_slider_image';
		
		$slider_image = $wpdb->get_results( "SELECT * FROM $table_name" );	

		if (empty($slider_image)) {

			return new WP_Error( 'empty_slider_image', 'there is no slider_image in the database', array( 'status' => 404 ) );
		}
		
		return new WP_REST_Response($slider_image, 200);
	}

	public function get_free_content($request) {
		
		global $wpdb;
		$table_name = '_ts_free_content';
		
		$free_content = $wpdb->get_results( "SELECT * FROM $table_name" );	

		if (empty($free_content)) {

			return new WP_Error( 'empty_free_content', 'there is no free_content in the database', array( 'status' => 404 ) );
		}
		
		return new WP_REST_Response($free_content, 200);
	}
	
	public function get_profile_image($request) {				

		$args = array(
            'user_id' => $request['user_id']
    	);

    	$profile_image = get_avatar_url($args);

		if (empty($profile_image)) {

			return new WP_Error( 'empty_free_content', 'there is no free_content in the database', array( 'status' => 404 ) );
		}
		
		return new WP_REST_Response($free_content, 200);
	}

	public function get_subscription_plans($request){				
		$subscription_plans = pms_get_subscription_plans();

		if (empty($subscription_plans)) {
			return new WP_Error( 'empty_subscription_plans', 'there is no subscription_plans in the database', array( 'status' => 404 ) );
		}
		
		return new WP_REST_Response($subscription_plans, 200);
	}
	
} 

?>