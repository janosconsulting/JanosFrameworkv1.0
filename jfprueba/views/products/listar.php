<style type="text/css">
table{
	width: 100%;
	border: 1px solid #999;
}
table tr td{
	border: 1px solid #999;
}
</style>
<?php
           echo view::show('standard/default/errors');
?>
<?php
           echo view::show('standard/default/success');
?>
<a href = "<?php echo uri::getPath();?>products/register">[Nuevo Producto]</a>
<?php
echo $view["tabla"];
?>
<?php
   master::load(ob_get_contents(),"Lista de Productos","Descripcion de Productos");
?>