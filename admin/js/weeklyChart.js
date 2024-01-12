document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan elemen canvas
    const ctx = document.getElementById('lineChart').getContext('2d');

    // Mendapatkan tanggal-tanggal hari sebelumnya
    function getPastDates() {
        const dates = [];
        for (let i = 6; i >= 0; i--) {
            const date = new Date();
            date.setDate(date.getDate() - i);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            dates.push(`${year}-${month}-${day}`);
        }
        return dates;
    }

    $.ajax({
        url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getKonsumenById?id=' + userId,
        type: 'GET',
        success: async function (userRes) {            

            // Ambil data pengguna (userRes) untuk mendapatkan batas konsumsi glukosa
            $.ajax({
                url: 'https://us-east-1.aws.data.mongodb-api.com/app/application-0-yuxyg/endpoint/getAllKonsumsiByUser?id_konsumen=' + userId,
                type: 'GET',
                success: async function (konsumsiRes) {
                    // Mendapatkan tanggal-tanggal dan data konsumsi kafein dan glukosa
                    const pastDates = getPastDates();
                    const konsumsi7Days = pastDates.map(date => {
                        const dailyConsumptionKafein = konsumsiRes
                            .filter(konsumsi => konsumsi.waktu.startsWith(date))
                            .reduce((total, konsumsi) => total + konsumsi.kafein, 0);
    
                        const dailyConsumptionGlukosa = konsumsiRes
                            .filter(konsumsi => konsumsi.waktu.startsWith(date))
                            .reduce((total, konsumsi) => total + konsumsi.glukosa, 0);
    
                        return { date, kafein: dailyConsumptionKafein, glukosa: dailyConsumptionGlukosa };        
                    });   
                    
                    // Menghitung batas aman kafein dan glukosa            
                    const batasMaksimalKafein = userRes[0].batas_konsumsi_kafein;
                    const batasMaksimalGlukosa = userRes[0].batas_konsumsi_glukosa;
    
                    // Membuat line chart dengan empat garis (kafein, glukosa, batas kafein, batas glukosa)
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: pastDates,
                            datasets: [
                                {
                                    label: 'Kafein',
                                    borderColor: '#F2C029',
                                    data: konsumsi7Days.map(data => data.kafein),
                                    fill: false,
                                },
                                {
                                    label: 'Glukosa',
                                    borderColor: '#36A2EB',
                                    data: konsumsi7Days.map(data => data.glukosa),
                                    fill: false,
                                },
                                {
                                    label: 'Batas Aman Kafein',
                                    borderColor: '#33B850',
                                    borderDash: [5, 5],
                                    data: pastDates.map(() => batasMaksimalKafein),
                                    fill: false,
                                },
                                {
                                    label: 'Batas Aman Glukosa',
                                    borderColor: '#bf3148',
                                    borderDash: [5, 5],
                                    data: pastDates.map(() => batasMaksimalGlukosa),
                                    fill: false,
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio:false,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#3a3a3a'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function (context) {
                                            var label = context.dataset.label || '';
                    
                                            if (label) {
                                                label += ': ';
                                            }
                    
                                            label += context.parsed.y.toFixed(2); // Menampilkan dua angka di belakang koma
                    
                                            if (context.dataset.label === 'Kafein') {
                                                label += ' mg';
                                            } else if (context.dataset.label === 'Glukosa') {
                                                label += ' gram';
                                            } else if (context.dataset.label === 'Batas Aman Kafein') {
                                                label += ' mg';
                                            } else if (context.dataset.label === 'Batas Aman Glukosa') {
                                                label += ' gram';
                                            }
                    
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    grid: {
                                        color: '#3a3a3a', // Warna garis pada skala y
                                    },
                                    ticks: {
                                        color: '#3a3a3a', // Warna label pada skala y
                                    }
                                },
                                x: {
                                    grid: {
                                        color: '#3a3a3a', // Warna garis pada skala x
                                    },
                                    ticks: {
                                        color: '#3a3a3a', // Warna label pada skala x
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
