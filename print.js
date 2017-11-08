function printReport(printable){
    var former_page = document.body.innerHTML;
    var printable_report = document.getElementById(printable).innerHTML;
    
    document.body.innerHTML = printable_report;
    window.print();
    document.body.innerHTML = former_page;
}
    
