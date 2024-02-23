const userName = document.getElementById('user_name');
const phone = document.getElementById('phone');
const address = document.getElementById('address');

function validateUserName() {
    var userNameError = document.getElementById("user-name-error");
    if (userName.value === "") {
        userNameError.textContent = "Vui lòng nhập tên người dùng";
        userName.style.borderColor = 'red';
        return false;
    } else {
        userNameError.textContent = ""; 
        userName.style.borderColor = "#ccc";
        return true;
    }
}

function validatePhone() {
    var phoneError = document.getElementById("phone-error");
    if (phone.value === "") {
        phoneError.textContent = "Vui lòng nhập số điện thoại";
        phone.style.borderColor = 'red';
        return false;
    } else if (phone.value.length < 9 ) {
        phoneError.textContent = "Số điện thoại phải đủ 9 số";
        phone.style.borderColor = 'red';
    } else {
        phoneError.textContent = ""; 
        phone.style.borderColor = "#ccc";
        return true;
    }
}

function validateAddress() {
    var addressError = document.getElementById("address-error");
    if (address.value === "") {
        addressError.textContent = "Vui lòng nhập địa chỉ đầy đủ";
        address.style.borderColor = 'red';
        return false;
    } else {
        addressError.textContent = ""; 
        address.style.borderColor = "#ccc";
        return true;
    }
}

function validateForm() {
    var isValid = true;

    var userNameValid = validateUserName();

    var phoneValid = validatePhone();

    var addressValid = validateAddress();

    isValid = userNameValid && phoneValid && addressValid;
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
document.getElementById("user_name").addEventListener('blur', validateUserName);
document.getElementById("phone").addEventListener('blur', validatePhone);
document.getElementById("address").addEventListener('blur', validateAddress);

// xóa thông báo lỗi khi người dùng thay đổi nội dung

userName.addEventListener('input', function () {
    document.getElementById("userName-error").textContent = "";
    userName.style.borderColor = '#ccc';
});
phone.addEventListener('input', function () {
    document.getElementById("phone-error").textContent = "";
    phone.style.borderColor = '#ccc';
});
address.addEventListener('input', function () {
    document.getElementById("address-error").textContent = "";
    address.style.borderColor = '#ccc';
});

