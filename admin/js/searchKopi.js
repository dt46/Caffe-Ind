function searchKopi() {
    // Dapatkan nilai input dari search bar
    var input = document.getElementById("kopi").value.toLowerCase();

    // Dapatkan semua elemen kopi
    var coffeeElements = document.getElementsByClassName("coffee");

    // Loop melalui setiap elemen konsumen
    for (var i = 0; i < coffeeElements.length; i++) {
        var coffee = coffeeElements[i].getElementsByClassName("coffee-name")[0].innerText.toLowerCase();
        
        // Periksa apakah nama kopi mengandung nilai input
        if (coffee.includes(input)) {
            coffeeElements[i].style.display = "";
        } else {
            coffeeElements[i].style.display = "none";
        }
    }
}

// Reset Input Search Bar User
function resetInput() {
    // Reset input pada search bar
    document.getElementById("kopi").value = "";

    // Tampilkan kembali semua elemen kopi
    var coffeeElements = document.getElementsByClassName("coffee");
    for (var i = 0; i < coffeeElements.length; i++) {
        coffeeElements[i].style.display = "";
    }
  }
