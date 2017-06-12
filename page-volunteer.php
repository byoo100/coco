<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco
 */


 //https://code.tutsplus.com/tutorials/how-to-create-custom-wordpress-writemeta-boxes--wp-20336
 //https://code.tutsplus.com/articles/reusable-custom-meta-boxes-part-1-intro-and-basic-fields--wp-23259
 //https://code.tutsplus.com/articles/reusable-custom-meta-boxes-part-2-advanced-fields--wp-23293


 include_once('inc/volunteer-meta.php');

 //Email settings
 $to = 'brianyoo313@gmail.com';
 $subject = "Volunteer Request from: ".$_POST['coco_contact_name'];
 $headers = 'From: COCO <donotreply@nycoco.org>';
 $message = $_POST['coco_contact_name'].' has submitted the COCO Volunteer Request Form. Please log into the admin panel to view the request.';


 //Saves the meta content
 if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {

     $post_information = array(
         'post_title' => wp_strip_all_tags( $_POST['coco_contact_name'] ),
         'post_type' => 'volunteers',
         'post_status' => 'publish',
         'post_content' => $label_tos_text
     );

     $post_id = wp_insert_post( $post_information );

		 if($post_id){
      // Update Custom Meta
      save_meta_box($post_id, $contact_fields);
      save_meta_box($post_id, $availability_fields);
      save_meta_box($post_id, $reason_fields);
      save_meta_box($post_id, $previous_fields);
      save_meta_box($post_id, $emergency_contact_fields);
      save_meta_box($post_id, $term_of_service_fields);
      //wp_mail($to, $subject, strip_tags($message), $headers);

			 wp_redirect( home_url() );
			 exit;
		 }

 }

