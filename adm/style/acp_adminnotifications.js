    (function ($) {    // Avoid conflicts with other libraries
        $().ready(function () {
        $("#usersearch").autocomplete_ls(
            {
                url: U_ADMINNOTIFICATIONS_PATH + 'user',
                sortResults: false,
                width: 600,
                maxItemsToShow: 20,
                selectFirst: true,
                fixedPos:false,
                minChars: 1,
                showResult: function (value, data) {
                    return '<span style="">' + hilight(value, $("#usersearch").val()) + '</span>';
                },
                onItemSelect: function (item) {
                    goto_user(item);
                },
    
            });
        $("#groupsearch").autocomplete_ls(
            {
                url: U_ADMINNOTIFICATIONS_PATH + 'group',
                sortResults: false,
                width: 800,
                maxItemsToShow: 20,
                selectFirst: true,
                fixedPos:false,
                minChars: 1,
                showResult: function (value, data) {
                    return '<span style="">' + hilight(value, $("#groupsearch").val()) + '</span>';
                },
                onItemSelect: function (item) {
                    goto_group(item);
                },
            });

        $("#btnAddGroups").on("click", function(e){

             $('#groups :selected').each(function(index, item){
               var new_option = '<option  value="' + $(item).val() + '">' + $(item).text() + '</option>';
                $("#groupname_list").append(new_option);
                $(this).remove();
                });
                attachGroupNameList();
            });

        $( "#groups >option" ).dblclick(function() {
        var new_option = '<option  value="' + $(this).val() + '">' + $(this).text() + '</option>';
    $("#groupname_list").append(new_option);
    $(this).remove();
    attachGroupNameList();

});
        $("#submit").on("click", function(e){
           e.preventDefault();

           $(this).hide();
           $("#loader").show();
           $("#groupname_list option").prop("selected", "selected");
           $("#username_list option").prop("selected", "selected");
            data_to_send = $("#postform").serialize();
            var path = U_ADMINNOTIFICATIONS_PATH + 'noty' ;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: data_to_send,
                url: path,
                success: function (data) {
               send_notification(data);
                }
            });

        });

        $(".an-info").on("click", function(){
            $("#info_block").show('slow');
        });

        $("#infoClose").on("click", function(){
            $("#info_block").hide('slow');
       });

        });//end ready

        function send_notification(data)
        {
            $("#loader").hide();
            $("#submit").show();
            $("#noty_content").html('');
            if (data.ERROR) 
            {
                for (i = 0; i < data['ERROR'].length; i++) {
                    output_info_new(data['ERROR'][i], 'error');
                return;
            }
            }
            if (data.MESSAGE)
            {
                var n = noty({
                 text: data.MESSAGE,
                 type: 'notification',
                 dismissQueue: false,
                 layout: 'topCenter',
                  timeout: false, // delay for closing event. Set false for sticky notifications
                   modal: true,
                    closeWith: ['button'], // ['click', 'button', 'hover']
 
                     theme: 'defaultTheme',
                     buttons: [
                    {addClass: 'btn btn-primary', text: data.MESSAGE_SAVE, onClick: function( $noty){
                     var send_data = JSON.stringify(data.SEND_DATA);
                         var path = U_ADMINNOTIFICATIONS_PATH + 'save' ;
                        data_to_send = $("#postform").serialize();
                       $.ajax({
		                    type: 'POST',
		                    dataType: 'json',
		                    url: path,
                            data:data_to_send,
		                    success: function(data){
                                noty_save_response(data);
		                    }
	                    });

                        $noty.close();
                      }
                    },
                    {addClass: 'btn btn-danger', text: data.MESSAGE_NO_SAVE, onClick: function($noty) {
                        $noty.close();
                      }
                    }
                  ]
                 });
             }
        }

        $("#notySavedBlock").on("click", ".an-action-restore", function(){
            var path = U_ADMINNOTIFICATIONS_PATH + 'restore' ;
            var data = "noty_id=" + $(this).attr("data-noty_id");
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: data,
                url: path,
                success: function (data) {
               noty_restore_response(data);
                }
            });
        });

        $("#notySavedBlock").on("click", ".an-action-delete", function(){
            var path = U_ADMINNOTIFICATIONS_PATH + 'delete' ;
            var data = "noty_id=" + $(this).attr("data-noty_id") + '&row_id=' + $(this).closest("tr").index();
            var row_id = $(this).closest("tr").index();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: data,
                url:  U_ADMINNOTIFICATIONS_PATH + 'delete' ,
                success: function (data) {
               noty_delete_response(data);
                }
            });
        });

    //creates a new jQuery notification message
    function output_info_new( message, type,  expire, is_reload)
    {
        if(type == null) type= 'notification';
        if(expire == null) expire = 4000;
        var n = noty({
             text: message,
             type: type,
             timeout: expire,
             layout: 'topRight',
             theme: 'defaultTheme',
             callback: {
                afterClose: function() 
                {
                    if (is_reload == null || is_reload == '' || is_reload != true)  return;
                    window.location.reload();
                }
                },
             }); 
    }
        function attachGroupNameList()
        {
            $( "#groupname_list >option" ).dblclick(function() {
                    var new_option = '<option  value="' + $(this).val() + '">' + $(this).text() + '</option>';
                $("#groups").append(new_option);
                $(this).remove();
            });
        }
        function attachUserNameList()
        {
            $( "#username_list >option" ).dblclick(function() {
                    var new_option = '<option  value="' + $(this).val() + '">' + $(this).text() + '</option>';
                $("#users").append(new_option);
                $(this).remove();
            });
        }

        function hilight(value, term) {
            return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi, "\\$1") + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
        }

        function goto_user(item) {
               var new_option = '<option value="' + item.data[0] + '">' + item.value + '</option>';
                var id = item.data[0];
                $("#username_list").append(new_option);
                attachUserNameList();

        }
        function goto_group(item) {
               var new_option = '<option value="' + item.data[0] + '">' + item.value + '</option>';
                var id = item.data[0];
                $("#groupname_list").append(new_option);
                attachGroupNameList();
        }

        function noty_save_response(data)
        {
            $("#loader").hide();
            $("#submit").show();
            $("#noty_content").html('');
            if (data.ERROR) 
            {
                for (i = 0; i < data['ERROR'].length; i++) {
                    output_info_new(data['ERROR'][i], 'error');
                }
                return;
            }
            output_info_new(data.MESSAGE, 'success');
            var tr = '<tr>';
            tr += '<td title="' + data.noty_tooltip + '">' + data.noty_title + '</td>';
            tr += '<td>' + data.noty_create_time + '</td>';
            tr += '<td align="center"><div class="an-action an-action-restore" data-noty_id="' + data.noty_id + '" title="' + L_ACP_ADMINNOTIFICATIONS_TOOLTIP_RESTORE + '"><i class="fa fa-download"></i></div> <div class="an-action an-action-delete"  data-noty_id="' + data.noty_id + '" title="' + L_ACP_ADMINNOTIFICATIONS_TOOLTIP_DELETE + '"><i class="fa fa-trash-o"></i></div></td>';
            tr += '</tr>';
            if ($('#tblNotySaved > tbody > tr:first').length >0)
            {
                $('#tblNotySaved > tbody > tr:first').before(tr);
            }
            else
            {
                $("#noNotySavedBlock").hide();
                $("#tblNotySaved > tbody").append(tr);
                 $("#tblNotySaved").show();
            }
        }

        function noty_restore_response(data)
        {
            if (data.ERROR) 
            {
                for (i = 0; i < data['ERROR'].length; i++) {
                    output_info_new(data['ERROR'][i], 'error');
                }
                return;
            }
            output_info_new(data.MESSAGE, 'success');
            $("#noty_title").val(data.NOTY_TITLE);
            $("#noty_content").val(data.NOTY_CONTENT);
           $("input[name=noty_parse_type][value='" + data.NOTY_PARSE_TYPE + "']").prop("checked",true);
                    
        }
        function noty_delete_response(data)
        {
            if (data.ERROR) 
            {
                for (i = 0; i < data['ERROR'].length; i++) {
                    output_info_new(data['ERROR'][i], 'error');
                }
                return;
            }
            output_info_new(data.MESSAGE, 'success');
            $("#tblNotySaved tr:eq(" +  (data.ROW_ID + 1) + ")").remove();
            if($('#tblNotySaved > tbody > tr').length == 0)
            {
                $("#noNotySavedBlock").show();
                $("#tblNotySaved").hide();
            }
                    
        }



    })(jQuery);                                                   // Avoid conflicts with other libraries
