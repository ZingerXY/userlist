function add() {
	var data_qualif = [];
	var data_sityes = [];
	
	var arr_qualif = $("#qualif li input:checked");
	for(var i = 0; i < arr_qualif.length; i++)
		data_qualif.push(arr_qualif[i].value);
	
	var arr_sityes = $("#cities li input:checked");
	for(var i = 0; i < arr_sityes.length; i++)
		data_sityes.push(arr_sityes[i].value);
	
	console.log(data_qualif);
	console.log(data_sityes);
	
    $.ajax({
        type:"POST",
        data: {"sityes":data_sityes ,"qualification":data_qualif},
        url:"getuser.php",
        success:function(json){
            console.log(json);
			var html = "<tr><th>ФИО</th><th>Образование</th><th>Города</th></tr>"
			for(var j in json) {			
				html += "<tr><th>"+json[j][0]+"</th><th>"+json[j][1]+"</th><th>"+json[j][2].join(", ")+"</th></tr>";
			}
			$("#users").html(html);	
        }
    });
}

$("li input").on("click", add);
add();
