$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id'); 

    $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAdminById?id='+id,
        type: 'GET',
        success: function (res) {
            var data = res[0];
            $('#id').val(data._id);

            if (data.profile_picture == 'profile_picture_admin1.png')
                $('#profile_picture_admin1').prop('checked', true);
            else if (data.profile_picture == 'profile_picture_admin2.png')
                $('#profile_picture_admin2').prop('checked', true);

            $('#username').val(data.username);
            $('#nama').val(data.nama);
            $('#email').val(data.email);
            $('#nomor_hp').val(data.nomor_hp);
            $('#usia').val(data.usia);

            if (data.jenis_kelamin == 'Pria') {
                $('#pria').prop('checked', true);
            } else {
                $('#wanita').prop('checked', true);
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