/*"use strict";!function(){document.getElementsByTagName("body")[0].setAttribute("data-pc-layout","compact");for(var e=document.querySelector("#sidebar-hide"),t=(e&&e.addEventListener("click",function(){document.querySelector("body").classList.contains("pc-sidebar-hide")?document.querySelector("body").classList.remove("pc-sidebar-hide"):document.querySelector("body").classList.add("pc-sidebar-hide")}),document.querySelectorAll(".pc-navbar > li:not(.pc-caption)")),c=0;c<t.length;c++)new bootstrap.Tooltip(t[c],{trigger:"hover",placement:"right",title:t[c].children[0].children[1].innerHTML}),t[c].addEventListener("click",function(e){document.querySelector(".pc-sidebar").classList.add("pc-compact-submenu-active"),document.querySelector("body").classList.add("pc-compact-submenu-active");e=e.target;(e="SPAN"==e.tagName?e.parentNode:e).parentNode.classList.contains("pc-trigger")?(document.querySelector(".pc-sidebar").classList.add("pc-compact-submenu-active"),document.querySelector("body").classList.add("pc-compact-submenu-active")):(document.querySelector(".pc-sidebar").classList.remove("pc-compact-submenu-active"),document.querySelector("body").classList.remove("pc-compact-submenu-active"))});for(var r=document.querySelectorAll(".pc-sidebar .pc-navbar a"),a=0;a<r.length;a++){var o=window.location.href.split(/[?#]/)[0];r[a].href==o&&""!=r[a].getAttribute("href")&&(r[a].parentNode.classList.remove("active"),r[a].parentNode.parentNode.parentNode.classList.remove("pc-trigger"),r[a].parentNode.parentNode.parentNode.classList.remove("active"),r[a].parentNode.parentNode.parentNode.parentNode.parentNode.classList.remove("pc-trigger"))}}();*/

"use strict";
!function() {
    document.getElementsByTagName("body")[0].setAttribute("data-pc-layout", "compact");
    for (var e = document.querySelector("#sidebar-hide"), t = (e && e.addEventListener("click", function() {
        document.querySelector("body").classList.contains("pc-sidebar-hide") ? document.querySelector("body").classList.remove("pc-sidebar-hide") : document.querySelector("body").classList.add("pc-sidebar-hide")
    }),
    document.querySelectorAll(".pc-navbar > li:not(.pc-caption)")), c = 0; c < t.length; c++)
        new bootstrap.Tooltip(t[c],{
            trigger: "hover",
            placement: "right",
            title: t[c].children[0].children[1].innerHTML
        }),
        t[c].addEventListener("click", function(e) {
            document.querySelector(".pc-sidebar").classList.add("pc-compact-submenu-active"),
            document.querySelector("body").classList.add("pc-compact-submenu-active");
            e = e.target;
            (e = "SPAN" == e.tagName ? e.parentNode : e).parentNode.classList.contains("pc-trigger") ? (document.querySelector(".pc-sidebar").classList.add("pc-compact-submenu-active"),
            document.querySelector("body").classList.add("pc-compact-submenu-active")) : (document.querySelector(".pc-sidebar").classList.remove("pc-compact-submenu-active"),
            document.querySelector("body").classList.remove("pc-compact-submenu-active"))
        });
    for (var r = document.querySelectorAll(".pc-sidebar .pc-navbar a"), a = 0; a < r.length; a++) {
        var o = window.location.href.split(/[?#]/)[0];
        r[a].href == o && "" != r[a].getAttribute("href") && (r[a].parentNode.classList.remove("active"),
        r[a].parentNode.parentNode.parentNode.classList.remove("pc-trigger"),
        r[a].parentNode.parentNode.parentNode.classList.remove("active"),
        r[a].parentNode.parentNode.parentNode.parentNode.parentNode.classList.remove("pc-trigger"))
    }
}();
