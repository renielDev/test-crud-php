$(function() {
    $('.eBtnDelete').on('click', function() {
        $.post('/actionStudent.php', {
            '_method' : 'DELETE',
            'id': $(this).data('id')
        }, function() {
            location.reload();
        });
    });

    $('.eBtnEdit').on('click', function() {
        var _li = $(this).closest('li');
        var _form = $('.frmStudent');
        _form.find('[name=id]').val($(this).data('id'));
        _form.find('[name=email]').val(_li.data('email'));
        _form.find('[name=first_name]').val(_li.data('firstname'));
        _form.find('[name=last_name]').val(_li.data('lastname'));
        _form.find('[name=contact]').val(_li.data('contact'));
        _form.find('[name=_method]').val('PUT');
    });

    $('.frmStudent .eFormReset').on('click', function() {
        $(this).siblings('[name=_method]').val('');
    });
});
