( function() {
  var image_list = [];
  var container = document.getElementById('home-featured');

  image_list = container.getElementsByClassName('image-slider');

  // set interval
  var timer = setInterval(slider, 6000);
  var active = 1;
  var position = -100;


  function slider() {
    if(active == 0) position = 0;

    for(var i = 0; i < image_list.length; i++){
      image_list[i].style.left = position + (100 * i) + "%";
    }

    position -= 100;
    active = (active + 1) % image_list.length;
  }


  function abortTimer() { // to be called when you want to stop the timer
    clearInterval(timer);
  }

})();
