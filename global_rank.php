<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <title> Global Heist Rankboard </title>
      <style type = "text/css">
         td, th {font-weight: bold;
         color: #000000;
         }
      </style>
      <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5eaca32fb892d40012e34419&product=image-share-buttons" async="async"></script>
      <!-- BEGIN SHAREAHOLIC CODE -->
      <link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
      <meta name="shareaholic:site_id" content="9957840df2657119ab61abdff8da39da" />
      <script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
      <!-- END SHAREAHOLIC CODE -->
   </head>
   <body style = "background-color:#f2f2f2">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
      <script src="https://cdn.jsdelivr.net/g/filesaver.js"></script>
      <nav class="navbar navbar-light" style="background-color: red">
         <a href = "index.html"><span style = "color: white" class="navbar-brand mb-0 h1">
         RankTheHeist.com
         </span></a>
      </nav>
      <div class = "container">
         <strong>Screenshot the Global Rankboard below to share with friends!</strong>
      </div>
      <br>
      <?php
         $servername = "localhost";
         $username = "root";
         $password = "yOvZ9SKt0LWa";
         $dbname = "bitnami_wordpress";
         
         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         
         // Check connection
         if ($conn->connect_error)
         {
           die("Connection failed: " .$conn->connect_error);
         }
         
         $sql = "SELECT * FROM rankboard";
         $result = $conn->query($sql);
         while($row = $result->fetch_assoc())
         {
           $array[$row["name"]] = $row["score"];
         }
         
         
         $conn->close();
         
                arsort($array);
           ?>
      <div id = "div" class = "container" style = "background-color:#b30000">
         <table class = "table table-sm">
            <thead>
               <th colspan = "2">
                  <h5>
                     <i>
                        Global Heist Rankboard at <script>var today = new Date(); var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate(); var time = today.getHours() + ":" + today.getMinutes(); var dateTime = date+' '+time; document.write(dateTime);</script>
                     </i>
                  </h5>
               </th>
            <tbody>
               <?php
                  $i = 0;
                  $n = 1;
                  $loop = 0;
                  foreach($array as $element => $value)
                  {
                  	$loop += 1;
                  	if($loop != 1)
                   {
                   	    if($i == $value)
                       	{
                   	    	print(", " . $element);
                   	    	if($loop == 11)
                   	    	{
                       			print("</td></tr>");
                       		}
                   	    }
                   	    else
                   	    {
                       		$n += 1;
                       		print("</td></tr><tr><td>".$n."</td><td>".$element);
                  
                              if($loop == 11)
                   	    	{
                       			print("</td></tr>");
                       		}
                       	}
                      }
                      else
                      {
                          print("<tr><td>".$n."</td><td>".$element);
                      }
                      $i = $value;
                  }
                  ?>
               <tr>
                  <td colspan = "2" style = "color:white; font-size:small"><i>Rank Money Heist characters at <u>ranktheheist.com</u></i></td>
               </tr>
            </tbody>
         </table>
      </div>
      <br>
      <button id = "button" class="btn btn-success btn-block btn-lg">
      Download Global Heist Rankboard
      </button>
      <script>
         $(document).ready(function(){
           $("#button").click(function(){
             domtoimage.toBlob(document.getElementById("div")).then(function(blob){
         window.saveAs(blob, "Global_Heist_Rankboard.png");
         });
         });
         });
      </script>
      <br>
      <div class='shareaholic-canvas' data-app='share_buttons' data-app-id="28867978" data-title="We're Ranking Money Heist Characters!' data-link='http://www.ranktheheist.com' 
         data-image='http://www.ranktheheist.com/image.png' data-summary='Choose your favorite of two Money Heist
         characters at a time. In the end, get your Heist Rankboard. Your input also contributes to the Global Heist Rankboard, so... Let the fun begin!"></div>
   </body>
</html>

