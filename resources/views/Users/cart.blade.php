@extends('layouts.master')

@section('content')

@include('Users.component.wrap-title',  ['title' => 'Giỏ hàng', 'home' => 'Trang chủ', 'content' => 'Giỏ hàng'])


<div class="cart-wrapper">
   @include('Users.component.cart_component')
</div>


@stop
@section('js')
    <script>

      $(document).ready(function() {
        $('input[id^="quantity_"]').change(function() {
            let id = $(this).data('id')
            let quantity = $(this).parents('tr').find('input').val()
            $.ajax({
                type: "GET",
                url: 'updateCart/',
                data: {
                    id: id,
                    quantity: quantity
                }
            }).done(function(response) {
                $('#total_' + id).text(response.totalProduct);
                $('#subTotal').text(response.subTotal);

            })
           
        })
      })

      $(document).ready(function() {
        $('.btn-delete').click(function() {
            var id = $(this).data('id'); 
            $.ajax({
                url: "{{ route('deleteCart') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"

                },
                success: function(response) {
                    $('#row_' + id).remove();
                    $('#subTotal').text(response.subTotal);
                }
            });
        });
    });
    </script>
@endsection
