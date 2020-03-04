let cookies = [];
let cart = {};

const cartBody = document.getElementById('cart_body');

// Load Cookies
fetchCookies().then(response => cookies = response);

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

    renderCart(cart);
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

    renderCart(cart);
}

async function checkout() {
    try {
        await postSale();
    }
    catch(error) {
        renderError(error.message);
        return;
    }

    renderError();

    cart = {};
    renderCart(cart);

    const salesRows = await fetchSalesRows();

    renderSalesRows(salesRows);
}