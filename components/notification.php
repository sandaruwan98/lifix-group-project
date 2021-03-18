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
    <span class="clear"></span>
    <script>

        const fab = document.querySelector('.notification-fab');
        fab.addEventListener('click', () => {

            toggleNotificationWidow();
        });


        const toggleNotificationWidow = () => {
            const container = document.querySelector('.notification-container');
            container.classList.toggle("open");
            if (container.classList.contains("open"))
                container.style.height =  "400px";
            else
                container.style.height =  "50px";
            document.querySelector('.notification-fab .wrap').classList.toggle("ani");
            document.querySelector('.img-fab.img').classList.toggle("close");
            document.querySelector('.notification-fab .wrap .count-wrap .count').classList.toggle("count-o");
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
        
            if ($(this).attr('data-type') === 'norm') {

                var classname = '.cl-'+ $(this).attr('id');

                if( $(this).css('margin-right') == '57px' ){
                    $(this).css('margin-right', '7px');
                    $(this).css('margin-left', '7px');
                    $(classname).css('display', 'none');

                }else{
                    
                    $(classname).css('display', 'flex');
                    $(this).css('margin-right', '57px');
                    $(this).css('margin-left', '-43px');
                }
            }



        // if supply confirm notification show confirm modal with table data  (tech)
           if ($(this).attr('data-type') === 'c-supply') {
               $.get('../storekeeper/ajax/getTableData.php?id=' + $(this).attr('data-ref_id'),(data,status)=>{
                    if (status == "success") {
                        $('.dec-sup').attr("id", $(this).attr('data-ref_id') ); 
                        $('.con-sup').attr("id", $(this).attr('data-ref_id') ); 

                        $('.dec-sup').attr("data-noti-id", $(this).attr('id') ); 
                        $('.con-sup').attr("data-noti-id", $(this).attr('id') ); 
                        var tabledata = JSON.parse(data)
                        generateTable(tabledata);
                    }
               })
                toggleNotificationWidow();
                modal.checked = true;
           }

           
            // if lamp post confirm notification show confirm modal with lamp post details (clerk)
           if ($(this).attr('data-type') === 'c-lp') {
               var ids = $(this).attr('data-ref_id');
               ids = ids.split('-')
               $.get('../clerk/ajax/getlpModelData.php?lpid='+ ids[0]+ '&tech=' + ids[1] ,(data,status)=>{
                    if (status == "success") {
                        var lpdata = JSON.parse(data)
                        $('.declinelp').attr("id",lpdata.lp.lp_id); 
                        $('.declinelp').attr("data-noti-id", $(this).attr('id') ); 
                        
                        $('.confirmlp').attr("data-noti-id", $(this).attr('id') ); 

                        $('#lpid').html(lpdata.lp.lp_id); 
                        $('#adr').html(lpdata.lp.division); 
                        $('#date').html(lpdata.lp.date); 
                        $('#tech').html(lpdata.tech); 
                    }
               })
                toggleNotificationWidow();
                modal.checked = true;
           }

        });


        $(document).on('click', '.notification .clear',function(){
            var id = $(this).attr("id");
            load_unseen_notification(id);
            // console.log($(this).attr("id"));
        })

        function generateTable(data) {
            var table = document.querySelector(".modal-window .content-table");
            table.tBodies[0].remove();

            var tbody = table.createTBody();

            data.forEach( item => {
                var row = tbody.insertRow(-1);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = item.name;
                cell2.innerHTML = item.quantity;
            });
            
            
        } 
        
        
        setInterval(function(){ 
        load_unseen_notification(); 
        }, 5000);
        
        }); 

    </script>







</body>


