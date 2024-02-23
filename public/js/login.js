const eye = document.querySelector('.eye');
const psw = document.querySelector('#psw');
eye.addEventListener('click', () => {
    if (psw.type == 'password') {
        psw.type = 'text';
        eye.className = 'fa-solid fa-eye';
    }else if (psw.type == 'text') {
        psw.type = 'password';
        eye.className = 'fa-solid fa-eye-slash eye-2';
    }
})

const email = document.getElementById('email');
const password = document.getElementById('psw');

function validateEmail() {
    var emailError = document.getElementById("email-error");
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value === "") {
        emailError.textContent = "Vui lòng nhập địa chỉ email";
        email.style.borderColor = 'red';
        return false;
    } else if (!regex.test(email.value)) {
        emailError.textContent = "Vui lòng nhập đúng định dạng email";
        email.style.borderColor = 'red';
        return false;
    } else {
        emailError.textContent = ""; 
        email.style.borderColor = "var(--grey-color)";
        return true;
    }
}

function validatePassword() {
    var passwordError = document.getElementById("psw-error");
    if (password.value === "") {
        passwordError.textContent = "Vui lòng nhập mật khẩu";
        password.style.borderColor = 'red';
        return false;
    }
     else {
        passwordError.textContent = ""; 
        password.style.borderColor = "var(--grey-color)";
        return true;
    }
}

function validateForm() {
    var isValid = true;
    // Kiểm tra hợp lệ của email
    var emailValid = validateEmail();


    // Kiểm tra hợp lệ của mật khẩu
    var passwordValid = validatePassword();

    isValid = emailValid && passwordValid;
    if (isValid) {
        return true;
    }else {
        return false;
    }

}

document.getElementById("registration-form").addEventListener('submit', function(event) {
    var isValid = validateForm();
    if (!isValid) {
        event.preventDefault();
    }
});

// kiểm tra hợp lệ khi người dùng rời khỏi trường nhập liệu
document.getElementById("email").addEventListener('blur', validateEmail);
document.getElementById("psw").addEventListener('blur', validatePassword);

// xóa thông báo lỗi khi người dùng thay đổi nội dung

email.addEventListener('input', function () {
    document.getElementById("email-error").textContent = "";
    email.style.borderColor = '#ccc';
});
password.addEventListener('input', function () {
    document.getElementById("psw-error").textContent = "";
    password.style.borderColor = '#ccc';
});
