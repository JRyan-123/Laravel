import { loadEmployees } from './load.js'
export function deleteEmployee() {
	
	const tableForm = document.querySelector('#employeeTable');
	
	
	tableForm.addEventListener("click", async (e) => {
		if (e.target.tagName === "BUTTON" && e.target.classList.contains('delete-btn')) {
			const id = e.target.dataset.id;
			console.log(id);
			const response = await fetch('init.php?action=delete&id='+id)
			const result = await response.json();
			if (result) {
				alert("deleted succesfully!");
				loadEmployees();
			}

		}
	});
}