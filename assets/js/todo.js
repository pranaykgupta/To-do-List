$("ul").on("click","li",function(){
	$(this).toggleClass("completed");
});

// clicking san to remove todo
$("ul").on("click","span" ,function(event){
	var todo = $(this).parent().text();
	$.ajax({
		url: "delete.php",
		method: "POST",
		data : {
			todo: todo
		},
		success: function(data){
                    if(data=="YES"){
                        $(this).parent().fadeOut(500,function(){
						$(this).remove();
						});
						event.stopPropagation();
                        }else{
                            alert("can't delete the row")
                            }
                    }
	});
	
});

//Creating new todos
$("input[type='text']").keypress(function(event){
	if(event.which === 13){
		var todoText =  $(this).val();
		$(this).val("");
		$("ul").append("<li><span><i class='fas fa-trash'></i> </span>" + todoText + "</li>");
		$.ajax({
			url: "insert.php",
			method: "POST",
			data: {
				data: todoText 
			}
		});
	}
});
		
$(".fa-plus").on("click",function(){
	$("input[type='text']").fadeToggle();
});