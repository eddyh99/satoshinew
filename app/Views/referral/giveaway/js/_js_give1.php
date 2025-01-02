<style>
        .title {
            color: #fff;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 1rem 0;
        }
        .subtitle {
            text-align: center;
            font-size: 32px;
            color: #B48B3D;
            margin-bottom: 2rem;
        }
        .link-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .link-input {
            flex-grow: 1;
            margin-right: 1rem;
            background-color: #2a2a2a;
            border: 1px solid #555;
            color: #fff;
            padding: 0.5rem;
            border-radius: 5px;
        }
        .link-input:focus {
            outline: none;
            border-color: #ffc107;
            box-shadow: 0 0 5px rgba(255, 193, 7, 0.8);
        }
        .confirm-button {
            background-color: #B48B3D;
            color: #121212;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .confirm-button:disabled {
            border: 3px solid #B48B3D;
            background-color: #A0A0A0; /* Change to your preferred background color */
            color: #fff; /* Change to your preferred text color */
            cursor: not-allowed; /* Optional: Indicates the button is not clickable */
            opacity: 0.7; /* Optional: Makes the button appear visually distinct */
        }
</style>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
</script>