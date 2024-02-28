<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">
  <h2>Add Data For Table</h2>
  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#mymodal" style="margin-bottom: 10px;">Add</button>
</div>
  <div class="col" style="margin-left: 64%;margin-bottom: 1%;">
    <input type="search" name="search" id="search">
    <button type="button" name="all" id="all">Search</button>
  </div>
</div>
  <!-- To add -->
  <div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form onsubmit="return false" id="formdata" method="post">
        <!-- <form onsubmit="return false" id="formdata" method="post" action="insert.php"> -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Data</h4>
        </div>
        <div class="modal-body">
          <div>
            Fullname: <input type="text" name="fullname" id="fullname" value="">
            Email: <input type="text" name="email" id="email" value="">
            <input type="hidden" name="id" id="id">
          </div>
          <div style="margin-top: 10px;">
            Gender: <input type="radio" name="gender" id="male" value="male"> Male
            <input type="radio" name="gender" id="female" value="female"> Female
          </div>
          <div style="margin-top: 10px;">
            Animals:
          <select name="animal" id="animal">
            <option value="Lion">Lion</option>
            <option value="Tiger">Tiger</option>
            <option value="Wolf">Wolf</option>
            <option value="Leopard">Leopard</option>
            <option value="Cheetah">Cheetah</option>
          </select>
          </div>
          <div style="margin-top: 10px;">
            Hobbies:-
            <input type="checkbox" id="Cricket" name="hobbies" class="hobbies" value="Cricket">
            Cricket
            <input type="checkbox" id="Football" name="hobbies" class="hobbies" value="Football">
            Football
            <input type="checkbox" id="Tennis" name="hobbies" class="hobbies" value="Tennis">
            Tennis
             <input type="checkbox" id="Basketball" name="hobbies" class="hobbies" value="Basketball">
            Basketball
             <input type="checkbox" id="Hockey" name="hobbies" class="hobbies" value="Hockey">
             Hockey
          </div>
        </div>
        <button type="submit" style="margin-left: 10px;margin-bottom: 10px;" class="btn btn-primary" id="submit">Submit</button>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <table class="table table-striped">
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Animals</th>
        <th>Hobbies</th>
        <th>Actions</th>
    </tr>
    <tbody id="tbody"></tbody>
  </table>
  <div id="pagination"></div>
</div>
<script src="ajax.js"></script>
</body>
</html>