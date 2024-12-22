<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    // Ambil data dari form
    $title = $conn->real_escape_string($_POST['title']);
    $artist = $conn->real_escape_string($_POST['artist']);
    $album = $conn->real_escape_string($_POST['album']);
    $genre = $conn->real_escape_string($_POST['genre']);
    
    // Ambil informasi file yang diupload
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];

    // Tentukan direktori tujuan penyimpanan file
    $fileDestination = 'musics/' . $fileName;

    // Cek apakah file berhasil dipindahkan
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        // Query untuk menyimpan informasi lagu ke database
        $sql = "INSERT INTO music (title, artist, album, genre, file_path) 
                VALUES ('$title', '$artist', '$album', '$genre', '$fileDestination')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Lagu berhasil diunggah!');
                window.location.href = 'admin_dashboard.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

$conn->close();
?>
