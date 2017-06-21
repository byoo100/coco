( function(){

  var contact_form = document.getElementById('contact_form');
  var contact_submit = document.getElementById('contact_submit');
  var contact_response = document.getElementById('contact_response');
  var recaptcha;

  contact_submit.onclick = validateForm;


  function validateForm(event){
    event.preventDefault();

    if( !contact_form["message_name"].checkValidity() ){
      contact_response.innerHTML = "Please give us your name.";
    } else if( !contact_form["message_email"].checkValidity() ){
      contact_response.innerHTML = "Please give us your email.";
    } else if ( !contact_form["message_text"].checkValidity() ){
      contact_response.innerHTML = "Please write a message.";
    } else {

      recaptcha = document.getElementById('g-recaptcha-response');

      if (recaptcha.value){
          contact_response.innerHTML = "";
          contact_form.submit();
      } else {
          contact_response.innerHTML = "The reCAPTCHA verification is incomplete.";
      }
      //contact_form.submit();
    }


  }//validate_form

})();



// function onSubmit(token) {
//   alert('thanks');
// }

  function validate(event) {
    event.preventDefault();
    if (!document.getElementById('field').value) {
      alert("You must add text to the required field");
    } else {
      grecaptcha.execute();
    }
  }
