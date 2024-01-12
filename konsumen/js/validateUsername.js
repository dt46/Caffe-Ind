function validateForm() {
    // Validasi username
    var usernameInput = document.getElementById("username");
    var usernameValue = usernameInput.value;

    if (!/^[a-z\s]+$/.test(usernameValue) || usernameValue.length > 12) {
        alert("Username yang kamu masukkan tidak sesuai. Pastikan username tidak lebih dari 12 karakter dan username tidak boleh mengandung spasi dan huruf kapital.");
        usernameInput.value = "";
        return false;
    }    

    return true;
}