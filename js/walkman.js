document.addEventListener("DOMContentLoaded", function () {
    const playButton = document.getElementById("playButton");
    const resetButton = document.getElementById("resetButton");
    const audioPlayer = document.getElementById("audioPlayer");
    const titleElement = document.getElementById("rTitle");
    const circles = document.querySelectorAll(".circle1, .circle2");
    let isPlaying = false;
    let selectedAudioFile = null; // Variabel untuk menyimpan file audio yang dipilih
    let selectedTitle = ""; // Variabel untuk menyimpan judul lagu yang dipilih

    playButton.addEventListener("click", function () {
        if (isPlaying) {
            // Pause the music
            audioPlayer.pause();
            playButton.textContent = "PLAY";
            titleElement.textContent = "Selected: " + selectedTitle;
            playButton.classList.remove("active");
            circles.forEach(circle => circle.classList.remove("playing"));
            document.title = "Music Player";
            isPlaying = false;
        } else {
            // Play the selected music
            if (selectedAudioFile) {
                audioPlayer.play();
                playButton.textContent = "PAUSE";
                titleElement.textContent = "Now Playing: " + selectedTitle;
                document.title = "Now Playing: " + selectedTitle;
                playButton.classList.add("active");
                circles.forEach(circle => circle.classList.add("playing"));
                isPlaying = true;
            } else {
                alert("Please select a song first!");
            }
        }
    });

    resetButton.addEventListener("click", function () {
        titleElement.textContent = "";
        playButton.classList.remove("active"); // Hapus status tombol play
        playButton.textContent = "PLAY";
        resetButton.classList.add("bouncing");
        circles.forEach(circle => circle.classList.remove("playing"));
        audioPlayer.pause();
        isPlaying = false;
        selectedAudioFile = null;

        resetButton.addEventListener("animationend", function() {
            resetButton.classList.remove("bouncing");
        }, { once: true });
    })

    audioPlayer.addEventListener("ended", function () {
        playButton.classList.remove("active"); // Hapus status tombol play
        playButton.textContent = "PLAY";
        circles.forEach(circle => circle.classList.remove("playing"));
        isPlaying = false;
    });

    // Function to select a song without playing it immediately
    function selectSong(audioFile, title) {
        selectedAudioFile = audioFile; // Set file audio yang dipilih
        selectedTitle = title; // Set judul lagu yang dipilih
        console.log("Audio file path:", selectedAudioFile); // Debugging line
        titleElement.textContent = "Selected: " + title; // Update judul
        audioPlayer.src = selectedAudioFile; // Tetapkan file audio yang dipilih
        audioPlayer.pause();
        playButton.classList.remove("active"); // Hapus status tombol play
        playButton.textContent = "PLAY";
        circles.forEach(circle => circle.classList.remove("playing"));
        isPlaying = false;
    }

    // Example usage for selecting a song
    // This function would be called on clicking a song title in the song list
    window.selectSong = selectSong; // Make selectSong function globally accessible
});
