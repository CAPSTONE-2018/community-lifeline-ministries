$(function () {
   $('#custom-modal').on('hidden.bs.modal', function() {
       // $('#custom-modal .modal-header').html('');
       $('#custom-modal .modal-body').html('');
       $("#modal-button-footer-row").html('');
   });
});

$('a[data-toggle="modal"]').on('click', function(){
    //fixes a bootstrap bug that prevents a modal from being reused
    $('.modal-body').load(
        $(this).attr('href'),
        function(response, status, xhr) {
            if (status === 'error') {
                //console.log('got here');
                $('#utility_body').html('<h2>Oh boy</h2><p>Sorry, but there was an error:' + xhr.status + ' ' + xhr.statusText+ '</p>');
            }
            return this;
        }
    );
});