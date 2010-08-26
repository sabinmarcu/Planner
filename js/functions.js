function form(type){
	$("article").load("/php/form.php", {form: type}, function(){
		$(this).fadeOut(250).fadeIn(250);
		switch (type)	{
			case 'login' :
				$("form").submit(function(){
					$.getJSON("/php/login.php", {
						
							username: $("input#username").val(), 
							password: $("input#password").val()},
							 
						function(data){
						if (data['result'] != 'success')	{
							alert(data['problem']);
						}
						else {
							alert("Bine ai revenit, "+data['name']);
							table();
							$("section").fadeIn(500);
						}
					})
				return false;
			}, 'json');
		break;
			case 'register' :
				$("#data").date_input();
				$("form").submit(function(){
					$.getJSON("/php/register.php", {
					
						name: $("input#name").val(),
						username: $("input#username").val(), 
						password: $("input#password").val(),
						repassword: $("input#repassword").val(),
						data: $("input#data").val(),
						tipar: $("input#tipar").val()
						
					}, function(data){
						if (data['result'] != 'success')	{
							alert(data['problem']);
						}
						else {
							alert("Bine ai venit printre noi, "+data['name']);
							table();
							$("section").fadeIn(500);
						}
					})
				return false;
				});
		break;
			case 'logout' :
				$("form").submit(function(){
					$.post("/php/logout.php", function(data){
							$("article").html("<a href='javascript:form(\"login\")' class='abloc'>Autentifica-te !</a>");
							$("section").fadeOut(500);
					}, 'json');
				return false;
				});
		break;
		case 'admin' :
			$("#data").date_input();
			$.getJSON("/php/getuser.php", function(data){
				$("input#name").val(data.name);
				$("input#data").val(data.inceput);
				$("input#tipar").val(data.tipar);
			});
			
			$("form").submit(function(){
				$.getJSON("/php/admin.php", {
				
					name: $("input#name").val(),
					password: $("input#password").val(),
					repassword: $("input#repassword").val(),
					data: $("input#data").val(),
					tipar: $("input#tipar").val()
					
				},function(data){
					if (data['result'] != 'success')	{
						alert(data['problem']);
					}
					else {
						alert("Datele au fost actualizate cu succes !");
					}
				});
			return false;
			});
	break;
		case 'date' :
			$("#date").date_input();
			$("form").submit(function(){
				date = $("input#date").val();
				$("article").load("/php/table.php", {date: date});
				$("section#luna").html(date);
			return false;
			});
	break;
		}
	}, 'json');
}

function table(date)	{
	if (!date) 	date = '';
	$("article").load("/php/table.php", {date: date});
}

$(document).ready(function() {
	$('tr.plan td:not(.inv)').live('click', function() {
		id = $(this).attr('id');
		if ($(this).html().trim() != "Co")		{
			if(confirm("Vrei sa setezi aceasta zi ca si zi de concediu?"))
				$.getJSON('/php/setday.php', {day: id}, function(data){
					if (data['result'] == 'success') $("tr.plan td#"+id).html("Co");
					else alert(data['result']);
				});
			}
		else if(confirm("Vrei sa stergi aceasta zi de concediu?"))	{
				$.getJSON('/php/delday.php', {day: id}, function(data){
					if (data['result'] == 'success') $("tr.plan td#"+id).html(data['plan']);
					else alert(data['result']);
				});
			}
	});
});