$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');

    // Modify the function to accept id as a parameter
    function getNamaKopi(id) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKopiById?id=' + id,
                type: 'GET',
                success: function (res) {
                    var kopi = res[0];
                    resolve(kopi.nama);
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    }

    function getPenyajianKopi(id) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKopiById?id=' + id,
                type: 'GET',
                success: function (res) {
                    var kopi = res[0];
                    resolve(kopi.penyajian);
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    }

    $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumsiById?id=' + id,
        type: 'GET',
        success: async function (res) {
            var data = res[0];
            $('#id').val(data._id);
            $('#quantity').val(data.quantity);


            // Use await to wait for the promise to resolve
            var penyajianValue = await getPenyajianKopi(data.id_kopi);

            // Set the value for the select element
            $('#penyajian select').val(penyajianValue);
            $('#sugar select').val(data.sugar);

            if (data.bahan_tambahan && data.bahan_tambahan.length > 0) {
                var bahanTambahan = data.bahan_tambahan;

                for (var i = 0; i < bahanTambahan.length; i++) {
                    var bahanValue = bahanTambahan[i];
                    $('input[type="checkbox"][value="' + bahanValue + '"]').prop('checked', true);
                }
            }

            var namaKopiValue = await getNamaKopi(data.id_kopi);

            // Add class to the selected card based on id_kopi
            $('.card-input[data-nama-kopi="' + namaKopiValue + '"]').addClass('selected');

            // Set the value for the selected_coffee input
            $('#selected_coffee').val(namaKopiValue);
        },
        error: function (err) {
            console.log(err);
        }
    });
});
