function validateForm() {
    // Validasi password
    var passwordInput = document.getElementById("password");
    var confirmPasswordInput = document.getElementById("verifikasiPassword");

    var passwordValue = passwordInput.value;
    var confirmPasswordValue = confirmPasswordInput.value;

    if (passwordValue.length !== 8) {
        alert("Password harus terdiri dari tepat 8 karakter.");
        passwordInput.value = "";
        confirmPasswordInput.value = "";
        return false;
    }

    if (passwordValue !== confirmPasswordValue) {
        alert("Password dan konfirmasi password tidak cocok.");
        passwordInput.value = "";
        confirmPasswordInput.value = "";
        return false;
    }

    return true;
}