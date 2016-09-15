<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.ajax({url: "api/", success: function(result){
                    $("#div1").html(result);
                }});
            });
        });
    </script>
</head>
<body>
<div id="div1"><h2></h2></div>

<button>Get External Content</button>

</body>
</html>