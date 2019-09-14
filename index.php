<!doctype html>
<html lang="en">

<head>
    <title>PHP PDO PAGINATION TEST + Auto Refresh Content</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
        integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- CSS for Page Never use like this it is only for test purpose -->
    <style>
    body,
    html {
        width: 100%;
        height: 100%;
    }

    h1 {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    a.pagination-link {
        display: inline-block;
        text-align: center;
    }

    .page-active {
        background: tomato;
    }
    </style>

</head>

<body>

    <h1>Pagination Test using ajax + auto refesh Content</h1>
    <!-- Here the Data will be loaded using ajax from data.php -->
    <div id="load_data"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous">
    </script>
    <script>
    // Using Ajax to load Data
    $(document).ready(function() {
        setTimeout(() => {
            load_fn_data();
        }, 1000);
    });

    function load_fn_data(page) {
        $.ajax({
            url: "data.php",
            method: "POST",
            data: {
                page: page
            },
            success: function(data) {
                $('#load_data').html(data);
            }
        });
    }

    // For Pagination
    $(document).on('click', '.pagination-link', function() {
        var page = $(this).attr("id");
        load_fn_data(page);
    });
    </script>
</body>

</html>