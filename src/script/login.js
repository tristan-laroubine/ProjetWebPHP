function showForm(){
    var x = document.getElementById("loginForm");
    if (x.style.display === "none") {
        x.style.display = "block";
		x.style.position = "absolute";
    } else {
        x.style.display = "none";
    }
}

function hideForm(){
    document.getElementById('loginForm').style.display = "none";
}

