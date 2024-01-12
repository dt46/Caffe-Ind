window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar'); // Change to the appropriate selector
    var links = navbar.getElementsByTagName('a');
    var scrolled = window.pageYOffset || document.documentElement.scrollTop;

    if (scrolled > 300) {
        navbar.classList.add('navbar-scrolled');
        for (var i = 0; i < links.length; i++) {
            links[i].classList.add('link-scrolled');
        }
    } else {
        navbar.classList.remove('navbar-scrolled');
        for (var i = 0; i < links.length; i++) {
            links[i].classList.remove('link-scrolled');
        }
    }
});


document.addEventListener("DOMContentLoaded", function () {
    // Temukan tombol "Get Started" dengan ID "get-started-button"
    const getStartedButton = document.querySelector("#get-started-button");

    // Temukan elemen div input dengan ID "input-section"
    const inputSection = document.querySelector("#input-section");

    // Tambahkan event listener untuk tombol "Get Started"
    getStartedButton.addEventListener("click", function (e) {
        e.preventDefault();
        
        // Lakukan scroll otomatis ke elemen div input
        inputSection.scrollIntoView({ behavior: "smooth" });
    });
});

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("Topik").style.display = "block";
    document.getElementById("Balasan").style.display = "none";
    document.getElementsByClassName("tablinks")[0].classList.add("active");
});

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
};

document.addEventListener("DOMContentLoaded", function () {
    // Dapatkan elemen-elemen yang diperlukan
    const postTopicDiv = document.querySelector('.post-topic');
    const inputFieldTopic = document.querySelector('.inputField-topic');
    const closeButton = document.querySelector('.button-close');
  
    // Sembunyikan Input Field Topic saat halaman dimuat
    inputFieldTopic.style.display = 'none';
  
    // Tambahkan event listener ke div "Post Topic" untuk menampilkan Input Field Topic
    postTopicDiv.addEventListener('click', function (event) {
      event.preventDefault();
      inputFieldTopic.style.display = 'flex';
    });
  
    // Tambahkan event listener ke tombol Close untuk menyembunyikan Input Field Topic
    closeButton.addEventListener('click', function () {
      inputFieldTopic.style.display = 'none';
  });
});

// Reset Input Search Bar Kopi
function resetInput() {
  document.getElementById('kopi').value = '';
}

// Input Takaran Bahan Tambahan
function toggleInput(checkboxId) {
  var checkbox = document.getElementById(checkboxId);
  var inputId = "takaran" + checkboxId.charAt(0).toUpperCase() + checkboxId.slice(1);
  var input = document.getElementById(inputId);

  if (checkbox.checked) {
      input.style.display = "block";
  } else {
      input.style.display = "none";
  }
}
