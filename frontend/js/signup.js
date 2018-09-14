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


if (document.getElementById('pickupForm')) {
    var pf = document.getElementById('pickupForm');
    pf.style.display = "none";


    signupTogglePickup = document.getElementById('signupTogglePickup');

    signupTogglePickup.addEventListener("click", togglePickup);

    function togglePickup() {
        if (pf.style.display == "block") {
            pf.style.display = "none";
        } else {
            pf.style.display = "block";
        }

    }


}