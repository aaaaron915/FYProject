<?php include("connect.php"); 
ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <script type="text/javascript">
      function thank(){
        alert("Thank you for rating");
      }
           
        </script>
    <style>

body { 
  font-family: Arial;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
  overflow: hidden;
  background-color: #b3cdd1;
  background-image: linear-gradient(315deg, #b3cdd1 0%, #9fa4c4 74%);
}

.board {
  box-shadow: 0 0 7px rgba(0,0,0,.2);
  border-radius: 5px;
  font-size: 90%;
  text-align: center;
  padding: 30px 20px;
  margin: 30px auto;
  width: 600px;
  color: rgba(255, 255, 255, 0.8);
background: rgba(255, 255, 255, 0.21);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(13px);
-webkit-backdrop-filter: blur(13px);
border: 1px solid rgba(255, 255, 255, 0.16);
}

.board form {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

fieldset, label { 
  margin: 0; 
  padding: 0; 
}

h1 { 
  font-size: 25px; 
  margin: 10px; 
  font-weight: bold;
  text-shadow:1px 1px grey;
}

fieldset {
  margin: 20px 0 30px;
}

p{
  padding:10px;
}

.rate { 
  border: none;
  float: left;
}

.rate > input { display: none; } 
.rate > label:before { 
  margin: 10px;
  font-size: 35px;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rate:not(:checked) > label:before {
    content: '★ ';
}

.rate > label { 
  color: #ddd; 
 float: right; 
 text-shadow: 1px 1px #bbb;
}


.rate > input:checked ~ label, 
.rate:not(:checked) > label:hover, 
.rate:not(:checked) > label:hover ~ label { color: gold;  } 

.rate > input:checked + label:hover, 
.rate > input:checked ~ label:hover,
.rate > label:hover ~ input:checked ~ label, 
.rate > input:checked ~ label:hover ~ label { 
color: gold; 
text-shadow: 1px 1px goldenrod; }

input[type="submit"], label {
  cursor: pointer;
}

input[type="submit"] {
  margin-top: 5px;
  background-color: #BDD4E7;
  color: black;
  border: none;
  border-radius: 5px;
  padding: 10px 30px;
  box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
}

input[type="submit"]:focus {
  outline: 0;
}

input[type="submit"]:active {
  transform: scale(0.98);
}

input[type="submit"]:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}

.comment{
  caret-color: #A18CD1;
  border-radius: 5px 5px 0px 0px;
  border: none;
}

input[type="text"]{
  caret-color: #A18CD1;
}

input[type="text"]:focus{
  background-color: #f2f2f2;
}

textarea:focus{
  background-color: #f2f2f2;
}

input[type="submit"]:hover{
  background-color: #8383BE;
}
/*for back button*/
input[type="button"] {
  cursor: pointer;
}

input[type="button"] {
  margin-top: 5px;
  background-color: #white;
  color: black;
  border: none;
  border-radius: 5px;
  padding: 10px 30px;
  box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
  margin-right:10px;
}

input[type="button"]:hover{
  background-color: #8383BE;
}

input[type="button"]:focus {
  outline: 0;
}

input[type="button"]:active {
  transform: scale(0.98);
}

input[type="button"]:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}

.button{
  border:none;
}

</style>
</head>

<body>
<div class="board">
        <div class="ratings-container">
        
          <h1>My Hot Car</h1>
          <form method="POST" id="ratingForm">
        
          <p>Name: <input type="text" id="name" name="name" required></p>
          
            <fieldset class="rate">
              <input type="radio" id="five" name="rate" value="5" />
              <label class = "full" for="five" title="5 stars"></label>
              <input type="radio" id="four" name="rate" value="4" />
              <label class = "full" for="four" title="4 stars"></label>      
              <input type="radio" id="three" name="rate" value="3" />
              <label class = "full" for="three" title="3 stars"></label>
              <input type="radio" id="two" name="rate" value="2" />
              <label class = "full" for="two" title="2 stars"></label>
              <input type="radio" id="one" name="rate" value="1" />
              <label class = "full" for="one" title="1 star"></label>
          </fieldset>

          <fieldset class="comment">
            <textarea id="comment" name="comment" rows="6" cols="50" placeholder="Share details of your own experience at this place" required></textarea>
          </fieldset>

          <fieldset class = "button">
          <input type="button" name="back" title="return to previous page"  onclick="javascript:history.back(-1);" value="Cancel">
          <input type="submit" name="submit" value="Send Review" title="send" onclick="thank()">

          </fieldset>
          </form>
          
        </div>
      </div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $rate = $_POST['rate'];
  
    $query="INSERT INTO reviews(bname,content,rating) VALUES('$name','$comment','$rate')";
?> 
<?php
$query_run=mysqli_query($connect,$query);
if($query_run)
{
  ?> 
  <script type="text/javascript">
            alert("<?php echo 'THANKS FOR RATING' ?>");
          
        </script>
        
        
        <?php
        header("Location:homepage.php");
}

}
?>