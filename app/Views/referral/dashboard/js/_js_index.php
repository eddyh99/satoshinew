<style>
.referral-box {
    display: flex;
    align-items: center;
    background-color: #1a1a1a;
    border:1px solid #8a6d3b;
    padding: 10px;
    border-radius: 8px;
    width: fit-content;
}
.referral-link a:link { 
    margin-right: 10px;
    color: white; /* Default color */
    text-decoration: none; /* No underline */
}
.qr-button {
    display: flex;
    border: none;
    align-items: center;
    background-color: transparent;
    cursor: pointer;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
    
    $("#qrbutton").on("click",function(){
        const hiddenInput = document.getElementById("reftext");

        // Create a temporary input element
        const tempInput = document.createElement("input");
        tempInput.type = "text";
        tempInput.value = hiddenInput.value;
        document.body.appendChild(tempInput);
    
        // Select and copy the text
        tempInput.select();
        document.execCommand("copy");
    
        // Remove the temporary input element
        document.body.removeChild(tempInput);
    
        // Alert the user
        alert("Referral link copied to clipboard!");
    })

    
    $('#table_totalmember').DataTable({
        "pageLength": 25,
        "scrollX": true,
        "ajax": {
            "url": "<?= BASE_URL ?>referral/dashboard/get_withdrawal",
            "type": "POST",
            "dataSrc":function (data){
                return data;							
            }
        },
        "columns": [
            { data: 'requested_at' },
            { data: 'amount' },
            { data: 'status' },
        ],

    });
    
</script>