<link rel="stylesheet" href="./../css/notifimodal.css">    

	
		<!-- <span class="modal-button">Open Modal</span> -->
		<input type="checkbox" class="modal-launcher">
		
		

            <div class="modal-window sup-madal">
                <h2>Confirm Supplied Items</h2>

                <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                </table>
                <br>

                <button name="decline" onclick="confirmSupp(this.id,this.getAttribute('data-noti-id'))" class="field success con-sup">Confirm</button>
                
                <button name="accept" onclick="declineSupp(this.id,this.getAttribute('data-noti-id'))" class="field danger dec-sup">Decline</button>
            </div>
            
            <div class="modal-overlay"></div>
    
            <script>

function confirmSupp(id,noti_id) {
    console.log(noti_id);
    // send ajax to 
    $.get("../components/noti_ajax/supplyconfirm.php?id=" + id + '&noti_id='+ noti_id , (data,status)=>{
        
        if (status == "success") {
            // console.log(data);
            location.reload();
        }
    })
}

function declineSupp(id,noti_id) {
    // send ajax to 
    $.get("../components/noti_ajax/supplydecline.php?id=" + id + '&noti_id='+ noti_id , (data,status)=>{
        
        if (status == "success") {
            // console.log(data);

            location.reload();
        }
    })
}

</script>