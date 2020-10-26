<?php
 //require( dirname( __FILE__ ) . '/wp-blog-header.php' );
  $postID = $_GET['id'];
  $dcount_key = 'temp';
  $dcount = get_post_meta($postID, $dcount_key, true);
  if ($dcount == '') {
  	$dcount = 0;
    //delete_post_meta($postID, $dcount_key);
    //add_post_meta($postID, $dcount_key, '0');
  } else {
    $dcount++;
    //update_post_meta($postID, $dcount_key, $dcount);
	}
  echo($dcount);
  //add_post_meta($post_id, "temp", 3, true);
  //echo json_encode($data);
?>
