@extends('plantilla')
@section('content')
CRUD PLANETES
	<div>
		<input type="text" id="planetNameInput">
		<button id="saveButton" >Save</button>
	</div>


	<div id="errors" class="mt-2 alert alert-danger" role="alert"></div>

	<table>
		<thead>
			<tr>
				<th>id</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody id="taula">			
		</tbody>

	</table>

</body>
</html>
<script type="text/javascript">
    var rows = [];
	var operation = "inserting";
	var selectedId;
	const table = document.getElementById('taula');
	const divErrors = document.getElementById('errors');
	divErrors.style.display = "none"
	const planetNameInput = document.getElementById('planetNameInput')
	const saveButton = document.getElementById('saveButton')
	saveButton.addEventListener('click', onSave)
	const url = 'http://localhost:8000/api/productos';
	function showErrors(errors) {
		
		divErrors.style.display = "block"
		divErrors.innerHTML = "";
		const ul = document.createElement("ul")
		for(const error of errors) {				
				const li = document.createElement("li");				
				li.textContent = error;				
				ul.appendChild(li);			
		}
		divErrors.appendChild(ul)
	}
	function onSave(event) {
		console.log("ei!!!")
		if(operation=="inserting") savePlanet();
		if(operation=="editing") updatePlanet();
	}
	async function updatePlanet(event) {
		
		var newPlanet = {
			"name" : planetNameInput.value
		}
		try {
			const response = await fetch(url+'/'+selectedId,
					{
						method: 'PUT',
						headers: {
							'Content-type': 'application/json',
							'Accept': 'application/json'
						},
						body: JSON.stringify(newPlanet) //   "{ 'name' : 'mart'}"
					}
			)
			
			const data = await response.json();
			if(response.ok) {
				//afegirFila(data.data)
				
				const nameid = document.getElementById('name'+data.data.id)
				const rowid = document.getElementById(data.data.id)
				nameid.innerHTML = data.data.name;
				rowid.setAttribute('name',data.data.name);
				planetNameInput.value = "";
				operation = "inserting";
			}
			else {
				showErrors(data.data)
			}
		} 
		catch(error) {
			errors.innerHTML = "S'ha produit un error inesperat"
			operation = "inserting";
		}
	}
	async function savePlanet(event) {
		
		var newPlanet = {
			"name" : planetNameInput.value
		}
		try {
			const response = await fetch(url,
					{
						method: 'POST',
						headers: {
							'Content-type': 'application/json',
							'Accept': 'application/json'
						},
						body: JSON.stringify(newPlanet) //   "{ 'name' : 'mart'}"
					}
			)
			
			const data = await response.json();
			if(response.ok) {
				afegirFila(data.data)
			}
			else {
				showErrors(data.data)
			}
		} 
		catch(error) {
			errors.innerHTML = "S'ha produit un error inesperat"
		}
	}
	function afegirFila(row) {
				const rowElement = document.createElement("tr");
				rowElement.setAttribute('id',row.id)
				rowElement.setAttribute('name',row.name)
				const idCell = document.createElement("td");
				idCell.textContent = row.id;
				const nameCell = document.createElement("td");
				
				nameCell.setAttribute('id',"name"+row.id);
				nameCell.textContent = row.name;
				const operationsCell =  document.createElement("td");
				const deleteButton = document.createElement("button");
				deleteButton.innerHTML = "Esborrar";
				deleteButton.addEventListener('click', deletePlanet);
				operationsCell.appendChild(deleteButton);
				const updateButton = document.createElement("button");
				updateButton.innerHTML = "Actualitzar";
				updateButton.addEventListener('click', function (event) { editPlanet(event, row) } );
				operationsCell.appendChild(updateButton);
				rowElement.appendChild(idCell);
				rowElement.appendChild(nameCell);
				rowElement.appendChild(operationsCell);
				taula.appendChild(rowElement);
				
	}
	async function deletePlanet(event) {
		
		try {
			const id = event.target.closest('tr').id;
			response = await fetch(url+'/'+id, { method: 'DELETE'})
			const json = await response.json();
			if(response.ok) { // codi 200, ....
					const row = document.getElementById(id)
					row.remove()
			}
			else {
				divErrors.style.display = "block"
				errors.innerHTML = "No es pot esborrar el planeta"
			}
		}
		catch(error) {
			
			divErrors.style.display = "block"
			errors.innerHTML = "No es pot esborrar el planeta"
		}
	}
	async function editPlanet(event, row) {
		
		operation = "editing";
		const tr = event.target.closest('tr');
		const nom = tr.getAttribute('name');
		selectedId = tr.getAttribute('id');
		planetNameInput.value = nom;
		console.log('editant....'+ selectedId + ' '+ nom)
		//console.log(rows)
		console.log(row)
	}
	
	async function loadIntoTable(url) {
		try {
		
			const response = await fetch(url);
			const json = await response.json();
			rows = json.data;
			
			var i =0
			for(const row of rows) {				
				afegirFila(row)
			}
		}
		catch(error) {
			errors.innerHTML = "No es pot accedir a la base de dades"
		}
	}
	loadIntoTable(url)
</script>
@endsection
