
<script type="text/javascript" >
    $(document).ready(function () {
        $("#loginform").validate({
            rules: {
               email: {required: true},
                password: {required: true}

            },
            messages: {
               email: {required: '<span style="color:red;font-size:11px;">Please enter username or email</span>'},
                password: {required: '<span style="color:red;font-size:11px;">Please enter password</span>'}
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>

<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>