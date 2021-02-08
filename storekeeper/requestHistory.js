

$(document).ready(function(){

    
    $(".repair-item").click( function(){
        $.get("./ajax/getTableDataforHistory.php?id=" + this.id ,function (data,status) {
            if (status == "success") {
                var data = JSON.parse(data)
                showOtherdetails(data.detail);
                generateTable(data.table);
            }
           
        })
        
    })

    

});
  

function showOtherdetails(data) {
    var table = document.querySelector(".tbl1");
    const supdate = table.querySelector('#supdate');
    const reqdate = table.querySelector('#reqdate');
    const name = table.querySelector('#name');

    supdate.innerHTML = data.supplied_date;
    name.innerHTML = data.username;
    supdate.innerHTML = data.added_date;
}

function generateTable(data) {
    var table = document.querySelector(".tbl2");
    table.tBodies[0].remove();

    var tbody = table.createTBody();

    data.forEach( item => {
        var row = tbody.insertRow(-1);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = item.Item_id;
        cell2.innerHTML = item.name;
        cell3.innerHTML = item.quantity;
        
    });
    
    
} 

