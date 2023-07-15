<?php
    $id = 2;

    $stmt = $conn->prepare("SELECT * FROM registration WHERE id = 2");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    if ($userData) {
        // Update the desired fields
        $newFirstName = "John";
        $newLastName = "Doe";
        
        // Update the user data
        $stmt = $conn->prepare("UPDATE registration SET firstName = ?, lastName = ?, gender = ? WHERE id = ?");
        $stmt->bind_param("sssi", $newFirstName, $newLastName, $newGender, $id);
        $stmt->execute();

        echo "User data updated successfully.";

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "User not found.";
    }
?>