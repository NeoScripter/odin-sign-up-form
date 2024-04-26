const logInBtn = document.getElementById('log_in');
const createBtn = document.getElementById('create');

logInBtn.addEventListener('click', () => {
    window.location.href = "log_in.php";
});

createBtn.addEventListener('click', () => {
    window.location.href = "index.php";
});