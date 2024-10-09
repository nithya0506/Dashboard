<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EB Bill Chart by Year</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Protest+Revolution&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="JS/chart.min.js"></script>
</head>

<body>
    <aside id="sidebar">
        <div class="d-flex logo-box">
            <button class="toggle-btn" type="button">
                <i class="fa-solid fa-bars toggler"></i>
                <!-- <i class='bx bxl-redux'></i> -->
            </button>
            <div class="sidebar-logo">
                <a href="#"> <img src="images/logo1.png"></a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="" class="sidebar-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <img src="images/agriculture.svg" height="35px" width="35px">
                    <span>Agriculture</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#buildings" aria-expanded="false" aria-controls="buildings">
                    <i class="fa-solid fa-house-user"></i>
                    <span>Buildings <i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <ul id="buildings" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1">Civil</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1">Electrical</a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1">Painting</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1">Infrastructure</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1">Carpenter</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <img src="images/garden (1).svg" height="35px" width="35px" style="margin-left:-5px;">
                    &nbsp;<span>Garden</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                    <i class='bx bx-line-chart'></i>
                    <span>Charts <i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1 collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            EB Bills <i class='bx bxs-chevron-down'></i>
                        </a>
                        <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="overallchart.php" class="sidebar-link2">Yearly - Bar</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="houseNochart.php" class="sidebar-link2">Houses Wise - Bar</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="individualchart.php" class="sidebar-link2">Individual- Bar</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="LChartoverall.php" class="sidebar-link2">Yearly - Line</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="LChouseNo.php" class="sidebar-link2">Houses wise - Line</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1 collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Civil
                        </a>
                        <!-- <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link2">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link2">Link 2</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link2">Link 3</a>
                                </li>
                            </ul> -->
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1 collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Vechicles
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1 collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Garden
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1 collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Agriculture
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link1 collapsed" data-bs-toggle="collapse"
                            data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                            Buildings
                        </a>
                    </li>

                </ul>

            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-sharp fa-solid fa-computer"></i>
                    <span>IT</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-car"></i>
                    <span>Vehicles</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="EB.php" class="sidebar-link">
                    <i class="fa-solid fa-money-bills"></i>
                    <span>EB Bills</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="purchase.php" class="sidebar-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Purchase</span>
                </a>
            </li>



            <li class="sidebar-item">
                <a href="logout.php" class="sidebar-link">
                    <i class="fas fa-user-times text-danger"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- <div class="sidebar-footer">
                <a href="#" class="sidebar-link">

                    <span>Logout</span>
                </a>
            </div> -->
    </aside>
    <!-- End side Bar -->

    <!-- Start Main panel -->
    <!-- <div class="main p-3"> -->
    <section class="home">
        <header>
            <nav class="navbar">
                <div class="toggle-sidebar">

                    &emsp;&nbsp;&nbsp;<span class="nav-brand">Shanthi Maarka Sabai</span>
                    <em class="subtitle"> Maintenance Team </em>
                    <a href="logout.php"><i class="fa fas fa-user-times text-danger"></i> Logout</a>
                </div>
            </nav>
        </header>
        <br><br>
        <main class="content-section" style="background-color:#fff;">
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
        <!-- </div> -->
        <br>
        <!-- Footer -->
        <footer class="footer">
            <div class="copyright">
                Copyright@2024 Powered By
                <a href="https://ukctl.com/" target="_blank">UKCTL</a>
            </div>
            </div>
        </footer>
        </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>

</html>
</body>

</html>