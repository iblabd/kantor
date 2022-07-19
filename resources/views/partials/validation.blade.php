<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" async></script>
<script>
    $(function() {
        $(".needs-validation").validate({
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                password_confirmation: {
                    equalTo: "#password"
                },
                telephone: {
                    digits: true,
                    minlength: 8,
                    maxlength: 10
                },
                pos: {
                    digits: true,
                    minlength: 5,
                    maxlength: 5
                },
                rt: {
                    digits: true,
                    maxlength: 3
                },
                rw: {
                    digits: true,
                    maxlength: 3
                },
                kota: {
                    number: false;
                },
                provinsi: {
                    number: false
                },
                kecamatan: {
                    number: false
                },
                kelurahan: {
                    number: false
                },
                nama: {
                    number: false
                }
            }
        });
    });
</script>
