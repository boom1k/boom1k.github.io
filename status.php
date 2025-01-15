<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/status.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="This site was made by MAXO <3 | this is just preview">
    <title>IceCube | boom1k_ <3</title>
    <script src="https://kit.fontawesome.com/e20c9923e7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.sellix.io/static/js/embed.js"></script>
    <link href="https://cdn.sellix.io/static/css/embed.css" rel="stylesheet"/>

    
    <meta name="description" content="Web site created using create-react-app"/>
    <link rel="apple-touch-icon" href="https://cdn.discordapp.com/avatars/1260026642974380052/804c151e36b924675c9d65ee122a758d.webp?size=1024&format=webp&width=0&height=256" />
    <!--
      manifest.json provides metadata used when your web app is installed on a
      user's mobile device or desktop. See https://developers.google.com/web/fundamentals/web-app-manifest/
    -->
    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />
    <!--
      Notice the use of %PUBLIC_URL% in the tags above.
      It will be replaced with the URL of the `public` folder during the build.
      Only files inside the `public` folder can be referenced from the HTML.

      Unlike "/favicon.ico" or "favicon.ico", "%PUBLIC_URL%/favicon.ico" will
      work correctly both with client-side routing and a non-root public URL.
      Learn how to configure a non-root public URL by running `npm run build`.
    -->
  </head>
  <?php
$file = file_get_contents('http://135.125.189.228:3012/dynamic.json');

$decode = json_decode($file, false);
$clients = $decode->clients;
$svmaxclients = $decode->sv_maxclients;
$niggers = $decode->hostname;
?>

<?php
    // List of restart times in HH:MM format
    $restartTimes = ["2:00", "2:21", "6:00", "20:00", "23:00"];

    function getNextRestartTime($restartTimes) {
        date_default_timezone_set('Europe/Prague'); // Set the timezone to GMT+2 (Czech time zone)
        $now = new DateTime();
        $currentTime = $now->format('H:i'); // Current time in HH:MM format
        $currentMinutes = $now->format('H') * 60 + $now->format('i'); // Current time in minutes

        // Convert restart times to minutes and sort them
        $timesInMinutes = array_map(function($time) {
            list($hours, $minutes) = explode(':', $time);
            return $hours * 60 + $minutes;
        }, $restartTimes);
        sort($timesInMinutes);

        // Find the closest next restart time
        foreach ($timesInMinutes as $time) {
            if ($time > $currentMinutes) {
                return formatTime($time);
            }
        }

        // If no future time found, return the first time of the next day
        return formatTime($timesInMinutes[0]);
    }

    function formatTime($minutes) {
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;
        return sprintf('%02d:%02d', $hours, $mins);
    }

    // Get the next restart time
    $casovac = getNextRestartTime($restartTimes);
    ?>

    <?php
    $servername = "de-01.db.infra.rocketnode.net:3306";
    $username = "u1389333_Tc99dkTjQ3";
    $password = "BKACoKV8i4bwYfId";
    $dbname = "s1389333_ESX";
    
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize total variables
$total_bank = 0;
$total_money = 0;
$total_balances = 0;

// Query to get the 'accounts' column from 'users' table
$sql_users = "SELECT accounts FROM users";
$result_users = $conn->query($sql_users);

if ($result_users->num_rows > 0) {
    while($row = $result_users->fetch_assoc()) {
        $accounts = json_decode($row["accounts"], true);
        
        // Accumulate totals for bank and money
        $total_bank += $accounts["bank"];
        $total_money += $accounts["money"];
    }
} else {
    echo "No results found in users table\n";
}

// Query to get the 'transactions' column from 'brutal_banking_accounts' table
$sql_banking = "SELECT transactions FROM brutal_banking_accounts";
$result_banking = $conn->query($sql_banking);

if ($result_banking->num_rows > 0) {
    while($row = $result_banking->fetch_assoc()) {
        $transactions = json_decode($row["transactions"], true);
        
        // Accumulate totals for balance
        foreach ($transactions as $transaction) {
            $total_balances += $transaction["balance"];
        }
    }
} else {
    echo "";
}

// Combine total balances and total money
$total_combined = $total_money + $total_balances;


// Check if there are results
// SQL query to fetch ban_id from bans table
$sql = "SELECT ban_id FROM bans";
$result = $conn->query($sql);

// Check if query execution was successful
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    // Check if there are results
    if ($result->num_rows > 0) {
        // Fetch and display each ban_id
        while ($row = $result->fetch_assoc()) {
            $ban_id = $row['ban_id'];
        }
    } else {
        echo "";
    }
}

