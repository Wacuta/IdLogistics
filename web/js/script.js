
/* chargement à l'ouverture de la page */
$(document).ready(function () {
    
    //smoothscroll
    /* scroll auto avec le nav-tabs */
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
        });
    });


    /* Animation de la nav-tabs quand on scroll*/
    $('body').scrollspy({ 'target': '#nav', 'offset': 10 });
    
    $('#nav').on('activate.bs.scrollspy', function() {
      
      var ele = $(this).find('.active');
      
      if (ele.find('.submenu').length>0) {
        $('.submenu li').addClass('hide');
        $('.active>ul.submenu>li').removeClass('hide');
      }
      else{
        $('.submenu li').addClass('hide');
      }
         
    });


});