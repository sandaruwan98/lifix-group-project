const lanButton = document.querySelector('#lan');
const  container = document.querySelector('section');
const h2 = document.querySelector('h2');
const f1 = document.querySelector('#f1');
const f2 = document.querySelector('#f2');
const f3 = document.querySelector('#f3');
const f4 = document.querySelector('#f4');
const f5 = document.querySelector('#f5');
const f6 = document.querySelector('#f6');
const btn = document.querySelector('.btn');
const btn2 = document.querySelector('.btn2');

let flag = false;


lanButton.addEventListener('click', function() {
    if(!flag){
        flag = true;

        const si = document.createElement('button');
        si.classList.add('floating-btn');
        si.style.top = '63px';
        si.style.right= "20px";
        si.innerText = 'සිං';
        si.setAttribute('id', 'si');

        const en = document.createElement('button');
        en.classList.add('floating-btn');
        en.style.top = '103px';
        en.style.right= "20px";
        en.innerText = 'En';
        en.setAttribute('id', 'en');

        const ta = document.createElement('button');
        ta.classList.add('floating-btn');
        ta.style.top = '143px';
        ta.style.right= "20px";
        ta.innerText = 'த';
        ta.setAttribute('id', 'ta');

        container.appendChild(si);
        container.appendChild(ta);
        container.appendChild(en);

        si.addEventListener('click', function() {
            sinhalaTranslate();
            childsRemover();
        })
        ta.addEventListener('click', function () {
            tamilTranslate();
            childsRemover();
        })
        en.addEventListener('click', function () {
            englishTranslate();
            childsRemover();
        })


    }
    else childsRemover();
});


function childsRemover() {
    const si = document.querySelector('#si');
    const ta = document.querySelector('#ta');
    const en = document.querySelector('#en');

    container.removeChild(si);
    container.removeChild(ta);
    container.removeChild(en);

    flag = false;
}

function sinhalaTranslate() {
    h2.innerText = 'පැමිණිල්ලක් කරන්න';
    f1.setAttribute('placeholder','ඔබගේ නම')
    f2.setAttribute('placeholder','අයදුම්පත් අංකය')
    f3.setAttribute('placeholder','පහන් කනු අංකය')
    f4.setAttribute('placeholder','දෝශය පිළිබඳව විස්තර')
    f5.setAttribute('placeholder','දුරකථන අංකය')
    f6.setAttribute('placeholder','කේතය')
    btn.innerText = 'පැමිණිලි කරන්න'
    btn2.innerText = 'කේතය ගන්න'
}

function tamilTranslate() {
    h2.innerText = 'පැමිණිල්ලක් කරන්න';
    f1.innerText = 'ඔබගේ නම';
    f2.innerText = ''
    f3.innerText = ''
    f4.innerText = ''
    f5.innerText = ''
    f6.innerText = ''
    btn.innerText = ''
    btn2.innerText =''
}

function englishTranslate() {
    h2.innerText = 'Make a Complaint';
    f1.setAttribute('placeholder','Your Name')
    f2.setAttribute('placeholder','Your NIC')
    f3.setAttribute('placeholder','Lamppost ID')
    f4.setAttribute('placeholder','Notes about the problem')
    f5.setAttribute('placeholder','Phone')
    f6.setAttribute('placeholder','OTP Code')
    btn.innerText = 'SUBMIT'
    btn2.innerText = 'Get Code'
}