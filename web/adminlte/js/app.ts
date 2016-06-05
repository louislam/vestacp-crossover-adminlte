/**
 * Created by Louis on 5/6/2016.
 */
/// <reference path="jquery.d.ts" />
"use strict";


class LouisAdminLTE {

    constructor() {

    }

    private initUI() {
        var body = $("body");
        var wrapper;

        body.addClass("skin-blue sidebar-mini");

        // Wrap All Content first
        body.wrapInner('<div class="content-wrapper" />');
 
        body.wrapInner('<div class="wrapper" />');
        wrapper = $(".wrapper");

        // Load Template
        $.get("/adminlte/view/template.php", function (html) {
            body.show();
            var template = $(html);
            var sidebar = template.find(".main-sidebar");
            var sidebarMenu = sidebar.find(".sidebar-menu");
            var header = template.find(".main-header");

            wrapper.prepend(header);
            wrapper.prepend(sidebar);

            header.find(".username").text($(".l-profile__username").text());
            header.find(".btn-profile").attr("href", $(".l-profile__username").attr("href"));
            header.find(".btn-logout").attr("href", $(".l-profile__logout").attr("href"));

            // Menu items
            $(".l-stat .l-stat__col").each(function () {
                var name = LouisAdminLTE.ucFirst($(this).find(".l-stat__col-title").text());
                var url = $(this).find("a").attr("href");
                var number = LouisAdminLTE.ucFirst($(this).find("ul li:first-child").text());

                var item = $("<li><a href=''><i class='fa fa-th'></i> <span></span><small class='label pull-right  bg-green'>new</small></li>");

                if ($(this).hasClass("l-stat__col--active")) {
                    item.addClass("active");
                }

                item.find("span").text(name);
                item.find("a").attr("href", url);
                item.find(".label").text(number);

                sidebarMenu.append(item);
            });

            // Admin Menu
            sidebarMenu.append('<li class="treeview active"><a href="#"><i class="fa fa-files-o"></i><span>Admin</span></a><ul class="treeview-menu admin-menu"></ul></li>');

            $(".l-menu__item a").each(function () {
                var item = $("<li><a><i class=\"fa fa-circle-o\"></i></a></li>");
                var a = item.find("a");
                a.attr("href", $(this).attr("href"));
                a.append($(this).text());

                $(".admin-menu").append(item);
            });


            $(".l-stat, .l-header").hide(); 

        });


    }

    public static ucFirst(str : string) {
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
    }
}

$.ajaxSetup ({
    cache: false
});

var louisAdminLTE = null;

$(document).ready(function () {
    louisAdminLTE = new LouisAdminLTE();
    louisAdminLTE.initUI();
});
