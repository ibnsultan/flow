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

    // Media Preview
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

    // Language Switch
    $('#inputChangeLang').on('change', function() {
        let lang = $(this).val();
        document.cookie = "lang=" + lang + "; max-age=" + 60 * 60 * 24 * 365 + "; path=/";
        toast.success({
            message: 'Language changed successfully',
            position: 'bottomCenter'
        });
        setTimeout(() => { location.reload();}, 1000);
    });
});

// Darkmode Switch
function change_theme_color(color){
    document.cookie = `theme_color=${color}; max-age=${60*60*24*365*30}; path=/`;
    layout_change(color);
}

const DarkModeState = document.cookie.split('; ').find(row => row.startsWith('theme_color='));
const switchDarkMode = document.getElementById('switchDarkMode');
if (switchDarkMode) {
    if (DarkModeState) {
        const theme_color = DarkModeState.split('=')[1];
        if (theme_color === 'dark') {
            switchDarkMode.checked = true;
        }
    }

    switchDarkMode.addEventListener('change', function() {
        if (this.checked) {
            change_theme_color('dark');
        } else {
            change_theme_color('light');
        }
    });
}

function change_theme_color(color){
    document.cookie = `theme_color=${color}; max-age=${60*60*24*365*30}; path=/`;
    layout_change(color);
}


// Under Development Alert

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


// Styles and Scripts Injection

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

const toast = iziToast;