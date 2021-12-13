<style>
	table {
		border-collapse: collapse;

	}

	td,
	th {
		padding: 8px 5px;
	}

	tr:nth-of-type(even) {
		background-color: #d0d0d0;
	}

	.oddRow {
		background-color: #fff;
	}

	.evenRow {
		background-color: #d0d0d0;
	}

	.actionSvg {
		width: 24px;
		color: black;
	}

	.editBtn:hover {
		color: #16798f;
		transition: all linear 0.25s;
	}

	.delBtn:hover {
		color: #b81d33;
		transition: all linear 0.25s;
	}

	td>a:visited {
		color: #fff;
		text-decoration: none;
	}
</style>
<div>
	<div>
		<input type="text" name="filter">
		<button id="clear">Clear Filter</button>
	</div>
	<table id="usersTable">
		<thead>
			<tr>
				<!-- <th><span class="text">ID</span></th>
				<th><span class="text">Username</span></th>
				<th><span class="text">Email</span></th>
				<th><span class="text">Name</span></th>
				<th><span class="text">Role</span></th>
				<th><span class="text">Address</span></th>
				<th><span class="text">Gender</span></th>
				<th><span class="text">Date Of Birth</span></th>
				<th><span class="text">Phone</span></th>
				<th><span class="text">Action</span></th> -->
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Name</th>
				<th>Role</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Date Of Birth</th>
				<th>Phone</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script>
	$(document).ready(() => {

		const updateTable = (data) => {
			console.log(data);


			$('#usersTable tbody tr').remove()

			let table = document.getElementById('usersTable').getElementsByTagName('tbody')[0];

			console.log(table);

			for (let user of data) {
				let row = table.insertRow()
				for (let property in user) {
					let cell = row.insertCell();
					cell.innerHTML = user[property]
				}
				let actionCell = row.insertCell()
				actionCell.innerHTML = `<div style="display: flex;">
						<a href="roles/admin/manageUsers/editUser.php?id=${user.id}">
							<svg xmlns="http://www.w3.org/2000/svg" class="actionSvg editBtn" viewBox="0 0 20 20" fill="currentColor">
								<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
								<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
							</svg>
						</a>
						<a href="/app/controllers/admin/deleteUser.php?id=${user.id}">
							<svg xmlns="http://www.w3.org/2000/svg" class="actionSvg delBtn" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
							</svg>
						</a>
					</div>`
			}
		}

		const fetchData = () => {
			let filter = $('input[name="filter"]').val()
			console.log(filter);
			var xmlhttp = new XMLHttpRequest();
			var url = "/app/controllers/admin/getAllUsers.php?filter=" + filter;
			xmlhttp.open("GET", url, true);
			xmlhttp.setRequestHeader("Content-type", "application/json");
			xmlhttp.send();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					updateTable(JSON.parse(this.responseText))
				}
			}
		}

		$('input[name="filter"]').on('keyup', fetchData)

		$('#clear').on('click', () => {
			$('input[name="filter"]').val('');
			fetchData()
		})

		fetchData()
	})
</script>