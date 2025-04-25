const form = document.getElementById("productForm");
const productList = document.getElementById("productList");

let products = JSON.parse(localStorage.getItem("products")) || [];

function saveProducts() {
  localStorage.setItem("products", JSON.stringify(products));
}

function renderProducts() {
  productList.innerHTML = "";
  products.forEach((product, index) => {
    const div = document.createElement("div");
    div.className = "product";

    div.innerHTML = `
      <img src="${product.image}" alt="${product.name}" />
      <div class="info">
        <h3>${product.name} (${product.type})</h3>
        <p>Price: $${product.price}</p>
        <p class="${product.sold ? "sold" : ""}">
          ${product.sold ? "Sold Out" : "Available"}
        </p>
        ${!product.sold ? `<button onclick="markSold(${index})">Mark as Sold</button>` : ""}
      </div>
    `;

    productList.appendChild(div);
  });
}

function markSold(index) {
  products[index].sold = true;
  saveProducts();
  renderProducts();
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const name = document.getElementById("productName").value;
  const type = document.getElementById("productType").value;
  const price = document.getElementById("productPrice").value;
  const image = document.getElementById("productImage").value;

  products.push({
    name,
    type,
    price,
    image,
    sold: false,
  });

  saveProducts();
  renderProducts();
  form.reset();
});

renderProducts();
//hi
