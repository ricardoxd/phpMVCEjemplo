// Agrega aquí el JS que necesites
$('#cssmenu').prepend('<div id="indicatorContainer"><div id="pIndicator"><div id="cIndicator"></div></div></div>');
    var activeElement = $('#cssmenu>ul>li:first');

    $('#cssmenu>ul>li').each(function() {
        if ($(this).hasClass('active')) {
            activeElement = $(this);
        }
    });


	var posLeft = activeElement.position().left;
	var elementWidth = activeElement.width();
	posLeft = posLeft + elementWidth/2 -6;
	if (activeElement.hasClass('has-sub')) {
		posLeft -= 6;
	}

	$('#cssmenu #pIndicator').css('left', posLeft);
	var element, leftPos, indicator = $('#cssmenu pIndicator');
	
	$("#cssmenu>ul>li").hover(function() {
        element = $(this);
        var w = element.width();
        if ($(this).hasClass('has-sub'))
        {
        	leftPos = element.position().left + w/2 - 12;
        }
        else {
        	leftPos = element.position().left + w/2 - 6;
        }

        $('#cssmenu #pIndicator').css('left', leftPos);
    }
    , function() {
    	$('#cssmenu #pIndicator').css('left', posLeft);
    });


	$('#cssmenu>ul>.has-sub>ul').append('<div class="submenuArrow"></div>');
	$('#cssmenu>ul').children('.has-sub').each(function() {
		var posLeftArrow = $(this).width();
		posLeftArrow /= 2;
		posLeftArrow -= 12;
		$(this).find('.submenuArrow').css('left', posLeftArrow);

	});

	$('#cssmenu>ul').prepend('<li id="menu-button"><a>Menu</a></li>');
	$( "#menu-button" ).click(function(){
    		if ($(this).parent().hasClass('open')) {
    			$(this).parent().removeClass('open');
    		}
    		else {
    			$(this).parent().addClass('open');
    		}
    	});



    ///////////busqueda
    $(document).ready(function() {    
    //Al escribr dentro del input con id="service"
    $('#service').keypress(function(){
        //Obtenemos el value del input
        var service = $(this).val();        
        var dataString = 'service='+service;

        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "index.php?action=autocompletarproducto",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').live('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                  
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#service').val($('#'+id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    $( "#consultar" ).click();
                });              
            }
        });
    });              
});

//////////////validaciones

 $(function(){
                //Para escribir solo letras
                //$('#miCampo1').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
                //Para escribir solo numeros    
                $('#cantidad').validCampoFranz('0123456789');   
                $('#codigo').validCampoFranz('0123456789');  
            });