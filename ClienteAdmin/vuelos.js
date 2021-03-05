function loadXMLDoc() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			var contenedor = document.getElementById("vuelos");

			var obj = JSON.parse(this.responseText);

			var numVuelos = obj.numeroVuelos;


			var miarray = obj.vuelos;
			contenedor.innerHTML = "";

			for (i = 0; i < numVuelos; i++) {
				var id = document.createTextNode(miarray[i].id);
				var cod = document.createTextNode(miarray[i].codigo);
				var origen = document.createTextNode(miarray[i].origen);
				var destino = document.createTextNode(miarray[i].destino);
				var fecha = document.createTextNode(miarray[i].fecha);
				var hora = document.createTextNode(miarray[i].hora);
				var totales = document.createTextNode(miarray[i].plazas_totales);
				var disponibles = document.createTextNode(miarray[i].plazas_disponibles);

				var div1 = document.createElement("div");
				div1.setAttribute("class", "card-body");
				contenedor.appendChild(div1);

				var heather5 = document.createElement("h5");
				heather5.appendChild(id);
				heather5.setAttribute("class", "card-title");
				div1.appendChild(heather5);

				var heather6 = document.createElement("h6");
				heather6.appendChild(cod);
				heather6.setAttribute("class", "card-subtitle mb-2 text-muted");
				div1.appendChild(heather6);

				var parrafoOrigen = document.createElement("p");
				parrafoOrigen.appendChild(origen);
				parrafoOrigen.setAttribute("class", "card-text");
				div1.appendChild(parrafoOrigen);

				var parrafoDestino = document.createElement("p");
				parrafoDestino.appendChild(destino);
				parrafoDestino.setAttribute("class", "card-text");
				div1.appendChild(parrafoDestino);

				var parrafoFecha = document.createElement("p");
				parrafoFecha.appendChild(fecha);
				parrafoFecha.setAttribute("class", "card-text");
				div1.appendChild(parrafoFecha);

				var parrafoHora = document.createElement("p");
				parrafoHora.appendChild(hora);
				parrafoHora.setAttribute("class", "card-text");
				div1.appendChild(parrafoHora);

				var parrafoTotales = document.createElement("p");
				parrafoTotales.appendChild(totales);
				parrafoTotales.setAttribute("class", "card-text");
				div1.appendChild(parrafoTotales);

				var parrafoDisponibles = document.createElement("p");
				parrafoDisponibles.appendChild(disponibles);
				parrafoDisponibles.setAttribute("class", "card-text");
				div1.appendChild(parrafoDisponibles);

				var btnBorrar = document.createElement("button");
				btnBorrar.setAttribute("class", "btn btn-danger");
				btnBorrar.setAttribute("onClick", "eliminar(" + miarray[i].id + ")");
				div1.appendChild(btnBorrar);
			}



		}
	};
	xhttp.open("GET", "http://localhost/php/Adat_Trbajo_final/ClienteAdmin/leeVuelo.php", true);
	xhttp.send();
}

