<?php 
   require_once __DIR__ . '/../classes/Inventory.php';
   require_once __DIR__ . '/../classes/StockAddition.php';

   $inv = new Inventory();
   $item_names = $inv->getItemNames();
   $item_names= $item_names->fetch_all();


   $sa = new StockAddition();
   $sa_list = $sa->get_SA_List();
    // create new requst when button pressed
if (isset($_POST["addpurchase"]) ) {
    $added_items = array(); // item eke id eka ekka quantity eka me array ekata dagannawa

    foreach ($item_names as $item){
        //for collect used items quantities
        $item_name = $item[0];
        $quantity = $_POST["$item_name"];

        if ($quantity!=0 && $quantity!=null) {

            $added_item = array($item[0], $quantity);
            $added_items[] = $added_item;
        }
        
    }

    if (!empty($added_items)) {
        
        // danata created_user_id eka 1 authentication nathi nisa
        $sa->Create_SA(1,$added_items );

        // echo ("<script>alert('repair completed succesfully') </script>");
        header("location: ./index.php");
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/a.css">


    <link rel="stylesheet" href="./css/clerk.css">
    <link rel="stylesheet" href="./css/repairHistory.css">
    <link rel="stylesheet" href="./css/purchase.css">
    <link rel="stylesheet" href="./a.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Purchases</title>

</head>

<body>

    <nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">LiFix</span> </span>
            </li>
            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li>
            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-columns"></i><span
                        class="link-text">DailyRepairs</span> </a></li>
            <li class="nav-item"><a class="nav-link" href="./repairHistory.php"><i class="fas fa-history"></i><span
                        class="link-text">RepairHistory</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-file-invoice"></i><span
                        class="link-text">Purchases</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./newlamp.html"><i class="fas fa-plus-square"></i><span
                        class="link-text">LampPost</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-cog"></i><span
                        class="link-text">Settings</span></a></li>

        </ul>

    </nav>
    <script src="../js/slider.js"></script>


    <div class="main_content">
        <header>
            <h1>Purchases</h1>
        </header>
        <div class="container">

        <!-- purchase_list -->
        <?php include_once "./views/purchase_list.php"  ?>

            <div class="table-section">

            <!-- purchase_addnew -->
                        
            <div class="add-new" style="display: none;">
                <div class="feild-row">
                    <h2 class="feild-h">Add new purchase</h2>
                </div>

                  <?php include_once "./views/purchase_addnew.php"  ?>
              
            </div>

                <!-- item table -->
                <table  id="p-table" class="content-table">
                    <thead>
                        <tr>
                            <th>ITEM ID</th>
                            <th>ITEM NAME</th>
                            <th>QUANTITY</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>


            </div>
        </div>

     <script>


            const btnAdd = document.querySelector('#btnAdd');
            const table_section = document.querySelector('.content-table');
            const addnew_section = document.querySelector('.add-new');
            const list_items = document.querySelectorAll('.repair-item');

            btnAdd.addEventListener('click', () => {
                table_section.style.display = 'none';
                addnew_section.style.display = 'block';

            })

            list_items.forEach(item => {
                item.addEventListener('click', () => {
                    addnew_section.style.display = 'none';
                    table_section.style.display = 'table ';

                })
            })


     </script>
           <script src="./purchase.js"></script>

</html>