<h1>Nuevo Producto</h1>
<?php
          echo view::show('standard/default/errors');
?>
<?php
          echo view::show('standard/default/success');
?>
 <form action="<?php echo uri::getPath();?>products/procesarregistro" method="POST"  id = "register"> 
                 
      <table>
      	
      	<tr>
      		<td> IdProducto </td>
      		<td> <input type="text" placeholder="ID" readonly="readonly" value="0" id="id"/></td>
      	</tr>
      	<tr>
      		<td> Nombre </td>
      		<td>  <input name="nombre" id="nombre" type="text"  placeholder="Nombre" /></td>
      	</tr>
      	<tr>
      		<td> Descripcion </td>
      		<td>  <input name="descripcion" id="descripcion" type="text"  placeholder="descripcion" /></td>
      	</tr>
      	<tr>
      		<td>  Precio  </td>
      		<td> <input name="precio" id="precio" type="text"  placeholder="precio" /></td>
      	</tr>
      	<tr>
      		<td colspan="2"><input type="submit" class="" value="Registrar" id="btnRegistrar"></div></td>
      	</tr>
      </table>
   
        
                  
</form>
