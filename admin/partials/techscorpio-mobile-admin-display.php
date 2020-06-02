<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://techscorpio.xyz
 * @since      1.0.0
 *
 * @package    Techscorpio_Mobile
 * @subpackage Techscorpio_Mobile/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="row">
  <div class="col-10">
    <h1 class="display-4 text-center">Techscorpio Mobile</h1>
    <p class="lead text-center">This plugin helps your WordPress website to interact with TechScorpio Mobile App</p>
  </div>

  <div class="col-2">
    <img style="height:100px;" src="https://courticalhoops.com/wp-content/uploads/2020/06/Logo-Round.png"/>
  </div>
</div>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-slideshare"></i> Home Slider</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="free-content-tab" data-toggle="tab" href="#free-content" role="tab" aria-controls="free-content" aria-selected="false">Free Content</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="paid-content-tab" data-toggle="tab" href="#paid-content" role="tab" aria-controls="paid-content" aria-selected="false">Paid Content</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
  </li>
</ul>


<div class="tab-content" id="myTabContent">

  <!--Home Slider-->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div><br>
      <form method="POST" action="<?php the_permalink() ?>">
        <div class="form-group row">								
          <label class="col-sm-2 col-form-label">Slider Image Url: </label>
          <div class="col-sm-8">
            <input required class="form-control" type="text" name="slider_url" placeholder="http://example.com/image.png"/>
          </div>
          <input class="btn btn-primary mb-2 pull-right" type="submit" name="insert_slider" value="Insert Slider Image" />
        </div>		        
      </form>
    </div>

    <table class="table table-hover table-bordered">
			  <tr>
          <th class="text-center" style="width:10%;">Slider No.</th>
          <th class="text-center" style="width:20%;">Slider Image</th>
          <th class="text-center" style="width:50%;">Slider Url</th>
          <th class="text-center">Action</th>
        </tr>      
        
        <?php
          global $wpdb;
          $slider_table_name = '_ts_slider_image';
          $existing_slider_list = $wpdb->get_results( "SELECT * FROM $slider_table_name" );
          ?>

          <?php foreach($existing_slider_list as $existing_slider){ ?>

          <tr>
            <td class="text-center align-middle"><?php echo $existing_slider->slider_id; ?></td>
            <td class="text-center"><img style="height:100px;" src="<?php echo $existing_slider->slider_url; ?>"/></td>
            <td class="align-middle"><?php echo $existing_slider->slider_url; ?></td>
            <td class="text-center align-middle">
              <button name="edit_slider" type="submit" class="btn btn-sm btn-info">Edit</button>
              <button name="delete_slider" type="button" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>

			</table>
  </div>

  <!--Free Content-->
  <div class="tab-pane fade" id="free-content" role="tabpanel" aria-labelledby="free-content-tab">
    <div>
      <br>
      <form style="margin:10px;" method="POST" action="<?php the_permalink() ?>">
        <div class="form-group row">								
          <label class="col-sm-2 col-form-label">Free Content Url: </label>
          <div class="col-sm-10">
            <input required class="form-control" type="text" name="free_content_url" placeholder="http://example.com/video.mp4"/>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Content Title: </label>
          <div class="col-sm-10">
            <input required class="form-control" type="text" name="free_content_title" placeholder="Enter Title"/>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Content Description: </label>
          <div class="col-sm-10">
            <textarea required class="form-control" name="free_content_description" rows="3"></textarea>
          </div>        
        </div>

        <input class="btn btn-primary mb-2 pull-right" type="submit" name="insert_free_content" value="Insert Free Content" />	     

      </form>
    </div>

    <table class="table table-hover table-bordered">
			  <tr>
          <th class="text-center" style="width:5%;">SL.</th>
          <th class="text-center" style="width:10%;">Content View</th>
          <th class="text-center" style="width:15%;">Content Title</th>
          <th class="text-center" style="width:25%;">Content Description</th>
          <th class="text-center" style="width:30%;">Content Url</th>
          <th class="text-center">Action</th>
        </tr>      
        
        <?php
          global $wpdb;
          $free_content_table_name = '_ts_free_content';
          $existing_content_list = $wpdb->get_results( "SELECT * FROM $free_content_table_name" );

          
          ?>

          <?php foreach($existing_content_list as $existing_content){ ?>

          <tr>
            <td class="text-center align-middle"><?php echo $existing_content->free_content_id; ?></td>
            <td class="text-center"><img style="height:100px;" src="https://img.youtube.com/vi/<?php echo getYouTubeIdFromURL($existing_content->free_content_url); ?>/default.jpg"/></td>
            <td class="text-center align-middle"><?php echo $existing_content->free_content_title; ?></td>
            <td class="text-center align-middle"><?php echo $existing_content->free_content_description; ?></td>
            <td class="align-middle"><?php echo $existing_content->free_content_url; ?></td>
            <td class="text-center align-middle">
              <button name="edit_slider" type="submit" class="btn btn-sm btn-info">Edit</button>
              <button name="delete_slider" type="button" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>

			</table>
  </div>

  <!--Paid Content-->
  <div class="tab-pane fade" id="paid-content" role="tabpanel" aria-labelledby="paid-content-tab">
    <div>
      <br>
      <form style="margin:10px;" method="POST" action="<?php the_permalink() ?>">
      <div class="form-group row">								
          <label class="col-sm-2 col-form-label">Paid Content Url: </label>
          <div class="col-sm-10">
            <?php 
              $subs_plan_url = file_get_contents('https://courticalhoops.com/wp-json/ts_api/v1/get_subscription_plans');
              $subs_plans = json_decode($subs_plan_url, TRUE);             
            ?>
            
            <select class="col-sm-10" name="paid_content_subs_plan_name" id="paid_content_subs_plan_name">
              <?php foreach($subs_plans as $subs_plan){ ?>
                <option><?php echo $subs_plan['id'] ?> - <?php echo $subs_plan['name'] ?> </option>
              <?php } ?>
            </select>            
          </div>
        </div>

        <div class="form-group row">								
          <label class="col-sm-2 col-form-label">Paid Content Url: </label>
          <div class="col-sm-10">
            <input required class="form-control" type="text" name="paid_content_url" placeholder="http://example.com/video.mp4"/>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Content Title: </label>
          <div class="col-sm-10">
            <input required class="form-control" type="text" name="paid_content_title" placeholder="Enter Title"/>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Content Description: </label>
          <div class="col-sm-10">
            <textarea required class="form-control" name="paid_content_description" rows="3"></textarea>
          </div>        
        </div>

        <input class="btn btn-primary mb-2 pull-right" type="submit" name="insert_paid_content" value="Insert Paid Content" />	     

      </form>
    </div>

    <table class="table table-hover table-bordered">
			  <tr>
          <th class="text-center" style="width:5%;">SL.</th>
          <th class="text-center" style="width:10%;">Subscription Plan</th>
          <th class="text-center" style="width:10%;">Content View</th>
          <th class="text-center" style="width:15%;">Content Title</th>
          <th class="text-center" style="width:20%;">Content Description</th>
          <th class="text-center" style="width:25%;">Content Url</th>
          <th class="text-center">Action</th>
        </tr>      
        
        <?php
          global $wpdb;
          $paid_content_table_name = '_ts_paid_content';
          $existing_content_list = $wpdb->get_results( "SELECT * FROM $paid_content_table_name" );

          
          ?>

          <?php foreach($existing_content_list as $existing_content){ ?>

          <tr>
            <td class="text-center align-middle"><?php echo $existing_content->paid_content_id; ?></td>
            <td class="text-center align-middle"><?php echo $existing_content->paid_content_subs_plan_name; ?></td>
            <td class="text-center"><img style="height:100px;" src="https://img.youtube.com/vi/<?php echo getYouTubeIdFromURL($existing_content->paid_content_url); ?>/default.jpg"/></td>
            <td class="text-center align-middle"><?php echo $existing_content->paid_content_title; ?></td>
            <td class="text-center align-middle"><?php echo $existing_content->paid_content_description; ?></td>
            <td class="align-middle"><?php echo $existing_content->paid_content_url; ?></td>
            <td class="text-center align-middle">
              <button name="edit_slider" type="submit" class="btn btn-sm btn-info">Edit</button>
              <button name="delete_slider" type="button" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>

			</table>
  </div>

  <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
    
  </div>
</div>


<?php

if(isset($_POST['insert_slider'])){
  insert_slider_data();
} else if(isset($_POST['insert_free_content'])){
  insert_free_content_data();
} else if(isset($_POST['insert_paid_content'])){
  insert_paid_content_data();
}

function insert_slider_data(){	
	global $wpdb;
	$slider_table_name = '_ts_slider_image';
	
	$default_row = $wpdb->get_row( "SELECT * FROM $slider_table_name ORDER BY slider_id DESC LIMIT 1" );
  
	if ( $default_row != null ) {
		$id = $default_row->slider_id + 1;
	} else {
		$id = 1;
	}

	$default = array(
		'slider_id' => $id,
		'slider_url' => $_POST['slider_url'],
	);

	$item = shortcode_atts( $default, $_REQUEST );

	$wpdb->insert( $slider_table_name, $item );
	
	echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";
}

function insert_free_content_data(){	
	global $wpdb;
	$free_content_table_name = '_ts_free_content';
	
	$default_row = $wpdb->get_row( "SELECT * FROM $free_content_table_name ORDER BY free_content_id DESC LIMIT 1" );
  
	if ( $default_row != null ) {
		$id = $default_row->free_content_id + 1;
	} else {
		$id = 1;
	}

	$default = array(
		'free_content_id' => $id,
		'free_content_url' => $_POST['free_content_url'],
		'free_content_title' => $_POST['free_content_title'],
		'free_content_description' => $_POST['free_content_description'],
	);

	$item = shortcode_atts( $default, $_REQUEST );

	$wpdb->insert( $free_content_table_name, $item );
	
	echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";
}

function insert_paid_content_data(){	
	global $wpdb;
	$paid_content_table_name = '_ts_paid_content';
	
	$default_row = $wpdb->get_row( "SELECT * FROM $paid_content_table_name ORDER BY paid_content_id DESC LIMIT 1" );
  
	if ( $default_row != null ) {
		$id = $default_row->paid_content_id + 1;
	} else {
		$id = 1;
	}

	$default = array(
		'paid_content_id' => $id,
		'paid_content_subs_plan_name' => $_POST['paid_content_subs_plan_name'],
		'paid_content_url' => $_POST['paid_content_url'],
		'paid_content_title' => $_POST['paid_content_title'],
		'paid_content_description' => $_POST['paid_content_description'],
	);

	$item = shortcode_atts( $default, $_REQUEST );

	$wpdb->insert( $paid_content_table_name, $item );
	
	echo "<script type='text/javascript'>
        window.location=document.location.href;
        </script>";
}


function getYouTubeIdFromURL($url) {
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}

?>