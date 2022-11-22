@extends('layouts.app', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">


    <div class="header py-7 py-lg-9">
        <div class="container-fluid mt--8 parallax-item" id="parallax">

            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-white">NOVADECI PROPERTIES</h1>
                    <h3 class="text-white">Hotel | Convention Center | Commercial Spaces | Function Rooms
                    </h3>
                    <br>
                </div>
                <div class="col">
                    <div class="card-body bg-white">
                        <h1>Book a Hotel Room</h1>
                        <br>
                        <div class="row">                           
                            <div class="col-sm-6">
                                <h4 text-dark>Check In: </h4>
                                <input class="form-control" type="datetime-local" value="<?php echo date('Y-m-d'); ?>"
                                    id="example-datetime-local-input" required>
                            </div>
                            <div class="col-sm-6">
                                <h4 text-dark>Check Out: </h4>
                                <input class="form-control" type="datetime-local" value="<?php echo date('Y-m-d'); ?>"
                                    id="example-datetime-local-input" required>
                            </div>
                            <div class="col-sm-6">
                                <h4 text-dark>Room: </h4>
                                <input class="form-control" type="number" value="1" id="example-number-input"
                                    min="0" required>
                            </div>
                            <div class="col-sm-6">
                                <h4 text-dark>No. of Guest: </h4>
                                <input class="form-control" type="number" value="1" id="example-number-input"
                                    min="0" required>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-success col-sm-12">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center parallax-item">
            <div class="card col-md-4 cards1" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
            <div class="card col-md-4 cards1" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
            <div class="card col-md-4 cards1" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
            <div class="card col-md-4 cards1" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center parallax-item">
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
        </div>

        <div class="row justify-content-center parallax-item">
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
            <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam ducimus explicabo quas sunt, magni quia
                animi at accusantium saepe officia in dolor odio incidunt voluptate eveniet ab dolorem facere eius?</h1>
        </div>






        <style>
            .cards1 {
                margin: 10px;
            }

            .cards1 img {
                width: 100%;
                height: 250px;
            }

            * {
                padding: 0;
                margin: 0;
            }

            html {
                scroll-behavior: smooth;
            }

            .parallax-item {
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-family: Montserrat, sans-serif;
                width: 100%;
                min-height: 100vh;
            }

            .parallax-item h2 {
                font-size: 3rem;
                text-transform: uppercase;
                background-color: whitesmoke;
                padding: 1rem;
                border-radius: 1rem;
            }

            .parallax-item:first-child {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("nvdcpics/nvdcpic2.jpg");
                background-size: cover;
            }

            .parallax-item:nth-child(2) {
                background: whitesmoke;
            }

            .parallax-item:nth-child(3) {
                background: url("nvdcpics/nvdcpic1.jpg");
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                /* Parallax Effect for DIV 3 */
                min-height: 600px;
            }

            .parallax-item:nth-child(4) {
                background: whitesmoke;
            }

            @media screen and (max-width: 768px) {
                .parallax-item h2 {
                    font-size: 1.5rem;
                }
            }
        </style>
        <script>
            const parallax = document.getElementById("parallax");

            // Parallax Effect for DIV 1
            window.addEventListener("scroll", function() {
                let offset = window.pageYOffset;
                parallax.style.backgroundPositionY = offset * 0.7 + "px";
                // DIV 1 background will move slower than other elements on scroll.
            });
        </script>
    </div>
    <div class="container mt--10 pb-5"></div>
@endsection
