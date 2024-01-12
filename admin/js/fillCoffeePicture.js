$(document).ready(function(){
    // Tangkap perubahan pada input dengan ID "foto"
    $('#foto').on('input', function(){
        // Ambil nilai dari input foto
        var inputFoto = $(this).val();
        
        // Ubah nilai src dari elemen dengan class "picture-kopi"
        $('.picture-kopi').attr('src', inputFoto);
    });
});
