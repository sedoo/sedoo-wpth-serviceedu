/**
* Génération du sommaire
*/

$(document).ready(function(){
	
	// création du nav Sommaire
	//$('main article aside').prepend('<nav role="sommaire"></nav>');
     var i=0;
    var navSommaire = '<nav role="sommaire"></nav>';
    $('.navLeft .current-menu-item').after(navSommaire);
    
	// Sur chaque :header
	$('article > section :header').each(function(){       
        // création des ancres, insertion avant les headers
        $( '<a id="toc' + i + '"></a>' ).insertBefore( $(this) );
        // Ajout des liens vers les ancres dans le sommaire
        var item = '<a href="#toc' + i + '">' + $(this).text() + '</a>';
        $(item).appendTo('[role="sommaire"]');
        i++;
	});
    
    if (i == 0) {
        $('[role="sommaire"]').css("display", "none");
    }

    $('[href^="#toc"]').click(function(){
       $('[href^="#toc"]').removeClass();
       $(this).addClass('active'); 
    });
    
    // Fixe le sommaire au scroll (jquery.sticky.js)
    $(window).load(function(){
      $('div > aside').sticky({ topSpacing: 0 }); // utilisé sur page
      //$('li + nav[role="sommaire"]').sticky({ topSpacing: 0 }); // utilisé sur template-infos
    });
});
