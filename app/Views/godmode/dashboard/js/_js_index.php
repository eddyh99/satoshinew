<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);

    
    $('#table_totalmember').DataTable({
        "pageLength": 100,
        "scrollX": true,
        "ajax": {
            "url": "<?= BASE_URL ?>godmode/member/get_totalmember",
            "type": "POST",
            "dataSrc":function (data){
                return data;							
            }
        },
        "columns": [
            { data: 'email' },
            { data: 'refcode' },
            { 
                data: "created_at", 
                "mRender": function(data, type, full, meta) {
                    var date = new Date(data);
                    var options = { day: '2-digit', month: 'short', year: 'numeric' };
                    return date.toLocaleDateString('en-GB', options);
                } 
            },
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    if(full.status == 'active'){
                        return `<div>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="8" height="8" rx="4" fill="#0E7304"/></svg>
                                    Active
                                </div>`;
                    }else if(full.status == 'new'){
                        return `<div>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="8" height="8" rx="4" fill="#7F7F7F"/></svg>
                                    New
                                </div>`;
                                
                    }else {
                        return `<div>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="8" height="8" rx="4" fill="#FF0000"/></svg>
                                    Inactive
                                </div>`;
                    }
                } 
            },
           { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                   if (full.membership=='active'){
                       return full.remaining_days;
                   }else{
                       return full.membership;
                   }
                } 
            },
            { data: 'downline_count' },
            { data: 'unpaid_commission' },
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    var btndetail='';
                    if (full.free_status=='yes'){
                        btndetail = `<a href="<?=BASE_URL?>godmode/freemember/detailmember/${encodeURI(btoa(full.email))}"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 3.33333V20H3.33333V3.33333H20ZM17.7778 5.55556H5.55556V17.7778H17.7778V5.55556ZM16.6667 0V2.22222L2.22219 2.22219L2.22222 16.6667H0V0H16.6667ZM15.5556 12.2222V14.4444H7.77778V12.2222H15.5556ZM15.5556 7.77778V10H7.77778V7.77778H15.5556Z" fill="#BFA573"/></svg></a>`
                    }else{
                        btndetail = `<a href="<?=BASE_URL?>godmode/dashboard/detailmember/<?= base64_encode("totalmember")?>/${encodeURI(btoa(full.email))}"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 3.33333V20H3.33333V3.33333H20ZM17.7778 5.55556H5.55556V17.7778H17.7778V5.55556ZM16.6667 0V2.22222L2.22219 2.22219L2.22222 16.6667H0V0H16.6667ZM15.5556 12.2222V14.4444H7.77778V12.2222H15.5556ZM15.5556 7.77778V10H7.77778V7.77778H15.5556Z" fill="#BFA573"/></svg></a>`
                    }
                    if (full.status=='active'){
                        btndetail = btndetail+`&nbsp;&nbsp;<a href="#" onclick="disabledmember('`+full.email+`')"><svg  width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#BFA573" d="M368 128c0 44.4-25.4 83.5-64 106.4l0 21.6c0 17.7-14.3 32-32 32l-96 0c-17.7 0-32-14.3-32-32l0-21.6c-38.6-23-64-62.1-64-106.4C80 57.3 144.5 0 224 0s144 57.3 144 128zM168 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM3.4 273.7c7.9-15.8 27.1-22.2 42.9-14.3L224 348.2l177.7-88.8c15.8-7.9 35-1.5 42.9 14.3s1.5 35-14.3 42.9L295.6 384l134.8 67.4c15.8 7.9 22.2 27.1 14.3 42.9s-27.1 22.2-42.9 14.3L224 419.8 46.3 508.6c-15.8 7.9-35 1.5-42.9-14.3s-1.5-35 14.3-42.9L152.4 384 17.7 316.6C1.9 308.7-4.5 289.5 3.4 273.7z"/></svg></a>`
                    }else{
                        btndetail = btndetail+`&nbsp;&nbsp;<a href="#" onclick="enablemember('`+full.email+`')"><svg  width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#BFA573" d="M192 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-8 352l0-96 16 0 0 96-16 0zm-64 0l-88 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l120 0 80 0 376 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-344 0 0-191.1 28.6 47.5c9.1 15.1 28.8 20 43.9 10.9s20-28.8 10.9-43.9l-58.3-97c-17.4-28.9-48.6-46.6-82.3-46.6l-29.7 0c-33.7 0-64.9 17.7-82.3 46.6l-58.3 97c-9.1 15.1-4.2 34.8 10.9 43.9s34.8 4.2 43.9-10.9L120 256.9 120 448zM598.6 121.4l-80-80c-12.5-12.5-32.8-12.5-45.3 0l-80 80c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L464 141.3 464 384c0 17.7 14.3 32 32 32s32-14.3 32-32l0-242.7 25.4 25.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3z"/></svg>`
                    }
                    btndetail = btndetail + `&nbsp;&nbsp;<a href="<?=BASE_URL?>godmode/dashboard/detailmember/<?= base64_encode("totalmember")?>/${encodeURI(btoa(full.email))}"><svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#BFA573" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>`;
                    return btndetail;
                } 
            },
            
        ],

    });
    
    function disabledmember(email){
        if (confirm("Are you sure you want to disabled this user?")) {
            window.location.replace("<?=BASE_URL?>godmode/dashboard/disabledmember/"+encodeURI(btoa(email)));
        }
    }
    
    function enablemember(email){
        if (confirm("Are you sure you want to activate this user?")) {
            window.location.replace("<?=BASE_URL?>godmode/dashboard/enabledmember/"+encodeURI(btoa(email)));
        }
    }
    
    $('#table_freemember').DataTable({
        "pageLength": 100,
        "scrollX": true,
        "order": false,
        "ajax": {
            "url": "<?= BASE_URL ?>godmode/member/get_freemember",
            "type": "POST",
            "dataSrc":function (data){
                console.log(data);
                return data;							
            }
        },
        "columns": [
            { data: 'email'},
            { 
                data: "created_at", 
                "mRender": function(data, type, full, meta) {
                    var date = new Date(data);
                    var options = { day: '2-digit', month: 'short', year: 'numeric' };
                    return date.toLocaleDateString('en-GB', options);
                } 
            },
            { 
                data: "end_date", 
                "mRender": function(data, type, full, meta) {
                    var date = new Date(data);
                    var options = { day: '2-digit', month: 'short', year: 'numeric' };
                    return date.toLocaleDateString('en-GB', options);
                } 
            },
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    return `<div>
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="8" height="8" rx="4" fill="#0E7304"/></svg>
                                Active
                            </div>`;
                } 
            },
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    const btndetail = `<a href="<?=BASE_URL?>godmode/freemember/detailmember/${encodeURI(btoa(full.email))}"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 3.33333V20H3.33333V3.33333H20ZM17.7778 5.55556H5.55556V17.7778H17.7778V5.55556ZM16.6667 0V2.22222L2.22219 2.22219L2.22222 16.6667H0V0H16.6667ZM15.5556 12.2222V14.4444H7.77778V12.2222H15.5556ZM15.5556 7.77778V10H7.77778V7.77778H15.5556Z" fill="#BFA573"/></svg></a>`
                    return btndetail;
                } 
            },
            
        ],
    });
    
    $('#table_referralmember').DataTable({
        "pageLength": 100,
        "scrollX": true,
        "order": false,
        "ajax": {
            "url": "<?= BASE_URL ?>godmode/member/get_referralmember",
            "type": "POST",
            "dataSrc":function (data){
                console.log(data);
                return data;							
            }
        },
        "columns": [
            { data: 'email'},
            { data: 'total_referral'},
            { data: 'monthly_referral'},
            { data: 'total_unpaid_subscriptions'},
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    if(full.total_unpaid_commission == null){
                        return 0;
                    }
                    return parseInt(full.total_unpaid_commission) + " EUR";
                } 
            },
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    if(full.total_unpaid_commission_previous_month == null){
                        return 0;
                    }
                    return parseInt(full.total_unpaid_commission_previous_month) + " EUR";
                } 
            },
            { 
                data: null, 
                "mRender": function(data, type, full, meta) {
                    const btndisabled = `<a class="mx-2" href="<?=BASE_URL?>godmode/dashboard/detailreferral/<?= base64_encode("referralmember")?>/${encodeURI(btoa(full.email))}"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#BFA573" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.5 11C10.7091 11 12.5 9.20914 12.5 7C12.5 4.79086 10.7091 3 8.5 3C6.29086 3 4.5 4.79086 4.5 7C4.5 9.20914 6.29086 11 8.5 11Z" stroke="#BFA573" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M23 11H17" stroke="#BFA573" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>`
                    const btndetail = `<a href="<?=BASE_URL?>godmode/dashboard/detailreferral/<?= base64_encode("referralmember")?>/${encodeURI(btoa(full.email))}"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 3.33333V20H3.33333V3.33333H20ZM17.7778 5.55556H5.55556V17.7778H17.7778V5.55556ZM16.6667 0V2.22222L2.22219 2.22219L2.22222 16.6667H0V0H16.6667ZM15.5556 12.2222V14.4444H7.77778V12.2222H15.5556ZM15.5556 7.77778V10H7.77778V7.77778H15.5556Z" fill="#BFA573"/></svg></a>`
                    return `${btndisabled} ${btndetail}`;
                } 
            },
            
        ],
    });
</script>