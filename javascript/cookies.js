let cookies = [];
const cart = {};

const cartBody = document.getElementById('cart_body');

function addCookieToCart(cookieId) {
    let cookieToAdd;

    for (const cookie of cookies) {
        if (cookie.id == cookieId) {
            cookieToAdd = cookie;
            break;
        }
    }

    if (cart[cookieToAdd.id] === undefined) {
        cart[cookieToAdd.id] = 1;
    }
    else {
        cart[cookieToAdd.id]++;
    }

    renderCart();
}

function removeFromCart(cookieId) {
    let cookieToRemove;

    for (const cookie of cookies) {
        if (cookie.id == cookieId) {
            cookieToRemove = cookie;
            break;
        }
    }

    if (cart[cookieToRemove.id] === 1) {
        delete cart[cookieToRemove.id];
    }
    else {
        cart[cookieToRemove.id]--;
    }

    renderCart();
}

function fetchCookies() {
    const url = 'http://localhost/cookies/routes/get/cookies';

    fetch(url)
        .then(response => response.json())
        .then(response => cookies = response);
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

function renderCart() {

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

fetchCookies();