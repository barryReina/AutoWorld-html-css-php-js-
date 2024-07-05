
//pagination
document.addEventListener("DOMContentLoaded", function() {
    const itemsPerPage = 16; 
    const items = document.querySelectorAll('.item-model');
    const modelContainer = document.getElementById('model-container');
    const paginationContainer = document.getElementById('pagination-container');
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    function displayItems(page, searchValue = '') {
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        items.forEach((item, index) => {
            const title = item.querySelector('h3').textContent.toLowerCase();
            if ((searchValue === '' || title.includes(searchValue)) && index >= startIndex && index < endIndex) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function setupPagination() {
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        paginationContainer.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.addEventListener('click', function() {
                currentPage = i;
                displayItems(currentPage, searchInput.value.toLowerCase());
                updatePagination();
            });
            paginationContainer.appendChild(button);
        }
        
    }

    function updatePagination() {
        const buttons = paginationContainer.querySelectorAll('button');
        buttons.forEach((button, index) => {
            if (index + 1 === currentPage) {
                button.classList.add('active');
            } else {
                button.classList.remove('active');
            }
        });
    }

    function performSearch() {
        const searchValue = searchInput.value.trim().toLowerCase();
        filteredItems = Array.from(items).filter(item => {
            const title = item.querySelector('h3').textContent.toLowerCase();
            return title.includes(searchValue);
        });
        currentPage = 1;
        displayItems(currentPage, searchValue);
        setupPagination();
    }

    searchButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission
        performSearch();
    });

    searchInput.addEventListener('input', function() {
        performSearch();
    });

    // Additionally, perform search when the user hits Enter
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent form submission
            performSearch();
        }
    });

    let currentPage = 1;
    let filteredItems = Array.from(items);
    displayItems(currentPage);
    setupPagination();
});


//Validation du formulaire d'inscription
function validateForm(event) {
    event.preventDefault();
    
    var nom = document.getElementById('nom').value.trim();
    var prenom = document.getElementById('prenom').value.trim();
    var email = document.getElementById('email1').value.trim();
    var telephone = document.getElementById('telephone').value.trim();
    var password = document.getElementById('password1').value.trim();
    var confirmPassword = document.getElementById('confirm-password').value.trim();
    var birthdate = new Date(document.getElementById('birthdate').value);
    var genderMale = document.getElementById('gender-male');
    var genderFemale = document.getElementById('gender-female');
    
    var hasError = false;
    
    var errorMessageContainer = document.createElement('div');
    errorMessageContainer.classList.add('error-message');
    
    
    errorMessageContainer.innerHTML = "";
    
    if (password !== confirmPassword || password === "" || confirmPassword === "") {
        hasError = true;
        errorMessageContainer.innerHTML += "<p>Les mots de passe ne correspondent pas ou sont vides.</p>";
    }
    
    var today = new Date();
    today.setHours(0, 0, 0, 0); 
    if (birthdate >= today) {
        hasError = true;
        errorMessageContainer.innerHTML += "<p>La date de naissance doit être dans le passé.</p>";
    }
    
    if (!genderMale.checked && !genderFemale.checked) {
        hasError = true;
        errorMessageContainer.innerHTML += "<p>Veuillez sélectionner le sexe.</p>";
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailRegex.test(email)) {
        hasError = true;
        errorMessageContainer.innerHTML += "<p>Veuillez saisir une adresse email valide.</p>";
    }
    
    if (!password || password.length < 6) {
        hasError = true;
        errorMessageContainer.innerHTML += "<p>Le mot de passe doit contenir au moins 6 caractères.</p>";
    }
    
    var form = document.getElementById('registration-form');
    var oldErrorMessageContainer = document.querySelector('.error-message');
    if (oldErrorMessageContainer) {
        form.removeChild(oldErrorMessageContainer); 
    }
    form.appendChild(errorMessageContainer);
    
    if (!hasError) {
        setTimeout(function() {
            form.submit();
        }, 3000);
    } else {
        setTimeout(function() {
            errorMessageContainer.innerHTML = ""; 
        }, 5000);
    }
}

var form = document.getElementById('registration-form');
form.addEventListener('submit', validateForm);


//pop-up pour le login main

