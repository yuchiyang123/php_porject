<?php
include 'connect_message.php';
include 'header.php';
include 'index.php';
$post=$_SESSION['name'];
?>
<body>

<div id="dataDisplay"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function fetchData() {
    $.ajax({
      url: 'message_show.php', 
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
