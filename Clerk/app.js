const list_items = document.querySelectorAll('.list-item');
const lists = document.querySelectorAll('.list');

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
        var lngLat = markerArr.get(item.getAttribute("id")).getLngLat();
        // markerArr.get(item.getAttribute("id")).remove();
        var tmpmarker = new mapboxgl.Marker({
                color: "red"
                // color: "#3FB1CE"
            })
            .setLngLat([lngLat.lng, lngLat.lat])
            .addTo(map);
        setTimeout(() => {
            tmpmarker.remove()
        }, 1000);
        // markerArr.set(item.getAttribute("id"),marker)
        // console.log( );

        // console.log(markerArr);
    })

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
        AssignRepairs(draggedItem.getAttribute("id"), list.getAttribute("id"));
        list.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';

    });


}


function AssignRepairs(id, st) {

    var xhr = new XMLHttpRequest();
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         console.log("Done. ", xhr.responseText);
    //     }
    // }
    xhr.open("GET", "./components/saveAssignedData.php?st=" + st + "&id=" + id, true);
    xhr.send();




}