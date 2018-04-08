function FilterFields() {
// Declare variables
    var input, filter, table, tr, td, i, show = false;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("searchTable");
    tr = table.getElementsByTagName("tr");

// Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        show = false;
        for (j = 0; j < 14; j++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    show = true;
                }
            }
        }
        if(!show){
            tr[i].style.display = "none";
        }
    }
}
