const login_button= document.querySelector('.login');
const register_button = document.querySelector('.register');
const login_form = document.querySelector('.login-form');
const register_form = document.querySelector('.register-form');
const option_choices = document.querySelectorAll('.choice');

option_choices.forEach(function (choice) {
    choice.addEventListener('click', () => {
        
        option_choices.forEach(function (choice) {
            choice.classList.remove('active');
        })
        choice.classList.add('active');
        })
})


login_button.addEventListener('click', () => {
    login_form.style.display = "flex";
    register_form.style.display = 'none';
})
register_button.addEventListener('click', () => {
    register_form.style.display = 'flex';
    login_form.style.display = 'none';
});