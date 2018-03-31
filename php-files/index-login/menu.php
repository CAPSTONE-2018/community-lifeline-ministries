<?php
include("../scripts/header.php");

include("../menu/AttendanceCard.php");

include("../scripts/footer.php");
?>


<script defer src="../../node_modules/pretty-dropdowns/dist/js/jquery.prettydropdowns.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $dropdown = $('select').prettyDropdown({
            height: 40,
            classic: true,
            customClass: "triangle on-hover"
        });
    });
    // When <select> state changes...
    $dropdown.refresh();
</script>