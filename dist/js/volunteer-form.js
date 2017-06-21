( function() {

  var container = document.getElementById('volunteer_form');
  var top_nav = document.getElementById('top_nav').getElementsByTagName('a');

  var app_info = document.getElementById('app_info');
  var app_emergency = document.getElementById('app_emergency');
  var app_tos = document.getElementById('app_tos');

  var btn_prev = document.getElementById('bot_prev').getElementsByTagName('button')[0];
  var btn_next = document.getElementById('bot_next').getElementsByTagName('button')[0];
  var btn_submit = document.getElementById('bot_submit').getElementsByTagName('button')[0];
  var recaptcha = document.getElementById('recaptcha');

  var list = {
    'forms' : [{
          'obj' : app_info,
          'pos' : 0
        }, {
          'obj' : app_emergency,
          'pos' : 1
        }, {
          'obj' : app_tos,
          'pos' : 2
        }]
    }

  var currentPos = 0, topClicked = 0, checkForm, recaptchaResponse;
  var activeForm = list.forms[currentPos].obj;


  //init
  displayForm( list.forms[currentPos].obj, top_nav[currentPos], currentPos );

  //Adds EventListener to all input fields
  Array.from(container.querySelectorAll('td input')).forEach(i => {

    i.addEventListener('invalid', () => {
      i.dataset.touched = true;
    })
    i.addEventListener('blur', () => {
      if (i.value !== '') i.dataset.touched = true;
    })
  });



  //Adds EventListener to top navigation
  for( var i = 0; i < top_nav.length; i++){
    top_nav[i].addEventListener('click', function(event){

      event.preventDefault();
      topClicked = this.getAttribute("position");


      if( !this.classList.contains('active') ){

        if( topClicked < currentPos || validateForm() ){
            hideForm( activeForm, top_nav[currentPos] );
              currentPos = topClicked;
              activeForm = list.forms[currentPos].obj;
            displayForm( activeForm, top_nav[currentPos], currentPos );
            activeForm.scrollIntoView();
        } else {
            checkForm[0].parentElement.scrollIntoView();
        }
      }

    });//addEventListener
  };//for

  //Adds EventListener to Previous Button
  btn_prev.addEventListener("click", function(event){
    event.preventDefault();

    if( currentPos > 0){

      hideForm( activeForm, top_nav[currentPos] );
        currentPos--;
        activeForm = list.forms[currentPos].obj;
      displayForm( activeForm, top_nav[currentPos], currentPos );
      activeForm.scrollIntoView();
    } //if

  }); //btn_prev

  //Adds EventListener to Next Button
  btn_next.addEventListener("click", function(event){
    event.preventDefault();

    if( currentPos < list.forms.length - 1 ){

        if( validateForm() ) {

          hideForm( activeForm, top_nav[currentPos] );
            currentPos++;
            activeForm = list.forms[currentPos].obj;
          displayForm( activeForm, top_nav[currentPos], currentPos );
          activeForm.scrollIntoView();
        } else {

          checkForm[0].parentElement.scrollIntoView();
        }

    }

  }); //btn_next

  btn_submit.addEventListener("click", function(event){
    event.preventDefault();



    if( validateForm() ) {
      recaptchaResponse = document.getElementById('g-recaptcha-response');
      if (recaptchaResponse.value){ container.submit(); }

    } else {

      checkForm[0].parentElement.scrollIntoView();
    }

  }); //btn_submit


  // This function triggers at position 0
  // So previous is hidden
  function showNextBtn() {
    btn_prev.classList.remove("show");
    btn_next.classList.add("show");
  }

  // This function triggers at Max position
  // So next is hidden
  function showPrevBtn() {
    btn_next.classList.remove("show");
    btn_prev.classList.add("show");
  }

  // This function triggers at btwn 0 and Max position
  // So both are shown
  function showBothBtn() {
    btn_prev.classList.add("show");
    btn_next.classList.add("show");
  }

  function showSubmitBtn(){
    btn_submit.classList.add("show");
    recaptcha ? recaptcha.style.display = "flex" : '';
  }

  function hideSubmitBtn(){
    btn_submit.classList.remove("show");
    recaptcha ? recaptcha.style.display = "none" : '';
  }

  //form = form object
  //top = top nav anchor object
  function hideForm(form, top){
    form.classList.remove("active");
    top.classList.remove("active");
  }

  //form = form object
  //top = top nav anchor object
  function displayForm(form, top, pos){

    if( pos == 0 ){
        showNextBtn();
        hideSubmitBtn();
    } else if( pos > 0 && pos < list.forms.length - 1 ){
        showBothBtn();
        hideSubmitBtn();
    } else if( pos == list.forms.length - 1 ){
        showPrevBtn();
        showSubmitBtn();
    }

    form.classList.add("active");
    top.classList.add("active");
  }

  //form = form object
  function validateForm(){
    checkForm = activeForm.querySelectorAll(':invalid');

    if( checkForm.length != 0 ){
        for( var x = 0; x < checkForm.length; x++ ){
          checkForm[x].dataset.touched = true;
        }
        return false;
    } else {
      return true;
    }
  }//validate_form

})();
