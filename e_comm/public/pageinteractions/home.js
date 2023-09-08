const searchInput = document.getElementById('searchInput');
const productContainers = document.querySelectorAll('.product-container');
const alertsuccessdiv = document.getElementById('alert-success')

searchInput.addEventListener('input', function () {
    const searchTerm = searchInput.value.toLowerCase().trim();


    productContainers.forEach(container => {
        const products = container.querySelectorAll('.product');


        products.forEach(product => {
            const productName = product.querySelector('p').textContent.toLowerCase();


            if (productName.includes(searchTerm)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
});

function moveMeteors() {
    const meteors = document.querySelectorAll('.meteor');


    meteors.forEach((meteor, index) => {

        const randomPercentage = Math.random() * 40 + 10;



        meteor.style.left = `${randomPercentage}%`;
    });
}


moveMeteors();


setInterval(moveMeteors, 5000);





function moveMeteors2() {
    const meteors = document.querySelectorAll('.meteor2');

    meteors.forEach((meteor, index) => {

        const randomPercentage = Math.random() * 20 + 80;

        meteor.style.left = `${randomPercentage}%`;
    });
}


moveMeteors2();


setInterval(moveMeteors2, 3000);

function moveMeteors3() {
    const meteors = document.querySelectorAll('.meteor3');

    meteors.forEach((meteor, index) => {

        const randomPercentage = Math.random() * 30 + 50;


        meteor.style.left = `${randomPercentage}%`;
    });
}

moveMeteors3();


setInterval(moveMeteors3, 10000);




setTimeout(() => {
    alertsuccessdiv.style.display = 'none';
}, 5000);





