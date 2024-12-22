<?php
include 'connect.php';

if (isset($_POST['deleteSong'])) {
    $id = $_POST['id'];

    $query = "SELECT file_path FROM music WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $song = $result->fetch_assoc();
        $filePath = $song['file_path'];

        // Step 2: Delete the file from the server
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        }

        // Step 3: Delete the song record from the database
        $deleteQuery = "DELETE FROM music WHERE id = $id";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "<script>
                alert('Song and file deleted successfully.');
                window.location.href = 'admin_dashboard.php';
            </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Song not found.";
    }
}

$conn->close();
?>
