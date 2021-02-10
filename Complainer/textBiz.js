// $('.btn2').click(function(event) {
//     
//     event.preventDefault()
//     $.ajax({
//       type: "POST",
//       url: "apiCall.php",
//       data: { phone: pno }
//     }).done(function() {
//         preve
//       alert( "Data Saved: " );
//     });
//   })

  $(".btn2").click(function(event){
   var a = document.getElementById('f5').value
    event.preventDefault()
    $.post("apiCall.php", {phone:a}, function(data, status){
      alert("Data: "  +data+ "\nStatus: " + status);
    });
  });
