var flg = "0";
{
    function menu_click() {
        for (var e = document.querySelectorAll(".pc-navbar li"), t = 0; t < e.length; t++)
            e[t].removeEventListener("click", function() {});
        for (e = document.querySelectorAll(".pc-navbar li:not(.pc-trigger) .pc-submenu"),
        t = 0; t < e.length; t++)
            e[t].style.display = "none";
        for (var o = document.querySelectorAll(".pc-navbar > li:not(.pc-caption).pc-hasmenu"), r = 0; r < o.length; r++)
            o[r].addEventListener("click", function(e) {
                e.stopPropagation();
                var t = e.target;
                if ((t = "SPAN" == t.tagName ? t.parentNode : t).parentNode.classList.contains("pc-trigger"))
                    t.parentNode.classList.remove("pc-trigger"),
                    slideUp(t.parentNode.children[1], 200),
                    window.setTimeout(()=>{
                        t.parentNode.children[1].removeAttribute("style"),
                        t.parentNode.children[1].style.display = "none"
                    }
                    , 200);
                else {
                    /*for (var o = document.querySelectorAll("li.pc-trigger"), r = 0; r < o.length; r++) {
                        var a = o[r];
                        a.classList.remove("pc-trigger"),
                        slideUp(a.children[1], 200),
                        window.setTimeout(()=>{
                            a.children[1].removeAttribute("style"),
                            a.children[1].style.display = "none"
                        }
                        , 200)
                    }*/
                    t.parentNode.classList.add("pc-trigger"),
                    t.children[1] && slideDown(t.parentNode.children[1], 200)
                }
            });
        document.querySelector(".navbar-content") && new SimpleBar(document.querySelector(".navbar-content"));
        for (var a = document.querySelectorAll(".pc-navbar > li:not(.pc-caption) li.pc-hasmenu"), r = 0; r < a.length; r++)
            a[r].addEventListener("click", function(e) {
                var t = e.target;
                if ("SPAN" == t.tagName && (t = t.parentNode),
                e.stopPropagation(),
                t.parentNode.classList.contains("pc-trigger"))
                    t.parentNode.classList.remove("pc-trigger"),
                    slideUp(t.parentNode.children[1], 200);
                else {
                    for (var o = t.parentNode.parentNode.children, r = 0; r < o.length; r++) {
                        var a = o[r];
                        a.classList.remove("pc-trigger"),
                        (a = "LI" == a.tagName ? a.children[0] : a).parentNode.classList.contains("pc-hasmenu") && slideUp(a.parentNode.children[1], 200)
                    }
                    t.parentNode.classList.add("pc-trigger");
                    e = t.parentNode.children[1];
                    e && (e.removeAttribute("style"),
                    slideDown(e, 200))
                }
            })
    }
    main_layout_change("horizontal")
}
function setLayout() {
    var e, t = localStorage.getItem("layout");
    main_layout_change(t),
    null !== t && "" !== t && (e = document.createElement("script"),
    "horizontal" === t ? (document.querySelector(".pc-sidebar").classList.add("d-none"),
    e.src = "/assets/js/layout-horizontal.js",
    document.body.appendChild(e)) : "color-header" === t ? document.querySelector(".pc-sidebar .m-header .logo-sidebar") && document.querySelector(".pc-sidebar .m-header .logo-sidebar").setAttribute("src", "/assets/images/brand/logo-white.png") : "compact" === t ? (e.src = "/assets/js/layout-compact.js",
    document.body.appendChild(e)) : "tab" === t && (e.src = "/assets/js/layout-tab.js",
    document.body.appendChild(e))),
    null === t && (main_layout_change("vertical"),
    localStorage.setItem("layout", "vertical"))
}
function add_scroller() {
    document.querySelector(".navbar-content") && new SimpleBar(document.querySelector(".navbar-content"))
}
function rm_menu() {
    document.querySelector(".pc-sidebar") && document.querySelector(".pc-sidebar").classList.remove("mob-sidebar-active"),
    document.querySelector(".topbar") && document.querySelector(".topbar").classList.remove("mob-sidebar-active"),
    document.querySelector(".pc-sidebar .pc-menu-overlay").remove(),
    document.querySelector(".topbar .pc-menu-overlay") && document.querySelector(".topbar .pc-menu-overlay").remove()
}
function remove_overlay_menu() {
    document.querySelector(".pc-sidebar").classList.remove("pc-over-menu-active"),
    document.querySelector(".topbar") && document.querySelector(".topbar").classList.remove("mob-sidebar-active"),
    document.querySelector(".pc-sidebar .pc-menu-overlay").remove(),
    document.querySelector(".topbar .pc-menu-overlay").remove()
}
document.addEventListener("DOMContentLoaded", menu_click),
document.addEventListener("DOMContentLoaded", function() {
    feather.replace(),
    (!document.querySelector("body").hasAttribute("data-pc-layout") || "horizontal" == document.querySelector("body").getAttribute("data-pc-layout") && window.innerWidth <= 1024) && add_scroller();
    var e = document.querySelector("#mobile-collapse")
      , e = (e && e.addEventListener("click", function() {
        document.querySelector(".pc-sidebar") && (document.querySelector(".pc-sidebar").classList.contains("mob-sidebar-active") ? rm_menu() : (document.querySelector(".pc-sidebar").classList.add("mob-sidebar-active"),
        document.querySelector(".pc-sidebar").insertAdjacentHTML("beforeend", '<div class="pc-menu-overlay"></div>'),
        document.querySelector(".pc-menu-overlay").addEventListener("click", function() {
            rm_menu()
        })))
    }),
    document.querySelector(".header-notification-scroll") && new SimpleBar(document.querySelector(".header-notification-scroll")),
    document.querySelector(".profile-notification-scroll") && new SimpleBar(document.querySelector(".profile-notification-scroll")),
    document.querySelector(".component-list-card .card-body") && new SimpleBar(document.querySelector(".component-list-card .card-body")),
    document.querySelector("#sidebar-hide"))
      , e = (e && e.addEventListener("click", function() {
        document.querySelector(".pc-sidebar").classList.contains("pc-sidebar-hide") ? document.querySelector(".pc-sidebar").classList.remove("pc-sidebar-hide") : document.querySelector(".pc-sidebar").classList.add("pc-sidebar-hide")
    }),
    document.querySelector(".trig-drp-search") && document.querySelector(".trig-drp-search").addEventListener("shown.bs.dropdown", e=>{
        document.querySelector(".drp-search input").focus()
    }
    ),
    setLayout(),
    document.querySelectorAll(".theme-main-layout"))
      , t = "vertical";
    e && document.querySelectorAll(".theme-main-layout > a").forEach(function(e) {
        e.addEventListener("click", function() {
            location.reload(),
            document.querySelectorAll(".theme-main-layout > a").forEach(function(e) {
                // e.classList.remove("active")
            }),
            this.classList.add("active"),
            t = "horizontal" == this.getAttribute("data-value") ? "horizontal" : "compact" == this.getAttribute("data-value") ? "compact" : "tab" == this.getAttribute("data-value") ? "tab" : "color-header" == this.getAttribute("data-value") ? "color-header" : "vertical",
            localStorage.setItem("layout", t),
            setLayout()
        })
    })
}),
window.addEventListener("load", function() {
    [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e) {
        return new bootstrap.Tooltip(e)
    }),
    [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e) {
        return new bootstrap.Popover(e)
    }),
    [].slice.call(document.querySelectorAll(".toast")).map(function(e) {
        return new bootstrap.Toast(e)
    });
    var e = document.querySelector(".loader-bg");
    e && e.remove()
});
for (var elem = document.querySelectorAll(".pc-sidebar .pc-navbar a"), l = 0; l < elem.length; l++) {
    var pageUrl = window.location.href.split(/[?#]/)[0];
    elem[l].href == pageUrl && "" != elem[l].getAttribute("href") && (elem[l].parentNode.classList.add("active"),
    elem[l].parentNode.parentNode.parentNode.classList.add("pc-trigger"),
    elem[l].parentNode.parentNode.parentNode.classList.add("active"),
    elem[l].parentNode.parentNode.style.display = "block",
    elem[l].parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("pc-trigger"),
    elem[l].parentNode.parentNode.parentNode.parentNode.style.display = "block")
}
for (var tc = document.querySelectorAll(".prod-likes .form-check-input"), t = 0; t < tc.length; t++) {
    var prod_like = tc[t];
    prod_like.addEventListener("change", function(e) {
        if (e.currentTarget.checked)
            (prod_like = e.target).parentNode.insertAdjacentHTML("beforeend", '<div class="pc-like"><div class="like-wrapper"><span><span class="pc-group"><span class="pc-dots"></span><span class="pc-dots"></span><span class="pc-dots"></span><span class="pc-dots"></span></span></span></div></div>'),
            prod_like.parentNode.querySelector(".pc-like").classList.add("pc-like-animate"),
            setTimeout(function() {
                try {
                    prod_like.parentNode.querySelector(".pc-like").remove()
                } catch (e) {}
            }, 3e3);
        else {
            prod_like = e.target;
            try {
                prod_like.parentNode.querySelector(".pc-like").remove()
            } catch (e) {}
        }
    })
}
for (tc = document.querySelectorAll(".auth-main.v2 .img-brand"),
t = 0; t < tc.length; t++)
    tc[t].setAttribute("src", "/assets/images/brand/logo-white.png");
var rtl_flag = !1
  , dark_flag = !1;
function layout_change_default() {
    layout_change(dark_layout = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
    var e = document.querySelector('.theme-layout .btn[data-value="default"]');
    e && e.classList.add("active"),
    window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", e=>{
        layout_change(dark_layout = e.matches ? "dark" : "light")
    }
    )
}
document.addEventListener("DOMContentLoaded", function() {
    "undefined" != typeof Storage && layout_change(localStorage.getItem("theme"))
});
for (var layout_btn = document.querySelectorAll(".theme-layout .btn"), t = 0; t < layout_btn.length; t++)
    layout_btn[t] && layout_btn[t].addEventListener("click", function(e) {
        e.stopPropagation();
        e = e.target;
        "true" == (e = "SPAN" == (e = "SPAN" == e.tagName ? e.parentNode : e).tagName ? e.parentNode : e).getAttribute("data-value") ? localStorage.setItem("theme", "light") : localStorage.setItem("theme", "dark")
    });
function layout_theme_contrast_change(e) {
    "true" == e ? (document.getElementsByTagName("body")[0].setAttribute("data-pc-theme_contrast", "true"),
    document.querySelector(".theme-contrast .btn.active") && (document.querySelector(".theme-contrast .btn.active").classList.remove("active"),
    document.querySelector(".theme-contrast .btn[data-value='true']").classList.add("active"))) : (document.getElementsByTagName("body")[0].setAttribute("data-pc-theme_contrast", "false"),
    document.querySelector(".theme-contrast .btn.active") && (document.querySelector(".theme-contrast .btn.active").classList.remove("active"),
    document.querySelector(".theme-contrast .btn[data-value='false']").classList.add("active")))
}
function layout_caption_change(e) {
    "true" == e ? (document.getElementsByTagName("body")[0].setAttribute("data-pc-sidebar-caption", "true"),
    document.querySelector(".theme-nav-caption .btn.active") && (document.querySelector(".theme-nav-caption .btn.active").classList.remove("active"),
    document.querySelector(".theme-nav-caption .btn[data-value='true']").classList.add("active"))) : (document.getElementsByTagName("body")[0].setAttribute("data-pc-sidebar-caption", "false"),
    document.querySelector(".theme-nav-caption .btn.active") && (document.querySelector(".theme-nav-caption .btn.active").classList.remove("active"),
    document.querySelector(".theme-nav-caption .btn[data-value='false']").classList.add("active")))
}
function preset_change(e) {
    document.getElementsByTagName("body")[0].setAttribute("data-pc-preset", e),
    document.querySelector(".pct-offcanvas") && (document.querySelector(".preset-color > a.active").classList.remove("active"),
    document.querySelector(".preset-color > a[data-value='" + e + "']").classList.add("active"))
}
function main_layout_change(e) {
    var t;
    document.getElementsByTagName("body")[0].setAttribute("data-pc-layout", e),
    document.querySelector(".pct-offcanvas") && ((t = document.querySelector(".theme-main-layout > a.active")) && t.classList.remove("active"),
    t = document.querySelector(".theme-main-layout > a[data-value='" + e + "']")) && t.classList.add("active")
}
function layout_rtl_change(e) {
    document.querySelector("#layoutmodertl");
    "true" == e ? (rtl_flag = !0,
    document.getElementsByTagName("body")[0].setAttribute("data-pc-direction", "rtl"),
    document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"),
    document.getElementsByTagName("html")[0].setAttribute("lang", "ar"),
    document.querySelector(".theme-direction .btn.active") && (document.querySelector(".theme-direction .btn.active").classList.remove("active"),
    document.querySelector(".theme-direction .btn[data-value='true']").classList.add("active"))) : (rtl_flag = !1,
    document.getElementsByTagName("body")[0].setAttribute("data-pc-direction", "ltr"),
    document.getElementsByTagName("html")[0].removeAttribute("dir"),
    document.getElementsByTagName("html")[0].removeAttribute("lang"),
    document.querySelector(".theme-direction .btn.active") && (document.querySelector(".theme-direction .btn.active").classList.remove("active"),
    document.querySelector(".theme-direction .btn[data-value='false']").classList.add("active")))
}
function layout_change(e) {

    // check if theme_color cookie exists
    var theme_color = document.cookie.split('; ').find(row => row.startsWith('theme_color='));
    if (theme_color) {
        theme_color = theme_color.split('=')[1];
        } else { theme_color = 'light';
    }

    e = theme_color ?? 'light';
    

    document.querySelector(".pct-offcanvas");
    document.getElementsByTagName("body")[0].setAttribute("data-pc-theme", e);
    var t = document.querySelector('.theme-layout .btn[data-value="default"]');
    t && t.classList.remove("lovo"),
    "dark" == e ? (dark_flag = !0,
    document.querySelector(".pc-sidebar .m-header .logo-sidebar") && document.querySelector(".pc-sidebar .m-header .logo-sidebar").setAttribute("src", "/assets/images/brand/logo-white.png"),
    document.querySelector(".navbar-brand .logo-sidebar") && document.querySelector(".navbar-brand .logo-sidebar").setAttribute("src", "/assets/images/brand/logo-white.png"),
    document.querySelector(".auth-main.v1 .auth-sidefooter") && document.querySelector(".auth-main.v1 .auth-sidefooter img").setAttribute("src", "/assets/images/brand/logo-white.png"),
    document.querySelector(".footer-top .footer-logo") && document.querySelector(".footer-top .footer-logo").setAttribute("src", "/assets/images/brand/logo-white.png"),
    document.querySelector(".theme-layout .btn.active") && (document.querySelector(".theme-layout .btn.active").classList.remove("active"),
    document.querySelector(".theme-layout .btn[data-value='false']").classList.add("active"))) : (dark_flag = !1,
    document.querySelector(".pc-sidebar .m-header .logo-sidebar") && document.querySelector(".pc-sidebar .m-header .logo-sidebar").setAttribute("src", "/assets/images/brand/logo-dark.png"),
    document.querySelector(".navbar-brand .logo-sidebar") && document.querySelector(".navbar-brand .logo-sidebar").setAttribute("src", "/assets/images/brand/logo-dark.png"),
    document.querySelector(".auth-main.v1 .auth-sidefooter") && document.querySelector(".auth-main.v1 .auth-sidefooter img").setAttribute("src", "/assets/images/brand/logo-dark.png"),
    document.querySelector(".footer-top .footer-logo") && document.querySelector(".footer-top .footer-logo").setAttribute("src", "/assets/images/brand/logo-dark.png"),
    document.querySelector(".theme-layout .btn.active") && (document.querySelector(".theme-layout .btn.active").classList.remove("active"),
    document.querySelector(".theme-layout .btn[data-value='true']").classList.add("active")))
}
function change_box_container(e) {
    document.querySelector(".pc-content") && ("true" == e ? (document.querySelector(".pc-content").classList.add("container"),
    document.querySelector(".footer-wrapper").classList.add("container"),
    document.querySelector(".footer-wrapper").classList.remove("container-fluid"),
    document.querySelector(".theme-container .btn.active") && (document.querySelector(".theme-container .btn.active").classList.remove("active"),
    document.querySelector(".theme-container .btn[data-value='true']").classList.add("active"))) : (document.querySelector(".pc-content").classList.remove("container"),
    document.querySelector(".footer-wrapper").classList.remove("container"),
    document.querySelector(".footer-wrapper").classList.add("container-fluid"),
    document.querySelector(".theme-container .btn.active") && (document.querySelector(".theme-container .btn.active").classList.remove("active"),
    document.querySelector(".theme-container .btn[data-value='false']").classList.add("active"))))
}
function removeClassByPrefix(t, o) {
    for (let e = 0; e < t.classList.length; e++) {
        var r = t.classList[e];
        r.startsWith(o) && t.classList.remove(r)
    }
}
document.addEventListener("DOMContentLoaded", function() {
    if (document.querySelectorAll(".preset-color"))
        for (var e = document.querySelectorAll(".preset-color > a"), t = 0; t < e.length; t++)
            e[t].addEventListener("click", function(e) {
                e = e.target;
                preset_change((e = "SPAN" == e.tagName ? e.parentNode : e).getAttribute("data-value"))
            });
    document.querySelector(".pct-body") && new SimpleBar(document.querySelector(".pct-body"));
    var o = document.querySelector("#layoutreset");
    o && o.addEventListener("click", function(e) {
        localStorage.clear(),
        location.reload(),
        localStorage.setItem("layout", "vertical")
    })
});
let slideUp = (e,t=0)=>{
    e.style.transitionProperty = "height, margin, padding",
    e.style.transitionDuration = t + "ms",
    e.style.boxSizing = "border-box",
    e.style.height = e.offsetHeight + "px",
    e.offsetHeight,
    e.style.overflow = "hidden",
    e.style.height = 0,
    e.style.paddingTop = 0,
    e.style.paddingBottom = 0,
    e.style.marginTop = 0,
    e.style.marginBottom = 0
}
  , slideDown = (e,t=0)=>{
    e.style.removeProperty("display");
    let o = window.getComputedStyle(e).display;
    "none" === o && (o = "block"),
    e.style.display = o;
    var r = e.offsetHeight;
    e.style.overflow = "hidden",
    e.style.height = 0,
    e.style.paddingTop = 0,
    e.style.paddingBottom = 0,
    e.style.marginTop = 0,
    e.style.marginBottom = 0,
    e.offsetHeight,
    e.style.boxSizing = "border-box",
    e.style.transitionProperty = "height, margin, padding",
    e.style.transitionDuration = t + "ms",
    e.style.height = r + "px",
    e.style.removeProperty("padding-top"),
    e.style.removeProperty("padding-bottom"),
    e.style.removeProperty("margin-top"),
    e.style.removeProperty("margin-bottom"),
    window.setTimeout(()=>{
        e.style.removeProperty("height"),
        e.style.removeProperty("overflow"),
        e.style.removeProperty("transition-duration"),
        e.style.removeProperty("transition-property")
    }
    , t)
}
;
var slideToggle = (e,t=0)=>("none" === window.getComputedStyle(e).display ? slideDown : slideUp)(e, t);

function layout_sidebar_change(value) {
    if (value == 'true') {
        document.getElementsByTagName('body')[0].setAttribute('data-pc-theme_contrast', 'true');

        var control = document.querySelector('.theme-contrast .btn.active');
        if (control) {
            document.querySelector('.theme-contrast .btn.active').classList.remove('active');
            document.querySelector(".theme-contrast .btn[data-value='true']").classList.add('active');
        }
    } else {
        document.getElementsByTagName('body')[0].setAttribute('data-pc-theme_contrast', '');
        var control = document.querySelector('.theme-contrast .btn.active');
        if (control) {
            document.querySelector('.theme-contrast .btn.active').classList.remove('active');
            document.querySelector(".theme-contrast .btn[data-value='false']").classList.add('active');
        }
    }
}

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