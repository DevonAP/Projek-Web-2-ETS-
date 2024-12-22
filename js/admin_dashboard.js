const addSongBtn = document.getElementById('addSongBtn');
const addSongForm = document.getElementById('addSongForm');
const addSongClose = document.getElementById('addSongClose')

const updateSongClose1 = document.getElementById('updateSongClose1')
const updateSongClose2 = document.getElementById('updateSongClose2')
const updateSongBtn = document.getElementById('updateSongBtn');
const updateIdForm = document.getElementById('updateIdForm');
const updateSongForm = document.getElementById('updateSongForm');

const deleteSongBtn = document.getElementById('deleteSongBtn');
const deleteIdForm = document.getElementById('deleteIdForm');
const confirmDeleteForm = document.getElementById('confirmDeleteForm');
const cancelDeleteBtn = document.getElementById('cancelDelete');
const deleteSongClose = document.getElementById('deleteSongClose')



addSongBtn.addEventListener('click', function () {
    addSongForm.style.display = "block";
});

addSongClose.addEventListener('click', function () {
    addSongForm.style.display = "none";
});

updateSongClose1.addEventListener('click', function () {
    updateIdForm.style.display = 'none';
});

updateSongClose2.addEventListener('click', function () {
    updateSongForm.style.display = 'none';
});

updateSongBtn.addEventListener('click', function () {
    updateIdForm.style.display = 'block';
});

deleteSongBtn.addEventListener('click', function () {
    deleteIdForm.style.display = 'block';
    confirmDeleteForm.style.display = 'none'; 
});

cancelDeleteBtn.addEventListener('click', function () {
    confirmDeleteForm.style.display = 'none';
    deleteIdForm.style.display = 'block';
});

deleteSongClose.addEventListener('click', function () {
    deleteIdForm.style.display = 'none';
});