//2.4.2
var specialsForm = $('#specials form')
var newDiv = $( '<div/>');
newDiv.insertAfter( specialsForm );

$("select[name=day]").change(function() {
    var selectedDay = $( this).val();
    
    $.getJSON('./data/specials.json', function(){
	var data = arguments[0];
	var selectedDayInfo = data[ selectedDay];
	newDiv.empty();
	newDiv.append('<h2>' + selectedDayInfo.title + '</h2>' + '<p>' + selectedDayInfo.text + '</p>');
	newDiv.append( $( '<img/>').attr( "src", '.' + selectedDayInfo.image));
	newDiv[ 0].style.color = selectedDayInfo.color;
    })
});

var buttons = $('#specials form li').last();
buttons.remove();
