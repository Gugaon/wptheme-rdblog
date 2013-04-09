/**
 * jQuery FloatBox - An easy way to create floater box
 * 
 * Require: jQuery 1.3.x
 * Author: Rafael Michels Motta
 * Email:  rafaelmotta021 at gmail dot com
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
*/
(function( $ ){
	var methods = {
	    init : function( options ) {
	    	return this.each(function(){
	    		
	    		var $this = $(this);
	    		position = { initOffSet : $this.offset().top, left: $this.offset().left };
					maxTop = $('#end-post').offset().top - 200;

	    		$(window).scroll( function(){
	    			if( scrollTop() >= maxTop ) {
	    				$this.css( {position : 'static'} )
	    			}else if( $this.offset().top - scrollTop() < 0 ) {
	    				$this.css( {position : 'fixed', top : '10px', left: position.left} )
	    			}else if( scrollTop() <= position.initOffSet ) {
	    				$this.css( {position : 'static'} )
	    			}
	    		});
	    		
	    		$(window).resize( function(){
	    			position.initOffSet = $this.offset().top;
	    			position.left = $this.offset().left;
	    		});
	    		
	    		
	    		function scrollTop() {
	    			return document.body.scrollTop || document.documentElement.scrollTop;
	        }
			});	
	    	
	    }
  };

  $.fn.floatBox = function( method ) {
    
    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.floatBox' );
    }    
  
  };

})( jQuery );