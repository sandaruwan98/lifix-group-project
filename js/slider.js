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





// Setup
var notification = new Notif({
    topPos: 10,
    classNames: 'success danger',
    autoClose: true,
    autoCloseTimeout: 3000
});
    
    
    
    function Notif(option){
    var notifi = this;
    
    notifi.self = $('.toast-message');
    notifi.close = this.self.find('.close');
    notifi.message = notifi.self.find('.message');
    notifi.top = option.topPos;
    notifi.classNames = option.classNames;
    notifi.autoClose = (typeof option.autoClose === "boolean")? option.autoClose: false;
    notifi.autoCloseTimeout = (option.autoClose && typeof option.autoCloseTimeout === "number")? option.autoCloseTimeout: 3000;
    
    
    // Methods
    notifi.reset = function(){
        notifi.message.empty();
        notifi.self.removeClass(notifi.classNames);
    }
    notifi.show = function(msg,type){
        notifi.reset();
        notifi.self.css('top', notifi.top);
        notifi.message.text(msg);
        notifi.self.addClass(type);
        
        if(notifi.autoClose){
        setTimeout(function(){
            notifi.hide();
        }, notifi.autoCloseTimeout);
        }
    }
    notifi.hide = function(){
        notifi.self.css('top','-100%');
        notifi.reset();
    };
    
    notifi.close.on('click', this.hide);
    
    }
    
    
    