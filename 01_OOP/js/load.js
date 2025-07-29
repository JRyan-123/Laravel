
let currentPage = 1;
let rowsPerPage = 3;
let employees = [];

export async function loadEmployees() {
	const response = await fetch("init.php?action=list");
	employees = await response.json();
	displayPage(currentPage, rowsPerPage, employees);
	const pageBtns = document.querySelector('.pagination');
	
	pagination(pageBtns, rowsPerPage, employees);
}

function displayPage(page, rows, data) {
	const tbody = document.querySelector("#employeeTable tbody");
	tbody.innerHTML = "";

	let start = (page - 1) * rows;
	let end = start + rows;
	let slicePage = data.slice(start , end)

	slicePage.forEach(emp => {
		const row = document.createElement("tr");
		

		["id","name","age","position"].forEach(key => {	
			const cell = document.createElement("td");
			cell.textContent = emp[key];
			row.appendChild(cell);
		})
		const actionCell = document.createElement("td");
		const btn = document.createElement("button");
		btn.textContent = "Delete";
		btn.className = "delete-btn";
		btn.dataset.id = emp["id"];
		actionCell.appendChild(btn);
		row.appendChild(actionCell);

		tbody.appendChild(row);
	}) 

}
function pagination(wrapper, rows, data) {
	wrapper.innerHTML = "";

	let dataCount = Math.ceil(data.length / rows);
	for (var i = 1; i <= dataCount; ++i) {
	   	const btn = paginationBtns(i);
	   	wrapper.appendChild(btn); 
	 } 
}
function paginationBtns(page) {
	const btn = document.createElement("button");
	btn.textContent = page;
	if (page === currentPage) {
		btn.classList.add("active");
	}
	btn.addEventListener("click", () => {
		currentPage = page;
		displayPage(currentPage, rowsPerPage, employees);

		const allBtn =  document.querySelectorAll(".pagination button");
		allBtn.forEach(eBtn => {
			eBtn.classList.remove("active");
		});
		btn.classList.add("active")
	})
	return btn;

}
