layout_sidebar_change('false')
change_box_container('false')
layout_caption_change('true')

$(document).ready(function() {
    
    $('.form-select').select2({
        placeholder: 'Select an option',
    });

    if($('.datepicker').length) {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    }

    $('.media-preview').click(function() {
        $(this).siblings('input[type="file"]').click();

        $(this).siblings('input[type="file"]').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.media-preview').css('background-image', 'url(' + e.target.result + ')');
            }
            reader.readAsDataURL(file);
        });

    });
});

function buttonState(button, state, initialText=null) {

    button = $(button);

    if (state === 'loading') {
        button.attr('disabled', true);
        button.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
    } else {
        button.attr('disabled', false);
        button.html(initialText);
    }
}

function change_theme_color(color){
    document.cookie = `theme_color=${color}; max-age=${60*60*24*365*30}; path=/`;
    layout_change(color);
}

function underDevelopment(){
    // prevent default action
    event.preventDefault();

    Swal.fire({
        title: 'Under Development',
        text: 'This feature is under development and will be available soon.',
        icon: 'info',
        confirmButtonText: 'OK'
    });
}

function injectStylesheet(url) {
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = url;
    document.head.appendChild(link);
}

function injectScript(url) {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = url;
        script.onload = resolve;
        script.onerror = reject;
        document.head.appendChild(script);
    });
}

function change_theme_color(color){
    document.cookie = `theme_color=${color}; max-age=${60*60*24*365*30}; path=/`;
    layout_change(color);
}

// layout_change('{{cookie()->get('theme_color') ?? 'light' }}');