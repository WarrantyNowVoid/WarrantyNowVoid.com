/*!
 * WarrantyNowVoid v4.0
 *
 * Copyright 2013 WarrantyNowVoid.com
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Designed and built half-drunk and mostly insane by @pettazz.
 *
 * Load javascript stuff required to build the page
 */

Modernizr.load({
    test: Modernizr.csstransforms3d,
    yep : '/assets/css/experimental.css'
}); 



function nextFeature(){
    current = parseInt($('div#featuredbox .item.active').attr('data-itemid'));
    if(current == 4){
        next = 1;
    }else{
        next = current + 1;
    }

    switchToFeature(next);
}

function switchToFeature(itemid){
    $('div#featuredbox .item.active').removeClass('active');
    $('div#featuredbox .item[data-itemid=' + itemid + ']').addClass('active');

    $('div#featuredbox ul.titletabs li.active').removeClass('active');
    $('div#featuredbox ul.titletabs li[data-itemid=' + itemid + ']').addClass('active');
}
var intervalID = window.setInterval(nextFeature, 10000);

$(document).ready(function(){

    if(Modernizr.csstransforms3d){
        //footer thingy
        $("img.bottom-logo").click(function(eo){
            $('footer').toggleClass('rotateSpecial').toggleClass('rotateNormal');
        });
    }

    //featured box
    $('div#featuredbox ul.titletabs li').click(function(eo){
        switchToFeature($(this).attr('data-itemid'))
        window.clearInterval(intervalID);
        intervalID = window.setInterval(nextFeature, 10000);
    });
});