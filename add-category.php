<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href = "admin.css">
    
</head>
<body>

<center class="center">
<div class = "main-Content">
    <div class = "wrapper">
    <h1>Add Category</h1>
        <form class = "add-admin" action = "" method = "POST" >
            <table class = "tbl0-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name = "title" placeholder="Enter a title" required></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name = "image_name"  accept = "image"required>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="text" name = "featured" placeholder = "featured" required>
                    </td>
                </tr>
                 <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name = "active" value="yes" required>Yes <br>
                        <input type="radio" name = "active" value="No" required>No <br>
                    </td>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" name ="submit" value ="Add Category" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</center>
</body>

</html>