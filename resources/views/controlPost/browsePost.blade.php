<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    @foreach ($post as $item)
        <button type="button" class="collapsible">{{ $item->title }}</button>
        <div class="content">
            <p>{{ $item->sub_title }}</p>
            <p>{{ $item->comment }}</p>
        </div>
        <div>
            <form action="/browse-post/{{ $item->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" value="1" name="status" style="display:none">
                <button type="submit">Duyệt</button>

            </form>
            <form action="/browse-post/{{ $item->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" value="2" name="status" style="display:none">
                <button type="submit">Từ chối</button>

            </form>

        </div>
    @endforeach


</body>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</html>
