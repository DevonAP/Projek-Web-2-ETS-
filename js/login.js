const signInButton = document.getElementById('signInButton');
const signUpButton = document.getElementById('signUpButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signUp');

// Mendapatkan elemen input spesifik dari setiap form
const signInEmailInput = signInForm.querySelector('input[name="email"]');
const signInPasswordInput = signInForm.querySelector('input[name="password"]');
const signUpFullName = signUpForm.querySelector('input[name="fname"]');
const signUpEmailInput = signUpForm.querySelector('input[name="email"]');
const signUpPasswordInput = signUpForm.querySelector('input[name="password"]');
const signUpRePasswordInput = signUpForm.querySelector('input[name="rePassword"]');
const errorMessage = document.getElementById('errorMessage');

// Tombol untuk beralih antara Sign Up dan Sign In
signUpButton.addEventListener('click', function () {
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
    clearSignUpForm();
});

signInButton.addEventListener('click', function () {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
    clearSignInForm();
});

// Fungsi untuk mengosongkan form Sign Up
signUpForm.addEventListener('submit', function (event) {
    if (signUpPasswordInput.value !== signUpRePasswordInput.value) {
        event.preventDefault();
        errorMessage.style.display = 'block';
        errorMessage.textContent = 'Password dan Re-Enter Password tidak cocok!';
        signUpPasswordInput.value = '';
        signUpRePasswordInput.value = '';
    } else {
        errorMessage.style.display = 'none';
    }
});

function clearSignUpForm() {
    signUpFullName.value = '';
    signUpEmailInput.value = '';
    signUpPasswordInput.value = '';
    signUpRePasswordInput.value = '';
    if (errorMessage) errorMessage.textContent = '';
}

// Fungsi untuk mengosongkan form Sign In
function clearSignInForm() {
    signInEmailInput.value = '';
    signInPasswordInput.value = '';
}