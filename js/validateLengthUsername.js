function validateUsername() {
    var usernameInput = document.getElementById("username");
    var usernameValue = usernameInput.value;

    // Mengecek panjang username
    if (usernameValue.length > 12) {
        alert("Panjang username tidak boleh lebih dari 12 karakter.");
        usernameInput.value = ""; // Mengosongkan nilai input
        return false;
    }

    return true;
}