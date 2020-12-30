<link href="https://fonts.googleapis.com/css?family=Hind:700" rel="stylesheet">
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
        const fab = document.querySelector('.notification-fab');
        fab.addEventListener('click', () => {

            document.querySelector('.notification-fab .wrap').classList.toggle("ani");
            document.querySelector('.notification-container').classList.toggle("open");
            document.querySelector('.img-fab.img').classList.toggle("close");
        })
    </script>







</body>