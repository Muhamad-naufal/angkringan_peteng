<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
<script src="https://kit.fontawesome.com/25db4f44a1.js" crossorigin="anonymous"></script>

<head>
    <title>Order Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin-top: 100px;
        }

        .success-message {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            display: inline-block;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="success-message">
        <h2>Order Successfully Created</h2>
        <p>Thank you for your order!</p>
        <button id="kembaliButton" class="btn btn-success">Kembali</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kembaliButton').click(function() {
                window.location.href = "{{ route('makanan') }}";
            });
        });
    </script>
</body>

</html>
