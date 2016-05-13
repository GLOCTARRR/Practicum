//2.4.1
//Работает в mozila
var blogUlLi = $('#blog ul li');


blogUlLi.each(function(i, elem){
	var h3 = elem.getElementsByTagName('h3')[0];
	var newDiv = $('<div/>');
	newDiv.addClass( "description");
	newDiv.data('h3', h3);
	newDiv.insertAfter(h3);		
	
	
});


blogUlLi.click(function(event){
	event.preventDefault();
	
	
	
	var div = $(this).find('div');
	var str = $(this).find('a').attr('href');
	var url = str.substr(0,9) + ' ' + str.substr(9);
	div.load('./data/' + url);
	index = blogUlLi.index(this);
	
	$('.description').each(function(i, elem){
		if(i===index){
			elem.style.display = 'block';
		} else{
			elem.style.display = 'none';
		}
	});
		
	
});





