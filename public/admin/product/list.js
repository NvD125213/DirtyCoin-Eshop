function actionDelete (event) {
    event.preventDefault();
    let urlrequest = $(this).data('url')
    let that = $(this)
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa không?",
        text: "Dữ liệu sau khi xóa sẽ không thể khôi phục!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Đồng ý!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlrequest,
                success: function (data) {
                    if(data.code == 200) {
                        that.parent().parent().remove();
                    }
                    Swal.fire({
                        title: "Xóa!",
                        text: "Dữ liệu đã được xóa.",
                        icon: "success"
                      });
                },
                error: function() {
                    
                }
            });
          
        }
      });
}

$(function() {
    $(document).on('click', '.action_delete', actionDelete);
});