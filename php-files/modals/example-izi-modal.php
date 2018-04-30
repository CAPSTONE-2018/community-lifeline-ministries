<?php
include("../scripts/header.php");
//include("../../../db/config.php");
$studentIdToArchive = $_POST['studentIdToArchive'];
$tableToLookUp = $_POST['tableToLookUp'];
$nameToDisplay = $_POST['nameToDisplay'];
$userType = substr(trim($tableToLookUp), 0, -1);
?>
<div class="delete-user-modal">
    <div class="duplicate-message">
        Are you sure you want to archive the <?php echo $userType; ?>,<br/>
        <?php echo $nameToDisplay; ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                onclick="archiveUser(<?php echo $studentIdToArchive; ?>)">Yes, Im Sure
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
    </div>
</div>

<div>

    <button class="open-options button">options</button>
    <div id="modal-options" data-izimodal-group="group1" data-izimodal-loop="" data-izimodal-title="オプション設定モーダル" data-izimodal-subtitle="サブタイトル">
        <p>このモーダルはオプション設定をしています<br>iframeモーダルとグループ設定しています</p>
    </div>

</div>

<script type="text/javascript">

    $(document).on('click', '.open-options', function(event) {
        event.preventDefault();
        $('#modal-options').iziModal('open');
    });
    $('#modal-options').iziModal({
        headerColor: '#26A69A', //ヘッダー部分の色
        width: '50%', //横幅
        overlayColor: 'rgba(0, 0, 0, 0.5)', //モーダルの背景色
        fullscreen: true, //全画面表示
        transitionIn: 'fadeInUp', //表示される時のアニメーション
        transitionOut: 'fadeOutDown' //非表示になる時のアニメーション
    });


    function archiveUser(studentId) {
        $.ajax({
            url: "../archive/ArchiveStudent.php",
            method: "POST",
            data: {studentId: studentId},
            success: function (output) {
                if (output == 0) {
                    window.location.href = "../show/ShowStudents.php"
                } else {
                    alert("Whoops! There is an issue connecting to database");
                }
            }
        });
    }
</script>

<?php
include("../scripts/footer.php");
