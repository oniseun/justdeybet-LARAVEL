//      
//function preload_editor()
//{
//    $('.editor,.editor2').froalaEditor({
//          
//        imageUploadParam: 'file',
//        // Set the image upload URL.
//        imageUploadURL: 'upload_image.php',
//        allowScript: true,
//        heightMin: 260,
//        imageDefaultWidth: 0,
//        imageMove:false,
//        imageManagerLoadURL: 'images_load.php',
//        imageDefaultAlign: 'left',
//        imageEditButtons: [ 'imageAlt','imageLink', 'linkOpen', 'linkEdit', 'imageSize','imageRemove'],
//
//      imageUploadParams: {
//        id: 'my_editor'
//      },
//
//      // Set custom buttons with separator between them.
//      toolbarButtons: ['fullscreen','undo', 'redo', 'html','|', 'insertLink','bold', 'italic', 'underline', 'insertImage','|','fontFamily', 'fontSize', 'insertVideo', 'fullscreen',  'align']    
//        
//      });
//    
//}

$(function()
          {
    
    
            $('body').on('click','td .edit-btn',
                             function()
                                {
                                        var $edit_form_id = $(this).attr('edit-form');
                                        $(this).parents('tr').hide();
                                        $('tr[edit-id='+$edit_form_id+']').show();
                                }
                             );
            
           $('body').on('click','td .del-btn',
                     function()
                        {
                                var $delete_form_id = $(this).attr('delete-form');
                                $(this).parents('tr').hide();
                                $('tr[delete-id='+$delete_form_id+']').show();
                        }
                     );
            
            
            
              $('body').on('click','td .ajax-delete-action',
                     function()
                        {
                                var $view_form_id = $(this).attr('view-form');
                                var $url = $(this).attr('url');
                                $(this).parents('tr').hide();
                                $('tr[view-id='+$view_form_id+']').hide();
                  
                                   $.ajax({
                                      type: "GET", url: $url, data: null,
                                      success: function(result)
                                              {
                                               // alert('Deleted!!');
                                              }
                                    });
                  
                                return false;
                        }
                     );
            

            
          $('body').on('click','td .cancel-btn',
                             function()
                                {
                                        var $view_form_id = $(this).attr('view-form');
                                        $(this).parents('tr').hide();
                                        $('tr[view-id='+$view_form_id+']').show();
                                }
                             );
            
            
                   $('body').on('click','.ajax-save-btn',
                             function()
                                {
                                        var $parent = $(this).parents('tr.edit-form');
                                        var $url = $parent.find('form').attr('action');
                                        var $data = $parent.find('input,textarea').serialize() ;
                                        var $data_update = $parent.find('input,textarea').serializeArray() ;
                                        $table = $(this).parents('table');
                    
                                        var $view_form_id = $(this).attr('view-form');
                                        $(this).parents('tr.edit-form').hide();
                                        var $view_form =$('tr[view-id='+$view_form_id+']');
                                        $view_form.show();
                    
                                        //show_edit_table_loading($table);
                                          $.ajax({
                                            type: "POST", url: $url, data:$data,
                                      success: function(result)
                                              {
                                                  for(var i =0;i<$data_update.length;i++)
                                                      {
                                                          var $form_name = $data_update[i].name;
                                                          var $form_value = $data_update[i].value;
                                                          $view_form.find('td[name='+$form_name+']').html($form_value);
                                                      }
                                                //alert(result);
                                              }
                                            });
              
                                    return false;
                  
                                }
                             );

  $('body').on('click','.ajax-alert-closebtn',
                             function()
                                {
                                    $(this).parent('#ajax-alert').hide();
      
                                }
                );

              $('body').on('click','.ajax-remove-list',
                             function()
                                {
                                    var $url = $(this).attr('url');
                                    var $alert =$(this).attr('alert');
                  
                                  var r = confirm($alert);
                                    if (r == true) {
                                        $(this).parents('tr').remove();
                                        
                                        $.ajax({
                                      type: "GET", url: $url, data: null,
                                      success: function(result)
                                                  {
                                                    alert('removed successfully');
                                                  }
                                        });
                                    } 
      
                                }
                );

            
      
                        
               $('body').on('click','.ajax-load-trigger',
                             function()
                                {
                                         var $url = $(this).attr('ajax-load');
                                        var $container = '.' + $(this).attr('ajax-load-container');
                                        $($container).html($('<span class="loading-spiner"></span>'));

                                $.ajax({
                                    type: "GET",
                                    url: $url,
                                    cache: false,
                                    success: function(result)
                                          {
                                              $($container).html(result);
                      
                                          }
                                        });
                                }
                             );
            
               $('body').on('click','.md-trigger[ajax-load]',
                             function()
                                {
                                         var $url = $(this).attr('ajax-load');
                                        var $container = '.' + $(this).attr('ajax-load-container');
                                        $($container).html($('<span class="loading-spiner"></span>'));

                                $.ajax({
                                  type: "GET",
                                  url: $url,
                                cache: false,
                                  success: function(result)
                                          {
                                              $($container).html(result);

                                          }
                                        });
                                }
                             );
            
    
            
            
             $(".live-search").keyup(function()
                  {
                          var $q = $(this).val();
                          var $url =  $(this).attr('action');
                          var $return_container = '.' + $(this).attr('return-container');

                          if($q.length > 0)
                          {
                                $($return_container).html($('<span class="loading-spiner"></span>'));

                                $.ajax({
                                          type: "GET",
                                          url: $url,
                                          data: "q="+ $q,
                                          success: function(result)
                                                  {
                                                      $($return_container).html(result);
                                                  }
                                });

                          }

                          return false;

                  });
    
    
    // #tag-select
    
     $("#tag-select .selected-tags").click(function()
        {
            $(this).parent('#tag-select').find(".tag-searcher").focus();
        }
          );
             
        $('body').on('keyup',"#tag-select .tag-searcher",function()
          {
                  var $q = $(this).val();
                  var $url =  $(this).attr('action');
                  var $return_container_class = '.' + $(this).attr('return-container');
                    var $return_container = $(this).parents('#tag-select').find($return_container_class);
                  if($q.length > 0)
                  {
                      
                        $return_container.html($('<span class="searching">searching .. </span>'));

                        $.ajax({
                                  type: "GET",
                                  url: $url,
                                cache: false,
                                  data: "q="+ $q,
                                  success: function(result)
                                          {
                                              $return_container.html(result);
                                          }
                        });

                  }

                  return false;

          });

        
        $('body').on('click','#tag-select .searched-tag-list',function(){
            var $label = $(this).text();
            var $name = $(this).attr('data-name');
            var $value = $(this).attr('data-value');
            
            var $prepend =$('<span class="tag-list"><input type="hidden" name="'+$name+'" value="'+$value+'" />'+$label+' </span>');  // create an hidden input tag in respect ofthe searched string
            $(this).parents('#tag-select').find('.tag-searcher').before($prepend);
            
            $(this).parents('#tag-select').find(".tag-searcher").focus();
            $(this).parents('#tag-select').find(".tag-searcher").val("");
            
           $(this).remove(); // remove the selected tag
        });
        
        $('body').on('click','#tag-select .selected-tags .tag-list',function(){
            $(this).remove();
        });
        
   
    // reload editor
   // preload_editor();
            
            });

