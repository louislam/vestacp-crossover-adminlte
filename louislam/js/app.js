/**
 * Created by Louis on 5/6/2016.
 */
/// <reference path="jquery.d.ts" />
"use strict";
var LouisAdminLTE = (function () {
    function LouisAdminLTE() {
        this.body = $("body");
    }
    LouisAdminLTE.prototype.initUI = function () {
        var _this = this;
        var body = this.body;
        var wrapper;
        body.addClass("sidebar-mini");
        body.addClass(this.getSkin());
        body.addClass(this.getLayoutBoxed());
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
            var menuItem = $("<li><a href=''><i class='fa'></i> <span></span><small class='label pull-right  bg-blue'></small></li>");
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
                var item = menuItem.clone();
                if ($(this).hasClass("l-stat__col--active")) {
                    item.addClass("active");
                    activeItem = item;
                }
                item.find("a").attr("href", url);
                item.find(".label").text(number);
                if (url == "/list/user/") {
                    item.find(".fa").addClass("fa-user");
                    item.find("span").text(name);
                }
                else if (url == "/list/web/") {
                    item.find(".fa").addClass("fa-server");
                    item.find("span").text(name);
                }
                else if (url == "/list/dns/") {
                    item.find(".fa").addClass("fa-share-square-o");
                    item.find("span").text(name.replace("Dns", "DNS"));
                }
                else if (url == "/list/mail/") {
                    item.find(".fa").addClass("fa-envelope");
                    item.find("span").text(name);
                }
                else if (url == "/list/db/") {
                    item.find(".fa").addClass("fa-database");
                    item.find("span").text(name.replace("Db", "Database"));
                }
                else if (url == "/list/cron/") {
                    item.find(".fa").addClass("fa-clock-o");
                    item.find("span").text(name);
                }
                else if (url == "/list/backup/") {
                    item.find(".fa").addClass("fa-ambulance");
                    item.find("span").text(name);
                }
                else {
                    item.find(".fa").addClass("fa-th");
                    item.find("span").text(name);
                }
                sidebarMenu.append(item);
            });
            // Admin Menu
            sidebarMenu.append('<li class="treeview admin-treeview"><a href="#"><i class="fa fa-th"></i><span>More</span></a><ul class="treeview-menu admin-menu"></ul></li>');
            $(".l-menu__item a").each(function () {
                var item = $("<li><a><i class=\"fa\"></i><span></span></a></li>");
                var a = item.find("a");
                a.attr("href", $(this).attr("href"));
                var name = $(this).text();
                if (name == "User") {
                }
                else {
                    item.find(".fa").addClass("fa-circle-o");
                    a.find("span").append(name);
                }
                if ($(this).parent().hasClass("l-menu__item--active")) {
                    item.addClass("active");
                    $(".admin-treeview").addClass("active");
                    activeItem = item;
                }
                $(".admin-menu").append(item);
            });
            // AdminLTE Settings
            var item = menuItem.clone();
            item.find(".fa").addClass("fa-cog");
            item.find("a").attr("href", "#").click(function () {
                $('#modal-setting').modal('show');
            });
            item.find("span").text("AdminLTE Settings");
            sidebarMenu.append(item);
            var modal = template.find(".modal-setting");
            $("body").append(modal);
            modal.find(".skin-block").each(function (i, elem) {
                var skinName = $(elem).data("skin");
                $(elem).css("background-image", "url(/louislam/img/" + skinName + ".png)").click(function () {
                    _this.setSkin(skinName);
                });
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
            if (units.size() == 0) {
                units = $('#vstobjects');
            }
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
            var stats = row.find(".l-unit__stats");
            // Firewall only
            if (location.href.indexOf("/list/firewall/") >= 0) {
                row.find(".l-unit__col.l-unit__col--right").prepend('<div class="l-unit__name separate">' + row.find(".l-unit__stats").text() + '</div>');
                row.find(".l-icon-star").css("margin-top", 0);
            }
            else {
            }
            row.find(".l-unit__name").click(function () {
                stats.toggle();
            });
            stats.find("td").each(function (i, e) {
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
                    }
                    else {
                        var li = $('<li></li>');
                        li.append(oldA);
                        dropdownMenuUL.append(li);
                    }
                });
            }
        });
        // Add or edit
        $(".data-col1").parent().remove();
        // $(".data-col2 input").addClass("form-control");
    };
    LouisAdminLTE.ucFirst = function (str) {
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
    };
    LouisAdminLTE.prototype.setSkin = function (className) {
        this.body.removeClass("skin-blue skin-blue-light skin-yellow skin-yellow-light skin-green skin-green-light skin-purple skin-purple-light skin-red skin-red-light skin-black skin-black-light");
        localStorage.setItem("louislam-skin", className);
        this.body.addClass(className);
    };
    LouisAdminLTE.prototype.getSkin = function () {
        var skin = localStorage.getItem("louislam-skin");
        if (skin == null) {
            return "skin-blue";
        }
        return skin;
    };
    LouisAdminLTE.prototype.setLayoutBoxed = function (val) {
        localStorage.setItem("louislam-layout-boxed", val.toString());
        this.body.removeClass("layout-boxed").addClass(this.getLayoutBoxed());
    };
    LouisAdminLTE.prototype.getLayoutBoxed = function () {
        var val = localStorage.getItem("louislam-layout-boxed");
        if (val != null && val == "true") {
            return "layout-boxed";
        }
        return "";
    };
    return LouisAdminLTE;
}());
$.ajaxSetup({
    cache: false
});
var louisAdminLTE = null;
$(document).ready(function () {
    louisAdminLTE = new LouisAdminLTE();
    louisAdminLTE.initUI();
});
//# sourceMappingURL=app.js.map