const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleButton');
const toggleButtonclose = document.getElementById('toggleButtonclose');
const addProduct = document.getElementById('addProduct');
const addCategory = document.getElementById('addCategory');
const addcategoryform = document.getElementById('addcategoryform')
const addproductform = document.getElementById('addproductform')
const stathead = document.getElementById('stathead')
const statdash = document.getElementById('statdash')
const alertdiv = document.getElementsByClassName('alert-danger')
const alertsuccessdiv = document.getElementById('alert-success')


toggleButton.addEventListener('click', () => {
    sidebar.classList.add('show');
    sidebar.classList.remove('hide');
    alertdiv[0].style.display = 'none';
    alertsuccessdiv.style.display = 'none';
});

toggleButtonclose.addEventListener('click', () => {
    sidebar.classList.remove('show');
    sidebar.classList.add('hide');
});

addCategory.addEventListener('click', () => {
    addcategoryform.style.display = 'block'
    addproductform.style.display = 'none'
    statdash.style.display = 'none'
    stathead.style.display = 'none'
});

addProduct.addEventListener('click', () => {
    addcategoryform.style.display = 'none'
    addproductform.style.display = 'block'
    statdash.style.display = 'none'
    stathead.style.display = 'none'
});

setTimeout(() => {
    alertsuccessdiv.style.display = 'none';
}, 5000);
