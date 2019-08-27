
<footer class="container-fluid text-center clear">
  <p>WAX Store Copyright</p>  
</footer>
<script> $(document).ready(function(){
 
  $.ajax({
      type: "GET",
      url: "https://en.wikipedia.org/w/api.php?format=json&action=query&titles=Main%20Page&prop=revisions&rvprop=content",
      contentType: "application/json; charset=utf-8",
      async: false,
      dataType: "json",
      success: function (data, textStatus, jqXHR) {
          console.log(data);
      },
      error: function (errorMessage) {
      }
  });
});

</script>


</body>
</html>