$(".btn2").click(function (event) {
  let number = document.getElementById("f5").value;
  let langCheck = document.querySelector(".btn2").innerText;
  event.preventDefault();
  $.post("../utils/apiCaller.php", { phone: number , from: 'complainer'}, function (data, status) {
    if (data == "Sent") {
      if (langCheck == "Get Code") $(".btn2").text("Sent");
      else if (langCheck == "කේතය ගන්න") $(".btn2").text("යවන ලදී");
      else if (langCheck == "குறியீடு") $(".btn2").text("முடிந்தது");
      $(".btn2").animate({ backgroundColor: "#F33552" }, "300");
    } else if (data == "Not Sent") {
      if (langCheck == "Get Code") $(".btn2").text("Retry");
      else if (langCheck == "කේතය ගන්න") $(".btn2").text("නැවත යවන්න");
      else if (langCheck == "குறியீடு") $(".btn2").text("தவறு");
      $(".btn2").animate({ backgroundColor: "#F33552" }, "300");
    }
  });
});
