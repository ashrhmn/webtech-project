<table border="1" id="orders">
    <thead>
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Phone</th>
            <th>Bill Amount</th>
            <th>Paid Amount</th>
            <th>Due Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>


<script>
    $(document).ready(() => {

        const deleteOrder = (id) => {
            var xmlhttp = new XMLHttpRequest();
            var url = "/app/controllers/employee/deleteOrder.php?id=" + id;
            xmlhttp.open("GET", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/json");
            xmlhttp.send();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    switch (this.responseText) {
                        case 'success':
                            fetchData()
                            break;
                        case 'error':
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        const updateTable = (data) => {

            console.log(data);


            $('#orders tbody tr').remove()

            let table = document.getElementById('orders').getElementsByTagName('tbody')[0];

            console.log(table);

            for (let order of data) {
                let row = table.insertRow()
                for (let property in order) {
                    let cell = row.insertCell();
                    cell.innerHTML = order[property]
                }
                let actionCell = row.insertCell()
                // actionCell.innerHTML = `
                // 		<button onClick="deleteOrder(${order.id})">
                // 			<svg style="width:24px;" xmlns="http://www.w3.org/2000/svg" class="actionSvg delBtn" viewBox="0 0 20 20" fill="currentColor">
                // 				<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                // 			</svg>
                // 		</button>
                //         `;
                actionCell.innerHTML = `<div style="width:24px;">
						<a href="/app/controllers/employee/deleteOrder.php?id=${order.id}">
							<svg xmlns="http://www.w3.org/2000/svg" class="actionSvg delBtn" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
							</svg>
						</a>
					</div>`


            }
        }


        const fetchData = () => {
            var xmlhttp = new XMLHttpRequest();
            var url = "/app/controllers/employee/orderList.php";
            xmlhttp.open("GET", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/json");
            xmlhttp.send();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    updateTable(JSON.parse(this.responseText))
                }
            }
        }

        fetchData()
    })
</script>