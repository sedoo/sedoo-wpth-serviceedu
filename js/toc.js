/**
* Génération du sommaire
*/

$(document).ready(function(){
	
	// création du nav Sommaire
	//$('main article aside').prepend('<nav role="sommaire"></nav>');
     var i=0;
    
	// Sur chaque :header
	$('article > section :header').each(function(){       
        // création des ancres, insertion avant les headers
        $( '<a id="toc' + i + '"></a>' ).insertBefore( $(this) );
        // Ajout des liens vers les ancres dans le sommaire
        var item = '<a href="#toc' + i + '">' + $(this).text() + '</a>';
        $(item).appendTo('[role="sommaire"]');
        i++;
	});

    $('[href^="#toc"]').click(function(){
       $('[href^="#toc"]').removeClass();
       $(this).addClass('active'); 
    });
    
    // Fixe le sommaire au scroll (jquery.sticky.js)
    $(window).load(function(){
      $('div aside').sticky({ topSpacing: 0 });
    });
});
