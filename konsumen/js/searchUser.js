function searchKonsumen() {
    // Dapatkan nilai input dari search bar
    var input = document.getElementById("username").value.toLowerCase();

    // Dapatkan semua elemen konsumen
    var konsumenElements = document.getElementsByClassName("user");

    // Loop melalui setiap elemen konsumen
    for (var i = 0; i < konsumenElements.length; i++) {
        var username = konsumenElements[i].getElementsByClassName("username")[0].innerText;
        
        // Periksa apakah nama pengguna mengandung nilai input
        if (username.includes(input)) {
            konsumenElements[i].style.display = "";
        } else {
            konsumenElements[i].style.display = "none";
        }
    }
}

// Reset Input Search Bar User
function resetInput() {
    // Reset input pada search bar
    document.getElementById("username").value = "";

    // Tampilkan kembali semua elemen konsumen
    var konsumenElements = document.getElementsByClassName("user");
    for (var i = 0; i < konsumenElements.length; i++) {
        konsumenElements[i].style.display = "";
    }
  }
