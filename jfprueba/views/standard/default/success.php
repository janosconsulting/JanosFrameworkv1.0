<?php
   $success = lib::getitem('success',lib::NO_PERSISTENT_STORAGE);
   if(is_array($success)){
 ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".close").click(function(){
          $(".alert").css("display","none");
        });
      
    });
 </script>
<div class="formRow">
    <input type = "hidden" id = "tipomensaje" value = "1"/>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Sucess!</strong> 
        <ul></li><?php echo implode('</li><li>', $success)?></li></ul>
    </div>
</div>

 <?php
     
   }
 ?>
