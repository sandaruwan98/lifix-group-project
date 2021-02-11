

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

    
    