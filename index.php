
<!DOCTYPE html>

<?php
  require_once('./connect.inc.php');

  if(isset($_POST['name']))
  {
    mysql_query("INSERT INTO `participant` VALUES (NULL, '".$_POST['name']."', '".$_POST['sex']."', '".$_POST['dob']."', '".$_POST['college']."', '".$_POST['course']."', '".$_POST['specialization']."', '".$_POST['year']."', '".$_POST['x-percentage']."', '".$_POST['x-board']."', '".$_POST['xii-percentage']."', '".$_POST['xii-board']."', '".$_POST['degree-percentage']."', '".$_POST['backlogs']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['c1']."', '".$_POST['c2']."', '".$_POST['c3']."', '".$_POST['c4']."', '".$_POST['c5']."')");
    unset($_POST['name']);
  }

?>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="A simple registration form for SCT Job Fair" content="">
    <meta name="Renjith Warrier and Varghese George" content="">
    <title>
      .::Job Fair Registration::.
    </title>
    <link href="./css/bootstrap.min.css"
    rel="stylesheet">
    <script type="text/javascript">
      function optselected(ele)
      {
        var called, c1, c2, c3, c4, c5, tc, i, base, eid, j;
        called = ele.id;
        tc = <?php
            $q = mysql_query("SELECT count(*) FROM `companies`");
            echo mysql_fetch_array($q)[0];
        ?>;
        c1 = document.getElementById('c1');
        c2 = document.getElementById('c2');
        c3 = document.getElementById('c3');
        c4 = document.getElementById('c4');
        c5 = document.getElementById('c5');

        var selectedc1, selectedc2, selectedc3, selectedc4, selectedc5;

        selectedc1 = c1.value;
        selectedc2 = c2.value;
        selectedc3 = c3.value;
        selectedc4 = c4.value;
        selectedc5 = c5.value;

        var k, now;

        for(j = 1; j <= 5; j++)
        {
          base = 'c'.concat(j.toString(), 'op');
          for(i = 1; i <= tc; i++)
          {
            eid = base.concat(i.toString());
            document.getElementById(eid).disabled = false;
          }
        }

        for(k=1; k<=5; k++)
        {
          if(k==1)
            now = selectedc1;
          else if(k==2)
            now = selectedc2;
          else if(k==3)
            now = selectedc3;
          else if(k==4)
            now = selectedc4
          else
            now = selectedc5;

          for(j = 1; j <= 5; j++)
          {
            if(j==k)
              continue;

            base = 'c'.concat(j.toString(), 'op');
            for(i = 1; i <= tc; i++)
            {
              eid = base.concat(i.toString());
              if((document.getElementById(eid).value == now))
                document.getElementById(eid).disabled = true;
            } 

          }
        }
      }
    </script>
  </head>
  
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">
          Job Fair Registration
        </h1>
      </div>
    </div>
    <script src="./js/jquery-2.2.0.min.js">
    </script>
    <script src="./js/bootstrap.min.js">
    </script>
    <div class="well">
      <div class="row">
        <div class="col-md-8">
          <h3 class="text-center">
            Enter the following participant details.
          </h3>
          <div class="container">
            <form method="POST" action="" name="registrationForm">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Participant Name" name="name">
              </div>
              <div class="form-group">
                <label>
                  Gender
                </label>
                <select class="form-control" name="sex">
                  <option value="M">
                    Male
                  </option>
                  <option value="F">
                    Female
                  </option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="DOB (dd-mm-yyyy)" name="dob">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="College" name="college">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Course (eg. B.Tech, MCA etc)" name="course">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Specialization" name="specialization">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Year of Graduation" name="year">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Percentage in X (eg. 80)" name="x-percentage">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Class X Board" name="x-board">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Percentage in XII or Diploma (eg. 85)" name="xii-percentage">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Class XII Board or Diploma University)" name="xii-board">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Percentage in degree course. If GPA multiply by 10 (eg. 78.94)" name="degree-percentage">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Number of Backlogs (0 for none)" name="backlogs">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Id" name="email">
              </div>
              <div class="form-group">
                <label>
                  Company 1
                </label>
                <select class="form-control" name="c1" onchange="optselected(this)" id="c1">
                  <option value="NA" id="c1na">
                    NA
                  </option>
                  <?php

                    $q = mysql_query("SELECT `name` FROM `companies`");

                    $temp = $q;
                    $count = 0;

                    while ($row = mysql_fetch_array($q))
                    {
                        $count++;
                        $n = $row[0];

                        echo <<<END
                          <option value="$n" id="c1op$count">
                            $n
                           </option>
END;
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>
                  Company 2
                </label>
                <select class="form-control" name="c2" onchange="optselected(this)" id="c2">
                  <option value="NA" id="c2na">
                    NA
                  </option>
                  <?php
                      mysql_data_seek($q, 0);

                      $count = 0;

                    while ($row = mysql_fetch_array($q))
                    {
                        $count++;
                        $n = $row[0];

                        echo <<<END
                          <option value="$n" id="c2op$count">
                            $n
                           </option>
END;
                    }

                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>
                  Company 3
                </label>
                <select class="form-control" name="c3" onchange="optselected(this)" id="c3">
                  <option value="NA" id="c3na">
                    NA
                  </option>
 <?php
                      mysql_data_seek($q, 0);

                      $count = 0;

                    while ($row = mysql_fetch_array($q))
                    {
                        $count++;
                        $n = $row[0];

                        echo <<<END
                          <option value="$n" id="c3op$count">
                            $n
                           </option>
END;
                    }

                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>
                  Company 4
                </label>
                <select class="form-control" name="c4" onchange="optselected(this)" id="c4">
                  <option value="NA" id="c4na">
                    NA
                  </option>
 <?php
                      mysql_data_seek($q, 0);

                      $count = 0;

                    while ($row = mysql_fetch_array($q))
                    {
                        $count++;
                        $n = $row[0];

                        echo <<<END
                          <option value="$n" id="c4op$count">
                            $n
                           </option>
END;
                    }

                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>
                  Company 5
                </label>
                <select class="form-control" name="c5" onchange="optselected(this)" id="c5">
                  <option value="NA" id="c5na">
                    NA
                  </option>
 <?php
                      mysql_data_seek($q, 0);

                      $count = 0;

                    while ($row = mysql_fetch_array($q))
                    {
                        $count++;
                        $n = $row[0];

                        echo <<<END
                          <option value="$n" id="c5op$count">
                            $n
                           </option>
END;
                    }

                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4" style="display: block;">
          <h3 class="text-center">
            Company Registration Status
          </h3>
          <iframe src="./status.php" style="width:100%;"></iframe>
        </div>
      </div>
    </div>
  </body>

</html>