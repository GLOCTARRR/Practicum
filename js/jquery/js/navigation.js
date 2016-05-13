//2.3.2
$("#nav li").hover(
    function(){
      $(this).addClass( "hover");
      var subMenu = $(this)[0].getElementsByTagName('ul')[0];
      subMenu.style.display = 'block'; 
    }, 
    function(){
      $(this).removeClass( "hover");
      var subMenu = $(this)[0].getElementsByTagName('ul')[0];
      subMenu.style.display = 'none';
});

