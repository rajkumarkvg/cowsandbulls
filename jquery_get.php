<!DOCTYPE html>
<html>
<head>
<script src="jquery-3.2.0.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").hide();
		$.get( "https://od-api.oxforddictionaries.com:443/api/v1/entries/en/ace", { app_id: "b588625e", app_key: "90f2d8f354b4a294a5dafcf85d13b066" } )
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
    });
});
</script>
</head>
<body>

<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<button>Click me to hide paragraphs</button>

</body>
</html>