/*
 * @copyright 2015 All Rights Reserved
 * @author Oni Victor
 * @date October 2015
 * @date updated August 2016
 */

// from Wow animator




var ajax_functions = {
       // Smooth scrolling mode
 smooth_scroll : function($speed){
    $("a[href*=#]:not([href=#])").click(function(e){
            e.preventDefault();
            var speed = $speed;
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var nav_height = $("header").height();
            var position = target.get(0).offsetTop - nav_height;
            $("body").animate({scrollTop:position}, speed, "swing");
        });
    },



show_form_loading :function ($form){
        var $overlays = $($form).find('.ajax-form-message');
        if($overlays.length < 1){
            var $loading=
           $("<div class=\"ajax-form-message\" style=\"display:none;\"><span class=\"loading-spiner\"></span></div>");
            $($form).prepend($loading);

        }



        $($form).find(".ajax-form-message").show().delay(100);
    },



hide_form_loading: function($form){
        $($form).find(".ajax-form-message").delay(200).fadeOut(100);
    },

    show_form_message: function($form,$message){


        var $message_selector = '.ajax-form-message';

        if($($form).find($message_selector).length < 1){
                var $container=    $("<div class=\"ajax-form-message\"></div> ");
                $($form).prepend($container);

            }

        $($form).find($message_selector).html($message);
         $($form).find($message_selector).delay(100);

},

         // header fix
auto_fix_headers: function(){

            var header_selector='.fixed-header';
            $(header_selector).each(function()
            {
                var $height=$(this).height();
                var $span='<span style="display:block;margin-bottom:'+$height+'px; width:100%;"></span>';
                 $(this).after($span);
                })
        },





 reset_form: function($form)
{
	$form[0].reset();
},

 send_form_data: function($form)
{
	var $this= this;
      //  tinyMCE.triggerSave();
        var option = {

                       data: $($form).serialize(),

                       beforeSend: function() {


                           $this.show_form_loading($form);
                            // stuff to do before sending form values e.g loading
                                               },
                       complete:function(){
                           //$this.hide_form_loading($form);
                           // stuff to do when data sent is complete
                           },
                       success:function(data){

                              //alert(data);
                               $this.show_form_message($form,data);


                       // reset
                       if($($form).hasClass('reset-on-success') && $($form).find('.alert.alert-success').length>0)
                       {
                               $this.reset_form($form);
                               //$($form).find('input')[0].setFocus

                       }

                                               }
                       ,

                       error:function(){
                                   // message to show if there is an internal error
                                   //

                           $this.hide_form_loading($form);
                           $this.show_form_message($form,
                               '  <div class="alert alert-warning alert-dismissible" role="alert">'+
                               '<button type="button" class= "close" data-dismiss="alert" aria-label="Close">' +
                               ' <span aria-hidden="true">&times;</span></button>'+
                            '<b>internal error:</b>Please check your internet connection and try again</div>');
                               }


           }
            //alert($($form).serialize);
                   // Send Form Data
                   $($form).ajaxSubmit(option);


},

 autoload_new_contents: function(){

},


 send_get_request: function($selector)
        {


                $.ajax({

                type:"GET", data:'#', url:$($selector).attr('href'), cache:false
                //success: function(){	}

                });
        },

 load_new_contents: function($selector)
        {
                $container=$($selector);

                $.ajax({
                type:"GET", data:'#', cache:false, url:$container.attr('href'),

                success: function(data){

                                        $container.hide();
                                        $container.after(data);
                                }
                });
        },

 get_selected_image: function($event,$input){
                           var $obj=this;
                          var file =$event.target.files;

			var imageType = /image.*/;
                        // clear already selected images first
                        $($input).next('label').next('.data-image-list').empty();
                        for(var i=0; i < file.length; i++)    {


			if (file[i].type.match(imageType)) {
				var reader = new FileReader();

				reader.onload = function(e) {


                                       var $image='<img src="'+e.target.result+'" />';
                                       // if input is multiple , just apend image to label

                                           if($($input).next('label').next('.data-image-list').length < 1){
                                               $($input).next('label').after('<div class="data-image-list"></div>');
                                           }
                                           $($input).next('label').next('.data-image-list').append('<span class="data-image-wrapper">'+$image+'</span>');

                            }

				reader.readAsDataURL(file[i]);
			}


                        else{
                                           if($($input).next('label').next('.data-image-list').length < 1){
                                               $($input).next('label').after('<div class="data-image-list"></div>');
                                           }
                                          $($input).next('label').next('.data-image-list').append('<span class="data-text-wrapper"><b>Invalid File</b></span>');
                                       }



                        }



},

get_selected_files: function($event,$input){
                          var file_count =$event.target.files.length;
                                var $text = file_count > 1 ? file_count+ " files Selected" :  file_count+ " file Selected" ;

                            if($($input).next('label').next('.data-text-wrapper').length < 1)
                                        {
                                          $($input).next('label').after('<span class="data-text-wrapper"><b>'+$text+'</b></span>');
                                        }
                                        else
                                        {
                                            $($input).next('label').next('.data-text-wrapper').html('<b>'+$text+'</b>');
                                        }


},

 init: function(){

           // call live functions
            // this.auto_equalize();
            // this.smooth_scroll(500);
            this.auto_fix_headers();
            //this.load_drawer();

            // 1.) alert-box

            $('body').on('click','.alert-close', function () {
              $(this).parent('.alert-box').delay(100).slideUp(100); });

            // 2.) form submit

            var $this = this;
            $('body').on('click','.ajax-submit',
            function (e) {
              e.preventDefault();
              $this.send_form_data($(this).parents('form'));
            });



                     // 4.) file upload
             $('.ajax-file-upload').change(function(e){

                     $this.get_selected_files(e,this);
                    });

 }

        }





//// ---- D o c u m e n t . r e a d y -----

$(function(){


            ajax_functions.init();



});
