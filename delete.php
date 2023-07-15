<?php
    // Assuming you have the user's ID or some other unique identifier
    $userID = 1;

    // Check if the user exists before deleting
    $stmt = $conn->prepare("SELECT * FROM registration WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    if ($userData) {
        // Delete the user data
        $stmt = $conn->prepare("DELETE FROM registration WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();

        echo "User data deleted successfully.";

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "User not found.";
    }
?>