<?php

namespace models;

require_once "Database.php";
class ItemRequest extends Database
{



    public function getItemsfor_ItemRequest_byId($ir_id)
    {
        $q = "SELECT itemrequest_inventory_asc.Item_id, itemrequest_inventory_asc.quantity, inventory.name
         FROM `itemrequest_inventory_asc` INNER JOIN `inventory`
         ON itemrequest_inventory_asc.Item_id=inventory.Item_id 
         WHERE `Itemrequest_id`='$ir_id' ";

        $list =   $this->conn->query($q);
        return $list->fetch_all(MYSQLI_ASSOC);
    }

    public function checkItemRequestAvailability($ir_id)
    {
        $q = "SELECT * FROM `itemrequest` WHERE `Itemrequest_id`='$ir_id' ";

        $list =   $this->conn->query($q);
        if ($list->num_rows > 0)
            return false;
        else
            return true;
    }

    public function getItemRequest_byid($ir_id)
    {
        $q = "SELECT * FROM `itemrequest` WHERE `Itemrequest_id`='$ir_id' ";

        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }



    public function getPendingRequestList($paginationfilter)
    {
        // $q = "SELECT `Itemrequest_id`, `created_by`, `added_date` FROM `itemrequest` WHERE `status`='o' ";
        $q = "SELECT itemrequest.Itemrequest_id,user.username , itemrequest.added_date 
        FROM itemrequest INNER JOIN user 
        ON itemrequest.created_by=user.userId
         WHERE itemrequest.status='a' ORDER BY itemrequest.added_date DESC" . $paginationfilter;

        $list =   $this->conn->query($q);
        return $list;
    }
    public function getPendingRequestListCount()
    {
        // $q = "SELECT `Itemrequest_id`, `created_by`, `added_date` FROM `itemrequest` WHERE `status`='o' ";
        $q = "SELECT count(*) as count
        FROM itemrequest WHERE status='a' ";

        $count =   $this->conn->query($q);
        $count =   $count->fetch_assoc();
        return $count["count"];
    }


    public function getPendingRequestList_by_userid($id)
    {
        $q = "SELECT Itemrequest_id , added_date FROM itemrequest WHERE status='a' AND  created_by='$id' ";
        $list =   $this->conn->query($q);
        return $list;
    }




    public function getItemReqHistorytCount($searchfilter)
    {

        $search_word = " WHERE Itemrequest_id LIKE '%$searchfilter%' OR Name LIKE '%$searchfilter%' OR supplied_date LIKE '%$searchfilter%'  ";

        if ($searchfilter == '') {

            $q = "SELECT COUNT(*) AS count FROM reqhistory_view " ;
        }else{
            
            $q = "SELECT COUNT(*) AS count FROM reqhistory_view " . $search_word ;
        }

        $count =   $this->conn->query($q);
        $count =   $count->fetch_assoc();
        return $count["count"];
    }


    public function getItemReqHistory($paginationfilter,$searchfilter)
    {
        
        $search_word = " WHERE Itemrequest_id LIKE '%$searchfilter%' OR Name LIKE '%$searchfilter%' OR supplied_date LIKE '%$searchfilter%' ";
        if ($searchfilter == '') {
        
            $q = "SELECT * FROM reqhistory_view" . $paginationfilter;
        }else{
            
            $q = "SELECT * FROM reqhistory_view" . $search_word . $paginationfilter;
        }


        $list =   $this->conn->query($q);
        return $list;
    }

    public function getItemReqWithTechName($ir_id)
    {
        // $q = "SELECT `Itemrequest_id`, `created_by`, `added_date` FROM `itemrequest` WHERE `status`='o' ";
        $q = "SELECT itemrequest.Itemrequest_id,user.Name ,itemrequest.supplied_date,itemrequest.added_date
        FROM itemrequest INNER JOIN user 
        ON itemrequest.created_by=user.userId
         WHERE itemrequest.Itemrequest_id='$ir_id' ";

        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }



    public function AddRequestItemRecord($created_user_id, $storekeeper_id, $status)
    {
        $date = date("y-m-d");
        $q = "INSERT INTO `itemrequest`( `status`, `completed_by`, `created_by`,`added_date`) VALUES 
        ('$status', '$storekeeper_id' , '$created_user_id','$date')";

        $this->conn->query($q);
    }

    private function AddRequestedItemAsc($req_id, $item_id, $quantity)
    {
        $q = "INSERT INTO `itemrequest_inventory_asc`( `Itemrequest_id`, `item_id`, `quantity`) VALUES 
        ('$req_id','$item_id' , '$quantity')";

        $this->conn->query($q);
    }

    public function SupplyItemRequest($ir_id, $storekeeper_id)
    {

        $date = date("y-m-d");
        $qurey = "UPDATE `itemrequest` SET `status`='b',`supplied_date`='$date', `completed_by`=$storekeeper_id WHERE `Itemrequest_id`=$ir_id ";

        return $this->conn->query($qurey);
    }

    public function setStatus($ir_id, $status)
    {
        $qurey = "UPDATE `itemrequest` SET `status`='$status' WHERE `Itemrequest_id`=$ir_id ";
        return $this->conn->query($qurey);
    }




    public function CreateItemRequest($created_user_id, $request_items)
    {
        // 
        $this->AddRequestItemRecord($created_user_id, 0, 'a');
        $last_id = $this->conn->insert_id;
        // add ussed items to database
        foreach ($request_items as $item) {
            $this->AddRequestedItemAsc($last_id, $item["itemNo"], $item["Quantity"]);
        }
        return $last_id;
    }
}
