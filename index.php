<?php
// Include database configuration file
include 'config.php';

// Initialize variables
$name = '';
$age = '';
$gender = '';
$weight = '';
$height = '';

// Add new patient record
if (isset($_POST['add_patient'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    // Calculate BMI
    $bmi = $weight / (($height / 100) * ($height / 100));

    // Insert new patient record into database
    $sql = "INSERT INTO patients (name, age, gender, weight, height, bmi) VALUES ('$name', $age, '$gender', $weight, $height, $bmi)";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Patient added successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Retrieve all patient records from database
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Health Management Software</title>
</head>
<body>
    <h1>Health Management Software</h1>
    <h2>Add New Patient</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $age; ?>"><br>
        <label>Gender:</label>
        <select name="gender">
            <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
        </select><br>
        <label>Weight (in kg):</label>
        <input type="number" name="weight" value="<?php echo $weight; ?>"><br>
        <label>Height (in cm):</label>
        <input type="number" name="height" value="<?php echo $height; ?>"><br>
        <input type="submit" name="add_patient" value="Add Patient">
    </form>

    <h2>Patient Records</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age

