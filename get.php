<?php
include 'connect_message.php';
include 'header.php';
include 'index.php';
$post=$_SESSION['name'];

$sql="select DISTINCT post from message";
$result = mysqli_query($con,$sql);

while ($row=mysqli_fetch_assoc($result)) {
  $post = htmlentities($row['post']);
  $userurl= "n/".$post."/";
  $da[] = '<a href="' . $userurl . '">' . $post . '</a><br>';
   //$da[]= htmlentities($row['post']).'<br>';
}
echo '<span style=" 
        position:relative; top: -400px; left: -450px;border: 1px solid black; 
        padding: 10px;border-radius: 20px;
        background: rgba(255, 255, 255, 0.7);">' . implode('<br>', $da) . '</span>';
?>
<body>

<div id="dataDisplay"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function fetchData() {
    $.ajax({
      url: 'back.php', 
      method: 'POST', 
      dataType: 'json', 
      success: function(response) {
        
        if (response.data) {
          
          updateDataDisplay(response.data);
        }
      },
      error: function(xhr, status, error) {
        
        console.error(error);
      }
    });
  }
  setInterval(fetchData, 10); 
  function updateDataDisplay(data) {
    var dataDisplay = $('#dataDisplay');
    dataDisplay.empty();

    
    data.forEach(function(row) {
      var rowElement = $('<div>').html(row);
      rowElement.css({
      'border': '1px solid black', 
      'margin': '10px',
      'position': 'relative',
      'padding':'10px',
      'background': 'rgba(201, 199, 199, 0.8)',
      'border-radius': '10px',
      'left':'-150px',
      'top':'150px',
      'max-width': '970px'
    });
    rowElement.find('img').css({
      'max-width': '800px',
      'max-height': '940px'
    });
      dataDisplay.append(rowElement);
    });
    dataDisplay.scrollTop(dataDisplay[0].scrollHeight);
  }
</script>



</body>
