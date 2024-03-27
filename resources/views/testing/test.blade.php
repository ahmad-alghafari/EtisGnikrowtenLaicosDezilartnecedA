<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="posting"> 
        {{message}}
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    {{-- <script src="{{asset("js/vue/script.js")}}"></script> --}}
    <script>
        new Vue({
        el : '#posting' ,
        data : {
            message : "hello"
        }
    })
    </script>
</body>
</html>