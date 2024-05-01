<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/eshopper/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/eshopper/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/eshopper/css/style.css" rel="stylesheet">
    @yield('css')
</head>

<body>
   
    @include('Users.component.setting')

    @include('Users.component.header')
 
    @yield('content')
   

    @include('Users.component.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/eshopper/lib/easing/easing.min.js"></script>
    <script src="/eshopper/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact /eshopper/Javascript File -->
    <script src="/eshopper/mail/jqBootstrapValidation.min.js"></script>
    <script src="/eshopper/mail/contact.js"></script>
    <!-- Template/eshopper/ Javascript -->
    <script src="/eshopper/js/main.js"></script>
    @yield('js')
   
    <script>
      
          function AddCart(id) {
            $.ajax({
                url:'addCart/' + id,
                type: 'GET',
                dataType: 'json',

            }).done(function(response){
                if(response.code == 200) {
                    alert('Thêm sản phẩm thành công !');
                }
            })
        }
    </script>
</body>

</html>