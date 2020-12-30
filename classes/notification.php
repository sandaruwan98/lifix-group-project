<link href="https://fonts.googleapis.com/css?family=Hind:700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="../css/fab.css">

<body style="background-color: rgb(72, 127, 149);">

    <div class="notification-container-wrap">
        <div class="notification-container  popup-ani">
            <header>
                <h1>Notifications</h1>
            </header>


            <input name="email" placeholder="hello@barrel.im" type="email" value=""><br>
            <input class="go-ani" name="submit" type="submit"> <input name="uri" type="hidden" value="barreldotim">

        </div>
        <div class="notification-fab">
            <div class="wrap">
                <div class="img-fab img"></div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
        
        function load_unseen_notification(view = '')
        {
        $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
            $('.dropdown-menu').html(data.notification);
            if(data.unseen_notification > 0)
            {
            $('.count').html(data.unseen_notification);
            }
        }
        });
        }
        
        load_unseen_notification();
        
        $('#comment_form').on('submit', function(event){
        event.preventDefault();
        if($('#subject').val() != '' && $('#comment').val() != '')
        {
        var form_data = $(this).serialize();
        $.ajax({
            url:"insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
            $('#comment_form')[0].reset();
            load_unseen_notification();
            }
        });
        }
        else
        {
        alert("Both Fields are Required");
        }
        });
        
        $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notification('yes');
        });
        
        setInterval(function(){ 
        load_unseen_notification();; 
        }, 5000);
        
        });


        const fab = document.querySelector('.notification-fab');
        fab.addEventListener('click', () => {

            document.querySelector('.notification-fab .wrap').classList.toggle("ani");
            document.querySelector('.notification-container').classList.toggle("open");
            document.querySelector('.img-fab.img').classList.toggle("close");
        })
    </script>







</body>