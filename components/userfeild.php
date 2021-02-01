<style>

.ufeild {
    display:flex;
    align-items:center;
    height: 60px;
    background-color: #ffffff33;
    color:aliceblue;
    position: absolute;
    top: 0;
    right: 0px;
    text-align:center;
    padding: 5px 20px;
/*     opacity:0.5; */
}

.ufeild span {
    font-size: 1.6em;
    color:#33faba;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    margin-right: 10px;
}

</style>

<div class="ufeild">
<span>Hi! </span><?= $_SESSION["user"] ?>

</div>