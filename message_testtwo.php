<?php
include 'connect_message.php';
include 'header.php';
include 'index.php';
$post = $_SESSION['name'];
?>
<div id="dataDisplay"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function fetchData() {
    $.ajax({
      url: 'message_test.php',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        if (response['data']) {
          updateDataDisplay(response['data']);
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }

  setInterval(fetchData, 5000);

  function updateDataDisplay(data) {
    var dataDisplay = $('#dataDisplay');
    dataDisplay.empty();

    for (var i = 0; i < data.length; i++) {
      var row = data[i];
      var rowElement = $('<div>').html(row);
      dataDisplay.append(rowElement);
    }
  }
</script>






