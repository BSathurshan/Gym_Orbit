document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".message-card");

    cards.forEach(card => {
        card.addEventListener("click", () => {
            const status = card.querySelector("#reply-status")?.textContent.trim().toLowerCase() || '';

            // Do nothing if already solved
            if (status === 'solved') {
                return;
            }

            const username = card.querySelector(".username")?.textContent.trim() || '';
            const email = card.querySelector(".mid")?.textContent.trim() || '';
            const issue = card.querySelector(".issue")?.textContent.trim() || '';
            const message = card.querySelector(".message")?.textContent.trim() || '';

            // Fill the reply-card fields
            document.getElementById("reply-username").value = username;
            document.getElementById("reply-email").value = email;
            document.getElementById("reply-issue").value = issue;
            document.getElementById("reply-message").value = message;

            // Show the reply-card
            document.getElementById("reply-card").style.display = "block";
        });
    });
});

function replyClose() {
    document.getElementById("reply-card").style.display = "none";
}


    function confirmCloseSupport(username, time) {
        if (confirm(`Are you sure you want to close the support message from '${username}' ?`)) {
            window.location.href = ROOT + "/admin/closeSupport?username=" + encodeURIComponent(username)+ "&time=" + encodeURIComponent(time);
        }
    }
    


