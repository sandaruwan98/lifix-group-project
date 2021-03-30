<link rel="stylesheet" href="./../css/notifimodal.css">    

	
		<!-- <span class="modal-button">Open Modal</span> -->
		<input type="checkbox" class="modal-launcher">
		
		

            <div class="modal-window">
                <h2>Activate new account</h2>
                <br>
                <p >Username : </p>
                <p id="username" class="val">Loading ...</p>
                <br>
                <p >Full Name : </p>
                <p id="name" class="val">Loading ...</p>
                <br>
                <p>Phone No : </p>
                <p id="phone" class="val">Loading ...</p>
                <br>
                <p>Role : </p>
                <p id="role" class="val">Loading ...</p>
                <br>
               
                <button onclick="confirmacc(this.id, this.getAttribute('data-noti-id') )" class="field success confirmacc">Activate Account</button>
                
                <button id="0" onclick="declineacc(this.id, this.getAttribute('data-noti-id') )" class="field danger declineacc">Decline Account</button>
            </div>
            
            <div class="modal-overlay"></div>
    
            <script>

                function confirmacc(id,noti_id) {
                    // send ajax to activate activate
                    $.get("../components/noti_ajax/activate_acc.php?id="+ id + "&noti_id=" + noti_id , (data,status)=>{
                        if (status == "success") {
                            location.reload();
                        }
                    })
                }

                function declineacc( id,noti_id ) {
                    // send ajax to declne account
                    $.get("../components/noti_ajax/decline_acc.php?id="+ id + "&noti_id=" + noti_id , (data,status)=>{
                        
                        if (status == "success") {
                            location.reload();
                        // console.log(data);

                        }
                    })
                }

            </script>