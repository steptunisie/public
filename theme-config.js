'use strict';
var themeConfig = {
    init: false,
    options: {
        color: 'red-1',
        layout: 'boxed'
    },
    colors: [
        {
            'Hex': '#5687bf',
            'colorName': 'blue-1'
        },
        {
            'Hex': '#a0913d',
            'colorName': 'gold'
        },
        {
            'Hex': '#e60000',
            'colorName': 'red-1'
        },
        {
            'Hex': '#3c3c3c',
            'colorName': 'gray'
        },

        {
            'Hex': '#d80018',
            'colorName': 'red-2'
        },

        {
            'Hex': '#22A7F0',
            'colorName': 'blue-2'
        },
        {
            'Hex': '#2e9063',
            'colorName': 'green-1'
        },
        {
            'Hex': '#89c144',
            'colorName': 'green-2'
        },
        {
            'Hex': '#f1be03',
            'colorName': 'yellow-1'
        },
        {
            'Hex': '#e3c552',
            'colorName': 'yellow-2'
        },
        {
            'Hex': '#e47911',
            'colorName': 'orange-1'
        },
        {
            'Hex': '#e48f4c',
            'colorName': 'orange-2'
        },
        {
            'Hex': '#563d7c',
            'colorName': 'purple-1'
        },
        {
            'Hex': '#685ab1',
            'colorName': 'purple-2'
        },
        {
            'Hex': '#ec005f',
            'colorName': 'pink'
        },
        {
            'Hex': '#b8a279',
            'colorName': 'cumin'
        }
    ],
    layouts: [
        {
            'Hex': '#7f7f7f',
            'layoutName': 'boxed'
        },
        {
            'Hex': '#7f7f7f',
            'layoutName': 'boxed'
        }
    ],
    initialize: function () {
        
        var $this = this;
        if (this.init) return;

                var path=$(location).attr('pathname').toString();
   
         if ( path.indexOf('index')!== -1 || path ==='/makook/v4/Views/index.html'  )
 {
      
     $('head').append($('<link rel="stylesheet">').attr('href', '../assets/js/theme-config.css'));
 }
 
 
 if ( path.indexOf('index')!== -1 || path ==='/makook/v4/'  )
 {
      
     $('head').append($('<link rel="stylesheet">').attr('href', 'assets/js/theme-config.css'));
 }
     else
 {
      
     $('head').append($('<link rel="stylesheet">').attr('href', '../assets/js/theme-config.css'));
 }
   
        $this.build();
        $this.events();

        /*if ($.cookie('color') != null) {
            $this.setColor($.cookie('color'));
        } else {
            $this.setColor(themeConfig.options.color);
        }

        if ($.cookie('layout') != null) {
            $this.setLayout($.cookie('layout'));
        } else {
            $this.setLayout(themeConfig.options.layout);
        }

        if ($.cookie('init') == null) {
            $this.container.find('.theme-config-head a').click();
            $.cookie('init', true);
        }
*/
        $this.init = true;
    },
    build: function () {
        var $this = this;
        var config = $('<div />')
            .attr('id', 'themeConfig')
            .addClass('theme-config visible-lg')
            .append($('<h4 />').html('Espace Utilisateur')
                .addClass('theme-config-head')
                .append($('<a />')
                    .attr('href', '#')
                    .append($('<i />')
                        .addClass('fa fa-user'))), $('<div />')
                .addClass('theme-config-wrap')
                .append($('<form />')
                .attr('id','popup-login')
                .attr('method', 'post')
                .attr('action','login.html')
                .addClass('form-popup-login')
                    /* $('<ul />')
                    .addClass('options colors')
                    .attr('data-type', 'colors'))
                //.append($('<h5 />')
                    //.addClass('theme-config-title')
                    //.html('Layout'), $('<ul />')
                    //.addClass('options layouts')
                    //.attr('data-type', 'layouts'))
                 .append($('<hr />')
                    .addClass('theme-config-divider')
                    .html(''), $('<ul />')
                    .addClass('options reset-settings')
                    .attr('data-type', 'reset'))
                
                    //$form = $("<form></form>");
               *///      var form = $("<form/>", { action:'/myaction' })
                     
                    .append( $('<p />')
                        .append($('<label />'))
                            .addClass('label dark')
                            .html( 'Utilisateur *'))
                        .append($("<input />", 
                             { type:'text', 
                               name:'login', 
                               class: 'form-control ',
                               
                             }
                         ))
                    

                    .append( $('<p />')
                        .append($('<label />')
                            .addClass('label dark')
                            .html( 'Mot de passe *'))
                        .append($("<input />", 
                             { type:'text', 
                               name:'login', 
                               class: 'form-control',
                               
                             }
                         ))
                            )
                     .append( 
                         $("<input>", 
                              { type:'submit',
                                name:'login',
                                value:'login', 
                                class:'btn btn-popup-login'
                              }
                          )
                    )
                    .append( 
                         $("<a/>", 
                              { 
                                name:'signup',
                                value:'inscription', 
                                text:'inscription',
                                href:'inscription/',
                                class:'btn btn-popup-login',
                                
                              }
                           )
                            
                    )
                    )
      
        );
        $('body').append(config);
        this.container = $('#themeConfig');

        var themeColorList = this.container.find('ul[data-type=colors]');
        $.each(themeConfig.colors, function (i, value) {
            var color = $('<li />').append($('<a />')
                .css('background-color', themeConfig.colors[i].Hex)
                .attr({
                'data-color-hex': themeConfig.colors[i].Hex,
                'data-color-name': themeConfig.colors[i].colorName,
                'href': '#',
                'title': themeConfig.colors[i].colorName
            }).html(themeConfig.colors[i].colorName));
            themeColorList.append(color);
        });

        themeColorList.find('a').click(function (e) {
            e.preventDefault();
            $this.setColor($(this).attr('data-color-name'));
        });

        //

        var layoutList = this.container.find('ul[data-type=layouts]');
        $.each(themeConfig.layouts, function (i, value) {
            var layout = $('<li />').append($('<a />').css('background-color', themeConfig.layouts[i].Hex).attr({
                'data-color-hex': themeConfig.layouts[i].Hex,
                'data-layout-name': themeConfig.layouts[i].layoutName,
                'href': '#',
                'title': themeConfig.layouts[i].layoutName
            }).html(themeConfig.layouts[i].layoutName));
            layoutList.append(layout);
            layoutList.find('a').click(function (e) {
                e.preventDefault();
                $this.setLayout($(this).attr('data-layout-name'));
                $('#main-slider').trigger('refresh');
                $('#main-slider').trigger('refresh.owl.carousel');
                if ($().owlCarousel) {
                    console.log('caroussel auto');
                    if ($('#main-slider').length) {
                        $('#main-slider').trigger('destroy.owl.carousel');
                        $('#main-slider').html($('#main-slider').find('.owl-stage-outer').html()).removeClass('owl-loaded');
                        $('#main-slider').owlCarousel({
                            items: 4,
                            autoplay: true,
                            autoplayHoverPause: true,
                            autoplayTimeout:1000,
                            loop: true,
                            margin: 0,
                            dots: true,
                            nav: true,
                            navText: [
                                "<i class='fa fa-angle-left'></i>",
                                "<i class='fa fa-angle-right'></i>"
                            ],
                            responsiveRefreshRate: 100,
                            responsive: {
                                0: {items: 1},
                                479: {items: 1},
                                768: {items: 1},
                                991: {items: 1},
                                1024: {items: 1}
                            }
                        });
                    }
                }
                //window.location.reload();
            });
        });

        //

        var themeConfigReset = this.container.find('ul[data-type=reset]');
        var themeResetLink = $('<li />').append(
            $('<a />')
                .attr({'href': '#', 'title': 'Reset settings'})
                .html('Reset settings').addClass('reset-settings-link')
        );
        themeConfigReset.append(themeResetLink);
        themeConfigReset.find('a').click(function (e) {
            e.preventDefault();
            $this.reset();
        });

    },
    events: function () {
        var $this = this;
        $this.container.find('.theme-config-head a').click(function (e) {
            e.preventDefault();
            if ($this.container.hasClass('active')) {
                $this.container.animate({
                    right: '-' + $this.container.width() + 'px'
                }, 300).removeClass('active');
            } else {
                $this.container.animate({
                    right: '0'
                }, 300).addClass('active');
            }
        });
        
 
    },
  login : function(){
        $this.container.find('#form-popup input[type=submit]').click(function (e) {
         
        $("#form-popup").submit(function(e) {
            
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            alert("ok");
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
             alert("fail");    
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
    });
 
    $("#ajaxform").submit(); //Submit  the FORM
           
        });
    },
    setColor: function (color) {
        var $this = this;
        var $colorConfigLink = $('#theme-config-link');
        if (this.isChanging) {
            return false;
        }
        $colorConfigLink.attr('href', 'assets/css/theme-' + color + '.css');
        $.cookie('color', color);
    },
    setLayout: function (layout) {
        //$('body').removeAttr('class');
        $('body').removeClass('wide').removeClass('boxed');
        $('body').addClass(layout);
        $.cookie('layout', layout);
        if($().waypoints) {
            setTimeout(function(){$.waypoints('refresh');},100);
        }
    },
    reset: function () {
        $.removeCookie('color');
        $.removeCookie('layout');
        window.location.reload();
    }
};
themeConfig.initialize();
