function renderCart(cart) {

    if (Object.keys(cart).length) {
        document.getElementById('cart').hidden = false;
    }
    else {
        document.getElementById('cart').hidden = true;
    }

    // clear cart table
    while (cartBody.lastChild) {
        cartBody.removeChild(cartBody.lastChild);
    }

    for (const id in cart) {
        let cookieInCart;
        const count = cart[id];

        for (const cookie of cookies) {
            if (cookie.id == id) {
                cookieInCart = cookie;
                break;
            }
        }

        const row = document.createElement('tr');
        const nameCell = document.createElement('td');
        const priceCell = document.createElement('td');
        const quantityCell = document.createElement('td');
        const buttonCell = document.createElement('td');

        const removeCookieButton = document.createElement('button');
        removeCookieButton.className = "btn btn-danger";
        removeCookieButton.innerHTML = "Remove";
        removeCookieButton.addEventListener('click', () => removeFromCart(cookieInCart.id));

        nameCell.innerHTML = cookieInCart.name;
        priceCell.innerHTML = cookieInCart.price;
        quantityCell.innerHTML = String(count);
        buttonCell.appendChild(removeCookieButton);

        row.appendChild(nameCell);
        row.appendChild(priceCell);
        row.appendChild(quantityCell);
        row.appendChild(buttonCell);

        cartBody.appendChild(row);

        document.getElementById('total').innerHTML = 'Your total is $' + calculateTotal();
    }
}

function renderSalesRows(salesRows) {

    const salesBody = document.getElementById('sales_body');
    // clear sales table body
    while (salesBody.lastChild) {
        salesBody.removeChild(salesBody.lastChild);
    }

    salesBody.innerHTML = salesRows;

}

function renderError(errorMessage) {
    const errorAlert = document.getElementById('error');

    if (errorMessage) {
        errorAlert.innerHTML = errorMessage;
        errorAlert.hidden = false;
    }
    else {
        errorAlert.hidden = true;
    }

}

function calculateTotal() {
    let total = 0.0;

    for (const id in cart) {
        let cookieInCart;
        const count = cart[id];

        for (const cookie of cookies) {
            if (cookie.id == id) {
                cookieInCart = cookie;
                break;
            }
        }

        total += Number(cookieInCart.price) * count;
    }

    return total.toFixed(2);
}