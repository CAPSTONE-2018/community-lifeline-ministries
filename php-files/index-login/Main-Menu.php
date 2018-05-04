<?php
include("../../db/config.php");
include("../app-shell/TimeZoneFormat.php");
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("./Dashboard.php");
?>

    <script defer src="../../js/forms/PrettyDropdowns.js"></script>
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
include("../app-shell/Footer.php");
