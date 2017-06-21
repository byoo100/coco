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

//https://premium.wpmudev.org/blog/how-to-build-your-own-wordpress-contact-form-and-why/

//response generation function
$response = "";

//function to generate response
function generate_response($type, $message){

  global $response;

  if($type == "success") $response = "<div class='success'>{$message}</div>";
  else $response = "<div class='error'>{$message}</div>";

}

if (get_locale() == 'ko_KR'){
  $redirect = get_permalink( get_page_by_path( 'contact-complete-kr' ) );
} else {
  $redirect = get_permalink( get_page_by_path( 'contact-complete' ) );
}

//response messages
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$phone = $_POST['message_phone'];
$message = nl2br($_POST['message_text']);

//php mailer variables
$to = 'coco4future@yahoo.com';
$subject = $name.' sent a message';
$headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: COCO <donotreply@nycoco.org>');
$body = $name.' has submitted the COCO Contact Form.<br><br>
        Contact Info: <br>
        ============= <br>
        Name: '.$name.'<br>
        Email: '.$email.'<br>
        Phone: '.$phone.'<br><br>
        Message: <br>
        ============= <br>'.
        $message;


if( $name ) {
  if( $email ){
    if( $message ){
      $sent = wp_mail($to, $subject, $body, $headers);
      $sent ? generate_response("success", $message_sent) : '';
      wp_redirect( $redirect );
      exit;
    }
  }
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-container" role="main">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
          <?php
            while( have_posts() ) : the_post();
              the_content();
            endwhile;
          ?>
        </div><!-- .entry-content -->

        <div id="contact_response"><?php echo $response ?></div>
        <form id="contact_form" action="<?php the_permalink(); ?>" method="POST">

          <table>
            <tr>
            <td>
                <label for="message_name">Name (이름): <span>*</span> </label> <br>
                <input type="text" id="message_name" name="message_name" required="required"
                       value="<?php echo esc_attr($_POST['message_name']); ?>" />
            </td>

            <td>
                <label for="message_email">Email (이메일 주소): <span>*</span> </label> <br>
                <input type="email" id="message_email" name="message_email" required="required"
                       value="<?php echo esc_attr($_POST['message_email']); ?>" />
            </td>

            <td>
                <label for="message_phone">Phone Number (전화): </label> <br>
                <input type="text" id="message_phone" name="message_phone"
                       value="<?php echo esc_attr($_POST['message_phone']); ?>" />
            </td>
            </tr>

            <tr>
            <td colspan="3">
                <label for="message_text">Message (메시지): <span>*</span> </label> <br>
                <textarea type="text" id="message_text" name="message_text"
                          cols="60" rows="4" required="required"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
            </td>
            </tr>

            <tr>
            <td colspan="3">
                <div id='recaptcha'
                    class="g-recaptcha"
                    data-sitekey="6LfA1CUUAAAAAH2mvnNE4b78LG7v4mDLruciogXt"
                    data-callback="onSubmit"></div>
                <input id='contact_submit' type="submit" value="submit" />
            </td>
            </tr>

          </table>
        </form>

      </article><!-- #post -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
