<?php
include("auth.php");      // checks login session
include("../db.php");     // connects to database
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    table {
      border-collapse: collapse;
      width: 90%;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #999;
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #eee;
    }
    h2 {
      text-align: center;
    }
    .logout {
      display: block;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['admin']; ?>!</h2>
<h3 style="text-align:center;">All Pooja Bookings</h3>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Gotra</th>
      <th>Pooja</th>
      <th>Preferred Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = $conn->query("SELECT * FROM bookings ORDER BY id ASC");
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['phone']}</td>
          <td>{$row['gotra']}</td>
          <td>{$row['pooja']}</td>
          <td>{$row['date']}</td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='7'>No bookings found.</td></tr>";
    }
    ?>
  </tbody>
</table>

<a class="logout" href="logout.php">Logout</a>

</body>
</html>
