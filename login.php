<?php
session_start();

sleep(5);

if(!empty($_SESSION['attempts']) && !empty($_SESSION['last_attempt'])) {
  $waiting_time = 10;
  $max_attempt = 3;
  $waiting_time2 = $_SESSION['last_attempt'] + $waiting_time;

  if($_SESSION['attempts'] >= $max_attempt) { 
    if($waiting_time2 > time()) { 
      $_SESSION['last_attempt'] = time();

      $response = [
        "waiting_time" => $waiting_time2 - time(),
        "limit_reached" => TRUE,
        "status" => "error",
        "message" => "Try again after " . $waiting_time2 - time() . " seconds."
      ];

      echo json_encode($response);
      die();
    }
    if($waiting_time2 < time()) {
      $_SESSION['attempts'] = 0;
    }

    $response = [
      "waiting_time" => $waiting_time,
      "limit_reached" => TRUE,
      "status" => "error",
      "message" => "Reached the maximum number of attempts. Try again after " . $waiting_time . " seconds."
    ];
    echo json_encode($response);
    die();
  }
}

require_once 'connection.php';

$sql = "SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  $_SESSION['logged_in'] = true;

  $response = [
    "status" => "success",
    "message" => "Successfully logged in"
  ];

  echo json_encode($response);
} else { 
  $_SESSION['last_attempt'] = time();
  if(empty($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
  }

  $_SESSION['attempts'] += 1;
  $response = [
    "status" => "error",
    "message" => "Invalid username or password"
  ];

  echo json_encode($response);

} // end of else..
$conn->close();