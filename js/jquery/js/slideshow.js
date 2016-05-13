//2.3.3
$('#slideshow').prependTo( $('body') );
 function slideshow(){
    var items = $('#slideshow').find('li').hide();
	var timeout = 1000;
	getNextItem = function(item) {
        return item.next().length ? 
        item.next() : items.first();
    };
     showItem = function(currentItem, itemToShow) {
        currentItem.fadeOut(timeout, function(){itemToShow.fadeIn(timeout, callback);});
    };
	callback = function() {
		var currentItem = $(this),
        nextItem = getNextItem(currentItem);				
        setTimeout(function(){showItem(currentItem, nextItem);}, 3000);
    };
	items.eq(0).fadeIn(timeout, callback);
	
};
$(slideshow);
    
 