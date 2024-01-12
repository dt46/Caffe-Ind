document.addEventListener('DOMContentLoaded', function () {
  const ctx = document.getElementById('chartKafein').getContext('2d');

  // Fungsi untuk mendapatkan tanggal hari ini dalam format 'YYYY-MM-DD'
  function getTodayDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  }

  // Mengambil informasi pengguna termasuk bidang 'batas_konsumsi_kafein'
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

          // Menghitung total kafein dari respons
          const totalKafein = konsumsiToday.reduce((total, konsumsi) => total + konsumsi.kafein, 0);

          // Menghitung batas aman kafein sebagai hasil pengurangan dari batas maksimal
          const batasMaksimalKafein = userRes[0].batas_konsumsi_kafein;
          const batasAmanKopi = Math.max(batasMaksimalKafein - totalKafein, 0);

          new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: [`Konsumsi Kafeinmu (${totalKafein} mg)`, `Sisa Kafein Untuk Konsumsimu (${batasAmanKopi} mg)`],
              datasets: [{
                label: 'Laporan konsumsimu hari ini',
                data: [totalKafein, batasAmanKopi],
                backgroundColor: ['#F2C029', '#33B850'], 
                borderWidth: 1
              }]
            },
            options: {
              responsive:true,
              plugins: {
                legend: {
                  labels: {
                    color: 'white'
                  }
                },
                
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
