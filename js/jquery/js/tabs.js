var divWithClassModuleElements = $('div.module');
divWithClassModuleElements.attr( "position", "fixed");

var ul = $('<ul>');
$(ul).attr( "id", "tabsList");
$(ul).insertBefore( divWithClassModuleElements.first());

divWithClassModuleElements.each( function( i, elem) {
    elem.style.display = 'none';
    var h2 = elem.getElementsByTagName('h2')[ 0].childNodes[0].data;
    var li = '<li>' + h2;
    $(ul).append(li);
});

$('#tabsList li').click(function(){
    var index = $(ul[ 0].childNodes).index(this);
    divWithClassModuleElements.each( function( i, elem) {
	if( i === index){
	    elem.style.display = 'block';
	    $( ul[0].childNodes[ i]).addClass( 'current');
	}
	else{
	    elem.style.display = 'none';
	    $( ul[0].childNodes[ i]).removeClass( 'current');
	    
	}
    });
});

$('#tabsList li').first().click();

