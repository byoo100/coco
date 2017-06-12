( function() {
  var form_pos = 0;

  var container = document.getElementById('volunteer_form');

  var top_nav = document.getElementById('top_nav').getElementsByTagName('a');

  var app_info = document.getElementById('app_info');
  var app_emergency = document.getElementById('app_emergency');
  var app_tos = document.getElementById('app_tos');
  var form_list = [app_info, app_emergency, app_tos];
  var active_form = app_info;

  var btn_prev = document.getElementById('bot_prev').getElementsByTagName('button')[0];
  var btn_next = document.getElementById('bot_next').getElementsByTagName('button')[0];
  var btn_submit = document.getElementById('bot_submit').getElementsByTagName('button')[0];


  //init
  display_form(active_form, form_pos);

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

      event.preventDefault(); var nav_pos;

      for( var x in top_nav ){
        this == top_nav[x] ? nav_pos = x : '';
      }

      if( nav_pos < form_pos){
        form_pos = nav_pos;
        active_form = form_list[nav_pos];
        display_form(active_form, nav_pos);
      } else if( nav_pos > form_pos ){
        if (validate_form()){
          form_pos = nav_pos;
          active_form = form_list[nav_pos];
          display_form(active_form, nav_pos);
        }//if
      }//else if

      active_form.scrollIntoView();
    });//addEventListener
  };//for

  //Adds EventListener to Previous Button
  btn_prev.addEventListener("click", function(event){
    event.preventDefault();
    form_pos = form_list.indexOf(active_form);

    if( form_pos > 0){
      form_pos--;
      active_form = form_list[form_pos];
      display_form(active_form, form_pos);
      active_form.scrollIntoView();
    } //if

  }); //btn_prev

  //Adds EventListener to Next Button
  btn_next.addEventListener("click", function(event){
    event.preventDefault();
    form_pos = form_list.indexOf(active_form);

    var check_form = active_form.querySelectorAll(':invalid');

    if( check_form.length != 0 ){
      check_form.forEach(function(item){
        mark_invalid(item);
        active_form.scrollIntoView();
      })
    } else {
      if( form_pos < form_list.length - 1){
        form_pos++;
        active_form = form_list[form_pos];
        display_form(active_form, form_pos);
        active_form.scrollIntoView();
      } //if
    } //else

  }); //btn_next



  function mark_invalid(item){
    item.dataset.touched = true;
  }//mark_invalid


  function validate_form(){
    var check_form = active_form.querySelectorAll(':invalid');

    if( check_form.length != 0 ){
        check_form.forEach(function(item){
            mark_invalid(item);
        })
        return false;
    } else {
      return true;
    }
  }//validate_form


  function display_form(form, pos){
      if( pos == 0 ){
          display_next();
          hide_prev();
          hide_submit();
      } else if( pos > 0 && pos < form_list.length - 1 ){
          display_prev();
          display_next();
          hide_submit();
      } else if( pos == form_list.length - 1 ){
          display_submit();
          hide_next();
      }

    for(var i=0; i < form_list.length; i++){

      if(form_list[i] != form){
        hide_form(form_list[i]);
      } else{
        form.classList.add("active");
      }
    }//for
  }//display_form

  function hide_form(form){ form.classList.remove("active");}//hide_form

  function display_prev(){ btn_prev.classList.add("show"); }

  function display_next(){ btn_next.classList.add("show"); }

  function display_submit(){ btn_submit.classList.add("show"); }

  function hide_prev(){ btn_prev.classList.remove("show"); }

  function hide_next(){ btn_next.classList.remove("show"); }

  function hide_submit(){ btn_submit.classList.remove("show"); }

})();
