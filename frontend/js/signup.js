if (document.getElementById('volunteerForm')) {
    var vf = document.getElementById('volunteerForm');
    vf.style.display = "none";


    signupToggle = document.getElementById('signupToggle');

    signupToggle.addEventListener("click", toggle);

    function toggle() {
        if (vf.style.display == "block") {
            vf.style.display = "none";
        } else {
            vf.style.display = "block";
        }

    }


}