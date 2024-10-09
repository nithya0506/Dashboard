<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EB Bill Chart by Year</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" href="css/dashboard.css">    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Protest+Revolution&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
</head>

<body>
        <main class="content-section" style="background-color:#fff;">

            <h4 style="margin-left:20px;">Select Year</h4>
            &emsp;<select id="yearSelect">
                <!-- Year options will be populated by JavaScript -->
            </select>

            <canvas id="myChart" width="400" height="100"></canvas>

            <script>
                let myChart = null; // Initialize myChart variable

                // Function to populate year options
                function populateYears() {
                    const currentYear = new Date().getFullYear();
                    const yearSelect = document.getElementById('yearSelect');
                    for (let year = currentYear; year <= currentYear + 10; year++) {
                        const option = document.createElement('option');
                        option.value = year;
                        option.textContent = year;
                        yearSelect.appendChild(option);
                    }
                }

                // Function to fetch data and display the chart
                function fetchAndDisplayData() {
                    const selectedYear = document.getElementById('yearSelect').value;
                    if (!selectedYear) return;

                    fetch(`overallchartdata.php?year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            const ctx = document.getElementById('myChart').getContext('2d');

                            // Destroy the previous chart if it exists
                            if (myChart) {
                                myChart.destroy();
                            }

                            // Create a new chart
                            myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Jan-Feb', 'Mar-Apr', 'May-Jun', 'Jul-Aug', 'Sep-Oct', 'Nov-Dec'],
                                    datasets: [{
                                            label: 'Total Units',
                                            data: [
                                                data.total_units_jan_feb,
                                                data.total_units_mar_apr,
                                                data.total_units_may_june,
                                                data.total_units_jul_aug,
                                                data.total_units_sep_oct,
                                                data.total_units_nov_dec
                                            ],
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Total Amount',
                                            data: [
                                                data.total_amount_jan_feb,
                                                data.total_amount_mar_apr,
                                                data.total_amount_may_june,
                                                data.total_amount_jul_aug,
                                                data.total_amount_sep_oct,
                                                data.total_amount_nov_dec
                                            ],
                                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                            borderColor: 'rgba(153, 102, 255, 1)',
                                            borderWidth: 1
                                        }
                                    ]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    },
                                    plugins: {
                                        datalabels: {
                                            anchor: 'end',
                                            align: 'end',
                                            formatter: function(value) {
                                                return value;
                                            }
                                        }
                                    }
                                },
                                plugins: [ChartDataLabels]
                            });
                        })
                        .catch(error => console.error('Error fetching data:', error));
                }

                // Initialize year options and fetch initial data
                document.addEventListener('DOMContentLoaded', () => {
                    populateYears();
                    document.getElementById('yearSelect').addEventListener('change', fetchAndDisplayData);

                    // Fetch data for the current year initially
                    fetchAndDisplayData();
                });
            </script>

        </main>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>

</html>
