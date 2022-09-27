<?php
include "../../../connection/connection.php";
session_start();
// $user_name =$_SESSION["user_admin_scientific_affairs"]; 
// $display_info_user = mysqli_query($connection , "select full_name from scientific_affairs_admins where username='$user_name'");
// $name_user = mysqli_fetch_array($display_info_user)["full_name"];
// $_SESSION["full_name_scientific_affairs"] = $name_user;
$name_user = $_SESSION["full_name_scientific_affairs"];

$id_std = $_GET["std_id"];

$display_data_std_for_review = mysqli_query($connection, "select * from new_std_form_info where id = '$id_std'");
$row = mysqli_fetch_array($display_data_std_for_review);
$form_number = $row["form_number"];
$name_std = $row["name_std"];
$the_college = $row["college"];
$type_certificate_unv = $row["type_certificate_unv"];
$the_department = $row["department"];
$the_type_certificate = $row["type_certifcate"];
$the_course = $row["course"];
$the_certificate_rate = $row["certifcate_rate"];
$the_set_number = $row["set_number"];
$nationality_number = $row["nationality_number"];
$gender = $row["gender"];
$nationality = $row["nationality"];
$religion = $row["religion"];
$state = $row["state"];
$city = $row["city"];
$area = $row["area"];
$home_number = $row["home_number"];
$name_guardian = $row["name_of_guardian"];
$jop_guardian = $row["jop_guardian"];
$relatuve_relation = $row["relatuve_relation"];
$phone_guardian = $row["phone_of_guardian"];
$phone_std = $row["phone_std"];
$email_std = $row["email_std"];
$name_closest_relative = $row["name_closest_relative"];
$address_closest_relative = $row["address_closest_relative"];
$phone_closest_relative = $row["phone_closest_relative"];
$personal_photo = $row["personal_photo"];
$photo_nationality_number = $row["photo_nationality_number"];
$name_of_brother = $row["name_of_brother"];
$univirsity_number = $row["univirsity_number"];
$card_photo = $row["card_photo"];
$name_of_father_police = $row["name_of_father_police"];
$services_certificate = $row["services_certificate"];
$name_of_fater_unv = $row["name_of_fater_unv"];
$services_certificate_unv = $row["services_certificate_unv"];
$date = $row["date"];
$hours = $row["hours"];

