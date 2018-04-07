
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('closed');
            document.cookie = "menuCollapse=True";
            $('#content').toggleClass('col-sm-11');
        });
    });

//    needed for all tooltips
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
    });

</script>

<script type="text/javascript" src="../../js/CapitalizeFirstLetter.js"></script>

</div>
</div>

</body>
</html>