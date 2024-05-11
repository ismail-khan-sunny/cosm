$(document).ready(function() {

    $('#NewsStartDate').Zebra_DatePicker({
        pair: $('#NewsEndDate')
    });
    
    $('#NewsEndDate').Zebra_DatePicker();
    $('#NoticeStartDate').Zebra_DatePicker();
    
    $('#EventStartDate').Zebra_DatePicker({
        direction: true,
    });
    
    $('#EventEndDate').Zebra_DatePicker({
        direction: true,
    });
    

});