$(document).ready(function () {
  $(".repair-item").click(function () {
    // console.log(this.id);
    $.get("./ajax/getTableData.php?id=" + this.id, function (data, status) {
      if (status == "success") {
        var tabledata = JSON.parse(data);
        generateTable(tabledata);
      }
    });
  });
});

function generateTable(data) {
  var table = document.getElementById("p-table");
  table.tBodies[0].remove();

  var tbody = table.createTBody();

  data.forEach((item) => {
    var row = tbody.insertRow(-1);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = item.item_id;
    cell2.innerHTML = item.name;
    cell3.innerHTML = item.quantity;
  });
}