get_header(); ?>



  <div class="volunteer-header">
    <h1 class="volunteer-title"><?php _e('Volunteer Application', 'coco')?></h1>

    <ul id="top_nav">
      <li><a href="">Application</a></li>
      <li><a href="">Emergency Card</a></li>
      <li><a href="">Term of Service</a></li>
    </ul>
  </div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main page-container" role="main">

			<form action="" id="volunteer_form" method="POST">

        <?php
          echo '<div id="app_info" class="app_form active">';
            show_meta_box($contact_fields);
            show_meta_box($availability_fields);
            show_meta_box($reason_fields);
            show_meta_box($previous_fields);
          echo '</div>'; //#app_info

          echo '<div id="app_emergency" class="app_form">';
            show_meta_box($emergency_contact_fields);
          echo '</div>';

          echo '<div id="app_tos" class="app_form">';
            show_meta_box($term_of_service_fields);
          echo '</div>'; //#app_tos
        ?>

        <div id="bot_nav">
          <div id="bot_prev">
            <button class="bot_btn" type="previous"><?php _e('Previous', 'coco')?></button>
          </div>

          <div id="bot_submit">
            <input type="hidden" name="submitted" id="submitted" value="true" />
    				<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
    				<button class="bot_btn" type="submit"><?php _e('Submit', 'coco') ?></button>
          </div>

          <div id="bot_next">
            <button class="bot_btn" type="next"><?php _e('Next', 'coco')?></button>
          </div>
        </div>



      </form>


    <?php

      function show_meta_box($meta_fields) {
        global $post;
        // Use nonce for verification
        echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

          // Begin the field table and loop
          echo '<table class="volunteer_app">';

          echo '<thead>';
              echo '<tr><th colspan="'.$meta_fields[0]['colspan'].'">
                    <h2>'.$meta_fields[0]['header'].'</h2>
                    </th></tr>';

              if($meta_fields[0]['desc']){
                echo '<tr>
                      <th colspan="'.$meta_fields[0]['colspan'].'">'.$meta_fields[0]['desc'].'</th>
                      </tr>';
              }
          echo '</thead>';

          foreach ($meta_fields as $field) {
              // get value of this field if it exists for this post
              $meta = get_post_meta($post->ID, $field['id'], true);

                  switch($field['type']) {

                      // TEXT
                      case 'text':
                          // right column
                          echo '<td colspan="'.$field['colspan'].'">
                                <label for="'.$field['id'].'">'.$field['label'].'</label>
                                <input type="text" class="input" name="'.$field['id'].'" id="'.$field['id'].'"
                                value="'.$meta.'" size="30" placeholder="'.$field['label'].'"',
                                $field['required'] ? ' required="required"' : '', ' />
                                <svg class="input-line" viewBox="0 0 40 2" preserveAspectRatio="none">
                                    <path d="M0 1 L40 1"/>
                                    <path d="M0 1 L40 1" class="focus"/>
                                    <path d="M0 1 L40 1" class="invalid"/>
                                    <path d="M0 1 L40 1" class="valid"/>
                                </svg>
                                </td>';
                          break;


                      // DATE
                      case 'date':
                          // right column
                          echo '<td colspan="'.$field['colspan'].'">
                                <label for="'.$field['id'].'">'.$field['label'].'</label>
                                <input type="date" class="input" name="'.$field['id'].'" id="'.$field['id'].'"
                                value="'.$meta.'" size="30" placeholder="'.$field['label'].'"',
                                $field['required'] == "yes" ? ' required="required"' : '', '/>
                                <svg class="input-line" viewBox="0 0 40 2" preserveAspectRatio="none">
                                    <path d="M0 1 L40 1"/>
                                    <path d="M0 1 L40 1" class="focus"/>
                                    <path d="M0 1 L40 1" class="invalid"/>
                                    <path d="M0 1 L40 1" class="valid"/>
                                </svg>
                                </td>';

                          break;

                      // EMAIL
                      case 'email':
                          // right column
                          echo '<td colspan="'.$field['colspan'].'">
                                <label for="'.$field['id'].'">'.$field['label'].'</label>
                                <input type="email" class="input" name="'.$field['id'].'" id="'.$field['id'].'"
                                value="'.$meta.'" size="30" placeholder="'.$field['label'].'"',
                                $field['required'] == "yes" ? ' required="required"' : '', '/>
                                <svg class="input-line" viewBox="0 0 40 2" preserveAspectRatio="none">
                                    <path d="M0 1 L40 1"/>
                                    <path d="M0 1 L40 1" class="focus"/>
                                    <path d="M0 1 L40 1" class="invalid"/>
                                    <path d="M0 1 L40 1" class="valid"/>
                                </svg>
                                </td>';

                          break;

                      // TEXTAREA
                      case 'textarea':
                          // right column
                          echo '<td colspan="'.$field['colspan'].'">
                                <label for="'.$field['id'].'">'.$field['label'].'</label>
                                <textarea name="'.$field['id'].'" id="'.$field['id'].'"
                                cols="60" rows="4">'.$meta.'</textarea>
                                </td>';
                      break;

                      // CHECKBOX_GROUP
                      case 'checkbox_group':
                          // right column
                          echo '<td colspan="'.$field['colspan'].'">
                                <label for="'.$field['id'].'">'.$field['label'].'</label>';
                          foreach ($field['options'] as $option) {
                              echo '<span class="vol_check_group nowrap">
                                    <input type="checkbox" name="'.$field['id'].'[]"
                                      id="'.$option['value'].'" value="'.$option['value'].'"',
                                      $meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
                                    <label for="'.$option['value'].'">'.$option['label'].'</label></span>';
                          }
                          echo '</td>';
                      break;

                      // radio
                      case 'radio':
                          //right column
                          echo '<td colspan="'.$field['colspan'].'">
                                <label for="'.$field['id'].'">'.$field['label'].'</label>';
                          foreach ( $field['options'] as $option ) {
                              echo '<span class="nowrap vol_radio">
                                    <input type="radio" name="'.$field['id'].'"
                                      id="'.$option['value'].'" value="'.$option['value'].'"',
                                      $meta == $option['value'] ? ' checked="checked"' : '',' />
                                    <label for="'.$option['value'].'">'.$option['label'].'</label></span>';
                          }
                          echo '</td>';
                      break;

                } //end switch


                //START A NEW ROW
                if($field['break']){
                  echo '</tr><tr>';
                }

          } // end foreach

          echo '</tr>';
          echo '</table>'; // end table
      }

      // Save the Data
      function save_meta_box($post_id, $meta_fields) {

          // loop through fields and save the data
          foreach ($meta_fields as $field) {
              if($field['type'] == 'text_group'){
                foreach ($field['sub'] as $sub){
                  $old = get_post_meta($post_id, $sub['id'], true);
                  $new = $_POST[$sub['id']];

                  if ($new && $new != $old) {
                      update_post_meta($post_id, $sub['id'], $new);
                  } elseif ('' == $new && $old) {
                      delete_post_meta($post_id, $sub['id'], $old);
                  }
                } //$field[sub]
              } elseif(!$field['header']){
                $old = get_post_meta($post_id, $field['id'], true);
                $new = $_POST[$field['id']];

                if ($new && $new != $old) {
                    update_post_meta($post_id, $field['id'], $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, $field['id'], $old);
                }
              } //$field[header]
          } // end foreach
      } //save_meta_box

    ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
