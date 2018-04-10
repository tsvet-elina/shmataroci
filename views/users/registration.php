<?php
//require_once ("/assets/javascript/validation.js");
?>
<!---->
<!--<script>-->
<!--    language="JavaScript"; src="/assets/javascript/validation.js"-->
<!--</script>-->
<!---->

<section class="main">

    <form method="post" action="controllers/registration_controller.php" enctype="multipart/form-data"
          name="registrationForm" onsubmit="return validRegistration(this)">
        <!--        <div>-->
        <!--            <label for="user">Потребителско име</label>-->
        <!--            <input type="text" name="user" id="user" autofocus>-->
        <!--            <div id="userError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <label for="email">Поща</label>-->
        <!--            <input type="text" name="email" id="email">-->
        <!--            <div id="emailError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <label for="pass">Парола</label>-->
        <!--            <input type="password" name="pass" id="pass">-->
        <!--            <div id="passError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <label for="repPass">Потвърди паролата</label>-->
        <!--            <input type="password" name="repPass" id="repPass">-->
        <!--            <div id="repPassError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <label for="age">Години</label>-->
        <!--            <input type="number" name="age" id="age" min="0" max="200" size="3">-->
        <!--            <div id="ageError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!---->
        <!--        <div>-->
        <!--            <label>Gender</label>-->
        <!--            <input type="radio" name="gender" value="male">Male-->
        <!--            <input type="radio" name="gender" value="female">Female-->
        <!--            <input type="radio" name="gender" value="other">Other-->
        <!--            <div id="genderError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <label for="image">Снимка</label>-->
        <!--            <input type="file" id="image" name="image">-->
        <!--            <div id="imageError" style="visibility:hidden;"></div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            <input type="submit" name="register" value="Register">-->
        <!--        </div>-->
        <!--        <div id="result" style="visibility: hidden;"></div>-->
        <!--    </form>-->
        <!--</section>-->


        <div class="container">
            <div class="col-lg-5" style="margin-left:300px;">
                <!--    <form  class="form-horizontal" role="form" enctype="multipart/form-data">-->
                <form method="post" action="controllers/registration_controller.php" enctype="multipart/form-data"
                      name="registrationForm" class="form-horizontal" role="form"
                      onsubmit="return validRegistration(this)">
                    <h2>Регистрация</h2>
                    <div class="form-group">
                        <label for="firstName" class="col-sm-3 control-label">Име</label>
                        <div class="col-sm-9">
                            <input type="text" name="user" id="firstName" placeholder="Name" class="form-control"
                                   required
                                   autofocus>
                            <div id="userError" style="visibility:hidden;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="col-sm-3" control-label">Поща</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" id="lastName" placeholder="Email" class="form-control"
                                   required>
                            <div id="emailError" style="visibility:hidden;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Парола </label>
                        <div class="col-sm-9">
                            <input type="password" id="email" name="pass" placeholder="Password" class="form-control"
                                   name="email"
                                   required>
                            <div id="passError" style="visibility:hidden;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Потвърди </label>
                        <div class="col-sm-9">
                            <input type="password" name="repPass" id="password" placeholder="Password"
                                   class="form-control"
                                   required>
                            <div id="repPassError" style="visibility:hidden;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Години</label>
                        <div class="col-sm-9">
                            <input type="number" id="password" name="age" placeholder="Age" class="form-control"
                                   required>
                            <div id="ageError" style="visibility:hidden;"></div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Пол</label>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="radio-inline">
                                        <input type="radio" id="femaleRadio" value="Female" name="gender" checked>Жена
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <label class="radio-inline">
                                        <input type="radio" id="maleRadio" value="Male" name="gender">Мъж
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <label class="radio-inline">
                                        <input type="radio" id="maleRadio" value="Other" name="gender">Друго
                                    </label>
                                </div>
                                <div id="genderError" style="visibility:hidden;"></div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="file" id="height" name="image">
                            <div id="imageError" style="visibility:hidden;"></div>
                        </div>
                    </div>
                    <!-- /.form-group -->

                    <!--        <button type="submit"  class="btn btn-primary btn-block">Register</button>-->
                    <div class="col-sm-12">
                        <input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
                    </div>
                </form> <!-- /form -->
            </div>
        </div> <!-- ./container -->


        <style>body {
                background: rgba(108, 211, 207, 0.57) fixed;
                background-size: cover;
            }

            *[role="form"] {
                max-width: 530px;
                padding: 15px;
                margin: 0 auto;
                border-radius: 0.3em;
                background-color: #f2f2f2;
            }

            *[role="form"] h2 {
                font-family: 'Open Sans', sans-serif;
                font-size: 40px;
                font-weight: 600;
                color: #000000;
                margin-top: 5%;
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 4px;
            }
        </style>

        <script>$(function () {
                $.validator.setDefaults({
                    highlight: function (element) {
                        $(element)
                            .closest('.form-group')
                            .addClass('has-error')
                    },
                    unhighlight: function (element) {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error')
                    }
                });

                $.validate({
                    rules:
                        {
                            password: "required",
                            birthDate: "required",
                            weight: {
                                required: true,
                                number: true
                            },
                            height: {
                                required: true,
                                number: true
                            },
                            email: {
                                required: true,
                                email: true
                            }
                        },
                    messages: {
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    password: {
                        required: " Please enter password"
                    },
                    birthDate: {
                        required: " Please enter birthdate"
                    },
                    email: {
                        required: ' Please enter email',
                        email: ' Please enter valid email'
                    },
                    weight: {
                        required: " Please enter your weight",
                        number: " Only numbers allowed"
                    },
                    height: {
                        required: " Please enter your height",
                        number: " Only numbers allowed"
                    },
                }

            });
            })
            ;</script>
