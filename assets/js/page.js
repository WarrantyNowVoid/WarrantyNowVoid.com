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

//determine if this is @2x territory
var isRetina = window.devicePixelRatio > 1;
console.log('@2x support: ' + isRetina);



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

var poopActive = false;
var poopTimer = false;
var poopAnim;
var pooCounter = 0;

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

    // poop button
    $('#poopButton').click(function(eo){
        poopAnim = new Image();
        poopAnim.src = '/assets/img/template/poop_pooping' + (isRetina? '@2x' : '') + '.gif?lol=' + Math.random();
        if(!poopActive){
            poopActive = true;
            pooCounter++;
            console.log('POOP NUMBER ' + pooCounter + ' INBOUND!');

            var viewportWidth = $(window).width();
            var viewportHeight = $(window).height();

            var poopDestinationX = Math.floor((Math.random() * (viewportWidth - 400)) + 200);
            var poopDestinationY = $(window).scrollTop() + viewportHeight / 3;

            $("#poopGuy").offset({ top: poopDestinationY, left: viewportWidth + 100 });
            $("#poopGuy").show();
            $("#poopGuy").addClass('walking');
            $("#poopGuy").animate({ left: poopDestinationX }, 5000, 'linear', function(){
                $("#poopGuy").removeClass('walking');
                $("#poopGuy").css('background-image', 'url(' + poopAnim.src + ')');
                poopTimer = window.setInterval(finishPooping, 4500);
            });
        }
    });
});


function finishPooping(){
    window.clearInterval(poopTimer);
    poopAnim = false;
    spawnPoop($("#poopGuy").position());
    $("#poopGuy").css('background-image', '');
    $("#poopGuy").addClass('walking');
    $("#poopGuy").animate({ left: -250 }, 5000, 'linear', function(){
        poopActive = false;
        $("#poopGuy").removeClass('walking');
        console.log('DONE POOPING!');
    });
}

function spawnPoop(offset){
    var newPoo = $('<div class="aPoop"></div>');
    newPoo.offset({ top: offset.top + 340, left: offset.left + 159 });
    $('body').prepend(newPoo);
}