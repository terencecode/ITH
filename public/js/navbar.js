function showNav() {
    var navbar = document.getElementById("navigation");
    if (navbar.className === "topNav") {
        navbar.className += " responsive";
    } else {
        navbar.className = "topNav";
    }
}