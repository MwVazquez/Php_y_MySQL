<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="estilo.css">

</head>

<body>
<h1>Registro de Artículos</h1>

<form name="form1" method="get" action="prueba.php">
  <table border="0" align="center">
    <tr>
      
      <td><label for="c_art">Código Artículo</label></td>
      <td><input type="text" name="c_art" id="c_art"></td>
    </tr>
    <tr>
      
      <td><label for="seccion">Sección</label></td>
      <td><input type="text" name="seccion" id="seccion"></td>
    </tr>
    <tr>
      
      <td><label for="n_art">Nombre artículo</label></td>
      <td><input type="text" name="n_art" id="n_art"></td>
    </tr>
    <tr>
      
      <td><label for="precio">Precio</label></td>
      <td><input type="text" name="precio" id="precio"></td>
    </tr>
    <tr>
      
      <td><label for="fecha">Fecha</label></td>
      <td><input type="date" name="fecha" id="fecha" style="WIDTH: 149.24px ; HEIGHT: 15.33px"></td>
    </tr>
    
    <tr style="text-align:center">
      <td> 
        <input type="radio" name="importado" id="hombre" value="si">
        <label for="hombre">Exportado</label>
      </td>
      <td>
        <input type="radio" name="importado" id="mujer" value="no" checked >
        <label for="mujer">No Exportado</label>
      </td>
    </tr>

    <tr>
      <td><label for="">Pais de origen</label></td>
      <td colspan="2">
       <select name="select" id="selector" style="WIDTH: 149.24px ; HEIGHT: 20px">
          <option value="argentina">Argentina</option> 
          <option value="brasil" >Brasil</option>
          <option value="japon">Japon</option>
          <option value="nada" selected>-------</option>
        </select>
      </td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
      <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
    </tr>
  </table>
</form>
</body>
</html>