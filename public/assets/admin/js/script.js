$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


loadConversatuion();
function loadConversatuion() {
    $.ajax({
        type: "get",
        url: "/loadList",
        success:function(data){
            setTimeout(function(){
                loadConversatuion();
                $("#contacts").load(" #contacts");
            }, 1500);
        }
    });
}

function acceptNotifConnection(notif_id) {
    var user1_id = $(`input[name=sender_id_${notif_id}]`).val();
    var user2_id = $(`input[name=recipient_id_${notif_id}]`).val();
    console.log(notif_id);
    console.log(user1_id);
    console.log(user2_id);
    $.ajax({
        type: 'POST',
        url: "/connection/approve",
        data: {
            'user1_id':user1_id,
            'user2_id':user2_id,
        },
        success: function (data) {
            $.ajax({
                type: 'DELETE',
                url: `/notification/${notif_id}/delete`,
                success: function (data) {
                    window.location.reload();
                }
            });
        }
    });
}

function deleteNotifConnection(notif_id) {
    var user1_id = $(`input[name=sender_id_${notif_id}]`).val();
    var user2_id = $(`input[name=recipient_id_${notif_id}]`).val();

    $.ajax({
        type: 'POST',
        url: "/connection/delete",
        data: {
            'user1_id':user1_id,
            'user2_id':user2_id,
        },
        success: function (data) {
            $.ajax({
                type: 'DELETE',
                url: `/notification/${notif_id}/delete`,
                success: function (data) {
                    $('#notif_list_'+notif_id).remove();
                    $('li.dropdown.dropdown-notification a').click();
                    if($('.notification-wrap-popup .notification_list').length > 0){
                        $('#noNotifications').hide();
                    }
                    else{
                        $('#noNotifications').show();
                    }
                }
            });
        }
    });
}

var count=0;
var count1=0;
$('li.dropdown.dropdown-notification a').on('click', function (event) {
    if(count > 0){
        $(this).parent().toggleClass('open');
    }
    count++;
});
$('li.dropdown.dropdown-messages a').on('click', function (event) {
    if(count1 > 0){
        $(this).parent().toggleClass('open');
    }
    count1++;
    MarkMsgAsRead();
});
$('body').on('click', function (e) {
    if (!$('li.dropdown.dropdown-notification').is(e.target)
        && $('li.dropdown.dropdown-notification').has(e.target).length === 0
        && $('.open').has(e.target).length === 0
    ) {
        $('li.dropdown.dropdown-notification').removeClass('open');
    }
    if (!$('li.dropdown.dropdown-messages').is(e.target)
        && $('li.dropdown.dropdown-messages').has(e.target).length === 0
        && $('.open').has(e.target).length === 0
    ) {
        $('li.dropdown.dropdown-messages').removeClass('open');
    }
});

function MarkMsgAsRead(){
    $.ajax({
        type: 'POST',
        url:'message_markRead',
        success: function(data){
            $(".message_contacts .contact").removeClass('active');
        }
    });
}
function getNotifications(){
    $.ajax({
        url:'/notifications_popup',
        type:'post',
        success:function (response) {

            $('.notification-wrap-popup').html(response);

            if($('.notification-wrap-popup .notification_list').length > 0){
                $('#noNotifications').hide();
            }
            else{
                $('#noNotifications').show();
            }

        }
    });
}
function getNotificationBadge(){
    $.ajax({
        url:'/notifications_badge',
        type:'post',
        success:function (response) {
            if(response == '0') {
                $('#notification_badge').hide();
            }
            else{
                $('#notification_badge').show();
                $('#notification_badge').html(response);
            }
        }
    });
}
function getMessageBadge(){
    $.ajax({
        url:'/message_badge',
        type:'post',
        data:{},
        success:function (response) {
            if(response == '0') {
                $('#message_badge').hide();
            }
            else{
                $('#message_badge').show();
                $('#message_badge').html(response);
            }
        }
    });
}

