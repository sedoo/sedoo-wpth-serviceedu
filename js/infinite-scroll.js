$( document ).ready(function() {
    
    // ajout du loader
    var loader = $('.loader'),
        busy = false,   // savoir si une requete est en cours
        i = 1;
    
    //recup position du dernier article
    // offset() > recup coordonnées du top
    var offset = $('#i-scroll article:last').offset();
//   console.log ('position dernier article : '+offset.top);
    
    $(window).scroll(function(){
        if ( (offset.top + $('#i-scroll article:last').height() - $(window).height() <= $(window).scrollTop() ) 
           && busy === false) 
        {
            console.log('end page');
            i++; // incrément numéro de page
            busy = true; // requete en cours
            loader.show(); // affiche le loader
            
            $('nav.navigation').css('display', 'none'); // cache la navigation standard 
            
            
            ////// création de l'url à appeler en ajax            
            // recup url page
            var url = document.location.href;
            
            // si 2nd filtre taxonomie activé, il faut "spliter" l'url
            var urlSplit = url.split('?');
            
            // ajout du numéro de page suivante entre les 2 parties de l'url de la page en cours
            if (urlSplit[1] != undefined) {
                console.log("pas de second filter");
                var AjaxUrl=urlSplit[0] + 'page/' + i + '/?' + urlSplit[1];
            } else {
                var AjaxUrl=urlSplit[0] + 'page/' + i ;
            }
            
            // REQUETE AJAX
            $.get(AjaxUrl)
            .done(function(data) {
//                alert($('#i-scroll', data).html()); // recup contenu des articles de la page suivante
                loader.hide(); // cache 
                
                // ajoute les nouveaux articles
                $('#i-scroll article:last').after( $('#i-scroll', data).html() );
                
                // MAJ valeur offset du dernier article
                offset = $('#i-scroll article:last').offset();
                
                // on met à jour busy
                busy = false;
            })    // succes
            .fail( function(){
                loader.hide();
            });   // echec (plus de contenus...)
        }
        
    });

});