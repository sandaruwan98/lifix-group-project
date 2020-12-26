const list_items = document.querySelectorAll('.list-item');
const lists = document.querySelectorAll('.list');
const techSelect = document.querySelector('#techSelect');
let draggedItem = null;

for (let i = 0; i < list_items.length; i++) {
    const item = list_items[i];

    item.addEventListener('dragstart', () => {
        // console.log("ds",);
        setTimeout(() => {
            item.style.display = "none"
        }, 0);
        draggedItem = item;
    })
    item.addEventListener('dragend', () => {
        // console.log("ds",);
        setTimeout(() => {
            draggedItem.style.display = "block"
            draggedItem = null;
        }, 0);

    })



    item.addEventListener('click', () => {
        // loadMap("blue")
        var mk = markerArr.get(item.getAttribute("id"));
        // markerArr.get(item.getAttribute("id")).remove();
        var tmpmarker = new mapboxgl.Marker({
                color: "red"
                // color: "#3FB1CE"
            })
            .setLngLat([mk[0],mk[1]])
            .addTo(map);
        setTimeout(() => {
            tmpmarker.remove()
        }, 1000);
        // markerArr.set(item.getAttribute("id"),marker)
        // console.log( );

        // console.log(markerArr);
    })


    item.addEventListener('dblclick', function (e) {
        location.href = './repairpage.php?id='+this.id;
    });

}
for (let j = 0; j < lists.length; j++) {
    const list = lists[j];
    list.addEventListener('dragover', (e) => {
        e.preventDefault()
    });
    list.addEventListener('dragenter', (e) => {
        e.preventDefault()
        list.style.backgroundColor = 'rgba(0, 0, 0, 0.2)'
    });
    list.addEventListener('dragleave', () => {

        list.style.backgroundColor = 'rgba(0, 0, 0, 0.1)'
    });

    list.addEventListener('drop', (e) => {
        // console.log("fuck",i);
        list.append(draggedItem);
        if (list.getAttribute("id") == 'x') {
            AssignRepairs(draggedItem.getAttribute("id"), techSelect.value);
        }else{
            AssignRepairs(draggedItem.getAttribute("id"), 0);
        }
        // AssignRepairs(draggedItem.getAttribute("id"), list.getAttribute("id"));
        list.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';

    });


}





///////////////////////////////////////////////////////


techSelect.addEventListener('change',function(){
    
    location.href = './toggleTecnician.php?tid='+this.value;

})


function AssignRepairs(id, tid) {

    $.get("./ajax/saveAssignedData.php?tid=" + tid + "&id=" + id);

   



}





