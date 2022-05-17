function getchart() {

    $.getJSON("data.json", function (json) {
        //by using J query to get the data from local 'data.json' file
        for (let i = 0; i < json.length; i++) {
            const ctx = document.getElementById(json[i].title).getContext('2d'); //the number of pie charts depend on how many json object do I have or how many recipes did i  select
            const myChart = new Chart(ctx, {
                type: 'pie',//chart type
                data: {
                    labels: ['Fat', 'Saturates', 'Carbs', 'Sugars', 'Fibre', 'Protein', 'salt'],// the label of data i want to show on the chart
                    datasets: [{
                        data: [json[i].fat, json[i].saturates, json[i].carbs, json[i].sugars, json[i].fibre, json[i].protein, json[i].salt],//pass the data according specific onjectin json array
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
     //the code below is for bar chart
    $.getJSON("data1.json", function (json) {//get data from 'data1.json' ,variable json is an array 
        if (json.length > 1) {//bar chart will only show when the number of selected recipes is more than 1


            const ctx1 = document.getElementById('barchart').getContext('2d');
            const myChart = new Chart(ctx1, {
                type: 'bar',// chart type
                data: {
                    labels: ['kcal', 'Fat', 'Saturates', 'Carbs', 'Sugars', 'Fibre', 'Protein', 'salt'],//8 different labels
                    datasets: json//pass json as an arry to datasets:
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

document.addEventListener('DOMContentLoaded', getchart);//call the function when page have completely loaded
