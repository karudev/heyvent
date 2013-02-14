/**
 * Heyvent - jQuery plugin
 * @version: 0.1
 * @requires jQuery v1.4.3+
 * @author Dolyveen Renault
 * @modified by: Dolyveen Renault
 * Examples and documentation at: ...
 *
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 **/

(function($) {
    
    /**
     * Gère les pavés des events
     **/
    $.fn.heyvent = function(params) {
        /* var params = {
            handler: null
        };*/
        
        $(this).click(function()
        {
            var ref = $(this).attr("itemref");
            var val = new Array();
           
            if(ref)
                val = ref.split(';');
         
            for(i=0;i<=4;i++)
            {
                var pos = null;
                
                if(val[i])
                    pos = val[i];
                else
                    pos = '0px';
                
                $('#pave'+(i+1)+' .mCSB_container').animate({
                    top: pos           
                }, 500, function() {
                    // Animation complete.
                    });
            }
        });
    }
    
    /**
     * Anime un textara en hauteur
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
    }
     
     
})(jQuery);
