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

  document.addEventListener("DOMContentLoaded", function () {
    // Dapatkan elemen-elemen yang diperlukan
    const postTopicDiv = document.querySelector('.post-topic-responsive');
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

// Reset Input Search Bar
function resetInput() {
  document.getElementById('username').value = '';
}

document.addEventListener("DOMContentLoaded", function () {
  // Mendapatkan elemen jenis kelamin dan status kehamilan
  var jenisKelamin = document.getElementsByName('jenis_kelamin');
  var statusKehamilan = document.getElementById('status_kehamilan');
  
  // Menambahkan event listener untuk setiap elemen radio jenis kelamin
  for (var i = 0; i < jenisKelamin.length; i++) {
      jenisKelamin[i].addEventListener('change', function () {
          // Jika yang dipilih adalah wanita, tampilkan elemen status kehamilan
          if (this.value === 'Wanita') {
              statusKehamilan.style.display = 'block';
          } else {
              // Jika yang dipilih bukan wanita, sembunyikan elemen status kehamilan
              statusKehamilan.style.display = 'none';
          }
      });
  }
});

$(document).ready(function () {
    var cardInputs = $('.card-input');
    var infoLebihLanjut = $("#info-lebihlanjut");
  
    cardInputs.on('click', function () {
      // Hapus kelas 'selected' dari semua card-input
      cardInputs.removeClass('selected');
  
      // Tambahkan kelas 'selected' ke card yang diklik
      $(this).addClass('selected');
  
      // Ambil nilai nama dari data atribut 'data-nama-kopi'
      var namaKopi = $(this).data('nama-kopi');
      var encodedNamaKopi = encodeURIComponent(namaKopi);
  
      // Set nilai input hidden 'selected_coffee' pada formulir
      $('#selected_coffee').val(namaKopi);
  
      // Fetch coffee data by name
      $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKopiByNama?nama=' + encodedNamaKopi,
        type: 'GET',
        success: function (data) {
          // Logika yang akan dijalankan ketika permintaan berhasil
          console.log(data);
  
          // Memuat opsi dropdown 'penyajian' berdasarkan data kopi
          var penyajianOptions = [];
  
          $.each(data, function (index, item) {
            var penyajian = item.penyajian;
  
            if (penyajian && $.inArray(penyajian, penyajianOptions) === -1) {
              penyajianOptions.push(penyajian);
            }
          });
  
          fillPenyajianOptions(penyajianOptions);
  
          function fillPenyajianOptions(penyajianOptions) {
            var penyajianSelect = $('#penyajianSelect');
  
            penyajianSelect.find('option:gt(0)').remove();
  
            if (penyajianOptions.length === 0) {
              penyajianSelect.append($('<option>', {
                value: '',
                text: 'Silakan memilih menu kopi yang akan kamu minum terlebih dahulu',
                selected: true,
                disabled: true
              }));
            }
  
            $.each(penyajianOptions, function (index, option) {
              penyajianSelect.append($('<option>', {
                value: option,
                text: option
              }));
            });
          }
  
          // Tambahkan delay 2 detik sebelum melakukan scroll
          setTimeout(function () {
            // Lakukan scroll otomatis ke elemen div input
            infoLebihLanjut[0].scrollIntoView({ behavior: "smooth" });
          });
  
        },
        error: function (error) {
          // Logika yang akan dijalankan ketika ada kesalahan
          console.error('Error:', error);
        }
      });
    });
  });
  

