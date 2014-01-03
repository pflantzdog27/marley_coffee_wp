(function($){})(window.jQuery);
$(document).ready(function (){
    setVariable = 0;
    submitted = false;
    parallaxVariable = .5;
    locked = 0;

    // on page refresh always go to top
    $(window).unload(function() {
        $('body').scrollTop(0);
    });

    // beauty images
    if($('body').hasClass('home') && $(window).width() >= 768) {
        $('body').css('overflow','hidden');
    } else {
        $('#navigation-wrap').addClass('fixed-position')
    }

    // cookie stuff
    var introTest = $.cookie('intro');
    if (introTest == 'true'){
        $('#blanket, #viewport').remove();
        $('#intro-screen > *').fadeOut(2000);
        $('#image-51, #wrapper').css('visibility','visible');
        var pageHeight = $('body').height() * parallaxVariable;
        $('body').css({'overflow-y':'auto', 'overflow-x': 'hidden', height : pageHeight});
    }

    // squaring off blocks
    squareBlock('.post-it-wrap, .standard-text-block-wrap');

    // set elements to correct width and/or height before load
    if($('.home').length > 0) {
        $('#intro-screen').width($(window).width()).height($(window).height());
        $('body').height($(window).height());
        $('#wrapper').css({'min-height':$(window).height(),overflow : 'hidden'});
        $('#marley-logo').width($('#image-51').width()).height($('#image-51').height());
    } else {
        $('#navigation-wrap').addClass('fixed-position');
        var pageHeight = $('body').height() * parallaxVariable;
        $('body').css({'overflow-y':'auto', 'overflow-x': 'hidden', height : pageHeight});
        $('#wrapper').css('visibility','visible');
    }

    // large screen navigation dropdown
    $('.dropdown').hover(function() {
        $(this).children('.sub-menu').stop().slideDown(100);
    },function() {
        $(this).children('.sub-menu').slideUp(100);
    });

    $('#main-nav li:eq(0)').find('a').addClass('glyphicon glyphicon-home');

    // small screen navigation
    var leftNav = $('#left-side-nav');
    $('#mobile-menu-icon').click(function(e) {
        e.preventDefault();
        $(this).animate({opacity:0},200);
        leftNav.css('height',$(window).height());
        leftNav.fadeIn(1,function() {
            $(this).animate({'margin-left': 0},500);
        });
        $('.close').click(function() {
            leftNav.animate({'margin-left': '-500px'},500,function() {
                $(this).fadeOut(1);
                $('#mobile-menu-icon').animate({opacity:1},300);
            })
        })
    });
    $('.slide-more').click(function(e) {
        e.preventDefault();
        $('.second-slide').fadeOut(200);
        $(this).children('ul').fadeIn(200);
    });

    // slideshows
    $('.slideshow').each(function() {
        $(this).slidesjs({
            width: $(this).attr('data-width'),
            height: $(this).attr('data-height'),
            //navigation: false,
            play: {
                active: false,
                effect: "fade",
                interval: 5000,
                auto: true,
                pauseOnHover: true,
                restartDelay: 2500
            },
            navigation: {
                active: false
            },
            auto : 5000
        });
    });

    // modal windows
    $('.modal-message').each(function() {
        $(this).appendTo('body');
        $(this).modal({
            show : false
        })
    });

    // email form
    $('#hidden_iframe').load(function(){
        var page = 'affiliates';
        if(submitted == true){
            window.location.replace(page);
        }
    });

    /*Scroll the background layers
    if($(window).width() >=768 && !$('body').hasClass('page-template-coffee_ajax-php')) {
        $(window).bind('scroll',function(e){
            parallaxScroll();
        });
    }*/

    // Investor Relation Section
    if($(window).width() > 992) {
        $('#ir-sidebar-wrap').affix({
            offset: {
                top: 0
                , bottom: function () {
                    return (this.bottom = $('#footer').outerHeight(true))
                }
            }
        })
    }

    // Fancybox
    if($('body').hasClass('home') || $('body').hasClass('post-type-archive-news_media')) {
        $("a.video-popup").click(function() {
            $.fancybox({
                'padding'             : 10,
                'helpers' : {
                    'overlay' : {
                        'locked' : false
                    }
                },
                'autoScale'   : false,
                'transitionIn'        : 'none',
                'transitionOut'       : 'none',
                'title'               : this.title,
                'width'               : 680,
                'height'              : 495,
                'href'                : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                'type'                : 'swf',    // <--add a comma here
                'swf'                 : {'allowfullscreen':'true'} // <-- flashvars here
            });
            return false;
        });
        $('.popup').fancybox({
            helpers : {
                overlay : {
                    locked : false
                }
            }
        });
    }

    // Investor Relation Navigation
    ir_navigation();

    //Intro effects
    fullScreen_bg();
    coffeeSteam();


    // coffee page
    coffeeNav();

    // recipe page
    toggleFAQ();

    //
    var mainPageSection = $('.dynamic-load');
    mainPageSection.each(function() {
     $('<div></div>').attr('class','section-loading').appendTo(this);
     })

});

