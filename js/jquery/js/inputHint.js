//2.2.1
var searchLabel = $('label[for=q]');
var textSearchLabel = '';
searchLabel.each(function(){ textSearchLabel = this.innerHTML; }); 
var inputText = $('input[name=q]');
function initInputText() {
	inputText.attr("value", textSearchLabel );
	inputText.addClass('hint');
}
$(initInputText);

searchLabel.remove();
inputText.focus(function(){
	inputText.removeClass('hint');
	inputText.removeAttr("value");		
})
inputText.blur(function(){
	$( initInputText );		
})



