$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id'); 

    $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenById?id='+id,
        type: 'GET',
        success: function (res) {
            var data = res[0];
            $('#id').val(data._id);

            if (data.profile_picture == 'profile_picture1.jpg')
                $('#tidprofile_picture1ak').prop('checked', true);
            else if (data.profile_picture == 'profile_picture2.jpg')
                $('#profile_picture2').prop('checked', true);
            else if (data.profile_picture == 'profile_picture3.jpg')
                $('#profile_picture3').prop('checked', true);
            else if (data.profile_picture == 'profile_picture4.jpg')
                $('#profile_picture4').prop('checked', true);
            else if (data.profile_picture == 'profile_picture5.jpg')
                $('#profile_picture5').prop('checked', true);
            else if (data.profile_picture == 'profile_picture6.jpg')
                $('#profile_picture6').prop('checked', true);
            else if (data.profile_picture == 'profile_picture7.jpg')
                $('#profile_picture7').prop('checked', true);
            else if (data.profile_picture == 'profile_picture8.jpg')
                $('#profile_picture8').prop('checked', true);
            else if (data.profile_picture == 'profile_picture9.jpg')
                $('#profile_picture9').prop('checked', true);
            else if (data.profile_picture == 'profile_picture10.jpg')
                $('#profile_picture10').prop('checked', true);
            else if (data.profile_picture == 'profile_picture11.jpg')
                $('#profile_picture11').prop('checked', true);
            else if (data.profile_picture == 'profile_picture12.jpg')
                $('#profile_picture12').prop('checked', true);
            else if (data.profile_picture == 'profile_picture13.jpg')
                $('#profile_picture13').prop('checked', true);
            else if (data.profile_picture == 'profile_picture14.jpg')
                $('#profile_picture14').prop('checked', true);
            else if (data.profile_picture == 'profile_picture15.jpg')
                $('#profile_picture15').prop('checked', true);

            $('#username').val(data.username);
            $('#nama').val(data.nama);
            $('#email').val(data.email);
            $('#nomor_hp').val(data.nomor_hp);
            $('#usia').val(data.usia);

            if (data.jenis_kelamin == 'Pria') {
                $('#pria').prop('checked', true);
                $('#status_kehamilan').hide();
            } else {
                $('#wanita').prop('checked', true);
                $('#status_kehamilan').show();
            }

            $('#tinggi_badan').val(data.tinggi_badan);
            $('#berat_badan').val(data.berat_badan);

            if (data.status_kehamilan == 'Tidak')
                $('#tidak').prop('checked', true);
            else
                $('#iya').prop('checked', true);
                        
            
            if (data.riwayat_penyakit && data.riwayat_penyakit.length > 0) {
                var riwayatPenyakit = data.riwayat_penyakit;
            
                // Loop melalui array riwayat_penyakit
                for (var i = 0; i < riwayatPenyakit.length; i++) {
                    var penyakitValue = riwayatPenyakit[i];
            
                    // Mencentang checkbox berdasarkan nilai penyakit
                    $('input[type="checkbox"][value="' + penyakitValue + '"]').prop('checked', true);
                }
            }
            
            
        },
        error: function (err) {
            console.log(err);
        }
    });

    // Hide the profile picture input initially
    $('.input-profilepicture').hide();

    // Show the profile picture input when the link is clicked
    $('.ganti-foto-profil').on('click', function() {
        $('.input-profilepicture').show();
    });
});