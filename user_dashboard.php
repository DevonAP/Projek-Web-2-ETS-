<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/user_dashboard.css">
</head>

<body>
    <div class="dashboard">
        <h1>Welcome to the Music Player</h1>
        <div class="player">
            <!-- Link to the music player page -->
            <button onclick="window.location.href='walkman.php'">Open Music Player</button>
        </div>
        <form method="post" action="logout.php">
            <button type="submit">Log Out</button>
        </form>

    </div>
</body>

</html>