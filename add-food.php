<center>
<div class = "main-Content">
    <div class = "wrapper">
    <h1>Add Food</h1>
        <form class = "add-admin" action = "" method = "POST" >
            <table class = "tbl0-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name = "title" placeholder="Enter a title" required></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="textbox" name = "description" placeholder="type the description" required></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name = "price" placeholder="Enter the price of the product" required></td>
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
                        <input type="submit" name ="submit" value ="Add Food" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</center>

