const logoBtn = document.querySelector('.nav-logo');
const sidebar = document.querySelector('.sidebar');
const linkText = document.querySelectorAll('.link-text');
var is_open = false;
logoBtn.addEventListener('click', () => {
    // console.log(logoBtn);
    if (is_open) {
        sidebar.style.width = '50px'
        linkText.forEach(item => {

            item.style.display = 'none'
        })
        is_open = false
    } else {
        sidebar.style.width = '200px'
        // linkText.style.display = 'none'
        linkText.forEach(item => {

            item.style.display = 'inline '
        })
        is_open = true
    }
})



let current_url = document.location;
document.querySelectorAll(".sidebar .nav-link").forEach(function(e){
    // console.log(e.href);
    if(e.href == current_url){
        e.classList += " active";
    }
});