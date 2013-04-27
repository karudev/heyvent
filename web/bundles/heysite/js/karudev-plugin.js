(function( $ ) {
  
/**
     * Anime un textarea en hauteur
     **/
    $.fn.textarea = function(params) {
         
        if(!params)
            var params = {};    
         
        //Valeur de la hauteur par default
        if(!params.heightDefault)
            params.heightDefault = '20px';
     
        //Valeur de la hauteur à fixer
        if(!params.heightToFixe)
            params.heightToFixe = '200px';
     
        //Vitesse
        if(!params.duration)
            params.duration = 500;
     
     
        $(this).click(function()
        { //console.debug($(this));
            $(this).animate({
                height :  params.heightToFixe
                }, params.duration); 
        });
    
       /* $(this).mouseout(function()
        { 
            $(this).animate({
                height :  params.heightDefault
                }, params.duration); 
        });
        */
    };
    
 $.fn.chariot = function(classeChariot) {
	 
        // var thisBis = this;
	 $(this).click(function()
            {
                // Récupération du prochain tr caché
                var domTr = $(this).parents().next();
              
                if(domTr.css('display') == 'none')
                    {
                        // Fermeture des autres chariots
                        $(classeChariot).hide('fade');  
                        domTr.show('fade');
                    }
                else
                domTr.hide('fade');  
                
            });
	  };

$.fn.loadHtml = function(div,method,rel) {
	
        var thisBis = this;
        var href;
        
        if($(thisBis).attr('data-url'))
         href = $(thisBis).attr('data-url');
        else if(rel)
         href = $(thisBis).attr('rel');
        else
         href = $(thisBis).attr('href');
      
	  
	 
	  $(this).click(function(event)
			  {
		  event.preventDefault();
		 
			 // $(div).html('<div style="margin:90px" ><img src="'+domaine+'/bundles/lea/images/divers/load.gif" /></div>');
			  $.ajax({
			  		url: href,
			  		dataType: "html",
			  		type : method,
			  		success: function( html ) {
			  		$(div).html(html);
			  		}
			  		});

			  });
	//  return false;
  };
  
    $.fn.submitForm = function(div,titre_retour,suffixe,noreload) {
        
		var thisBis = this;
	  $(this).submit(function()
			  {

			  var form = $(thisBis).serializeArray();
			
			 /* if(noreload == undefined)
			  $(div).html('<div style="margin:90px" ><img src="'+domaine+'/bundles/lea/images/divers/load.gif" /></div>');
			  */
			  $.ajax({
			  		url: $(thisBis).attr('action'),
			  		dataType: "json",
			  		type : "POST",
			  		data : form,
			  		success: function( data ) {
				  
				  if(noreload == undefined)
				  $(div).html('');
			  		
                                       
                                        
			  		if(suffixe)
			  			{
			  		$('a#'+suffixe+'_show').trigger('click');
			  		
			  			}
			  		
			  		/*$.pnotify({
			  						title: titre_retour,
			  						text: data,
			  						type: 'success',
			  						styling: 'jqueryui'
			  					});*/
			  		}
			  		});
			  return false;

			  });
  };
  
  
  
    
     $.fn.submitFormAndReturnHtml = function(div,callBack,option) {
        var thisBis = this;
        $(this).submit(function()
        {

            var form = $(thisBis).serializeArray();
           // $(div).html('<div style="margin:90px" ><img src="'+domaine+'/bundles/lea/images/divers/load.gif" /></div>');
			  
            $.ajax({
                url: $(thisBis).attr('action'),
                dataType: "html",
                type : "POST",
                data : form,
                success: function(html) {
				  
                  $(div).html(html);  
                  
                  if(callBack)
                      callBack();
                  
                  if(option =='mosaique')
                      {
                         $('form[name="comment"]').submitFormAndReturnHtml('.contain_event','mosaique');  
                         $('textarea.contribution').textarea(); 
                         $('#content').mosaique();
                      }
              
                }
            });
            return false;

        });
    };
      
     send = function(data,url,callBack) {
   
            $.ajax({
                url: url,
                type : "POST",
                data : data,
                success: function(data) {
		
                  if(callBack)
                      callBack(data);
               
                }
            });
         
    };
 
})( jQuery );