<?php
    // Menghubungkan ke database
    include 'connect.php'; // Pastikan file ini berisi koneksi database

    // Ambil data lagu dari database
    $query = "SELECT title, file_path FROM music";
    $result = $conn->query($query);

    if (!$result) {
        echo "Error fetching songs: " . $conn->error;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="css/walkman.css">
    <script src="js/walkman.js"></script>
</head>
<body>
    <a href="user_dashboard.php" class="backBtn">Back</a>
    <div class="Walkman">
        <div class="persegi">
            <div class="runningTitle">
                <p id="rTitle"></p>
            </div>
            <div class="speaker">
                <div class="stripe"></div>
                <div class="casset">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                </div>
            </div>
            <div class="btn1" id="playButton">PLAY</div>
            <div class="btn2" id="resetButton">RESET</div>
        </div>
    </div>
    <div class="song-list">
        <ul>
            <?php
                // Menampilkan setiap lagu dalam bentuk list
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $filePath = $row['file_path'];
                        echo "<li onclick=\"selectSong('$filePath', '$title')\">$title</li>";
                    }
                } else {
                    echo "<li>No songs available</li>";
                }
            ?>
        </ul>
    </div>
    <audio id="audioPlayer"></audio>
</body>
</html>

<?php
    // Tutup koneksi database
    $conn->close();
?>