// ON LOAD
$(window).load(function() {
    fullScreenImages();
    $.cookie('intro', 'true', { path: '/' });
    // intro screen
    var logoFadeIn = 1500;
    var arrowDown = 500;
    $('#marley-logo').delay(500).animate({opacity : 1},logoFadeIn,function() {
        $('#blanket, #viewport').delay(1000).fadeOut(2500, function() {
            $(this).remove();
            $('#down-arrow').fadeIn(arrowDown,function() {
                $(this).animate({'background-position-y': '105%'}, arrowDown,function() {
                    $(this).click(function() {
                        locked = 1;
                        $('.full-screen-image').animate({'margin-top' : '-'+$(window).height()+'px'},1000);
                        $('#wrapper').css('visibility','visible');
                        $('#intro-screen').slideUp(1000,function() {
                            $('#image-51').css('visibility','visible');
                        });
                        var pageHeight = $('body').height() * parallaxVariable;
                        $('body').css({'overflow-y':'auto', 'overflow-x': 'hidden', height : pageHeight});
                    })

                });
            });
        });
    });
    // isotopes optional additions
    shareThis();
    //jumpTo_overlay()
})

// SCROLL
$(window).scroll(function() {
    $('#footer').css('visibility','visible');
    if($('body').hasClass('home')) {
        var distance = $('#wrapper').offset().top;
        if ( $(window).scrollTop() >= distance ) {
            $('#navigation-wrap').addClass('fixed-position');
            $('#wrapper > .container').css('padding-top','110px');
            $('#marley-logo').css('visibility','hidden');
            $('#image-51').css('visibility','visible').addClass('remain-visible');
        } else {
            $('#navigation-wrap').removeClass('fixed-position');
            $('#image-51').css('visibility','hidden');
            $('#marley-logo').css('visibility','visible');
            $('#wrapper > .container').css('padding-top','0');
        }
    }
    footerDisplay(500);
});

// FUNCTIONS
function footerDisplay(time) {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
       $('#coffee-cup').stop().animate({right:0},500);
    }
    if($(window).scrollTop() + $(window).height() < $(document).height() - 50 ) {
        $('#coffee-cup').stop().animate({right: '-500px'},500);
    }
}

function parallaxScroll(){
    var scrolled = $(window).scrollTop();
    $('#wrapper').css('top',(0-(scrolled * parallaxVariable))+'px');
}

function squareBlock (element) {
    var that = $(element);
    var padding = 40;
    var elementWidth = that.width() + padding;
    that.css('min-height',elementWidth+'px');
}

function shareThis() {
    $('.share-button').click(function() {
        $(this).fadeOut(1)
        var isotopeBlock = $(this).closest('.item');
        isotopeBlock.find('.share-options').fadeIn(200,function() {
            $('#close-share a').click(function(e) {
                e.preventDefault();
                isotopeBlock.find('.share-options').fadeOut(200);
                $('.share-button').fadeIn(400);
            })
        });
    });
}

