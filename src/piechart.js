function getchart() {

    $.getJSON("data.json", function (json) {

        for (let i = 0; i < json.length; i++) {
            const ctx = document.getElementById(json[i].title).getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Fat', 'Saturates', 'Carbs', 'Sugars', 'Fibre', 'Protein', 'salt'],
                    datasets: [{
                        data: [json[i].fat, json[i].saturates, json[i].carbs, json[i].sugars, json[i].fibre, json[i].protein, json[i].salt],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(200, 159, 64, 0.2)'

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(200, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {


                }
            });
        }
        
    });
   
    $.getJSON("data1.json", function (json) {
        if(json.length>1){
        fetch("./data1.json")
        .then(response => {
           return response.json();
        })
        .then(data => console.log(data));

        const ctx1 = document.getElementById('barchart').getContext('2d');
       const myChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['kcal','Fat', 'Saturates', 'Carbs', 'Sugars', 'Fibre', 'Protein', 'salt'],
        datasets: json
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
        }
    });


}

document.addEventListener('DOMContentLoaded', getchart);
