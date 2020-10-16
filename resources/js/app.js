import $ from 'jquery/dist/jquery';
import 'bootstrap/dist/js/bootstrap.bundle';

$(document).ready(function () {
    $('.bear-delete-button').on('click', function (e) {
        e.preventDefault();
        $('#destroy-form-' + $(this).data('bear')).submit();
    });
});