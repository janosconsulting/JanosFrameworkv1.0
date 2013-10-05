<?php
          echo view::show('standard/default/errors');
?>
<?php
          echo view::show('standard/default/success');
?>
 <form action="<?php echo uri::getPath();?>products/procesaractualizar" method="POST"  id = "frmeditar"> 
                 
      <table>
      	
      	<tr>
      		<td> IdProducto </td>
      		<td> <input type="text" placeholder="ID" name="id" readonly="readonly" value="<?php echo $view['producto']->id;?>" id="id"/></td>
      	</tr>
      	<tr>
      		<td> Nombre </td>
      		<td>  <input name="nombre" id="nombre" type="text"  placeholder="Nombre" value="<?php echo $view['producto']->nombre;?>"/></td>
      	</tr>
      	<tr>
      		<td> Descripcion </td>
      		<td>  <input name="descripcion" id="descripcion" type="text"  placeholder="descripcion" value="<?php echo $view['producto']->descripcion;?>"/></td>
      	</tr>
      	<tr>
      		<td>  Precio  </td>
      		<td> <input name="precio" id="precio" type="text"  placeholder="precio" value="<?php echo $view['producto']->precio;?>"/></td>
      	</tr>
      	<tr>
      		<td colspan="2"><input type="submit" class="" value="Actualizar" id="btnActualizar"></div></td>
      	</tr>
      </table>
   
        
                  
</form>
<?php
   master::load(ob_get_contents(),"Edicion de Productos","Descripcion de Productos");
?>