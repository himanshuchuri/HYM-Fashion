function open_conversation(type,id)
{
    get_conversation(id);
}

function get_conversation(id)
{
    $("#conversation_box").modal('toggle');
    window.setTimeout( hide_loader, 3000 );
}

function show_loader()
{
    show_list();
}

function show_list()
{
$("#add_comment_box").show();
    $("#no_trail_found").hide();
    $("#comments_list").show();
}

function check_and_comment()
{

}

function hide_loader()
{
    $("#chat_loader").hide();
    $("#no_trail_found").show();

}