<?php

class products
{
	public function defaultaction()
	{
		
                $productcollection = new productcollection();
        	$productcollection->obtenerlista();

                $objtable = new table();
                $objtable->cabecera = array('ID','NOMBRE','DESCRIPCION','PRECIO');
                $objtable->datasource = $productcollection;
                $objtable->datatextfield = array('id','nombre', 'descripcion','precio');
                
               
                $objtable->edit = true;
                $objtable->delete = true;
                $objtable->addAction = true;
                $objtable->editurl = "products/edit/id";
                $objtable->deleteurl = "products/delete/id";

                echo view::show("products/listar",array("tabla"=>$objtable->build()));
	}

        public function edit($param){
                $id = $param[2];

                $collection = new productcollection();
                $collection->obtenerlistaxid($id);
                
                echo view::show("products/editar", array('producto'=>$collection->current()));
            
        }

        public function register(){
                echo view::show('products/registrar');  
        }

        public function procesaractualizar(){
                $product = new product();

              
               
                $product->id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio']; 

                if(empty($nombre)){
                    lib::seterror('Nombre debe ser ingresado'); 
                    uri::sendto('products/edit');
                }
               
               
                if(empty($precio)){
                    lib::seterror("Precio debe ser ingresado"); 
                    uri::sendto('products/edit');
                }
               
                $product->nombre = $nombre;
                $product->precio = $precio;
                $product->descripcion = $_POST["descripcion"];
        
                $issuccess = $product->save(); 

                if($issuccess >= 1){
                    lib::setsuccess('El producto se ha actualizado con Exito');
                   
                }
                else{
                    lib::seterror('Se ha producido un error al actualizar un producto');  
                    
                }

                uri::sendto('products/'); 
        }

        public function procesarregistro(){

                $product = new product();
              
                 
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio']; 


                if(empty($nombre)){
                    lib::seterror('Nombre debe ser ingresado'); 
                    uri::sendto('products/register');
                }
               
               
                if(empty($precio)){
                    lib::seterror("Precio debe ser ingresado"); 
                    uri::sendto('products/register');
                }
               

                $product->descripcion = $_POST["descripcion"];
        
                $issuccess = $product->save(); 

                if($issuccess >= 1){
                    lib::setsuccess('El producto se ha registrado con Exito');
                   
                }
                else{
                    lib::seterror('Se ha producido un error al registrar un producto');  
                    
                }

                uri::sendto('products/'); 
        }
}