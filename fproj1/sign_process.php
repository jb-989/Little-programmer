
<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $child_first_name = $_POST['child_first_name'];
    $child_last_name = $_POST['child_last_name'];
    $child_birthdate = $_POST['child_birthdate'];
    $parent_name = $_POST['parent_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country_code = $_POST['country_code'];
    $mobile_number = $_POST['mobile_number'];
    $grade = $_POST['grade'];
    $has_laptop = $_POST['has_laptop'];
    $user_type = $_POST['user_type'];
    $signup_reason = $_POST['signup_reason'];
    $subscribe_plan_timing = $_POST['subscribe_plan_timing'];
    $created_at = date("Y-m-d H:i:s");

    $query = "INSERT INTO user (child_first_name, child_last_name, child_birthdate, parent_name, email, password, country_code, mobile_number, grade, has_laptop, user_type, signup_reason, subscribe_plan_timing, created_at) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssssss", $child_first_name, $child_last_name, $child_birthdate, $parent_name, $email, $password, $country_code, $mobile_number, $grade, $has_laptop, $user_type, $signup_reason, $subscribe_plan_timing, $created_at);

    if ($stmt->execute()) {
        $_SESSION['email'] = $email;
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
 
}
?>

