async function fetchCookies() {
    const url = 'http://localhost/cookies/routes/get/cookies';

    const response = await fetch(url);
    return response.json();
}

async function fetchSalesRows() {
    const url = 'http://localhost/cookies/routes/get/sale_rows';

    return (await fetch(url)).text();
}

async function postSale() {
    const url = 'http://localhost/cookies/routes/post/checkout';
    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;

    if (firstName === '' || lastName === '') {
        throw new Error('Please provide first and last name.');
    }

    const request = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            firstName,
            lastName,
            cart,
        }),
    }

    return fetch(url, request);
}