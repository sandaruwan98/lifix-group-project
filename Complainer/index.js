function validate() {
    var usr = document.getElementById("username");
    var pwd = document.getElementById("password");

    if(usr.value == "admin" && pwd.value == "admin"){
        return true;
    }
    else
    alert("Check again!")
    return false;
}

document.getElementById("btn").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "flex";
})
document.querySelector(".close").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "none";
})