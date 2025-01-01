<script>
    $(document).ready(function() {
        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('input', function() {
                    if (this.value.length > 1) {
                        this.value = this.value[0]; 
                    }
                    if (this.value !== '' && i < inputs.length - 1) {
                        inputs[i + 1].focus(); 
                    }
                });
        
                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === 'Backspace') {
                        this.value = '';
                        if (i > 0) {
                            inputs[i - 1].focus();   
                        }
                    }
                });
            }
        }
        OTPInput();

        // $("#satoshi-otp-form").on("submit", function(e){
        //     e.preventDefault();
        //     let formData = {
        //         first: $("#first").val(),
        //         second: $("#second").val(),
        //         third: $("#third").val(),
        //         fourth: $("#fourth").val(),
        //         email: "<?= $emailuser ?>",
        //     };
        //     return alert("asd");
        //     console.log(formData);
        //     $.ajax({
        //         url: '<?= BASE_URL ?>homepage/satoshi_check_otp',
        //         type: 'POST',
        //         data: formData,
        //         success: function (ress) {
        //             // Parse Data
        //             let result = JSON.parse(ress)
        //             console.log(result);
                    
        //             if(result.code == "200"){
        //                 $('#loadingcontent').modal('show'); 
        //                 setTimeout(() => {
        //                     window.location.href = '<?= BASE_URL?>homepage/satoshi_register_payment/<?= base64_encode($emailuser)?>';
        //                 }, 3000);
        //             }else{
        //                 $(".show-failed").append(`
        //                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                         <strong>
        //                             ${result.message}
        //                         </strong>
        //                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                     </div>               
        //                 `)
                        
        //             }
                    

        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             $(".show-failed").append(`
        //                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                     <strong>
        //                         Please check your internet again
        //                     </strong>
        //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //                 </div>               
        //             `)
        //             console.log(textStatus);
        //         }
        //     })
        // });
    })
</script>