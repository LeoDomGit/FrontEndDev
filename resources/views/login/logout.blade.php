<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vui lòng chờ !</title>
</head>
<body>
    <?php
        if(!$name||!$image||trim($image,' ')==''||trim($name,' ')==''){
            return redirect('/login');
        }
        ?>
    <input type="hidden" name="" value="<?=$name?>" id="name">
    <input type="hidden" name="" value="<?=$image?>" id="image">
    <img style="width:50%;padding:5% 24%" src="images\nice1.gif" id="waitingimg" alt="">
    <script src="admin/script/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            var image= $("#image").val().trim();
            var name= $("#name").val().trim();
            if(localStorage.getItem('name')){
                localStorage.removeItem('name');
            }
            if(localStorage.getItem('image')){
                localStorage.removeItem('image');
            }
            localStorage.setItem('name', name);
            localStorage.setItem('image', image);
            $.ajax({
                type: "post",
                url: "https://api.trungthanhweb.com/api/logout",
                data: "data",
                dataType: "dataType",
                success: function (response) {
                    
                }
            });
            // window.location.replace('/prodManager');

        });
    </script>
</body>
</html>