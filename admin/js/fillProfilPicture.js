$(document).ready(function(){
    // Tangkap perubahan pada radio button dengan nama "profile_picture"
    $('input[name="profile_picture"]').change(function(){
        // Ambil nilai dari radio button yang dipilih
        var selectedValue = $('input[name="profile_picture"]:checked').val();
        
        // Ubah nilai src dari elemen dengan class "profile-picture-display"
        $('.profile-picture-display').attr('src', 'assets/' + selectedValue);
    });
});