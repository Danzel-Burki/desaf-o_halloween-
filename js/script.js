document.addEventListener('DOMContentLoaded', function() {
    const voteButtons = document.querySelectorAll('.votar');

    voteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const confirmVote = confirm("¿Estás seguro de que quieres votar por este disfraz?");
            if (!confirmVote) {
                event.preventDefault(); // Prevent form submission if user cancels
            }
        });
    });
});
