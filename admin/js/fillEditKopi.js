$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id'); 

    $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKopiById?id='+id,
        type: 'GET',
        success: function (res) {
            var data = res[0];
            $('#id').val(data._id);
            $('.picture-kopi').attr('src', data.foto);
            $('#foto').val(data.foto);
            $('#nama').val(data.nama);
            $('#deskripsi').val(data.deskripsi);

            if (data.biji_kopi == 'Robusta')
                $('#robusta').prop('checked', true);
            else if (data.biji_kopi == 'Arabica')
                $('#arabica').prop('checked', true);
            else
                $('#house_blend').prop('checked', true);

            if (data.penyeduhan_kopi == 'Espresso')
                $('#espresso').prop('checked', true);
            else
                $('#brew').prop('checked', true);

            $('#kopi').val(data.kopi);
            $('#less_sugar').val(data.less_sugar);
            $('#normal_sugar').val(data.normal_sugar);
            $('#extra_sugar').val(data.extra_sugar);

            if (data.bahan_tambahan) {
                if (data.bahan_tambahan.cokelat !== '-') {
                    $('#cokelat').prop('checked', true);
                    $('#takaranCokelat').css('display', 'block');
                }
                if (data.bahan_tambahan.matcha !== '-') {
                    $('#matcha').prop('checked', true);
                    $('#takaranMatcha').css('display', 'block');
                }
                if (data.bahan_tambahan.ice_cream !== '-') {
                    $('#icecream').prop('checked', true);
                    $('#takaranIcecream').css('display', 'block');
                }
            }

            $('#takaranCokelat').val((data.bahan_tambahan ? data.bahan_tambahan.cokelat : '-'));
            $('#takaranMatcha').val((data.bahan_tambahan ? data.bahan_tambahan.matcha : '-'));
            $('#takaranIcecream').val((data.bahan_tambahan ? data.bahan_tambahan.ice_cream : '-'));
        },
        error: function (err) {
            console.log(err);
        }
    });
});