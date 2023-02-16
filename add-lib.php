<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozac BookBuddy</title>
  </head>
  <body> <?php include('navside.php'); ?> <div class="wrapper">
      <h1>Add New Book</h1>
      <br>
      <form action="addBook.php" method="post">
        <table>
          <tr>
            <td colspan="2">
              <h2>Book Information</h2>
              <p>Add new book to the library</p>
            </td>
          </tr>
          <tr>
            <th>ISBN:</th>
            <td>
              <input type="text" name="isbn" id="isbn" placeholder="Ex: 3006">
            </td>
          </tr>
          <tr>
            <th>Book Title:</th>
            <td>
              <input type="text" placeholder="Ex: Book of Biology" name="title" id="title" size="60" required>
            </td>
          </tr>
          <tr>
            <th>Book Description:</th>
            <td>
              <textarea name="desc" id="desc" cols="6" rows="50"></textarea>
            </td>
          </tr>
          <tr>
            <th>Book Type:</th>
            <td>
              <select name="book_type" id="book_type">
                <option value="Ebook">Ebook</option>
                <option value="Physical">Physical</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Status:</th>
            <td>
              <select name="status" id="status">
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
                <option value="Not Available">On Read</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Date Published:</th>
            <td>
              <input type="date" name="date_publish" size="60" required>
            </td>
          </tr>
          <tr>
            <th>Category:</th>
            <td>
              <select id="category" name="category">
                <option value="401">Mathematics</option>
                <option value="402">Articles</option>
                <option value="403">Dictionary</option>
                <option value="404">Documentary</option>
                <option value="405">Encyclopedia</option>
                <option value="406">Historical</option>
                <option value="407">Literature</option>
                <option value="408">Science</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h2>Author Details</h2>
            </td>
          </tr>
          <tr>
            <th>Author:</th>
            <td>
              <input type="text" placeholder="First name" name="firstName" size="10" required>
              <input type="text" placeholder="Last name" name="lastName" size="10" required>
            </td>
          </tr>
          <tr>
            <th>Publisher:</th>
            <td>
              <input type="text" placeholder="Publisher name" name="publish" size="60" required>
            </td>
          </tr>
          <tr>
          <tr>
            <td colspan="2">
              <input type="reset" class="button" value="Clear" style="float: right;">
              <input type="submit" class="button" value="Add Book" style="float: right;">
            </td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>