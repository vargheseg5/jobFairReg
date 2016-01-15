<!DOCTYPE html>

<?php
  require_once('./connect.inc.php');
   if(isset($_POST['company']))
     $company = $_POST['company'];
   else
      die('Please select a company from registration page');

   $q = mysql_query("SELECT `name`, `gender`, `phone`, `email` FROM `participant` WHERE `company1` = '".$company."' OR `company2` = '".$company."' OR `company3` = '".$company."' OR `company4` = '".$company."' OR `company5` = '".$company."'");


  ?>

<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
      .::View Candidates::.
    </title>
    <link href="./css/bootstrap.min.css"
    rel="stylesheet">
  </head>
  
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">
          <?php echo ($_POST['company']); ?>
        </h1>
      </div>
    </div>
    <script src="./js/jquery-2.2.0.min.js">
    </script>
    <script src="./js/bootstrap.min.js">
    </script>
    <div class="well">
      <div class="row">
        <div class="col-md col-md-1" style="display: block;">
        </div>
        <div class="col-md1 col-md-10" style="display: block;">
          <table class="table table-striped table-bordered table-condensed">
            <tbody>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Gender
                </th>
                <th>
                  Phone
                </th>
                <th>
                  Email
                </th>
              </tr>

              <?php
                while ($row = mysql_fetch_array($q))
                {
                  $name = $row[0];
                  $gender = $row[1];
                  $email = $row[3];
                  $phone = $row[2];

                  echo <<< END
                
              <tr>
                <td>
                  $name
                </td>
                <td>
                  $gender
                </td>
                <td>
                  $phone
                </td>
                <td>
                  $email
                </td>
              </tr>

END;
                }
              ?>

            </tbody>
          </table>
          <a href="./index.php" class="btn btn-success">Back</a>
        </div>
        <div class="col-md1" style="display: block;">
        </div>
      </div>
    </div>
  </body>

</html>