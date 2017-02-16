<?php
  include_once ('connection.php');
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form</title>
  <link rel="stylesheet" media="all" href="css/all.css">
  <script type="text/javascript" src="js/ie.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
  <link type="text/css" rel="stylesheet" href="css/ie.css">
  <script type="text/javascript" src="js/ie.js"></script>
  <![endif]-->
</head>
<body>
  <div class="form">
    <center>
      <h1>Could not find your Question?</h1>
    </center>
    <center>
      <p>Send us your question. Please add yor contact details, if we should inform you once your question has been answerd.</p>
    </center>
    <form action="index.php" method="post">
  <div class="row">
  
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><textarea name="question" id="textarea" Placeholder="Your Question Here..."></textarea></div>
  </div>
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <input name="name" type="text" placeholder="Name"/>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <input name="mail" type="email" placeholder="E-mail"/>
  </div>
  </div>
    <center>
      <select name="category">
      <option>The Basics</option>
      <option>Getting Started</option>
      <option>Solution</option>
      <option>Technology</option>
      <option>Company</option>
      </select>
    </center>
    <center>
      <input name="submit" id="" type="submit" value="Send Question"  onSubmit="window.location.reload();" value="Go" style="width:160px; padding: 10px;">
    </center>
    </form>  
  </div>
  
  <?php
    if (isset($_POST['submit'])) 
    {
      $txt = $_POST['question'];
      $nme =$_POST['name'];
      $mal =$_POST['mail'];
      $catg =$_POST['category'];

  $qur = "INSERT INTO FAQ(id, Question, name, email, category) VALUES ('NULL','$txt','$nme','$mal','catg')";
  $var = mysqli_query($conn, $qur);    
    
    }
$sql = "SELECT id, question, name, email, category FROM FAQ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>

	<div class="container">
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Question</th>
        <th>Name</th>
        <th>eMAIL</th>
        <th>CATEGORY</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["question"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <th><?php echo $row["email"]; ?></th>
        <th><?php echo $row["category"]; ?></th>
      </tr>
      
    </tbody>
  </table>
  </div>





<?php
    }
} else {
    echo "0 results";
}
$sql = "DELETE FROM FAQ WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
<div class="container">
  <button type="button" class="btn btn-danger">Delete</button>
<div>
  </body>
  </html>