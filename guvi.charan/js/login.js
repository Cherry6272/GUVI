// includes('../php');
$(document).ready(function () {
  $("#submit").submit(function (e) {
    e.preventDefault();
    var email = $("#useremail").val();
    var Password = $("#password").val();

    $.ajax({
      url: "http://localhost:3000/php/login.php",
      type: "POST",
      data: {
        username: email,
        password: Password,
      },
      success: function (response) {
        var p = JSON.parse(response);
        if (p.status) {
          window.localStorage.setItem("email", email);
          $("#notification").html("Login Successfull");
          window.location.replace("profile.html");
        } else {
          console.log(p);
          $("#notification").html("Invalid Login information");
        }
      },
      error: function () {
        console.log("Error");
      },
    });
  });
});
