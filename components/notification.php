<link href="https://fonts.googleapis.com/css?family=Hind:700" rel="stylesheet">
<script src="../js/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="../css/fab.css">

<body style="background-color: rgb(72, 127, 149);">

    <div class="notification-container-wrap">
        <div  class="notification-container  popup-ani">
            <header>
                <h1>Notifications</h1>
            </header>
        </div>
        <div class="notification-fab">
            <div class="wrap">
                <div class="img-fab img"><div class="count-wrap"><span class="count"></span></div></div>
            </div>
        </div>
    </div>
    
    <script>

        const fab = document.querySelector('.notification-fab');
        fab.addEventListener('click', () => {

            toggleNotificationWidow();
        });


        const toggleNotificationWidow = () => {
           
            document.querySelector('.notification-fab .wrap').classList.toggle("ani");
            document.querySelector('.notification-container').classList.toggle("open");
            document.querySelector('.img-fab.img').classList.toggle("close");
        }

        $(document).ready(function(){
            load_unseen_notification();
        
            function load_unseen_notification(view = '',)
            {
               
                $.post( "../utils/fetch.php", {view:view})
                .done(function( data ) {
                    
                    data = JSON.parse(data);
                    $('.notification-container').html(data.notification);
                    $('.notification-container').css({
                        "overflow": "auto"
                    });
                    $('.notification').css({
                        "padding" : "10px 10px",
                        "cursor": "pointer"
                    });
                    $('.notification').css({
                        "text-decoration": "none",
                        "color" : "black",
                        "display" : "flex",
                        "flex-direction": "column",
                        "align-items": "start",
                    });
                    if(data.unseen_notification > 0)
                    {
                        $('.count').html(data.unseen_notification);
                        $('.count').css({
                            "position": "absolute",
                            "top": "-10px",
                            "right": "-10px",
                            "padding": "5px 10px",
                            "border-radius": "50%",
                            "background": "red",
                            "color": "white",
                            
                        });
                    }
                });

               
            }
        
            // load_unseen_notification();
        const modal = document.querySelector('.modal-launcher');
        $(document).on('click', '.notification', function(){
            $('.count').html('');
            $('.count').css({
                "position": "",
                "top": "",
                "right": "",
                "padding": "",
                "border-radius": "",
                "background": "",
                "color": ""
            });

           // load_unseen_notification($(this).attr('id'));
            toggleNotificationWidow();
           modal.checked = true;
           
        });
        
        
        setInterval(function(){ 
        load_unseen_notification(); 
        }, 5000);
        
        }); 

    </script>







</body>


