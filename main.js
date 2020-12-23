document.addEventListener("DOMContentLoaded", function(){
    jQuery('[data-prepop="submit"]').click(function() {
    	var prepop_source = {};
    	jQuery('[data-prepop="source"]').each(function( index ) {
    		prepop_source[jQuery(this).attr('name')] =  jQuery(this).val()
    	});
    	Cookies.set('prepop_source', prepop_source, { expires: 90 });
    	console.log (Cookies.getJSON('prepop_source'));
    });
    
    //fill destination with cookie values
    jQuery('[data-prepop="destination"]').each(function( index ) {
		jQuery(this).val(Cookies.getJSON('prepop_source')[jQuery(this).attr('name')])
    });

});