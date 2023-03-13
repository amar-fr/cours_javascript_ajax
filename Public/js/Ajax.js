/*
 * author : AISSI Amar
 * Project of Ajax web application and DataBase MySQL
 * date : 12/12/2019
 * coursit.fr
 */
function getAllEmploye(){
	
	// Call Ajax and parsing Data JSON receive
	$.ajax( 
		{ 
			type: "POST", 
			url: "http://cours_javascript",
			data: "Appel_Ajax=1", 
			success: function(data){
				let id_list_employe = $('#list_employes')[0]; //document.getElementById('list_employes');
				var mydata = jQuery.parseJSON(data);
				var table = '<div id="child"><table border="0" id="myTable">';
				table += '<tr>'+
				'<td id="td_title">Numéro</td>'+
				'<td id="td_title">Nom</td>'+
				'<td id="td_title">Prénom</td>'+
				'<td id="td_title">Salaire</td>'+
				'<td id="td_title">Date de récrutement</td>'+
				'<td id="td_title">Département</td>'+
				'</tr>';
				
				$.each(mydata, function(index, value){
						table += '<tr>'+
						'<td>' + value.Employee_id + '</td>'+
						'<td>' + value.First_name + '</td>'+
						'<td>' + value.Last_name + '</td>'+
						'<td>' + value.Salary + '</td>'+
						'<td>' + value.Joining_date + '</td>'+
						'<td>' + value.Departement + '</td>'+
						'</tr>';
				});
				table += '</table></div>';
				id_list_employe.innerHTML = table;
			   	},
			error : function(){
					alert("echec");
				}
		}
	)
}
function Effacer_Liste_Employes(){
	let id_list_employe = $('#list_employes')[0];
	id_list_employe.innerHTML = "";
}
getAllEmploye();