function getMessages(){
    $.ajax({
        url:'/messages_popup',
        type:'post',
        dataType:'json',
        success:function (response) {
            if(response.length > 0){
                var html='';
                $.each( response, function( key, msg ) {
                    if($('.message-items-container #msg_list_item_'+msg.msg_id).length > 0){
                        $('.message-items-container #msg_list_item_'+msg.msg_id).find('.time').html('<sup>.</sup> '+msg.time);
                    }
                    else{
                        html += ' <li class="contact '+msg.active+' msg_item" data-msg-id="'+msg.msg_id+'" id="msg_list_item_'+msg.msg_id+'">' +
                            '                                <div class="wrap">' +
                            '                                    <span class="contact-status online"></span>' +
                            '                                    <div class="pro-img">' +
                            '                                        <img src="'+msg.avatar+'" alt=""/>' +
                            '                                    </div>' +
                            '                                    <div class="meta">' +
                            '                                        <p class="name"><b class="sender_name">'+msg.name+'</b> <span class="time"><sup>.</sup> '+msg.time+'</span></p>' +
                            '                                        <p class="preview">'+msg.content+'</p>' +
                            '                                    </div>' +
                            '                                </div>' +
                            '                                <div class="message_actions_overlay" id="msg-action-'+msg.msg_id+'" onclick="deleteMessage('+msg.msg_id+')">' +
                            '                                    <i class="fa fa-times-thin fa-3x fa-grey"></i>' +
                            '                                </div>' +
                            '                            </li>';
                    }

                });
            }

            $('.message-items-container').prepend(html);
            $(".message_contacts .contact").hover(function(){
                var msg_id=$(this).attr('data-msg-id');
                $('#msg-action-'+msg_id).css('display','flex');
            }, function(){
                var msg_id=$(this).attr('data-msg-id');
                $('#msg-action-'+msg_id).css('display','none');
            });
            if($('.message-items-container .msg_item').length > 0){
                $('#noMessages').hide();
            }
            else{
                $('#noMessages').show();
            }

        }
    });
}
window.setInterval(function(){
    // call your function here
    // getNotifications();
    getNotificationBadge();
    getMessageBadge();
    getMessages();
}, 1600);

getNotificationBadge();
getMessageBadge();
getMessages();

$(".message_contacts .contact").hover(function(){
    var msg_id=$(this).attr('data-msg-id');
    $('#msg-action-'+msg_id).css('display','flex');
}, function(){
    var msg_id=$(this).attr('data-msg-id');
    $('#msg-action-'+msg_id).css('display','none');
});

