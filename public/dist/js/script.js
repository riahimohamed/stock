$(document).ready(function(){
     jQuery(document).delegate('button.add-record', 'click', function(e) {
     //e.preventDefault();    
     var content = jQuery('#sample_table tr'),
     size = jQuery('#tbl_posts >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec-'+size);
     element.find('.delete-record').attr('data-id', size);
     element.appendTo('#tbl_posts_body');
     element.find('.sn').html(size);
     
   });

   jQuery(document).delegate('#tbl_posts_body .famount', 'change', function(e){
      e.preventDefault();
      var s= 0;
      $.each($('.famount'), function(){
       if($( this ).val())
          s += parseFloat($( this ).val());
      });
      
      $("#command_client_totalAmount").val(s);
      
   });

   jQuery(document).delegate('#tbl_posts_body .fprice', 'change', function(e){
      e.preventDefault();
      var p= 0;
      $.each($('.fprice'), function(){
       if($( this ).val())
          p += parseFloat($( this ).val());
      });
      
      $("#command_client_totalPrice").val(p);
      
   });

    jQuery(document).delegate('a.delete-record', 'click', function(e){
     e.preventDefault(); 
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec-' + id).remove();
      
      //regnerate index number on table
      $('#tbl_posts_body tr').each(function(index){
      $(this).find('span.sn').html(index+1);

      console.log($('span.sn').length-1);

       if($('#tbl_posts_body tr').length == 1 )
          $("#command_client_totalAmount").val('0');
          $("#command_client_totalPrice").val('0'); 
      });
      return true;
  });
  
});