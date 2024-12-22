<?php
include 'connect.php';

if (isset($_POST['updateSong'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $genre = $_POST['genre'];

    $query = "UPDATE music SET title = '$title', artist = '$artist', album = '$album', genre = '$genre' WHERE id = $id";
    
    if ($conn->query($query) === TRUE) {
        echo "<script>
            alert('Song updated successfully.');
            window.location.href = 'admin_dashboard.php';
        </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
