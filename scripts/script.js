document.addEventListener("DOMContentLoaded", () => {
    let formAuth = document.querySelector('#form-auth');

    formAuth.style.display = "none";

    if (formAuth.style.display == "none") {
        document.querySelector('#login').addEventListener('click', function () {
            document.querySelector('#form-auth').style.display = "block";
            this.style.display = "none";
        });
    }
    // Signup
    document.querySelector("#signup").addEventListener('click', function () {
        window.location.href = 'signup.php';
    });


})

// Logout
document.querySelector("#logout").addEventListener('click', function () {
    window.location.href = 'logout.php';
});



// Add Idea
document.querySelector("#addIdea").addEventListener('click', function () {
    window.location.href = 'addIdea.php';
});

// My Idea
document.querySelector("#myIdea").addEventListener('click', function () {
    window.location.href = 'myIdea.php';
});

// Like color
let likes = document.querySelectorAll(".like, .dislike");
for (let like of likes) {
    like.addEventListener('click', function (event) {
        let elem = event.target;
        let child = elem.querySelector('.c');
        child.classList.toggle("active");
    })
}
