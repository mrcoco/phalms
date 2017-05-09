/**
 * Created by DwiAgus on 06/03/2016.
 */
function notif_show(e)
{
    if(e.alert == 'sukses')
    {
        notif_success(e);
    }else{
        notif_error(e);
    }
}

function notif_error(e)
{
    toastr.error(e.msg, e.title);
    toastr.options.timeOut = 15;
    toastr.options.extendedTimeOut = 30;
}

function notif_success(e)
{
    toastr.success(e.msg, e.title);
    toastr.options.timeOut = 15;
    toastr.options.extendedTimeOut = 30;
}