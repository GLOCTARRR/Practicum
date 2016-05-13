//2.3.1
$("#blog h3").click(function(event){
	event.preventDefault();
	var index = $('#blog h3').index(this);
	$('.excerpt').each(function( i, elem){
		if(i === index){
			elem.style.display = 'block';
		} else {
			elem.style.display = 'none';
		}
	});
})

