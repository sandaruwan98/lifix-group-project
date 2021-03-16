<link rel="stylesheet" href="./../css/notifimodal.css">    

	
		<!-- <span class="modal-button">Open Modal</span> -->
		<input type="checkbox" class="modal-launcher">
		
		

            <div class="modal-window">
                <h2>Confirm new lamp post</h2>
                <br>
                <p >Lamp post id : </p>
                <p id="lpid" class="val">#2314</p>
                <br>
                <p>Address : </p>
                <p id="adr" class="val">sefesf,fewfew,dfddd</p>
                <br>
                <p>Date : </p>
                <p id="date" class="val">23-02-32</p>
                <br>
                <p>Added technician : </p>
                <p id="tech" class="val"></p>
                <br>
                <button onclick="confirmlp( this.getAttribute('data-noti-id') )" class="field danger confirmlp">Confirm</button>
                
                <button id="0" onclick="declinelp(this.id,this.getAttribute('data-noti-id') )" class="field success declinelp">Decline</button>
            </div>
            
            <div class="modal-overlay"></div>
    
            <script>

                function confirmlp(noti_id) {
                    // delete relevant notification
                    $.get("../components/noti_ajax/acceptlamppost.php?noti_id=" + noti_id , (data,status)=>{
                        if (status == "success") {
                            location.reload();
                        }
                    })
                }

                function declinelp(id,noti_id) {
                    // send ajax to delete lp
                    $.get("../components/noti_ajax/deletelamppost.php?id=" + id  + '&noti_id='+ noti_id , (data,status)=>{
                        
                        if (status == "success") {
                            location.reload();
                        // console.log(data);

                        }
                    })
                }

            </script>