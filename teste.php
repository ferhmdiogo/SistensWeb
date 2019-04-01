
<link type="text/css" href="recursos/css/jquery-ui-1.8.5.custom.css" rel="Stylesheet" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script src="recursos/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="recursos/js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
  $(function() {
    
    //autocomplete
    $("#estipulante").autocomplete({
        source: "autocompletecoberturas.php",
        minLength: 2
    });                

});
</script>
<form action="#" method='post' >
    <tr>
            <td colspan="5">	
        <div class="control-group">
            <label for="estipulante" class="control-label">Estipulante: </label><br>
            <input type="text" name="estipulante" size="70"  />
            </td>

        </tr>
    
    
</form>
