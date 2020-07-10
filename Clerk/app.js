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
            list.append(draggedItem);
            AssignRepairs(draggedItem.getAttribute("id"), list.getAttribute("id"));
            list.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';

        });


    }
}

function AssignRepairs(id, st) {

    var xhr = new XMLHttpRequest();
    // xhr.onreadystatechange = function() {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         console.log("Done. ", xhr.responseText);
    //     }
    // }
    xhr.open("GET", "saveAssignedData.php?st=" + st + "&id=" + id, true);
    xhr.send();

}