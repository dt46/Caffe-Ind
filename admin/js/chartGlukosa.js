document.addEventListener('DOMContentLoaded', function () {
  const ctx = document.getElementById('chartGlukosa').getContext('2d');

  // Fungsi untuk mendapatkan tanggal hari ini dalam format 'YYYY-MM-DD'
  function getTodayDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  }

  // Mengambil informasi pengguna termasuk bidang 'batas_konsumsi_glukosa'
  $.ajax({
    url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenById?id=' + userId,
    type: 'GET',
    success: async function (userRes) {
      // Mengambil data konsumsi untuk hari ini
      const todayDate = getTodayDate();
      $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllKonsumsiByUser?id_konsumen=' + userId,
        type: 'GET',
        success: async function (konsumsiRes) {
          // Memfilter data konsumsi untuk hari ini
          const konsumsiToday = konsumsiRes.filter(konsumsi => konsumsi.waktu.startsWith(todayDate));

          // Menghitung total glukosa dari respons
          const totalGlukosa = konsumsiToday.reduce((total, konsumsi) => total + konsumsi.glukosa, 0);

          // Menghitung batas aman glukosa sebagai hasil pengurangan dari batas maksimal
          const batasMaksimalGlukosa = userRes[0].batas_konsumsi_glukosa;
          const batasAmanGula = Math.max(batasMaksimalGlukosa - totalGlukosa, 0);
          
          new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: [`Konsumsi Glukosa (${totalGlukosa} gram)`, `Sisa Glukosa Untuk Konsumsi (${batasAmanGula} gram)`],
              datasets: [{
                label: 'Laporan konsumsi hari ini',
                data: [totalGlukosa, batasAmanGula],
                backgroundColor: ['#36A2EB', '#33B850'],
                borderWidth: 1
              }]
            },
            options: {
              plugins: {
                legend: {
                  labels: {
                    color: '#3a3a3a'
                  }
                }
              }
            }
          });
        },
        error: function (err) {
          console.log(err);
        }
      });
    },
    error: function (err) {
      console.log(err);
    }
  });
});
