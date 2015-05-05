
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



function module(d, e) {
    $.ajax({
        type:"POST",
        url:"layout.twig",
        data:null,
        success:function(){
            $('#cours').empty();
            cours(d);
            $('#exercice').empty();
            exercices(e);
        },
        error:function(){
            alert('error');
        }
    });
}

function cours(data){
    var d = JSON.parse(data);

    var contenu = '<h1 class="part-heading text-center"> Cours</h1>';

        for(var i = 0; i<d.length; i++){
            contenu += '<div class="case-cours">';
            contenu += '<h3>'+ d[i].nomC +'</h3>';
            contenu += '<p><small>'+ d[i].contenueC +'</small></p></div>';
        }
    

    contenu +='</div>';
    $("#cours").append(contenu);
    // $("#cours").text(jsonPretty);
}

function exercices(data){
    var d = JSON.parse(data);

    var contenu = '<h1 class="part-heading text-center"> Exercices</h1>';

        for(var i = 0; i<d.length; i++){
            contenu += '<div class="case-cours">';
            contenu += '<h3>'+ d[i].nomE +'</h3>';
            contenu += '<p><small>'+ d[i].contenueE +'</small></p></div>';
        }
    

    contenu +='</div>';
    $("#exercice").append(contenu);
}
