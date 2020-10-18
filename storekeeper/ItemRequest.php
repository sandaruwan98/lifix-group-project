

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Item Requests</title>

</head>
<body>
<nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">Li-Fix</span> </span>
            </li>
            <!-- <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li> -->
			<li class="nav-item"><a class="nav-link active" href="./ItemRequest.php"><i class='far fa-list-alt'></i><span
                        class="link-text"> Request Items</span></a></li>	
            <li class="nav-item"><a class="nav-link " href="./requestHistory.html"><i class="fas fa-history"></i><span
                            class="link-text">Item Request History</span></a></li>	
            <li class="nav-item"><a class="nav-link " href="./inventory.php"><i class='far fa-file-alt'></i><span
                class="link-text">Inventory Details</span></a></li>
            <li class="nav-item"><a class="nav-link " href="./stockaddition.html"><i class="fas fa-file-invoice"></i><span
                class="link-text">Issue Items</span></a></li>  	

        </ul>

    </nav>

    <script src="../js/slider.js"></script>
    
    <div class="main_content">
        <header>
            <h1>Item Requests</h1>
        </header>
        <div class="container">
            <div class="p-list-section">

                <button id="btnAdd" class="btn">Issue Items</button>

                <div class="xx">
                    <h2>Pending Requests</h2>
                </div>

                <!-- request list -->
                <?php 
                    
                    require_once __DIR__ . '/../classes/ItemRequest.php';

                    $itemrequest= new ItemRequest();
                    $request_list = $itemrequest->getPendingRequestList();


                    while ($row = $request_list->fetch_assoc()) {
                        
                    
                ?>
                        <div id="" class="repair-item">
                            <div class="row">
                                <span>Date: <?= $row['added_date'] ?></span>
                                <span>Technician: <?= $row['username'] ?></span>
                                <i class="s fas fa-check"></i>
                            </div>
                        </div>
                    
                    <?php } ?>

                </div>
                <div class="table-section">

                    <div class="add-new" style="display: none;">
                        <form>

                            <div class="feild-row">
                                <h2>Issue Items</h2>

                            </div>   
                            <?php 
                            require_once __DIR__ . '/../classes/Inventory.php';

                            $inv = new Inventory();
                            $item_names = $inv->getItemNames();
                            $item_names= $item_names->fetch_all();

                            foreach ($item_names as $item):  ?>
                            <div class="feild-row">
                                <label> <?= $item[1] ?></label>
                                <input class="field" type="text" placeholder="Enter Amount" name=" <?= $item[0] ?>" id="">
                            </div>
                              <?php endforeach ?>

                              
                            <div class="feild-row">
                                <button class="btn" type="submit">SUBMIT</button>
                            </div>
                        </form>
                    </div>

                    <div class="supply">
                         <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SUNBOXES</td>
                                <td>20</td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>WIRES</td>
                                <td>50m</td>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td>FUSE</td>
                                <td>20</td>

                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>6</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>7</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>8</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>

                        </tbody>


                    </table>

                    <!-- supply button -->
                    <button class="btn " style="font-size: large;">Supply items to technician</button>

                    </div>
                   

                </div>


            </div>
        </div>

        <script>
            const btnAdd = document.querySelector('#btnAdd');
            const table_section = document.querySelector('.supply');
            const addnew_section = document.querySelector('.add-new');
            const list_items = document.querySelectorAll('.repair-item');

            btnAdd.addEventListener('click', () => {
                table_section.style.display = 'none';
                addnew_section.style.display = 'block';

            })

            list_items.forEach(item => {
                item.addEventListener('click', () => {
                    addnew_section.style.display = 'none';
                    table_section.style.display = 'block ';

                })
            })
        </script>
</body>
</html>