function toast(message, type = 'info',  position = 'toast-bottom-left', duration = 1000, onclick = null) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": position,
        "preventDuplicates": true,
        "onclick": onclick,
        "showDuration": "0",
        "hideDuration": duration,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    switch (type) {
        case "success":
            toastr.success(message);
            break;
        case "error":
            toastr.error(message);
            break;
        case "warning":
            toastr.warning(message);
            break;
        default:
            toastr.info(message);
            break;
    }
}