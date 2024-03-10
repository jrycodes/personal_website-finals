<!DOCTYPE html>
<html lange="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.cdnfonts.com/css/8bit-wonder" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</head>
<body>
<?php
// Check if the form is submitted
    require_once "regisdatabase.php";


    if(isset($_POST["register"])){
        // Retrieve form data
        $lastName = $_POST["lastName"];
        $firstName = $_POST["firstName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeatPassword"]; // Note the corrected field name
        $country = $_POST["country"];
        $state = $_POST["state"];
        $city = $_POST["city"];
        $lotBlk = $_POST["lotBlk"];
        $street = $_POST["street"];
        $phaseSubdivision = $_POST["phaseSubdivision"];
        $barangay = $_POST["barangay"];
        $contactNumber = $_POST["contactNumber"];

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Validate form data
        $errors = array();
        if (empty($email) || empty($password) || empty($repeat_password)) {
            array_push($errors, "All fields are required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }

        if(strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }

        if ($password != $repeat_password) {
            array_push($errors, "Passwords do not match");
        }

        // If there are no errors, proceed with database insertion
        if (empty($errors)) {
            // Include your database connection file
            require_once "regisdatabase.php";

            // Check if email already exists in the database
            $sql = "SELECT * FROM registration WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0) {
                array_push($errors, "Email already exists");
            } else {
                // Insert user into the database
                $sql = "INSERT INTO registration (lastName, firstName, country, state, city, lotBlk, street, phaseSubdivision, barangay, contactNumber, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssssssssssss", $lastName, $firstName, $country, $state, $city, $lotBlk, $street, $phaseSubdivision, $barangay, $contactNumber, $email, $passwordHash);
                if(mysqli_stmt_execute($stmt)) {
                    echo "<div class='alert alert-success'>You are Registered Successfully!</div>";
                } else {
                    array_push($errors, "Error inserting user into database: " . mysqli_error($conn));
                }
            }
        }

        // Display errors, if any
        if (!empty($errors)) {
            foreach($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
    }
?>
<body data-new-gr-c-s-check-loaded="14.1157.0" data-gr-ext-installed="">
    <div class="feedbacks-container">
                <div class="container">
                    <form action="registration.php" method="post">
                        <h2>Registration</h2>
                        <h3>Full Name</h3>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" required="">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required="">
                        </div>

                        <h3>Address</h3>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" required="">
                                <option selected="">Choose...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">State/Province</label>
                            <select class="form-control" id="state" name="state" required="">
                                <option selected="">Choose...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City/Municipality</label>
                            <select class="form-control" id="city" name="city" required="">
                                <option selected="">Choose...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lotBlk">Lot/Block</label>
                            <input type="text" class="form-control" id="lotBlk" name="lotBlk" placeholder="Enter Lot/Block" required="">
                        </div>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street" required="">
                        </div>
                        <div class="form-group">
                            <label for="phaseSubdivision">Phase/Subdivision</label>
                            <input type="text" class="form-control" id="phaseSubdivision" name="phaseSubdivision" placeholder="Enter Phase/Subdivision" required="">
                        </div>
                        <div class="form-group">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" required="">
                        </div>
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phoneCode" readonly="">
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="repeatPassword">Repeat Password</label>
                            <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Repeat Password">
                        </div>
                        
                        <div class="form-btn">
                            <input type="submit" id="register" name="register" value="register" style="background-color: blue; color: white; border-radius: 5px; border-color: blue; margin-left: 50px; margin-top: 10px">
                            <a href="login.php" target="_self" style="margin-left: 200px;">already have an account?</a>
                        </div>
                    </form>
        
                    
                    
                </div>
        </div>   

    <footer>
        <p class="rights">2024 My Personal Website. All rights reserved.</p>
        <a href="https://www.facebook.com/jrych0" target="_blank">
            <img src="icons8-facebook-64.png" alt="Facebook Logo" width="30" height="30">
        </a>
        <a href="https://www.instagram.com/jrych_/" target="_blank">
            <img src="icons8-instagram-64.png" alt="instagram Logo" width="30" height="30">
        </a>
        <a href="https://www.tiktok.com/@jrych_" target="_blank">
            <img src="icons8-tiktok-64.png" alt="TikTok Logo" width="30" height="30">
        </a>
    </footer>


<script>

let data = [];

document.addEventListener('DOMContentLoaded', function() {
fetch('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries%2Bstates%2Bcities.json')
    .then(response => response.json())
    .then(jsonData => {
        data = jsonData;
        const countries = data.map(country => country.name);
        populateDropdown('country', countries);
    })
    .catch(error => console.error('Error fetching countries:', error));
});

function populateDropdown(dropdownId, data) {
const dropdown = document.getElementById(dropdownId);
dropdown.innerHTML = '';
data.forEach(item => {
    const option = document.createElement('option');
    option.value = item;
    option.text = item;
    dropdown.add(option);
});
}

document.getElementById('country').addEventListener('change', function() {
const selectedCountry = this.value;
const countryData = data.find(country => country.name === selectedCountry);
if (countryData && countryData.states) {
    const states = countryData.states.map(state => state.name);
    populateDropdown('state', states);
}
const phoneCode = countryData ? countryData.phone_code : '';
document.getElementById('phoneCode').value = phoneCode;
});

document.getElementById('state').addEventListener('change', function() {
const selectedState = this.value;
const countryData = data.find(country => country.name === document.getElementById('country').value);
if (countryData) {
    const stateData = countryData.states.find(state => state.name === selectedState);
    if (stateData && stateData.cities) {
        const cities = stateData.cities.map(city => city.name);
        populateDropdown('city', cities);
    } else {
        console.log('No cities found for state:', selectedState);
    }
} else {
    console.log('Country data not found for state:', selectedState);
}
});

</script>

</body>