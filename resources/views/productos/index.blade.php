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
    const table = document.getElementById('taula');
    const divErrors = document.getElementById('errors');
    divErrors.style.display = "none"
    const planetNameInput = document.getElementById('planetNameInput')
    const saveButton = document.getElementById('saveButton')
    const url = 'http://localhost:8000/api/productos';

    saveButton.addEventListener('click', onSave)

    let operation = "inserting";
    let selectedId;
    let rows = [];

    async function loadIntoTable(url) {
        try {
            const response = await fetch(url);
            const json = await response.json();
            rows = json.data;

            for (const row of rows) {
                afegirFila(row);
            }
        } catch (error) {
            errors.innerHTML = "No es pot accedir a la base de dades"
        }
    }

    async function savePlanet() {
        const newPlanet = { "name": planetNameInput.value };
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(newPlanet)
            });
            const data = await response.json();
            if (response.ok) {
                afegirFila(data.data)
            } else {
                showErrors(data.data)
            }
        } catch (error) {
            errors.innerHTML = "S'ha produit un error inesperat"
        }
    }

    async function updatePlanet() {
        const newPlanet = { "name": planetNameInput.value };
        try {
            const response = await fetch(url + '/' + selectedId, {
                method: 'PUT',
                headers: { 'Content-type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(newPlanet)
            })
            const data = await response.json();
            if (response.ok) {
                const nameid = document.getElementById('name' + data.data.id);
                const rowid = document.getElementById(data.data.id);
                nameid.innerHTML = data.data.name;
                rowid.setAttribute('name', data.data.name);
                planetNameInput.value = "";
                operation = "inserting";
            } else {
                showErrors(data.data)
            }
        } catch (error) {
            errors.innerHTML = "S'ha produit un error inesperat"
            operation = "inserting";
        }
    }

    function afegirFila(row) {
        const rowElement = document.createElement("tr");
        rowElement.id = row.id;
        rowElement.name = row.name;
        const idCell = document.createElement("td");
        idCell.textContent = row.id;
        const nameCell = document.createElement("td");
        nameCell.id = "name" + row.id;
        name

@endsection
