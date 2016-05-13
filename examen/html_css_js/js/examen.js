$(document).ready(function(){
	
	var items = getFromLocalStorage('items');;
	var index;
	var filter = "all";
	loadList(items);
	
	//нажатие "Enter"
	$('#new-todo').keypress(function(e){
		if(e.which === 13){	
			var error=false;		
			if($("#new-todo").val()==""){
				error=true;
			}
			if(error===true){
				alert("Поле не может быть пустым");
			} else{				
				item = {todo: $('#new-todo').val(), status: false};
				$('#new-todo').val('');
				items.unshift(JSON.stringify(item));
				loadList(items);
				storeToLocalStorage("items", items);
			}
		}
	});
	
	//формирование списка задач
	function loadList(items){
		var completedItems = 0;
		var activeItems = 0;
		$('li').remove();
		if(items.length > 0){			
			for(var i = 0; i < items.length; i++) {
				item = JSON.parse(items[i]);
				//Если задача не активна
				if(item.status){
					completedItems = completedItems + 1;
					//Если фильтр "completed" или "all" запись будет отображаться в списке
					if(filter == "completed" || filter == "all"){												
						$('#todos').append('<li class= "list-group-item list-group-item-my-sett"><label class="check"><input class="status" type="checkbox" checked="true"><span></span></label><del class="text-todo"><font color="#a9a9a9">' + item.todo + '</font></del><div class="operation remove"></div></a></li>')
					} else {
						$('#todos').append('<li class= "list-group-item list-group-item-my-sett hide"><label class="check"><input class="status" type="checkbox" checked="true"><span></span></label><del class="text-muted">' + item.todo + '</del><div class="operation remove"></div></a></li>');						
					}					
				} 
				//Если задача активна
				else {
					activeItems = activeItems + 1;
					//Если фильтр "active" или "all" запись будет отображаться в списке
					if(filter == "active" || filter == "all"){	
						$('#todos').append('<li class= "list-group-item list-group-item-my-sett"><label class="check"><input class="status" type="checkbox"><span></span></label><span class="text-todo"><font color="#4d4d4d">' + item.todo + '</font></span><div class="operation edit" data-toggle="modal" data-target="#editModal"></div></li>');
					} else {
						$('#todos').append('<li class= "list-group-item list-group-item-my-sett hide"><label class="check"><input class="status" type="checkbox"><span></span></label><span >' + item.todo + '</span><div class="operation edit"  data-toggle="modal" data-target="#editModal"></div></li>');													
					}					
				}
			}
		}
		refreshCompleted(completedItems);
		refreshActive(activeItems);
	};
	
	//Удаление всех неактивных задач	
	$('#delete-completed').click(function(){
		filteredItems = items.filter(function(item){
			temp = JSON.parse(item);
			return !temp.status;
		});
		items = filteredItems
		loadList(items);
		storeToLocalStorage("items",items);
	});
	//отображает все активные задачи
	$('#active').click(function(){
		filter = "active";
		loadList(items);
	});
	//отображает все не активные задачи
	$('#completed').click(function(){
		filter = "completed";
		loadList(items);
	});
	//отображает все задачи
	$('#all').click(function(){
		filter = "all";
		loadList(items);
	});
	//меняет статус задачи
	$('#todos').delegate('.status', 'change', function(event){
		event.stopPropagation();
		index = $('.status').index(this);
		item = JSON.parse(items[index]);
		if(this.checked){	
			item.status = true;
		}else{
			item.status = false;
		}
		items[index] = JSON.stringify(item)	
		loadList(items);
		storeToLocalStorage("items", items);
	});
	
	
	//удаление задачи
	$('#todos').delegate('.remove', 'click', function(number){		
			event.stopPropagation();
			index = $('.operation').index(this);
			items.splice(index, 1);
			loadList(items);
			storeToLocalStorage('items', items);		
	});
	//редактрование записи
	$('#todos').delegate('.edit', 'click', function(event){
		index = $('.operation').index(this);
		item = JSON.parse(items[index]);
		$('#edit-input').val(item.todo);
	});
	//сохранение изменений
	$('#edit-button').click(function(){ 
		item = JSON.parse(items[index]);
		item.todo = $('#edit-input').val();
		items[index] = JSON.stringify(item)
		loadList(items);
		storeToLocalStorage("items", items);
	
	});
	
	function refreshCompleted(completedItems){
		$('#delete-completed').html("<span class='text-muted'><font color='#7c7777'>Clear completed ("+ completedItems + ")</font></span>");
	};
	
	function refreshActive(activeItems){
		$('#items-left').html("<span class='red'><font color='#83756f'><b>" + activeItems + " </b>Items left</font></span>");
	};
		
	function storeToLocalStorage(key, items){
		localStorage[key] = JSON.stringify(items);
	};
	
	function getFromLocalStorage(key){
		if(localStorage[key]){
			return JSON.parse(localStorage[key]);
		} else{
			return[];
		}
	};
});