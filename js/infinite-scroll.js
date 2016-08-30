$( document ).ready(function() {
    
    // ajout du loader
    var loader = $('.loader'),
        busy = false,   // savoir si une requete est en cours
        i = 1;
    
    //recup position du dernier article
    // offset() > recup coordonnées du top
    var offset = $('#i-scroll article:last').offset();
   console.log ('position dernier article : '+offset.top);
    
    $(window).scroll(function(){
//        console.log('ok');
        if ( (offset.top + $('#i-scroll article:last').height() - $(window).height() <= $(window).scrollTop() ) 
           && busy === false) 
        {
            console.log('end page');
            i++; // incrément numéro de page
            busy = true; // requete en cours
            loader.show(); // affiche le loader
            
            $('nav.navigation').css('display', 'none'); // cache la navigation standard 
            
            // recup adresse page et ajout du numéro de page suivante
            $.get(document.location.href + 'page/' + i)
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