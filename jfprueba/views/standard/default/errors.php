<?php
   $errors = lib::getitem('error',lib::NO_PERSISTENT_STORAGE);
   if(is_array($errors)){
 ?>
 <script type="text/javascript">
    $(document).ready(function(){
        $(".close").click(function(){
          $(".alert").css("display","none");
        });
    });
 </script>
<div class="formRow">
    <div class="alert alert-error">
     <input type = "hidden" id = "tipomensaje" value = "2"/>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> 
        <ul></li><?php echo implode('</li><li>', $errors)?></li></ul>
    </div>
</div>

 <?php
   	 
   }
 ?>
