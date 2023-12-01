// window.addEventListener("load",start);
// function start()
// {
//     var email=window.localStorage.getItem("email");
//     if(email===null  || email===undefined)
//     {
//         window.location.replace("login.html")
//     }
//     else
//     {
//         window.location.replace("profile.html")
//     }
// }
$(document).ready(function () {
    var email=window.localStorage.getItem("email");
    if(email===null  || email===undefined)
    {
        window.location.replace("login.html")
    }
    else
    {
        window.location.replace("profile.html")
    }
})