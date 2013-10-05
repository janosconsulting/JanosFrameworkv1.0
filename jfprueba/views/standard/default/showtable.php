<script src="<?php echo uri::getPath();?>assets/nightsky/js/jquery.dataTables.min.js"></script>
<style type="text/css">
   table#datatable_3 tr:hover{
    cursor: pointer;
    background: #ddd;
   }
  .row_selected{
    background: #666;
    color:#fff;

  }
  .dataTables_filter{
    width: auto important;
  }
</style>


<script>
   $(document).ready(function(){
     
           /* Init the table */

      var oTable = $('#datatable_3').dataTable( );
   
     
      /* Add a click handler to the rows - this could be used as a callback */
      $("#datatable_3 tbody").click(function(event) {
        $(oTable.fnSettings().aoData).each(function (){
           $(this.nTr).removeClass('row_selected');
        });
        $(event.target.parentNode).addClass('row_selected');
      });
  
      /* Add a click handler for the delete row */
      $('#delete').click( function() {
        var anSelected = fnGetSelected( oTable );
        oTable.fnDeleteRow( anSelected[0] );
      } );

      oTable.fnSort( [ [0,'desc'] ] );


   });
   /* Get the rows which are currently selected */
   function fnGetSelected( oTableLocal )
   {
      var aReturn = new Array();
      var aTrs = oTableLocal.fnGetNodes();
  
      for ( var i=0 ; i<aTrs.length ; i++ )
      {
        if ( $(aTrs[i]).hasClass('row_selected') )
        {
          aReturn.push( aTrs[i] );
        }
      }
      return aReturn;
    }
</script>
<?php
echo $view["tables"];
?>
