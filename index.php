<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Json2</title>
</head>

<body>
    <button id="btnBack"> back </button>
    <h3>comments</h3>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>PostId</th>

                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody id="tblPost">
            </tbody>
        </table>
    </div>
    <div id="comments">
        <table>
            <thead>
                <tr>
                    <th>PostId</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody id="tblcommets">
            </tbody>
        </table>
    </div>

</body>
<script>
    function LoadPosts() {
        $("#main").show();
        $("#comments").hide();
        var url = "https://jsonplaceholder.typicode.com/comments"
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    var line = "<tr>";
                    line += "<td>" + item.postId + "</td>"
                    line += "<td><b>" + item.id + "</b><br/>"
                    line += "<td><b>" + item.name + "</b><br/>"
                    line += "<td><b>" + item.email + "</b><br/>"
                    line += item.body + "</td>"

                    line += "<td><button onClick='showcomments(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#tblPost").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {
            })
    }

    function showcomments() {
        $("#main").hide();
        $("#commsnts").show();
        var url = "https://jsonplaceholder.typicode.com/posts/1/comments"
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='comments'";

                line += "<td><b>" + data.ID + "</b><br/>"
                line += "<td><b>" + data.Name + "</b><br/>"
                line += "<td><b>" + data.Email + "</b><br/>"
                line += "<td><b>" + data.Body + "</b><br/>"
                line += "<td>" + data.PostId + "</td>"
                line += "</tr>";
                $("#tblcomments").append(line);

            })
            .fail((xhr, err, status) => {
            })

    }

    $(() => {
        LoadPosts();
        $("#detail").hide()
        $("#main").show();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#comments").show();
            $("#details").remove();

        });

    })

</script>

</html>
