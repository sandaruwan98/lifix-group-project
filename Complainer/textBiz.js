$(".btn2").click(function (event) {
  var number = document.getElementById("f5").value;
  event.preventDefault();
  $.post("../utils/apiCaller.php", { phone: number }, function (data, status) {
    if(data == "Sent"){
      $(".btn2").text('Sent');
      $(".btn2").animate({ backgroundColor: "#F33552" }, "300");
    }
    // alert("Data: " + data + "\nStatus: " + status);
  });
});
