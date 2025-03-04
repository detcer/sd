<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link rel="icon" href="#">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

<div class="wrapper" id="wrapper">

    <header class="padding-head-foot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-12">
                    <a href="#" class="logo-box">
                        <img src="img/icon/Secret Solution.svg" alt="logo">
                    </a>
                </div>
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="modal-call-box">
                        <a href="#">Home</a>
                        <a href="#" data-toggle="modal" data-target="#regist">Sign up / Log in</a>
                        <a href="#">Info</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>

        <section class="location">
            <div class="container">
                <div class="location-container">
                    <form method="POST" class="form-loc">
                        <h2 class="select-title">Select your location:</h2>
                        <div class="select-box">
                            <select name="state" required>
                                <option value="">State</option>
                                <option value="State">State</option>
                            </select>
                        </div>
                        <div class="select-box">
                            <select name="state" required>
                                <option value="">City</option>
                                <option value="State">City</option>
                            </select>
                        </div>
                        <div class="select-box">
                            <select name="state" required>
                                <option value="">Service</option>
                                <option value="State">Service</option>
                            </select>
                        </div>
                        <div class="button-send-wrap">
                            <button type="submit">Select</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="info">
            <div class="container">
                <div class="contaiener-info">
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <div class="contaiener-box">
                                <h3 class="info-big-title">Clients</h3>
                                <h4 class="info-small-title">Lorem ipsum dolor sit amet</h4>
                                <p class="info-text">uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum</p>
                                <h4 class="info-small-title">Lorem ipsum dolor sit amet</h4>
                                <p class="info-text">uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                    eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum</p>
                                <div class="button-send-wrap">
                                    <button type="submit">Clients sign up</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div class="contaiener-box">
                                <h3 class="info-big-title">Clients</h3>
                                <h4 class="info-small-title">Lorem ipsum dolor sit amet</h4>
                                <p class="info-text">uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                    eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt
                                    mollit anim id est laborum</p>
                                <h4 class="info-small-title">Lorem ipsum dolor sit amet</h4>
                                <p class="info-text">uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                    eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt
                                    mollit anim id est laborum</p>
                                <div class="button-send-wrap">
                                    <button type="submit">Clients sign up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="city">
            <div class="container">
                <div class="city-container">
                    <h2 class="title-xl">Countries and Cities</h2>
                    <p class="big-title-bg">United States</p>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-4">
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <h3 class="state-xl">Alabama</h3>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                        <a href="#" class="state-sm">Alabama</a>
                    </div>
                    <div class="button-send-wrap">
                        <button type="submit">Load more</button>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <footer class="padding-head-foot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-12">
                </div>
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="modal-call-box">
                        <a href="#">Terms of service</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="regist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Log in</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="" method="POST">
                                <div class="input-box">
                                    <input type="text" class="input-disabled" name="nameUser" minlength="4"
                                           placeholder="Username" required>
                                </div>
                                <div class="input-box password">
                                    <img src="img/icon/Eye.svg" id="eye" alt="icon">
                                    <input type="password" class="input-disabled" id="password-input"
                                           name="passwordUser" minlength="6" placeholder="Password" required>
                                </div>
                                <div class="input-box password">
                                    <img src="img/icon/Eye.svg" id="eye2" alt="icon">
                                    <input type="password" class="input-disabled" id="password-input2"
                                           name="passwordUser2" minlength="6" placeholder="Confirm Password" required>
                                </div>
                                <div class="input-box">
                                    <input type="email" class="input-disabled" name="emailUser" minlength="3"
                                           placeholder="Lorem2309@gmail.com" required>
                                </div>
                                <div class="input-box-check">
                                    <p>I am not</p>
                                    <div>
                                        <label>
                                            <input class="checkbox" type="radio" value="Provider"
                                                   name="checkbox-test">
                                            <span class="checkbox-custom"></span>
                                            <span class="label">Provider</span>
                                        </label>
                                        <label>
                                            <input class="checkbox" type="radio" value="Client"
                                                   name="checkbox-test">
                                            <span class="checkbox-custom"></span>
                                            <span class="label">Client</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="button-send-wrap">
                                    <button type="submit">Sing Up</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <form action="" method="POST">
                                <div class="input-box">
                                    <input type="text" class="input-disabled" name="nameUserIn"
                                           placeholder="Username" minlength="3" required>
                                </div>
                                <div class="input-box password">
                                    <img src="img/icon/Eye.svg" alt="icon">
                                    <input type="password" class="input-disabled" name="passwordUserIn"
                                           placeholder="Password" minlength="6" required>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#forgot" class="forgot">Forgot
                                    password?</a>
                                <div class="button-send-wrap">
                                    <button type="submit">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="forgot-title-box">
                        <h3 class="forgot-title">Forgot password?</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <br>
                    <form action="" method="POST">
                        <p class="forgot-text">Please enter your Email so we can send you an email to reset your
                            password</p>
                        <div class="input-box">
                            <input type="email" name="userEmailFog" class="input-disabled" placeholder="Email"
                                   minlength="3" required>
                        </div>
                        <div class="button-send-wrap">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/myjs.js"></script>
</body>

</html>

