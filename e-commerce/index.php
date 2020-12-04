<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E - Commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        html {
            scroll-behavior: smooth;
        }

        .header-img {
            width: 100%;
        }

        .section-header {
            padding-top: 50px;
            padding-bottom: 100px;
            border-bottom-color: #505050;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .section-featured {
            padding-top: 50px;
            padding-bottom: 100px;
            border-bottom-color: #505050;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .section-subscribe {
            padding-top: 50px;
            padding-bottom: 100px;
            border-bottom-color: #505050;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .section-product {
            padding-top: 50px;
            padding-bottom: 100px;
            border-bottom-color: #505050;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .section-aboutus {
            padding-top: 100px;
            padding-bottom: 100px;
            border-bottom-color: #505050;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .section-footer {
            padding-top: 50px;
            padding-bottom: 100px;
            border-bottom-color: #505050;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .header-title {
            text-align: center;
            margin: 50px 0;
        }

        .header-button {
            padding: 20px 0;
            text-align: center;
        }

        .header-button .btn {
            padding: 10px 30px;
        }

        .img-wide .header-img {
            width: 100%;
            min-height: 130px;
            max-height: 130px;
        }

        .img-logo {
            width: 60%;
        }
    </style>
</head>

<body>

    <section class="section-menu" id="menu">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" href="#header">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#aboutus">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#product">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark" href="#"><i class="fa fa-shopping-cart"></i> Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-header" id="header">
        <div class="container">
            <div class="header-title">
                <h1>Aldansorry Shop</h1>
            </div>
            <div class="header-content">
                <div class="row">
                    <div class="col-md-4">
                        <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                    </div>
                </div>
                <div class="header-button">
                    <button class="btn btn-primary">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </section>
    <section class="section-featured" id="featured">
        <div class="container">
            <div class="header-title">
                <h1>Featured Product</h1>
            </div>
            <div class="header-content">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row mx-3">
                                <div class="col-md-6">
                                    <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                                    <h4 class="text-center mt-2">Product Name</h4>
                                    <h5 class="text-center text-muted">$99.99</h5>
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                                    <h4 class="text-center mt-2">Product Name</h4>
                                    <h5 class="text-center text-muted">$99.99</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row mx-3">
                                <div class="col-md-6">
                                    <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                                    <h4 class="text-center mt-2">Product Name</h4>
                                    <h5 class="text-center text-muted">$99.99</h5>
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                                    <h4 class="text-center mt-2">Product Name</h4>
                                    <h5 class="text-center text-muted">$99.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-subscribe" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque.</p>
                </div>
                <div class="col-md-6">

                    <h2>&nbsp;</h2>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-block btn-secondary">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-product" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                    <h4 class="mt-2">
                        Product Name
                        <div class="float-right">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star text-muted"></i>
                            <i class="fa fa-star text-muted"></i>
                        </div>
                    </h4>
                    <h5 class="text-muted">$99.99</h5>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6 img-wide">
                            <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                            <h4 class="mt-2">
                                Product Name
                                <div class="float-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star text-muted"></i>
                                    <i class="fa fa-star text-muted"></i>
                                </div>
                            </h4>
                            <h5 class="text-muted">$99.99</h5>
                        </div>
                        <div class="col-md-6 img-wide">
                            <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                            <h4 class="mt-2">
                                Product Name
                                <div class="float-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star text-muted"></i>
                                    <i class="fa fa-star text-muted"></i>
                                </div>
                            </h4>
                            <h5 class="text-muted">$99.99</h5>
                        </div>
                        <div class="col-md-6 img-wide">
                            <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                            <h4 class="mt-2">
                                Product Name
                                <div class="float-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star text-muted"></i>
                                    <i class="fa fa-star text-muted"></i>
                                </div>
                            </h4>
                            <h5 class="text-muted">$99.99</h5>
                        </div>
                        <div class="col-md-6 img-wide">
                            <img src="assets/img/placeholder-img.jpg" class="header-img" alt="">
                            <h4 class="mt-2">
                                Product Name
                                <div class="float-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star text-muted"></i>
                                    <i class="fa fa-star text-muted"></i>
                                </div>
                            </h4>
                            <h5 class="text-muted">$99.99</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-aboutus" id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>About Us</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/img/placeholder-img.jpg" class="img-logo" alt="">
                    <h4 class="mt-2">
                        Aldansorry corp.
                    </h4>
                    <h5 class="text-muted">Malang </h5>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="ml-3">Main Menu</h6>
                            <nav class="nav flex-column">
                                <a class="nav-link active" href="#">Home</a>
                                <a class="nav-link" href="#">About</a>
                                <a class="nav-link" href="#">Shop</a>
                                <a class="nav-link" href="#">Help</a>
                            </nav>
                        </div>
                        <div class="col-md-3">
                            <h6 class="ml-3">Company</h6>
                            <nav class="nav flex-column">
                                <a class="nav-link active" href="#">The Company</a>
                                <a class="nav-link" href="#">Carrers</a>
                                <a class="nav-link" href="#">Press</a>
                            </nav>
                        </div>
                        <div class="col-md-3">
                            <h6 class="ml-3">Discover</h6>
                            <nav class="nav flex-column">
                                <a class="nav-link active" href="#">The Team</a>
                                <a class="nav-link" href="#">Our History</a>
                                <a class="nav-link" href="#">Brand Motto</a>
                            </nav>
                        </div>
                        <div class="col-md-3">
                            <h6 class="ml-3">Find Us On</h6>
                            <nav class="nav flex-column">
                                <a class="nav-link active" href="#">Facebook</a>
                                <a class="nav-link" href="#">Twitter</a>
                                <a class="nav-link" href="#">Instagram</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</body>

</html>