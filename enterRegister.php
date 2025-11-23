<?php
	require_once 'config.php';
    session_start();

    if(isset($_POST['submit']))
    {
   
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];  

    $checkQuery = "SELECT * FROM registered_user WHERE username = '$username' OR Email = '$email'"; //to check email and username already exist or not
    $result = $conn->query($checkQuery);  //sends the query to the database

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
            
            if($row['Username'] === $username && $row['Email'] === $email) {
                // Both username and email are taken
                echo "<script>
                        alert('Both username and email are already registered. Please try different ones.');
                        window.location.href = 'register.php';
                      </script>";
            } elseif($row['Username'] === $username) {
                // Only username is taken
                echo "<script>
                        alert('This username is already registered. Please try a different one.');
                        window.location.href = 'register.php';
                      </script>";
            } elseif($row['Email'] === $email) {
                // Only email is taken
                echo "<script>
                        alert('This email is already registered. Please use a different one.');
                        window.location.href = 'register.php';
                      </script>";
            }
        }
    else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Encrypting the password
    // SQL query to insert data into users table
    $sql = "INSERT INTO registered_user (First_name, Last_name, Username, Email, Password)
            VALUES ('$fname', '$lname', '$username', '$email', '$password')";
    if($conn->query($sql) === TRUE)
    {
        // Start session and set user data
        $_SESSION['uid'] = $conn->insert_id;  // Store the user id in the session
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        echo "<script> 
            window.location.href = 'home.php';
        </script>";
    }
    else{
        echo "<script> alert ('Error: Please try again');
        window.location.href = 'register.php'</script>";
    }

    mysqli_close($conn);

}
    }

?>
