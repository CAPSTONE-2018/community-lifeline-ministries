<?php
include("../../scripts/header.php");

include("../menu/AttendanceCard.php");

?>

<script defer src="../../../js/forms/PrettyDropdowns.js"></script>
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
<?php
include("../../scripts/footer.php");
?>