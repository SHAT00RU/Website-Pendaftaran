// Menampilkan konfirmasi saat logout
document.addEventListener("DOMContentLoaded", () => {
    const logoutLink = document.querySelector('a[href="logout.php"]');
    if (logoutLink) {
        logoutLink.addEventListener("click", (e) => {
            if (!confirm("Apakah Anda yakin ingin logout?")) {
                e.preventDefault();
            }
        });
    }
});

// Validasi sederhana pada form
function validateForm() {
    const inputs = document.querySelectorAll("input[required]");
    for (let input of inputs) {
        if (input.value.trim() === "") {
            alert("Harap isi semua kolom!");
            return false;
        }
    }
    return true;
}