function ir_navigation() {
    $('#ir-main').css('min-height',$(window).height());
    $('#ir-nav ul li').click(function(e) {
        e.preventDefault();
        $('#ir-nav ul li').removeClass('active');
        $(this).addClass('active');
        $('#page-content, .page-title h2').fadeOut(300);
        $('<div></div>').attr('id','ajax-loader').css({top : '50%', left: '50%'}).appendTo('#ir-main');
        var page = $(this).children('a').attr('href');
        var title = $(this).text();
        setTimeout(function() {
            $('#page-content').load(page+ ' #page-content',function() {
                $('#ajax-loader').fadeOut(300,function() {
                    $(this).remove();
                    $('.page-title h2').text(title).fadeIn(200);
                    $('#page-content').fadeIn(200);
                });

            });
        },500);
    })
}

function fullScreen_bg() {
    var theWindow = $(window),
        $bg = $(".full-screen-image"),
        aspectRatio = $bg.width() / $bg.height();
    theWindow.resize(resizeBg).trigger("resize");
    function resizeBg() {
        if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
            $bg
                .removeClass('bgwidth')
                .addClass('bgheight');
        } else {
            $bg
                .removeClass('bgheight')
                .addClass('bgwidth');
        }
    }
}
function fullScreenImages() {
    var container = $('.full-screen-image');
    container.css({width : $(window).width(),
        height : $(window).height()});
    var imageCount = container.length;
    var index = Math.floor(Math.random() * imageCount);
    var selectedImage = container.eq(index);
    //selectedImage.addClass('active-bg');
    $('.active-bg').delay(1000).fadeIn(1000);
    setInterval(function() {
        if (locked != 1) {
            $('.active-bg').stop(true,true).fadeOut(1000);
            var nextBigItem = $('.active-bg').next('img');
            container.removeClass('active-bg');
            nextBigItem.addClass('active-bg');
            $('.active-bg').stop(true,true).fadeIn(800);
            if(nextBigItem.length < 1) {
                $('.full-screen-image:eq(0)').addClass('active-bg');
                $('.active-bg').fadeIn(800);
            }
        }
    },8000);
}

function coffeeSteam() {
            var a=0;for(;a<15;a+=1){setTimeout(function b(){var a=Math.random()*1e3+5e3,c=$("<div />",{"class":"smoke",css:{opacity:0,left:Math.random()*200+80}});$(c).appendTo("#viewport");$.when($(c).animate({opacity:1},{duration:a/4,easing:"linear",queue:false,complete:function(){$(c).animate({opacity:0},{duration:a/3,easing:"linear",queue:false})}}),$(c).animate({bottom:$("#viewport").height()},{duration:a,easing:"linear",queue:false})).then(function(){$(c).remove();b()})},Math.random()*3e3)}
}

function jumpTo_overlay() {
    $('.item').hover(function() {
        var  moreLink = $(this).find('.rd-more-notice');
        moreLink.fadeIn(100);
    },function() {
        var  moreLink = $(this).find('.rd-more-notice');
        moreLink.fadeOut(100);
    })
}

function sectionChunk(element,pathTrain,content,callbackFunction){
    var fnSettings;
    fnSettings = {
        catcher: element,
        path: pathTrain,
        contentBlock: content,
        callback : function() {
            if(!callbackFunction) {
                return false;
            } else {
                callbackFunction.call();
            }
        }
    };
    loadRequest( fnSettings );
}
function loadRequest( settings ) {
    $(settings.catcher).load( settings.path+settings.contentBlock, settings.callback);
}
function finishLoad(){
    $('.section-loading').fadeOut(500,function(){
        $(this).remove();
    })
}
function coffeeNav() {
    var lastId,
        topMenu = $('#coffee-nav'),
        topMenuHeight = topMenu.outerHeight() - 140,
        menuItems = topMenu.find('a'),
        scrollItems = menuItems.map(function(){
            var item = $($(this).attr('href'));
            if (item.length) { return item; }
        });

    menuItems.click(function(e){
        var href = $(this).attr('href'),
            offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 1000);
        e.preventDefault();
    });
}

function toggleFAQ() {
    $('.panel-heading').click(function() {
        var icon = $(this).children('span');
        var parent = $(this).parent('.panel');
        var answer = parent.children('.panel-body');
        answer.slideToggle(1);
        if(icon.hasClass('glyphicon-plus')) {
            icon.removeClass('glyphicon-plus').addClass('glyphicon-minus');
        } else {
            icon.removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }
    })
}

