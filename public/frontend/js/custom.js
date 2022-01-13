$(document).ready(function () {
    $('.addCart').click(function (e) {
        e.preventDefault();

        var p_id = $(this).closest('.data_produk').find('.produk_id').val();
        var p_qty = $(this).closest('.data_produk').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'produk_id': p_id,
                'produk_qty': p_qty,
            },
            success: function (response) {
                swal("",response.status,"success");
            }
        });

    });
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.data_produk').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.data_produk').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var dec_value = $(this).closest('.data_produk').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.data_produk').find('.qty-input').val();
        }
    });

    $('.delete-item').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.data_produk').find('.produk_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                swal("", response.status, "success")
            }
        });
    });
});
