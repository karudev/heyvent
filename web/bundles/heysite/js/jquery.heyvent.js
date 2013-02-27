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
    };
    
    $.fn.mosaique = function()
    {
        // Mosaique
  $(this).masonry({
                                // options
                                itemSelector : '.paveposter',
                                columnWidth : 356
                              });
                              
                              $('#options').masonry({
                                // options
                                itemSelector : '.bloc',
                                columnWidth : 356
                              });
    };
     
     
})(jQuery);
