<?php
include 'connect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>

<body>
    <form method="post" action="logout.php">
        <button type="submit">Log Out</button>
    </form>
    <div class="dashboard">
        <h1>Admin Dashboard</h1>
        <div class="menu">
            <button id="addSongBtn">Add Song</button>
            <button id="updateSongBtn">Update Song</button>
            <button id="deleteSongBtn">Delete Song</button>
        </div>
        <div class="songs-list">
            <h2>Daftar Lagu</h2>
            <ul id="song-list">
                <?php
                $query = "SELECT * FROM music";
                $result = $conn->query($query);

                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        while ($song = $result->fetch_assoc()) {
                            echo "<li>{$song['id']}. {$song['title']} - {$song['artist']} ({$song['album']})</li>";
                        }
                    } else {
                        echo "<li>No songs available.</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="container" id="addSongForm">
        <button id="addSongClose" class="closeBtn">&times;</button>
        <h1>Add Song</h1>
        <form method="POST" action="add_song.php" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br><br>

            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist" required><br><br>

            <label for="album">Album:</label>
            <input type="text" name="album" id="album" required><br><br>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" required><br><br>

            <label for="file">File Lagu:</label>
            <input type="file" name="file" id="file" required><br><br>

            <button type="submit">Unggah Lagu</button>
        </form>
    </div>
    <div class="container" id="updateIdForm" style="display: none;">
        <button id="updateSongClose1" class="closeBtn">&times;</button>
        <h2>Update Song</h2>
        <form method="POST" action="admin_dashboard.php">
            <label for="songId">Enter Song ID:</label>
            <input type="number" name="songId" id="songId" required>
            <button type="submit" name="fetchSong">Fetch Song</button>
        </form>
    </div>

    <!-- Update Song Form (to be displayed after fetching the song) -->
    <div class="container" id="updateSongForm" style="display: none;">
        <button id="updateSongClose2" class="closeBtn">&times;</button>
        <h2>Edit Song</h2>
        <form method="POST" action="updateSong.php">
            <input type="hidden" name="id" id="updateId">
            <label for="title">Title:</label>
            <input type="text" name="title" id="updateTitle" required><br><br>

            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="updateArtist" required><br><br>

            <label for="album">Album:</label>
            <input type="text" name="album" id="updateAlbum" required><br><br>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="updateGenre" required><br><br>

            <button type="submit" name="updateSong">Submit Changes</button>
        </form>
    </div>

    <div class="container" id="deleteIdForm" style="display: none;">
        <button id="deleteSongClose" class="closeBtn">&times;</button>
        <h2>Delete Song</h2>
        <form method="POST" action="admin_dashboard.php">
            <label for="songId">Enter Song ID:</label>
            <input type="number" name="songId" id="songIdToDelete" required>
            <button type="submit" name="fetchDeleteSong">Fetch Song</button>
        </form>
    </div>

    <!-- Confirm Delete Song Form (to be displayed after fetching the song) -->
    <div class="container" id="confirmDeleteForm" style="display: none;">
        <h2>Are you sure you want to delete this song?</h2>
        <p id="deleteSongInfo"></p>
        <form method="POST" action="deleteSong.php">
            <input type="hidden" name="id" id="deleteId">
            <button type="submit" name="deleteSong">Yes, Delete</button>
            <button type="button" id="cancelDelete">Cancel</button>
        </form>
    </div>

    <script src="js/admin_dashboard.js"></script>
</body>

</html>

<?php
if (isset($_POST['fetchSong'])) {
    $songId = $_POST['songId'];
    $query = "SELECT * FROM music WHERE id = $songId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $song = $result->fetch_assoc();
        echo "<script>
            document.getElementById('updateId').value = '{$song['id']}';
            document.getElementById('updateTitle').value = '{$song['title']}';
            document.getElementById('updateArtist').value = '{$song['artist']}';
            document.getElementById('updateAlbum').value = '{$song['album']}';
            document.getElementById('updateGenre').value = '{$song['genre']}';
            document.getElementById('updateIdForm').style.display = 'none';
            document.getElementById('updateSongForm').style.display = 'block';
        </script>";
    } else {
        echo "<script>alert('Song with ID $songId not found.');</script>";
    }
}
?>

<?php

if (isset($_POST['fetchDeleteSong'])) {
    $songId = $_POST['songId'];
    $query = "SELECT * FROM music WHERE id = $songId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $song = $result->fetch_assoc();
        echo "<script>
            document.getElementById('deleteId').value = '{$song['id']}';
            document.getElementById('deleteSongInfo').textContent = '{$song['title']} by {$song['artist']}';
            document.getElementById('deleteIdForm').style.display = 'none';
            document.getElementById('confirmDeleteForm').style.display = 'block';
        </script>";
    } else {
        echo "<script>alert('Song with ID $songId not found.');</script>";
    }
}
?>