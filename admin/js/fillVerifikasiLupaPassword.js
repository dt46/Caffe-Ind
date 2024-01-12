$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id'); 

    $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAdminById?id='+id,
        type: 'GET',
        success: function (res) {
            var data = res[0];
            $('#jawaban_lupa_password').val(data.jawaban_lupa_password);

            if (data.pertanyaan_lupa_password == 'Siapa nama ibu kamu?') 
                $('#ibu').prop('checked', true);
            else if (data.pertanyaan_lupa_password == 'Siapa nama Ayah kamu?')
                $('#ayah').prop('checked', true);
            else if (data.pertanyaan_lupa_password == 'Apa makanan favorit kamu?')
                $('#makanan').prop('checked', true);
            else if (data.pertanyaan_lupa_password == 'Siapa cinta pertamamu?')
                $('#cinta').prop('checked', true);
            
        },
        error: function (err) {
            console.log(err);
        }
    });
});