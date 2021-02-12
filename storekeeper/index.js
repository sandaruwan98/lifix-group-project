
var reItemId=0;

$(document).ready(function(){

    
    $(".repair-item").click( function(){

        

        reItemId=this.id;
        console.log(reItemId);
        
        $.get("./ajax/getTableData.php?id=" + this.id ,function (data,status) {
            // alert("done");
            if (status == "success") {
                var tabledata = JSON.parse(data)
                generateTable(tabledata);
                // console.log("in the nethod");
            }
           
        })
        
    })

    $("#supplybtn").click(()=>{
        $.get("./ajax/sendToTechnician.php?id="+reItemId ,function(data, success){
            // console.log("in the nethod");
            if(success == "success"){
                location.reload();
            }
           
        })
    }
    )
    

});
  

function generateTable(data) {
    var table = document.querySelector(".content-table");
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

