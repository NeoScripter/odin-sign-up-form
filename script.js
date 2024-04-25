const submitBtn = document.getElementById('submit_btn');
const webform = document.querySelector('form');
const logInBtn = document.getElementById('log_in');
hideExtraFields(logInBtn);

function hideExtraFields(button) {
    button.addEventListener('click', () => {
        const elementsToHide = document.querySelectorAll('.hidden');
        
        submitBtn.textContent = "Log In";
        webform.action = "includes/userdelete.inc.php";

        elementsToHide.forEach((element) => { 
            element.style.display = 'none';
        });
    });
}

const createBtn = document.getElementById('create');
openExtraFields(createBtn);

function openExtraFields(button) {
    button.addEventListener('click', () => {
        const elementsToHide = document.querySelectorAll('.hidden');

        submitBtn.textContent = "Create Account";
        webform.action = "includes/formhandler.inc.php";

        elementsToHide.forEach((element) => { 
            element.style.display = 'grid';
        });
    });
}