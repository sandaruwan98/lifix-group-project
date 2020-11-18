const lanButton = document.querySelector('#lan');
const container = document.querySelector('section');

let flag = false;


lanButton.addEventListener('click', function() {
    if(!flag){
        flag = true;

        const fstBtn = document.createElement('button');
        fstBtn.classList.add('floating-btn');
        fstBtn.style.top = '63px';
        fstBtn.style.right= "20px";
        if(lanButton.innerText == 'த') fstBtn.innerText = 'සිං';
        else if(lanButton.innerText == 'සිං') fstBtn.innerText = 'த';
        else if(lanButton.innerText == 'En') fstBtn.innerText = 'සිං';
        fstBtn.setAttribute('id', 'si');

        const secBtn = document.createElement('button');
        secBtn.classList.add('floating-btn');
        secBtn.style.top = '103px';
        secBtn.style.right= "20px";
        if(lanButton.innerText == 'En') secBtn.innerText = 'த';
        else if(lanButton.innerText == 'த') secBtn.innerText = 'En';
        else if(lanButton.innerText == 'සිං') secBtn.innerText = 'En';
        secBtn.setAttribute('id', 'en');

        container.appendChild(fstBtn);
        container.appendChild(secBtn);

        fstBtn.addEventListener('click', function() {
            if(fstBtn.innerHTML == 'සිං') window.location.href = "./index.php";
            else if(fstBtn.innerHTML == 'En') window.location.href = "./english.php";
            else if(fstBtn.innerHTML == 'த') window.location.href = "./tamil.php";
        })
        secBtn.addEventListener('click', function () {
            if(secBtn.innerHTML == 'සිං') window.location.href = "./index.php";
            else if(secBtn.innerHTML == 'En') window.location.href = "./english.php";
            else if(secBtn.innerHTML == 'த') window.location.href = "./tamil.php";
        })
    }
    else childsRemover();
});


function childsRemover() {
    const si = document.querySelector('#si');
    const en = document.querySelector('#en');

    container.removeChild(si);
    container.removeChild(en);

    flag = false;
}