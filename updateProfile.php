<?php
    require_once 'config.php';
    session_start();

    if(!isset($_SESSION['uid'])) {
        header("Location: login.php");
        exit();
    }

    $uid             = $_SESSION['uid'];
    $fname           = $_POST['fname'];
    $lname           = $_POST['lname'];
    $username        = $_POST['username'];
    $email           = $_POST['email'];
    $currentPassword = $_POST['password'];
    $newPassword     = $_POST['new-password'];

    // Fetch the current password from the database
    $query = "SELECT * FROM registered_user WHERE User_ID = '$uid'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dbPassword = $row['Password'];

    // Check if current password matches before updating
    if($currentPassword === $dbPassword) {
        // Update other profile details first
        $updateProfileQuery = "UPDATE registered_user 
                               SET First_name = '$fname', 
                                   Last_name  = '$lname', 
                                   Username   = '$username', 
                                   Email      = '$email'
                               WHERE User_ID  = '$uid'";

        if ($conn->query($updateProfileQuery) === TRUE) {
            // Only update the password if a new one is provided
            if (!empty($newPassword)) {
                $updatePasswordQuery = "UPDATE registered_user 
                                        SET Password = '$newPassword' 
                                        WHERE User_ID = '$uid'";
                $conn->query($updatePasswordQuery);
            }

            echo "<script>
                    window.location.href = 'profile.php';
                  </script>";
        }
        } else {
            echo "<script>
                    alert('Incorrect Password!');
                    window.location.href = 'editProfile.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error updating profile. Please try again.');
                window.location.href = 'editProfile.php';
              </script>";
    }

    $conn->close();

?>

