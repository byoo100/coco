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


 if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {

     if ( trim( $_POST['postTitle'] ) === '' ) {
         $postTitleError = 'Please enter a title.';
         $hasError = true;
     }

     $post_information = array(
         'post_title' => wp_strip_all_tags( $_POST['postTitle'] ),
         'post_content' => $_POST['postContent'],
         'post_contact' => $_POST['contact'],
         'post_type' => 'volunteers',
         'post_status' => 'publish'
     );

     $post_id = wp_insert_post( $post_information );

		 if($post_id){
			 wp_redirect( home_url() );
			 exit;
		 }

 }

get_header(); ?>

<?php
var_dump($_POST);
?>

<?php get_template_part('translations/eng/volunteer', 'eng'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-container" role="main">

			<form action="" id="primaryPostForm" method="POST">

        <fieldset>
						<label for="postTitle"><?php _e('Post Title:', 'framework') ?></label>

						<input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>" />

				</fieldset>

        <fieldset>
						<label for="postContent"><?php _e('Post Content:', 'framework') ?></label>

						<textarea name="postContent" id="postContent" rows="8" cols="30" class="required">
							<?php
							if ( isset( $_POST['postContent'] ) ) {
								if ( function_exists( 'stripslashes' ) ) {
									echo stripslashes( $_POST['postContent'] );
								} else {
									echo $_POST['postContent'];
								}
							} ?>

						</textarea>
				</fieldset>


        <table>
          <tr>
            <th colspan="3">
              <h2>Contact Information</h2>
            </th>
          </tr>
          <tr>
            <td colspan="3">
              <label for="personName">Name(Last, First) </label>
              <input type="text" name="contact[name]" id="name" value="<?php if ( isset( $_POST['contact[name]'] ) ) echo $_POST['contact[name]']; ?>" required />
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <label for="DoB">Date of Birth (mm/dd/yyyy) </label>
              <input type="date" name="contact[DoB]" id="DoB" value="<?php if ( isset( $_POST['contact[DoB]'] ) ) echo $_POST['contact[DoB]']; ?>" required />
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <label for="address">Street Address </label>
              <input type="text" name="contact[address]" id="address" value="<?php if ( isset( $_POST['contact[address]'] ) ) echo $_POST['contact[address]']; ?>" required />
            </td>
          </tr>
          <tr>
            <td>
              <label for="city">City </label>
              <input type="text" name="contact[city]" id="city" value="<?php if ( isset( $_POST['contact[city]'] ) ) echo $_POST['contact[city]']; ?>" required />
            </td>
            <td>
              <label for="state">State </label>
              <input type="text" name="contact[state]" id="state" value="<?php if ( isset( $_POST['contact[state]'] ) ) echo $_POST['contact[state]']; ?>" required />
            </td>
            <td>
              <label for="zipcode">Zip Code </label>
              <input type="text" name="contact[zipcode]" id="zipcode" value="<?php if ( isset( $_POST['contact[zipcode]'] ) ) echo $_POST['contact[zipcode]']; ?>" required />
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <label for="phone">Phone Number </label>
              <input type="text" name="contact[phone]" id="phone" value="<?php if ( isset( $_POST['contact[phone]'] ) ) echo $_POST['contact[phone]']; ?>" required/>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <label for="email">E-mail Address</label>
              <input type="email" name="contact[email]" id="email" value="<?php if ( isset( $_POST['contact[email]'] ) ) echo $_POST['contact[email]']; ?>" required/>
            </td>
          </tr>
        </table>

        <fieldset>
						<input type="hidden" name="submitted" id="submitted" value="true" />

						<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
						<button type="submit"><?php _e('Add Post', 'framework') ?></button>
				</fieldset>

				<?php if ( $postTitleError != '' ) { ?>
				    <span class="error"><?php echo $postTitleError; ?></span>
				    <div class="clearfix"></div>
				<?php } ?>

      </form>
<!--
        <table>
          <tr>
            <th colspan="3">
              <h2>Availability</h2>
              <p>When will you be available for volunteer assignments?</p>
            </th>
          </tr>
          <tr>
            <td>
              <label for="ASP">After School Program </label><br>
              <label for="ASP_day1">M </label>
              <input type="checkbox" name="ASP_day1" value="Mon">
              <label for="ASP_day2">T </label>
              <input type="checkbox" name="ASP_day2" value="Tues">
              <label for="ASP_day3">W </label>
              <input type="checkbox" name="ASP_day3" value="Wed">
              <label for="ASP_day4">Th </label>
              <input type="checkbox" name="ASP_day4" value="Thurs">
              <label for="ASP_day5">F </label>
              <input type="checkbox" name="ASP_day5" value="Fri">
            </td>
            <td>
              <label for="summer">Summer Program </label><br>
              <label for="summer_day1">M </label>
              <input type="checkbox" name="summer_day1" value="Mon">
              <label for="summer_day2">T </label>
              <input type="checkbox" name="summer_day2" value="Tues">
              <label for="summer_day3">W </label>
              <input type="checkbox" name="summer_day3" value="Wed">
              <label for="summer_day4">Th </label>
              <input type="checkbox" name="summer_day4" value="Thurs">
              <label for="summer_day5">F </label>
              <input type="checkbox" name="summer_day5" value="Fri">
            </td>
            <td>
              <label for="SRP">Saturday Recreational Program </label><br>
              <label for="SRP_day1">Morning </label>
              <input type="checkbox" name="SRP_day1" value="Morning">
              <label for="SRP_day2">Afternoon </label>
              <input type="checkbox" name="SRP_day2" value="Afternoon">
              <label for="SRP_day3">Both </label>
              <input type="checkbox" name="SRP_day3" value="Both">
            </td>
          </tr>
        </table>

        <table>
          <tr>
            <th colspan="2">
              <h2>Reason for Volunteering</h2>
              <p>Please mark one of the choices below.<br>
                *note: General interest in volunteering means that the volunteer is interested
                with no form of Personal gain in mind. [Ex. Research, Required credits for schools,
                Community service given by the City, State, or Country, etc.]</p>
            </th>
          </tr>
          <tr>
            <td>
              <label for="mandatory_hs">Mandatory High School Service Credit </label>
              <input type="radio" name="reason" id="mandatory_hs" value="mandatory_hs">
            </td>
            <td>
              <label for="mandatory_college">Mandatory College/University Credit </label>
              <input type="radio" name="reason" id="mandatory_college" value="mandatory_college">
            </td>
          </tr>
          <tr>
            <td>
              <label for="general_interest">General Interest in Volunteering </label>
              <input type="radio" name="reason" id="general_interest" value="general_interest">
            </td>
            <td>
              <label for="other_reason">Other [If other, please state the reason below.] </label>
              <input type="radio" name="reason" id="other_reason" value="other_reason">
            </td>
          </tr>
          <tr>
            <td>
              <label for="other_text">Other:<br></label>
              <input type="textarea" name="other_text">
            </td>
          </tr>
        </table> -->


<!--

				<fieldset>
						<label for="postTitle"><?php _e('Post Title:', 'framework') ?></label>

						<input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>" />

				</fieldset>

				<fieldset>
						<label for="postContent"><?php _e('Post Content:', 'framework') ?></label>

						<textarea name="postContent" id="postContent" rows="8" cols="30" class="required">
							<?php
							if ( isset( $_POST['postContent'] ) ) {
								if ( function_exists( 'stripslashes' ) ) {
									echo stripslashes( $_POST['postContent'] );
								} else {
									echo $_POST['postContent'];
								}
							} ?>

						</textarea>
				</fieldset>

				<fieldset>
						<input type="hidden" name="submitted" id="submitted" value="true" />

						<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
						<button type="submit"><?php _e('Add Post', 'framework') ?></button>
				</fieldset>

				<?php if ( $postTitleError != '' ) { ?>
				    <span class="error"><?php echo $postTitleError; ?></span>
				    <div class="clearfix"></div>
				<?php } ?>

			</form> -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