function searchMessages(seachKeyword) {
    $(".message_contacts_popup .contact").each(function () {
        if ($(this).find('.sender_name').text().search(new RegExp(seachKeyword, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show()
        }
    });
}
function deleteMessage(msgId) {
    $.ajax({
        type: 'DELETE',
        url: '/message/'+msgId+'/delete',
        data: {},
        success: function (data) {
            $('#msg_list_item_'+msgId).remove();

            $('li.dropdown.dropdown-messages a').click();
        }
    });
}
$('.newMessageTrigger').on('click',function () {
    $('#inputToMsg').val('');
    $( "#toMsgUserId" ).val('');
    $( "#typeNewMsgInput" ).val('');
    $('#newMessageDiv').show();
});
$('#newMessageClose').on('click',function () {
    $('#newMessageDiv').hide();
});


$(document).ready(function(){
    $("#inputToMsg").autocomplete({
        minLength: 0,
        source: "/autoCompleteMsgToAjax",
        focus: function( event, ui ) {
            // $( "#inputToMsg" ).val( ui.item.title ); // uncomment this line if you want to select value to search box
            return false;
        },
        select: function( event, ui ) {
            $( "#inputToMsg" ).val( ui.item.title );
            $( "#toMsgUserId" ).val( ui.item.user_id );
            $( "#receiver_id_message" ).val( ui.item.user_id );
            $( "#receiver_id_link" ).val( ui.item.user_id );
            console.log(ui.item.user_id);
            return false;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div class="list_item_container"><div class="autoCompleteUserImage"><img src="' + item.image + '" ></div><div class="autoCompleteUserName"><h4>' + item.title + '</h4></div></div>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };
    $('#inputToMsg').click(function() {
        if ($(this).val() == ""){
            $(this).autocomplete("search", "");

            $( "#toMsgUserId" ).val('');
            $( "#receiver_id_message" ).val('');
            $( "#receiver_id_link" ).val('');
        }
    });
    $('#sendNewMsgBtn').click(function() {
        var message=$('#typeNewMsgInput').val();
        if(message == ""){

        }
        else if($( "#toMsgUserId" ).val() == ""){
            swal({
                title: "Error!",
                text: "Please Select to whom you want to send message!",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }
        else{
            $('#newMessageDiv').fadeOut();
        }
    });

    $('#header').removeAttr('style');
});
function runScript(e,conId) {
    var s_val = $('#search_input').val();
    console.log(s_val);
    $('.highlightedP').removeClass('highlightedP');
    $('.highlightedWord').removeClass('highlightedWord');
    if(conId == ''){
        $('#searchErrMsg').show();
        $('#noResultErrMsg').hide();
    }
    else {
        $('#noResultErrMsg').hide();
        $('#searchErrMsg').hide();
        if (e.keyCode == 13) {
            var s_val = $('#search_input').val();
            if(s_val != ''){
                $.ajax({
                    type: "get",
                    url: "/search" + "/" + s_val + "/" + conId,
                    success: function (messages) {
                        if(messages.length > 0) {
                            $.each(messages, function (index, value) {
                                msgId = value.id;
                                $('#message-' + msgId).find('p').addClass('highlightedP');
                                hiliter(s_val, $('#message-' + msgId).find('.messageContent'));
                            });
                            var myElement = document.getElementById('message-' + msgId);
                            var topPos = myElement.offsetTop;
                            $('#messagesContainer').animate({
                                scrollTop: topPos - 70
                            }, 1000);
                        }
                        else{
                            $('#noResultErrMsg').show();
                        }
                    }
                });
                return false;
            }
        }
    }
}
function hiliter(word, element) {
    console.log(element);
    var rgxp = new RegExp(word, 'g');
    var repl = '<span class="highlightedWord">' + word + '</span>';
    element.html(element.html().replace(rgxp, repl));
}

// -----------------------------------------------------------------------------------------------

var show = function(data) {
    alert(data.sender.name + " - '" + data.message + "'");
};
const messages = document.getElementsByClassName('messages')[0];

function scrollToBottom() {
    if(messages) {
        messages.scrollTop = messages.scrollHeight;
    }
}

scrollToBottom();

var msgshow = function(data) {
    var res = JSON.stringify(data.message);
    var result = res.substring(1, res.length() - 1);
    var path = '';
    if(JSON.stringify(data.type) == 1){
        path = '<img src="/uploads/'+result.message+'" style="width: 100px;height: 100px;">';
    }
    else if(JSON.stringify(data.type) == 2){
        path = '<a href="'+result.address+'" download target="_blank">' + result.message+'</a>';
    }
    else if(JSON.stringify(data.type) == 3){
        path = '<a href="/uploads/'+result.message+'" download target="_blank">' +
            '<video class="thumbnail" src="/uploads/'+result.message+'" style="width:100px"></video>' +
            '</a>';
    }
    else{
        path = result.message;
    }
    var html = '<li id="message-'+result.id+'" class="replies">' +
        '<div class="pro-img">' +
        '<img src="/images/dummy-profile.png" alt="" />' +
        '</div>' +
        '<p>'+path+'</p>' +
        '</li>';
    $('#talkMessages').append(html);

    scrollToBottom();
};


$('.file-upload').click(function () {
    var type = $(this).data('type');
    if(type == 'file'){
        $('#file').attr('accept',"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf");
    }
    else{
        $('#file').attr('accept',type+'/*');
    }
    $('#file').click();
});
var fileEle = document.getElementById("file");
if(fileEle) {
    document.getElementById("file").onchange = function () {
        let filesize = this.files[0].size; // On older browsers this can return NULL.
        let filesizeMB = (filesize / 1048576);
        if(filesizeMB <= 100) {
            $('#talkSendMessage').submit();
            scrollToBottom();
        } else {
            swal({
                title: "Error!",
                text: "Video size greater than 100 MB not Allowed, Please try again!",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }
    };
}

$('.new-file-upload').click(function () {
    var type = $(this).data('type');
    if(type == 'file'){
        $('#new_msg_file').attr('accept',"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf");
    }
    else{
        $('#new_msg_file').attr('accept',type+'/*');
    }
    $('#new_msg_file').click();
});

var fileEle1 = document.getElementById("new_msg_file");
if(fileEle1) {
    document.getElementById("new_msg_file").onchange = function () {
        let filesize = this.files[0].size; // On older browsers this can return NULL.
        let filesizeMB = (filesize / 1048576);
        if(filesizeMB <= 100) {
            $('#talkSendNewMessage').submit();
            scrollToBottom();
        } else {
            swal({
                title: "Error!",
                text: "Video size greater than 100 MB not Allowed, Please try again!",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }

    };
}


var show = function(id) {
    var div = document.getElementById(id);
    div.style.display ='block';
};
var hide = function(id) {
    var div = document.getElementById(id);
    div.style.display ='none';
};
$('input[type=radio][name=interest_funding]').change(function() {
    if (this.value == 'Yes') {
        $('#ifFundingYes').show();
        $('#oppo_name').attr('required','required');
        $('#funding_business_name').attr('required','required');
        $('#funding_contact_name').attr('required','required');
        $('#funding_phone_num').attr('required','required');
        $('#funding_email').attr('required','required');
        $('#funding_amount').attr('required','required');
    }
    else if (this.value == 'No') {
        $('#ifFundingYes').hide();
        $('#oppo_name').removeAttr('required');
        $('#funding_business_name').removeAttr('required');
        $('#funding_contact_name').removeAttr('required');
        $('#funding_phone_num').removeAttr('required');
        $('#funding_email').removeAttr('required');
        $('#funding_amount').removeAttr('required');
    }
});
function opportunityDiscussion() {
    var question = $('#discussionQuestion').val();
    var oppo_id = $('#discussionQuestion').attr('data-oppo-id');
    var user_id = $('#discussionQuestion').attr('data-uId');

    if(question != ''){
        $.ajax({
            url:'/opportunity_discussion/store',
            type:'post',
            data:{'question':question,'oppo_id':oppo_id,'user_id':use},
            success: function () {

            }
        });
    }
}