if (isset($_POST["submit"])) {
    $name_brother = $_POST["name_brother"];
    $unv_number = $_POST["unv_number"];
    $name_father_police = $_POST["name_father_police"];
    $name_father_unv = $_POST["name_father_unv"];



    $value_daescount = $_POST["descountrate"];
    if ($value_daescount == "0%") {
        //$try to insert with condition =  mysqli_query($connection , "insert into new_std_form_info (notes_not_submit) value ('ahmed_ammar f') where id='$id_std'");
        $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
        if ($update_for_submit_the_info) {

            echo "<script>alert('Successfully Review  Student Information')</script>";

            echo "<script>alert('تم تاكيد البيانات');
        window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

            // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

        }
    }
    if ($value_daescount == "10%") {
        if ($name_brother == "none" || $unv_number == "none" || $card_photo == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %10 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
                window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }

    if ($value_daescount == "20%") {
        if ($name_father_police == "none" || $services_certificate == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %20 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
                window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }

    if ($value_daescount == "30%") {
        if ($name_father_police == "none" || $services_certificate == "none" || $name_brother == "none" || $unv_number == "none" || $card_photo == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %30 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
                window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }

    if ($value_daescount == "70%") {
        if ($name_father_unv == "none" || $services_certificate_unv == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %70 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
                window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }

    if ($value_daescount == "80%") {
        if ($name_father_unv == "none" || $services_certificate_unv == "none" || $name_brother == "none" || $unv_number == "none" || $card_photo == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %80 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
                window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }

    if ($value_daescount == "90%") {
        if ($name_father_unv == "none" || $services_certificate_unv == "none" || $name_father_police == "none" || $services_certificate == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %80 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
              window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }

    if ($value_daescount == "100%") {
        if ($name_father_unv == "none" || $services_certificate_unv == "none" || $name_father_police == "none" || $services_certificate == "none" || $name_brother == "none" || $unv_number == "none" || $card_photo == "none") {
            echo "<script>alert('عذرا لايمكن تطبيق نسبة التخفيض %100 نظرا لعدم اكتمال البيانات')</script>";
        } else {
            $update_for_submit_the_info = mysqli_query($connection, "update new_std_form_info set review = 'good' where id='$id_std'");
            $update_for_submit_the_info_descount = mysqli_query($connection, "update new_std_form_info set descount_rate = '$value_daescount' where id='$id_std'");
            if ($update_for_submit_the_info) {

                echo "<script>alert('Successfully Review  Student Information')</script>";

                echo "<script>alert('تم تاكيد البيانات');
              window.location.href='../info_std_electronic_register/info_std_electronic_register.php'</script>";

                // header("location: ../info_std_electronic_register/info_std_electronic_register.php");

            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/all.min.css">
    <link rel="stylesheet" href="../../../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/manegment/scintific_affairs/review_the_info.css?v=<?php echo time(); ?>">
    <title>information student</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div>
                    <h3><a href="../account/account.php"><img src="../../../icons/Account.png" alt="" width="40px" height="40px"></a><?php echo " " . $name_user ?></h3>
                </div>
                <div class="log">
                    <a href="../../logout/logout.php">
                        <div><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="form">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Form Number </label>
                        <input type="text" value="<?php echo $form_number  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Name </label>
                        <input type="text" value="<?php echo $name_std  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">College</label>
                        <input type="text" value="<?php echo $the_college  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead"> Type Certificate Unv </label>
                        <input type="text" value="<?php echo $type_certificate_unv  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Department</label>
                        <input type="text" value="<?php echo $the_department  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead"> Certificate Type</label>
                        <input type="text" value="<?php echo $the_type_certificate  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">The Course</label>
                        <input type="text" value="<?php echo $the_course  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Certificate Rate</label>
                        <input type="text" value="<?php echo $the_certificate_rate  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Set Number</label>
                        <input type="text" value="<?php echo $the_set_number  ?>" class="form-control" readonly>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Nationality Number </label>
                        <input type="text" value="<?php echo $nationality_number  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Gender</label>
                        <input type="text" value="<?php echo $gender  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Nationality</label>
                        <input type="text" value="<?php echo $nationality  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Religion </label>
                        <input type="text" value="<?php echo $religion  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">State</label>
                        <input type="text" value="<?php echo $state  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">City</label>
                        <input type="text" value="<?php echo $city  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Area</label>
                        <input type="text" value="<?php echo $area  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Home Number</label>
                        <input type="text" value="<?php echo $home_number  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Guardian Name</label>
                        <input type="text" value="<?php echo $name_guardian  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Guardian Jop</label>
                        <input type="text" value="<?php echo $jop_guardian  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Relatuve Relation</label>
                        <input type="text" value="<?php echo $relatuve_relation  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Guardian Phone</label>
                        <input type="text" value="<?php echo $phone_guardian  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead"> Student Phone</label>
                        <input type="text" value="<?php echo $phone_std  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead"> Email</label>
                        <input type="email" value="<?php echo $email_std  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Closest Relative Name</label>
                        <input type="text" value="<?php echo $name_closest_relative  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-4 col-md-6 col-xs-12">
                        <label for="" class="lead">Closest Relative Address</label>
                        <input type="text" value="<?php echo $address_closest_relative  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-8  col-md-6 col-xs-12">
                        <label for="" class="lead">Closest Relative Phone</label>
                        <input type="text" value="<?php echo $phone_closest_relative  ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label for="" class="lead">Personal Photo</label>
                        <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
                            <img src="../../nstd_info_form/images_uplodes/<?php echo $personal_photo ?>" alt="none" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label for="" class="lead">Nationality Number Photo</label>
                        <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
                            <img src="../../nstd_info_form/images_uplodes/<?php echo $photo_nationality_number ?>" alt="none" width="100%" height="100%">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div>
                        <label for="" class="lead">A 10% discount If You Have A Brother Or Sister Who Is Currently Studying At Ribat University :</label><br><br>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="" class="lead">Brother Or Sister Name</label>
                            <input type="text" name="name_brother" value="<?php echo $name_of_brother  ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="" class="lead">Univirsity Number</label>
                            <input type="text" name="unv_number" value="<?php echo $univirsity_number  ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            <label for="" class="lead">Univirsity Card Photo</label>
                            <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
                                <img src="../../nstd_info_form/images_uplodes/<?php echo $card_photo ?>" alt="none" width="100%" height="100%">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="" class="lead">A 20% discount If You Father Or Mother Currently Working In Police :</label><br><br>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-9 col-md-12 col-xs-12">
                                <label for="" class="lead"> Father Or Mother Name</label>
                                <input type="text" name="name_father_police" value="<?php echo $name_of_father_police  ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group col-lg-4 col-md-12 col-xs-12"><br>
                                <label for="" class="lead">Proof Of Service Certificate</label>
                                <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
                                    <img src="../../nstd_info_form/images_uplodes/<?php echo $services_certificate ?>" alt="none" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div>
                                <label for="" class="lead">A 70% discount If You Father Or Mother Currently Working In Ribat University :</label><br><br>
                            </div>
                            <div class="form-group col-lg-9 col-md-12 col-xs-12"><br>
                                <label for="" class="lead"> Father Or Mother Name</label>
                                <input type="text" name="name_father_unv" value="<?php echo $name_of_fater_unv  ?> " class="form-control" readonly>
                            </div>
                            <div class="form-group col-lg-4 col-md-12 col-xs-12">
                                <label for="" class="lead">Proof Of Service Certificate</label>
                                <div style="width: 300px; height: 300px; margin:0 auto;" class="form-control">
                                    <img src="../../nstd_info_form/images_uplodes/<?php echo $services_certificate_unv ?>" alt="none" width="100%" height="100%"><br>
                                </div>
                            </div>
                            <div class="form-group col-lg-9 col-md-12 col-xs-12"><br>
                                <br>
                                <label for="" class="lead"> Select Discount Percentage</label>
                                <select name="descountrate" id="" class="form-select">
                                    <option value="0%">0%</option>
                                    <option value="10%">10%</option>
                                    <option value="20%">20%</option>
                                    <option value="30%">30%</option>
                                    <option value="70%">70%</option>
                                    <option value="80%">80%</option>
                                    <option value="90$">90%</option>
                                    <option value="100%">100%</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-xs-6">
                                <input type="submit" value="Confirm Data" name="submit" class='btn btn-primary'>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-xs-6">
                                <?php
                                echo "<a href='un_submit_info.php?std_id=" . $id_std . "'><button class='btn btn-primary'>Don't Confirm</button></a>";
                                ?>
                            </div>
                        </div>
            </form>
        </div>
</body>

</html>