function eliminar(id) {
	var objV = { "id": id };
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {

		var contenedor = document.getElementById("card-title" + id);

		//contenedor.innerHTML = "";


	}
	xhttp.open("PUT", "http://localhost/php/Adat_Trbajo_final/ClienteAdmin/deleteVuelo.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = JSON.stringify(objV);
	xhttp.send(data);
}

function insert() {
	var codigo = document.getElementById("codigo").value;
	var origen = document.getElementById("origen").value;
	var destino = document.getElementById("destino").value;
	var fecha = document.getElementById("fecha").value;
	var hora = document.getElementById("hora").value;
	var totales = document.getElementById("totales").value;
	var disponibles = document.getElementById("disponibles").value;
	var objV = { "codigo_vuelo": codigo, "origen": origen, "destino": destino, "fecha": fecha, "hora": hora, "plazas_totales": totales, "plazas_disponibles": disponibles };
	var peticion = { "peticion": "add", "vuelos": objV };
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "http://localhost/php/Adat_Trbajo_final/ClienteAdmin/escribirVuelo.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = JSON.stringify(peticion);
	xhttp.send(data);
}

function update() {
	var id = document.getElementById("id").value;
	var codigo = document.getElementById("Ecodigo").value;
	var origen = document.getElementById("Eorigen").value;
	var destino = document.getElementById("Edestino").value;
	var fecha = document.getElementById("Efecha").value;
	var hora = document.getElementById("Ehora").value;
	var totales = document.getElementById("Etotales").value;
	var disponibles = document.getElementById("Edisponibles").value;
	var objV = { "id": id, "codigo": codigo, "origen": origen, "destino": destino, "fecha": fecha, "hora": hora, "totales": totales, "disponibles": disponibles };
	var xhttp = new XMLHttpRequest();
	xhttp.open("PUT", "http://localhost/php/Adat_Trbajo_final/ClienteAdmin/updateVuelo.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = JSON.stringify(objV);
	xhttp.send(data);
}

function search() {
	var idb = document.getElementById("Bid").value;
	idb = Number(idb);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			var contenedor = document.getElementById("buscado");

			var obj = JSON.parse(this.responseText);

			var numVuelos = obj.numeroVuelos;


			var miarray = obj.vuelos;
			contenedor.innerHTML = "";

			for (i = 0; i < numVuelos; i++) {
				var id2 = miarray[i].id;
				var id = document.createTextNode(miarray[i].id);
				var cod = document.createTextNode(miarray[i].codigo);
				var origen = document.createTextNode(miarray[i].origen);
				var destino = document.createTextNode(miarray[i].destino);
				var fecha = document.createTextNode(miarray[i].fecha);
				var hora = document.createTextNode(miarray[i].hora);
				var totales = document.createTextNode(miarray[i].plazas_totales);
				var disponibles = document.createTextNode(miarray[i].plazas_disponibles);
				id2 = parseInt(id2, 10);
			
				if (id2 == idb) {
					var div1 = document.createElement("div");
					div1.setAttribute("class", "card-body");
					contenedor.appendChild(div1);

					var heather5 = document.createElement("h5");
					heather5.appendChild(id);
					heather5.setAttribute("class", "card-title");
					div1.appendChild(heather5);

					var heather6 = document.createElement("h6");
					heather6.appendChild(cod);
					heather6.setAttribute("class", "card-subtitle mb-2 text-muted");
					div1.appendChild(heather6);

					var parrafoOrigen = document.createElement("p");
					parrafoOrigen.appendChild(origen);
					parrafoOrigen.setAttribute("class", "card-text");
					div1.appendChild(parrafoOrigen);

					var parrafoDestino = document.createElement("p");
					parrafoDestino.appendChild(destino);
					parrafoDestino.setAttribute("class", "card-text");
					div1.appendChild(parrafoDestino);

					var parrafoFecha = document.createElement("p");
					parrafoFecha.appendChild(fecha);
					parrafoFecha.setAttribute("class", "card-text");
					div1.appendChild(parrafoFecha);

					var parrafoHora = document.createElement("p");
					parrafoHora.appendChild(hora);
					parrafoHora.setAttribute("class", "card-text");
					div1.appendChild(parrafoHora);

					var parrafoTotales = document.createElement("p");
					parrafoTotales.appendChild(totales);
					parrafoTotales.setAttribute("class", "card-text");
					div1.appendChild(parrafoTotales);

					var parrafoDisponibles = document.createElement("p");
					parrafoDisponibles.appendChild(disponibles);
					parrafoDisponibles.setAttribute("class", "card-text");
					div1.appendChild(parrafoDisponibles);

					var btnBorrar = document.createElement("button");
					btnBorrar.setAttribute("class", "btn btn-danger");
					btnBorrar.setAttribute("onClick", "eliminar(" + miarray[i].id + ")");
					div1.appendChild(btnBorrar);
				}
			}



		}
	};
	xhttp.open("GET", "http://localhost/php/Adat_Trbajo_final/ClienteAdmin/leeVuelo.php? id=" + idb, true);
	xhttp.send();
}