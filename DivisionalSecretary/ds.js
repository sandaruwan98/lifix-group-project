$('#my-form').on('submit', function(e)
{
    e.preventDefault();
    
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};
    
    that.find('[name]').each(function(index, value){
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });
    
        $.ajax({ 
            data:    data,
            type:    type,
            url:     url,
            success: function(r) {$('#my-popup').removeClass('hidden')},
            error:   function(r) {alert('error'); console.log(r)}
        });
});