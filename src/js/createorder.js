function showLink() {
  let dropdown = document.getElementById("dropdown-container");
  if (dropdown.style.display === "none") {
    dropdown.style.display = "block";
  } else {
    dropdown.style.display = "none";
  }
}

const addButtons = document.querySelectorAll(".add-order");
// console.log(addButtons);
let fruitData = [];
addButtons.forEach((button) => {
  button.addEventListener("click", (e) => {
    const row = e.target.closest("tr"); //find the closest tr
    const data = {
      name: row.cells[0].textContent,
      price: row.cells[1].textContent,
      quantity: (row.cells[3].textContent =
        document.querySelector("input").value),
    };
    fruitData = [...fruitData, data];
    console.log(fruitData);
    let table = document.querySelector(".created-order");
    let tbody = document.createElement("tbody");
    let tr = document.createElement("tr");
    fruitData.forEach((data) => {
      let total = parseFloat(data.price) * parseFloat(data.quantity);
      tr.innerHTML = `<tr>
                    <td>${data.name}</td>
                    <td>${data.price}</td>
                    <td>${data.quantity}</td>
                    <td>${total}</td>
                    <td><button class="remove-order text-xl text-red-500"><ion-icon name="close-outline"></ion-icon></button>
            </tr>`;
    });
    tbody.appendChild(tr);
    table.appendChild(tbody);
  });
});
