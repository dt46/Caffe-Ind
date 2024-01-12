function validateForm() {
    // Validasi username
    var usernameInput = document.getElementById("username");
    var usernameValue = usernameInput.value;

    if (!/^[a-z\s]+$/.test(usernameValue) || usernameValue.length > 12) {
        alert("Username yang kamu masukkan tidak sesuai. Pastikan username tidak lebih dari 12 karakter dan username tidak boleh mengandung spasi dan huruf kapital.");
        usernameInput.value = "";
        return false;
    }

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