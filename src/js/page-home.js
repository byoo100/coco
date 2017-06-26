( function() {

  //Only run on Home Page
  if (document.body.classList.contains('home')) {

    var resources = document.getElementById('home-resources');
    var resource_bg = resources.getElementsByClassName('carousel-bg-image');
    var resource_text = resources.getElementsByClassName('carousel-text-item');
    var resource_nav = resources.getElementsByClassName('resource-nav-item');
    var activeNav = resource_nav[0];

    for( var x = 0; x < resource_nav.length; x++){
      resource_nav[x].addEventListener('click', function(){
        if( 0 != this.getAttribute('position') ){

            var current, newPos, move = this.getAttribute('position');

            for( var i = 0; i < resource_nav.length; i++ ){
              current = resource_nav[i].getAttribute('position');

              newPos = parseInt(current) + (parseInt(move) * -1);

              resource_bg[i].style.left = newPos + "%";
              resource_text[i].style.left = newPos + "%";
              resource_nav[i].setAttribute("position", newPos);
            }

            activeNav.classList.remove('active');
            activeNav = this;
            activeNav.classList.add('active');
        }
      });
    }


  }// if(home)



})();
