<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- META DATA -->
    <meta name="title" content="SMF Health Education Portal">
    <meta name="description" content="SMF Health Education Portal">

    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png">

    <!-- VENDOR CSS FILES -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- FONTS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500;700&family=Sarabun:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/scss/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- SELECTIVE ASSETS -->

</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                SMF Health Portal
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="header-search-bar-wrapper">
                            <div class="search-border"></div>
                            <span class="header-search-bar">
                                <form action="" class="no-toggle-search">
                                    <input class='no-toggle-search' type="text" name="" id="" placeholder="Search...">
                                    <span class="search-from-header-icon-toggler no-toggle-search">
                                        <i class="fa fa-search no-toggle-search"></i>
                                    </span>
                                    <button class="search-from-header-icon-button no-toggle-search">
                                        <i class="fa fa-search no-toggle-search"></i>
                                    </button>
                                </form>
                            </span>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="header-login">Login</a>
                    </li>
                    <li class="nav-item>
                            <a href=" signup.php" class="header-signup">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>


    <div class=" container" style="margin-top: 20%;">
        <form method="post" id="dynamic_form">
            <div class="for_videos">
                <div class="video-1">
                    <label for="">Video 1</label>
                    <label for="">Name</label>
                    <input type="text" name="" id="" placeholder="Video Name...">

                    <label for="">Description</label>
                    <textarea name="" id="" placeholder="Video Description..."></textarea>

                    <label for="">Link</label>
                    <input type="text" name="" id="" placeholder="Video Link...">
                </div>
            </div>
            <button type="button" name="add" id="add" class="btn btn-success">Add</button>
        </form>
    </div>
    </div>

    <script>
        $(document).ready(function() {

            $(this).on("click","#add",function(){
                var html = '<div class="video-1">';
                html += '<label for="">Name</label><input type="text" name="name[]" class="form-control" />';
                html +='<label for="">Description</label><input type="text" name="contentdescription[]" class="form-control" />';
                html += '<label for="">Link</label><input type="text" name="link[]" class="form-control" />';
                html +='<button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></div>';
                    $('.for_videos').append(html);
                
            });
            $(this).on("click",".remove",function(){
                $(this).closest("div.video-1").remove();
            });
            // var count = 1;

            // dynamic_field(count);

            // function dynamic_field(number) {

            //     var html = '<div class="video-1">';
            //     html += '<input type="text" name="name[]" class="form-control" />';
            //     html +='<input type="text" name="contentdescription[]" class="form-control" />';
            //     html += '<input type="text" name="link[]" class="form-control" />';
            //     if (number > 1) {
            //         var html = '<div class="video-1">';
            //     html += '<input type="text" name="name[]" class="form-control" />';
            //     html +='<input type="text" name="contentdescription[]" class="form-control" />';
            //     html += '<input type="text" name="link[]" class="form-control" />';
            //     } else {
            //         html +=
            //             '<div><button type="button" name="add" id="add" class="btn btn-success">Add</button></div></div>';
            //         $('for_videos').html(html);
            //     }
            // }
            // //     html = '<tr>';
            // //     html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
            // //     html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
            // //     if (number > 1) {
            // //         html +=
            // //             '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            // //         $('tbody').append(html);
            // //     } else {
            // //         html +=
            // //             '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            // //         $('tbody').html(html);
            // //     }
            // // }

            // $(document).on('click', '#add', function() {
            //     count++;
            //     dynamic_field(count);
            // });

            // $(document).on('click', '.remove', function() {
            //     count--;
            //     $(this).closest("tr").remove();
            // });



        });

    </script>
    <footer class="footer">
        <div class="container">
            <p class="text-center">
                Copyright Abhiyantrik Technology 2020. All Rights Reserved.
            </p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
