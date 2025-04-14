// Confirmation before logout
function confirmLogout() {
    const confirmAction = confirm("Do you really want to log out?");
    if (confirmAction) {
        window.location.href = "logout.php";
    }
}

// Highlight today's date in a list (if needed later)
function highlightTodayExpenses() {
    const today = new Date().toISOString().split('T')[0];
    document.querySelectorAll("td[data-date]").forEach(cell => {
        if (cell.dataset.date === today) {
            cell.parentElement.style.backgroundColor = "#fff9c4"; // light yellow
        }
    });
}

// Call this on page load if needed
// window.onload = highlightTodayExpenses;
