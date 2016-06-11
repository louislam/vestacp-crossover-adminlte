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

        body.addClass("skin-blue sidebar-mini fixed"); 

        // Wrap All Content first
        body.wrapInner('<div class="content-wrapper"></div>');
 
        body.wrapInner('<div class="wrapper" />');
        wrapper = $(".wrapper");

        // Load Template
        $.get("/louislam/view/template.php", function (html) {
            body.show();
            var template = $(html);
            var sidebar = template.find(".main-sidebar");
            var sidebarMenu = sidebar.find(".sidebar-menu");
            var header = template.find(".main-header");
            var activeItem = null;

            wrapper.prepend(header);
            wrapper.prepend(sidebar);

            header.find(".username").text($(".l-profile__username").text());
            header.find(".btn-profile").attr("href", $(".l-profile__username").attr("href"));
            header.find(".btn-logout").attr("href", $(".l-profile__logout").attr("href"));

            // Menu items
            $(".l-stat .l-stat__col").each(function () {
                var name = LouisAdminLTE.ucFirst($(this).find(".l-stat__col-title").text());
                var url = $(this).find("a").attr("href");
                var number = LouisAdminLTE.ucFirst($(this).find("ul li:first-child span").text());

                var item = $("<li><a href=''><i class='fa'></i> <span></span><small class='label pull-right  bg-blue'></small></li>");

                if ($(this).hasClass("l-stat__col--active")) {
                    item.addClass("active");
                    activeItem = item;
                }

                item.find("a").attr("href", url);
                item.find(".label").text(number);

                if (url == "/list/user/") {
                    item.find(".fa").addClass("fa-user");
                    item.find("span").text(name);
                } else if (url == "/list/web/") {
                    item.find(".fa").addClass("fa-server");
                    item.find("span").text(name);
                } else if (url == "/list/dns/") {
                    item.find(".fa").addClass("fa-share-square-o");
                    item.find("span").text(name.replace("Dns", "DNS"));
                } else if (url == "/list/mail/") {
                    item.find(".fa").addClass("fa-envelope");
                    item.find("span").text(name);
                } else if (url == "/list/db/") {
                    item.find(".fa").addClass("fa-database");
                    item.find("span").text(name.replace("Db", "Database"));
                } else {
                    item.find(".fa").addClass("fa-th");
                    item.find("span").text(name);
                }



                sidebarMenu.append(item);
            });

            // Admin Menu
            sidebarMenu.append('<li class="treeview"><a href="#"><i class="fa fa-files-o"></i><span>Admin</span></a><ul class="treeview-menu admin-menu"></ul></li>');

            $(".l-menu__item a").each(function () {
                var item = $("<li><a><i class=\"fa\"></i><span></span></a></li>");
                var a = item.find("a");
                a.attr("href", $(this).attr("href"));

                var name = $(this).text();

                if (name == "User") {

                } else {
                    item.find(".fa").addClass("fa-circle-o");
                    a.find("span").append(name);
                }

                if ($(this).parent().hasClass("l-menu__item--active")) {
                    item.addClass("active");
                    activeItem = item;
                }

                $(".admin-menu").append(item);
            });


            $(".l-stat, .l-header").hide();

            $(".l-separator").remove();
            $(".l-sort").removeClass("l-sort").css("margin-top", 0);

            // Add Box to Listing
            var contentSection = $('<section class="content"></section>');
            var row = $("<div class='row' />");
            var col = $("<div class='col-xs-12 col-lg-11' />");
            var box = $("<div class='box-list box-info box'><div class='box-header with-border'></div><div class='box-body'></div><div class='box-footer'></div></div>");
            var units = $(".units");
            contentSection.html(row);
            row.html(col);
            col.html(box);

            if (activeItem != null)
                box.find('.box-header').text(activeItem.find("span").text());

            units.before(contentSection);
            box.find(".box-body").html(units);
            box.find(".box-footer").html($(".data-count"));

            $(".l-icon-shortcuts, .l-icon-to-top, .l-unit__stats, .l-unit__date, .l-sort-toolbar__search-box").hide();
        });

        // Create Button re-style
        var createButton = $(".l-sort__create-btn");
        createButton.removeClass("l-sort__create-btn").addClass("btn btn-info btn-flat");
        createButton.text(createButton.attr('title'));
        createButton.css("margin-left", "15px");
        $(".l-sort-toolbar").prepend(createButton);

        // For each Row
        $(".units .l-unit").each(function () {

            var row = $("<div class='row'><div class='col-xs-12 col-md-9 left'></div><div class='col-xs-12 col-md-3 right'></div></div>");
            row.find(".left").append($(this).find(".l-unit-toolbar"));
            row.find(".left").append($(this).find(".l-unit__col--left"));
            row.find(".left").append($(this).find(".l-unit__col--right"));
           $(this).append(row);

            var stats =   row.find(".l-unit__stats");

            row.find(".l-unit__name").click(() => {
                stats.toggle();
            });

            stats.find("td").each((i, e) => {
                if ($(e).text().trim() == "") {
                    $(e).remove();
                }
            });

            // Action Panel
            //var actionPanel = $(this).find(".actions-panel");
            var actionButtons = $(this).find(".actions-panel__col");

            if (actionButtons.size() > 0) {
                var btnGroup = $('<div class="btn-group action-btn-group"><button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"> ' +
                    '<span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button><ul class="dropdown-menu" role="menu"></ul></div>');
                row.find(".right").append(btnGroup);

                var dropdownMenuUL = btnGroup.find(".dropdown-menu");

                actionButtons.each(function (i) {
                    var oldA = $(this).find("a");
                    if (i == 0) {
                        oldA.addClass("btn-main-action btn btn-default btn-flat");
                        btnGroup.prepend(oldA);

                    } else {
                        var li = $('<li></li>');
                        li.append(oldA);
                        console.log(li.html());
                        dropdownMenuUL.append(li);
                    }
                });
            }

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
