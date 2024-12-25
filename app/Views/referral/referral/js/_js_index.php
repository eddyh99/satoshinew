<script>
     
    $('#table_referralmember').DataTable({
        "pageLength": 50,
        "scrollX": true,
        "order": false,
        "ajax": {
            "url": "<?= BASE_URL ?>referral/referral/get_downline",
            "type": "POST",
            "dataSrc":function (data){
                console.log(data);
                return data;							
            }
        },
        "columns": [
            { data: 'email'},
            { data: 'status'},
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    var subscription='';
                    if (parseInt(full.day)>0){
                        subscription = full.day + "days until "+full.end_date;
                    }
                    return subscription;
                } 
            },
        ],
    });
</script>