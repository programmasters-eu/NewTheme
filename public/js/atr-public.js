$ = jQuery.noConflict();

$(document).ready(function(){

    //menu header
    $('.header-menu-ul li').addClass('nav-item');

    $('.header-menu-ul li a').addClass('nav-link');

    //imagenes
    $('img').addClass('img-fluid');

    //imagenes responsive
    $(".textwidget img").addClass('img-fluid');

    //sidebar search
    $(".sidebar-search-form label").html('<i class="fas fa-search"></i>');


 
});