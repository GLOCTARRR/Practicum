// 1.1
var divWithClassModuleElements = $('div.module');


// 1.2 
var thirdElementInMyList = $('ul#myList li:eq(2)');

// 1.3
var searchLabel = $('#search label');

// 1.4
var hiddenElementsCount = $(':hidden').length;

// 1.5
var imageWithAltAttributeCount = $('img[alt]').length;

// 1.6
var oddRowsInTbody = $("tbody tr:even");
 oddRowsInTbody.css( "border", "3px solid red" );

//-----------------------------------------------------------------------------

// 2.1
$('img').each( function( i,elem) {
    console.log( elem.alt);
});

// 2.2
$('input[type=text]').parent().addClass('newClass');

// 2.3
var current = $('#myList .current');
current.removeClass( 'current');
current.next().addClass( 'current');

// 2.4
var submitButton = $('select[name=day] option:last-child').parent().parent().next().children();

// 2.5
var firstSlide = $("#slideshow li:eq(0)");
firstSlide.addClass( 'current');
var secondSlide = firstSlide.next();
secondSlide.addClass( 'disabled');
var thirdSlide = secondSlide.next();
thirdSlide.addClass( 'disabled');

//-----------------------------------------------------------------------------

// 3.1
var myList = $('#myList');
for( var i = 0; i < 5; i++){
  myList.append('<li> added element ' + i + '</li>');
}

// 3.2
$('#myList :odd').remove();

// 3.3
var lastDivModule = $('div.module').last();
lastDivModule.append('<h2>added h2</h2>');
lastDivModule.append('<p>added p</p>');

// 3.4
var myOption = '<option value="wednesday">Wednesday</option>';
var index = 4;
$(myOption).insertBefore("select[name=day] option:nth-child(" + index + ")");

// 3.5
var lastDivModule = $('div.module').last();
var newDiv = $( '<div/>');
var img = $( '<img/>');
var firstImageSrc = ( $('img').first().attr( 'src'))
img.attr( "src", firstImageSrc);
newDiv.append( img);
newDiv.addClass( 'module');
newDiv.insertAfter( lastDivModule );
