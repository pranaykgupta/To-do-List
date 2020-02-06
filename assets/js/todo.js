$("ul").on("click","li",function(){
	var id = this.id;
	$.ajax({
		type: "POST",
		url: 'markcomplete.php',
		data: {
			id: id
		},
		success: function(res){
			res = JSON.parse(res);
			if(res['status'] == 200){
				$(`#${id}`).toggleClass('completed');
			}
		}
	});
});

// clicking san to remove todo
$("ul").on("click","span" ,function(event){
	var todo = $(this).parent()[0].dataset.id;
	// $(this).parent().fadeOut(500,function(){
	// 	$(this).remove();
	// });
	event.stopPropagation();
	$.ajax({
		url: "delete.php",
		method: "POST",
		data : {
			todo: todo
		},
		success: function(response){
				response = JSON.parse(response);
				if(response['status'] == 200){
					$(`#${todo}`).fadeOut(500,function(){
						$(this).remove();
					});
					// event.stopPropagation();
				}else if(response['status'] == 400){
					$('#msg').html(`<h3>${response['message']}</h3>`);
				}
        }
	});
	
});

//Creating new todos
$("#new").keypress(function(event){
	if(event.which === 13){
		var todoText =  $(this).val();
		$(this).val("");
		$.ajax({
			url: "insert.php",
			method: "POST",
			data: {
				data: todoText 
			},
			success: function(res){
				res = JSON.parse(res);
				if(res['status'] == 200){
					// let el = document.createElement('li');
					// el.innerHTML = "<span><i class='fas fa-trash'></i> </span>" + todoText;
					// $("ul").append(el);
					window.location.reload();
				}else if(res['status'] = 400){
					$('#msg').html(`<h3>${res['message']}</h3>`);
				}
			}
		});
	}
});
		
$(".fa-plus").on("click",function(){
	$("#new").fadeToggle();
});