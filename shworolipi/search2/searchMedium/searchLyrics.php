<!doctype html>
<meta charset="utf-8">
<head>
  <meta charset="utf-8">
  <title>Shworolipi Search</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="jquery-3.2.0.min.js"></script>

  <script>
  $(function() {
    $( "#LyricsSearch" ).autocomplete({
      source: '../search/searchQuery/searchLyricsQuery.php'
    });
  });
  </script>
</head>
<body>
 

<form action = "../musicPlayer/audioLyric.php" method="POST">
  <div class="input-group" style="width:64%; margin: auto; padding-top:5px " >
    <input id="LyricsSearch" type="text" name = "play" class="form-control" placeholder="গানের কথা লিখুন">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit" name="submitPlay">
        <i class="glyphicon glyphicon-play"></i>
      </button>
    </div>
  </div>
</form>
</body>
</html>