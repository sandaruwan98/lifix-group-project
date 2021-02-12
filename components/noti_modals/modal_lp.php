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
                <button onclick="confirmlp()" class="field danger">Confirm</button>
                
                <button id="0" onclick="declinelp(this.id)" class="field success declinelp">Decline</button>
            </div>
            
            <div class="modal-overlay"></div>
    
            <script>

                function confirmlp() {
                    
                }

                function declinelp(id) {
                    // send ajax to delete lp
                    $.get("x.php?id=" + id , (status)=>{
                        if (status == "success") {
                            location.reload();
                        }
                    })
                }

            </script>