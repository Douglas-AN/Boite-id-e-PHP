document.addEventListener("DOMContentLoaded", () => {
    let formAuth = document.querySelector('#form-auth');

    formAuth.style.display = "none";

    if (formAuth.style.display == "none") {
        document.querySelector('#login').addEventListener('click', function () {
            document.querySelector('#form-auth').style.display = "block";
            this.style.display = "none";
        });
    }
    // Redirecction Signup
    document.querySelector("#signup").addEventListener('click', function () {
        window.location.href = 'signup.php';
    });

})

// Redirection Logout
document.querySelector("#logout").addEventListener('click', function () {
    window.location.href = 'logout.php';
});

// Redirection Add Idea
document.querySelector("#addIdea").addEventListener('click', function () {
    window.location.href = 'addIdea.php';
});

// Redirecction My Idea
document.querySelector("#myIdea").addEventListener('click', function () {
    window.location.href = 'myIdea.php';
});

// Gère au click la coloration du svg et renvoyer vers le traitement PHP
let likes = document.querySelectorAll(".like, .dislike");
for (let like of likes) {
    like.addEventListener('click', function (event) {
        let elemClick = event.target;
        let like = elemClick.dataset.value;
        let child = elemClick.querySelector('.c');
        let cardParent = elemClick.closest('.card');

        let idCard = cardParent.id;
        let id = idCard.replace('idea', '');
        child.classList.toggle("active");

        document.location.href = "vote.php?id=" + id + "&like=" + like + "";
    })
}