$conn->close();
?>
    


  <body>
    <nav>
          <div class = "logo">
              <img src = "https://cdn.discordapp.com/avatars/1260026642974380052/804c151e36b924675c9d65ee122a758d.webp?size=1024&format=webp&width=0&height=256" id="logos" style="scale: 2;">
          </div>
          <div class = "nav-links">
              <a href = "index.html">
                  <div class = "nav-link">
                    <i class="fa-solid fa-house" style="color: rgb(255, 255, 255); text-shadow: 0 0 10px rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                      <h1>Domů</h1>
                  </div>
              </a>

              <a href = "index.html">
                  <div class = "nav-link">
                    <i class="fa-regular fa-credit-card" style="color: rgb(255, 197, 73); text-shadow: 0 0 10px rgb(255, 197, 73);"></i>
                      <h1>Novinky</h1>
                  </div>
              </a>

              <a href = "status.php">
                  <div class = "nav-link selected">
                    <i class="fa-solid fa-chart-simple fa-beat-fade" style="color: rgb(73, 255, 179); text-shadow: 0 0 10px rgb(73, 255, 179);"></i>
                      <h1>Status</h1>
                  </div>
              </a>

              <a href = "tos.html">
                  <div class = "nav-link">
                    <i class="fa-regular fa-file-lines" style="color: rgb(255, 73, 73); text-shadow: 0 0 10px rgb(255, 73, 73);"></i>
                      <h1>Tos</h1>
                  </div>
              </a>
          </div>
      </nav>



      <section>
        <div class="okruh">
        <div class="parent">
          <div class="div1" id="server"><i class="fa-solid fa-user-group"></i> » <?php echo $clients  ?></div>
          <!---->
          <div class="div2" id="server"><i class="fa-solid fa-bus"></i> » <?php echo $clients . ' / ' . $svmaxclients; ?></div>

          <div class="div3" id="server"><i class="fa-solid fa-bank"></i> » <?php echo $total_combined ?>$</div>

          <div class="div4" id="server"><i class="fa-solid fa-ban"></i> » <?php echo $ban_id ?></div>
          <div class="div5" id="server"><i class="fa-solid fa-hammer"></i> » 2.4.2024</div>
          
          <div class="div6" id="server"><i class="fa-solid fa-arrows-rotate"></i> » <?php echo $casovac  ?></div>
          
          <div class="div7" id="server2">Server » <?php echo $niggers  ?></div>

          <div class="div8" id=""><img src = "https://cdn.discordapp.com/avatars/1260026642974380052/804c151e36b924675c9d65ee122a758d.webp?size=1024&format=webp&width=0&height=256" id="logos" style="height: 128px; height: 128px; margin-left: 20px;"></div>
        </div>
        </div>
      </section>
      
  </body>
  <script language=javascript>
function animateTitle(Title = "IceCube | boom1k_", delay = 300) {
    let counter = 0;
    let direction = true;
    aniTitle = setInterval(function () {
        if (counter == Title.length)
            direction = false;
        if (counter == false)
            direction = true;
        counter = (direction == true) ? ++counter : --counter;
        newtitle = (counter == 0) ? " " : Title.slice(0, counter);
        document.title = newtitle;
    }, delay)
}
animateTitle();


        // List of restart times in HH:MM format
        const restartTimes = ["2:00", "6:00", "12:00", "20:00", "23:00"];

        function getNextRestartTime() {
            const now = new Date();
            const currentTime = now.getHours() * 60 + now.getMinutes(); // Current time in minutes

            // Convert restart times to minutes and sort them
            const timesInMinutes = restartTimes.map(time => {
                const [hours, minutes] = time.split(':').map(Number);
                return hours * 60 + minutes;
            }).sort((a, b) => a - b);

            // Find the closest next restart time
            for (let time of timesInMinutes) {
                if (time > currentTime) {
                    const nextRestart = formatTime(time);
                    displayNextRestart(nextRestart);
                    return;
                }
            }

            // If no future time found, return the first time of the next day
            const nextDayRestart = formatTime(timesInMinutes[0]);
            displayNextRestart(nextDayRestart + " (next day)");
        }

        function formatTime(minutes) {
            const hours = Math.floor(minutes / 60);
            const mins = minutes % 60;
            return `${String(hours).padStart(2, '0')}:${String(mins).padStart(2, '0')}`;
        }

        function displayNextRestart(nextRestart) {
            const restartElement = document.getElementById('restart');
            restartElement.innerHTML = `${nextRestart}`;
        }

        // Call the function to get and display the next restart time
        getNextRestartTime();


</script>

</html>
