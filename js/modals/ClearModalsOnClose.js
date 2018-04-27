$(function () {
    // when the modal is closed
    $('#custom-modal').on('hidden.bs.modal', function () {
        $(".modal-header").val("");
        $(".modal-body input").val("");
        $(".modal-footer").val("");
    });
});
