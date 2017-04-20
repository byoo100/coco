(function($){

  var $blog = $('#blog-area');
  var $pageNum = 2;
  var $loadposts = document.getElementById('loadposts');

  $($loadposts).on('click', function( event ){
    $.ajax({
      type: 'GET',
      url: '/wp-json/wp/v2/posts?page=' + $pageNum,
      success: function(data){
        $.each(data, function(i, post) {
          var $article = constructArticle(post);
          $blog.append($article);
        }); //each
      } //success
    }); //ajax
    $pageNum++;
  }); //click



  function constructArticle(post){

    //Create Elements
    var article = document.createElement('article');

    if(post.featured_media != 0){
      var featImg = document.createElement('div');
      var featImg_link = document.createElement('a');
      var featImg_image = constructImage(post.featured_image);
    }

    var header = document.createElement('header');
    var header_title = document.createElement('h3');
    var header_link = document.createElement('a');

    var meta = document.createElement('div');
    var meta_date = document.createElement('span');
    //meta_date.innerHTML = constructDate(post.date);

    var content = document.createElement('div');
    var content_link = document.createElement('a');


    //Assign Attributes
    article.setAttribute('id', 'post-' + post.id);

    if(post.featured_media != 0){
      featImg.setAttribute('class', 'index-image');
      featImg_link.setAttribute('href', post.link);
    }

    header.setAttribute('class', 'entry-header');
    header_title.setAttribute('class', 'entry-title');
    header_link.setAttribute('href', post.link);
    header_link.innerHTML = post.title.rendered;

    meta.setAttribute('class', 'entry-meta');
    meta_date.setAttribute('class', 'meta posted-on');
    meta_date.innerHTML = 'TEMP';

    content.setAttribute('class', 'entry-content');
    content_link.setAttribute('href', post.link);
    content_link.innerHTML = post.excerpt.rendered;

    //Layer each element
    if(post.featured_media != 0){
      featImg_link.appendChild( featImg_image );
      featImg.appendChild( featImg_link );
      article.appendChild( featImg );
    }
    header_title.appendChild( header_link );
    header.appendChild( header_title );
    meta.appendChild( meta_date );
    header.appendChild( meta );
    article.appendChild( header );

    content.appendChild( content_link );
    article.appendChild( content );


    return article;
  }


  function constructImage(array){
    var imgWidth = array[1][1];
    var imgHeight = array[1][2];

    var image = document.createElement('img');
    image.setAttribute('width', imgWidth);
    image.setAttribute('height', imgHeight);
    image.setAttribute('src', array[1][0]);
    image.setAttribute('class', 'attachment-featured-sm size-featured-sm wp-post-image');

    if(imgWidth == 640 && imgHeight == 360){
      var srcset = '';

      //-1 b/c removing 1920x1080 from srcset
      for(var x=0; x<array.length - 1; x++){
        if(array[x][3] == true){
          srcset += array[x][0];

          srcset += x==0 ? ' 320w, ' : '';
          srcset += x==1 ? ' 640w, ' : '';
          srcset += x==2 ? ' 1280w' : '';
        }
      }//for

        image.setAttribute('srcset', srcset);
        image.setAttribute('sizes', '(max-width: 640px) 100vw, 640px');
    } //if

    return image;
  }//constructImage

  // function constructDate(date){
  //   date = date.substring(0, 10);
  //   var array = date.split("-");
  //
  // }

})(jQuery);
