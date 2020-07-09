
// function AssignRepairs() {
//     const lists = document.querySelectorAll('.list');
//     const assign_list = lists[0].children;
//     const sug_list = lists[1].children;
//     const normal_list = lists[2].children;


//     // save assign  list
//     var ids = [];
//     for (let i = 1; i < assign_list.length; i++) {
//         ids.push(assign_list[i].getAttribute("id"));
//     }
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "saveAssignedData.php", true);
//     // xhr.onreadystatechange = function() {
//     //     if (xhr.readyState == 4 && xhr.status == 200) {
//     //         console.log("Done. ", xhr.responseText);
//     //     }
//     // }
//     let data = new FormData();
//     data.append('data', JSON.stringify(ids));
//     data.append('st', "x");
//     xhr.send(data);



//     // save normal list
//     var ids1 = [];
//     for (let i = 1; i < normal_list.length; i++) {
//         ids1.push(normal_list[i].getAttribute("id"));
//     }

//     var xhr1 = new XMLHttpRequest();
//     xhr1.open("POST", "saveAssignedData.php", true);

//     let data1 = new FormData();
//     data1.append('data', JSON.stringify(ids1));
//     data1.append('st', "a");
//     xhr1.send(data1);




//     // save suggested list
//     var ids2 = [];
//     for (let i = 1; i < sug_list.length; i++) {
//         ids2.push(sug_list[i].getAttribute("id"));
//     }

//     var xhr2 = new XMLHttpRequest();
//     xhr2.open("POST", "saveAssignedData.php", true);

//     let data2 = new FormData();
//     data2.append('data', JSON.stringify(ids2));
//     data2.append('st', "s");
//     xhr2.send(data2);



// }
