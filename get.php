<?php    
    // Assuming you have the user's ID or some other unique identifier
    $id = 2;
    $conn = new mysqli('localhost','root','','test1');


    $stmt = $conn->prepare("SELECT * FROM registration WHERE id=2");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    // Access the user data
    if ($userData) {
        $firstName = $userData['firstName'];
        $lastName = $userData['lastName'];
        $gender = $userData['gender'];
        $email = $userData['email'];
        $password = $userData['password'];
        $number = $userData['number'];
        
        // Perform any desired operations with the retrieved user data
        // ...
        
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "User not found.";
    }
?>