<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Protest+Revolution&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- <div class="wrapper"> -->
    <!-- <input type="checkbox" id="nav-toggle"> -->

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
                                <a href="LChouseNo.php" class="sidebar-link2">Houseswise - Line</a>
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
        <main class="content-section">
            <!-- <div class="container">
                <div class="col-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum omnis voluptates adipisci laboriosam debitis cum fuga quo, commodi dolores natus non! Officiis, quam minus! Nulla tempore repellat cupiditate amet et.</p>
                </div>
            </div> -->

            <div class="container-fluid">
                <div class="row">
                    <!-- image section -->
                    <div class="col-lg-5 col-sm-12 ">
                        <div class="gallery">
                            <img src="images/agri.jpeg" class="hex" />
                            <img src="images/sms logo bg colour1 bg only.png" class="hex" />
                            <img src="images/electrical.jpeg" class="hex" />
                            <img src="images/it.jpg" class="hex" />
                            <img src="images/vechicle.avif" class="hex" />
                            <img src="images/civil.jpg" class="hex" />
                            <img src="images/garden.jpeg" class="hex" />
                            <!-- <img src="images/sms logo bg colour2.png" class="hex" /> -->
                            <img src="images/sms logo bg colour1 logo only.png" class="small" />
                        </div>
                    </div>
                    <!-- Content section -->
                    <div class="col-lg-7 col-sm-12 mt-5 ">
                        <ul class="content" style="color:#1E2F75;">
                            <h5><strong>Introduction</strong></h5>

                            <li> <i class="fa-solid fa-cog fa-spin" style="color:#0C7C59;"></i>&emsp; Welcome to Shanthi Maarka Sabai Maintenance Team members.</li>
                            <li> <i class="fa-solid fa-cog fa-spin" style="color:#0C7C59;"></i>&emsp;This application will help you to update your department data, such as purchased materials details, EB bills, Electrical, Vehicle, Garden, Agriculture, and Civil departments.</li>
                            <li> <i class="fa-solid fa-cog fa-spin" style="color:#0C7C59;"></i>&emsp; This data will help to analyze your department's information in the future.</li><br>
                            <h6><b>How to use this application:</b></h6>
                            <li> <i class="fa-solid fa-cog fa-spin" style="color:#0C7C59;"></i>&emsp;Click on your department shown on the dashboard side panel. It will open the forms related to your department.</li>
                            <li> <i class="fa-solid fa-cog fa-spin" style="color:#0C7C59;"></i>&emsp;Update your records on the form.</li>
                            <li> <i class="fa-solid fa-cog fa-spin" style="color:#0C7C59;"></i>&emsp;Once you have finished entering the data, please save your data by clicking the submit or save button before closing the form.</li>

                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <!-- </div> -->

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