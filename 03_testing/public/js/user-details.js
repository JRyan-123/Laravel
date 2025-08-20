function injectData(user) {
	document.getElementById('modalUserName').textContent = user.name;
	document.getElementById('modalUserEmail').textContent = user.email;
	document.getElementById('modalUserPhone').textContent = user.phone;

	new bootstrap.Modal(document.getElementById('userModal')).show();
}

async function fetchUser(userID) {

	const response = await fetch(`/admin/view/${userID}`, {
		headers: { 'Accept' : 'application/json'}
	});
	const user = await response.json();

	injectData(user);
	
}

function initBtn() {
	const tbody = document.querySelector("tbody");
	tbody.addEventListener("click", (e) => {
		if (e.target.classList.contains('viewBtn')) {
			const userID = e.target.dataset.id;

			fetchUser(userID)
		}
	});
}

document.addEventListener('DOMContentLoaded', initBtn);
