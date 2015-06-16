<?php

$state_nameErr = $cityErr = $hotel_nameErr = $no_of_adultsErr = $no_of_childsErr = $start_dateErr = $end_dateErr = $nameErr = $emailErr = $contact_numberErr = $addressErr = $bookingErr = "";
$state_name = $city = $hotel_name = $no_of_adults = $no_of_childs = $start_date = $end_date = $name = $email = $contact_number = $address = $booking = "";

//if (isset($_POST['submit']) == "Submit") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["booking"])) {
            $bookingErr = "Name is required";
        } else {
            $booking = test_input($_POST["booking"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[A-Za-z0-9 ]*$/", $booking)) {
                $bookingErr = "Only letters, numbers and white space allowed";
            }
        }

        if (empty($_POST["address"])) {
            $addressErr = "Name is required";
        } else {
            $address = test_input($_POST["address"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[A-Za-z0-9 ]*$/", $address)) {
                $addressErr = "Only letters, numbers and white space allowed";
            }
        }

        if (empty($_POST["contact_number"])) {
            $contact_numberErr = "Name is required";
        } else {
            $contact_number = test_input($_POST["contact_number"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $contact_number)) {
                $contact_numberErr = "Only numbers and no white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["end_date"])) {
            $end_dateErr = "Total number of adults is required";
        } else {
            $end_dateErr = test_input($_POST["end_date"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $end_date)) {
                $end_dateErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["start_date"])) {
            $start_dateErr = "Total number of adults is required";
        } else {
            $start_date = test_input($_POST["start_date"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $start_date)) {
                $start_dateErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["no_of_childs"])) {
            $no_of_childsErr = "Total number of adults is required";
        } else {
            $no_of_childs = test_input($_POST["no_of_childs"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $no_of_childs)) {
                $no_of_childsErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["no_of_adults"])) {
            $no_of_adultsErr = "Total number of adults is required";
        } else {
            $no_of_adults = test_input($_POST["no_of_adults"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $no_of_adults)) {
                $no_of_adultsErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["hotel_name"])) {
            $hotel_nameErr = "Name of hotel is required";
        } else {
            $hotel_name = test_input($_POST["hotel_name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $hotel_name)) {
                $hotel_nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["city"])) {
            $cityErr = "City name is required";
        } else {
            $city = test_input($_POST["city"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                $cityErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["state_name"])) {
            $state_nameErr = "Name of state is required";
        } else {
            $state_name = test_input($_POST["state_name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $state_name)) {
                $state_nameErr = "Only letters and white space allowed";
            }
        }
    }
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//}
?>
