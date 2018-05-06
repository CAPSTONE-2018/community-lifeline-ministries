$(function () {

   $('#customModal').on('hidden.bs.modal', function() {
       $('#customModal #modal-body').html('');
       $("#customFooterActions").html('');
       // $(this).removeData();
   });
});
