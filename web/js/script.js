
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


    /* Scroll pour aller a la partie des cours*/
    $(".vignette").click(function (){
        $('html, body').animate({
            scrollTop: $("#cours").offset().top
        }, 500);
                
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
            $('#exercices').empty();
            exercices(e);
            Materialize.showStaggeredList('#liste-magique');
            var options = [
              {selector: '#liste-magique2', offset: 200, callback: 'Materialize.showStaggeredList("#liste-magique2")' },
            ];
            Materialize.scrollFire(options);

        },
        error:function(){
            alert('error');
        }
    });
}

/* lister les cours en fonction des datas donné */
function cours(data){
    var d = JSON.parse(data);

    var contenu = '<h1 class="part-heading text-center"> Cours</h1>';

    contenu +='<ul id="liste-magique">';

        for(var i = 0; i<d.length; i++){
            contenu +='<li style="opacity:0;">';
            contenu += '<div class="card blue waves-effect waves-light cliquable">';
            contenu += '<div class="card-content">';
            contenu += '<span class="card-title">'+ d[i].nomC +'</span>';
            contenu += '<p>'+ d[i].detailC +'</p>';
            contenu += '</div></div>';
            contenu +='</li>';
        }

    contenu +='</ul>';

    $("#cours").append(contenu);
}


/* lister les exercices en fonction des datas donné */
function exercices(data){
    var d = JSON.parse(data);

    var contenu = '<h1 class="part-heading text-center"> Exercices</h1>';

    contenu +='<ul id="liste-magique2">';

        for(var i = 0; i<d.length; i++){
            contenu +='<li style="opacity:0;">';
            contenu += '<div class="card light-green waves-effect waves-light cliquable">';
            contenu += '<div class="card-content">';
            contenu += '<span class="card-title">'+ d[i].nomE +'</span>';
            contenu += '<p>'+ d[i].detailE +'</p>';
            contenu += '</div></div>';
            contenu +='</li>';
        }
        
    contenu +='</ul>';

    $("#exercices").append(contenu);
}
