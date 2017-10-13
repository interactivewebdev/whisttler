    $("input").keyup(function () {
       if ($(this).val()) {
          $(".message_btn").show();
       }
       else {
          $(".message_btn").hide();
       }
    });
    $(".message_btn").click(function () {
       $("input").val('');
       $(this).hide();
    });

function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-remove');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
$(document).ready(function(){
    $("#hideSidenav").click(function(){
        $(".leftSideBar").animate({width: '0px'});
        $("#showSidenav").addClass('dsplyShow');
        $("#showSidenav").removeClass('dsplyNone');
        $("#hideSidenav").addClass('dsplyNone');
        $(".sildeIcon").addClass('dsplyNone');
        $(".admin").addClass('col-lg-11');
        $(".admin").removeClass('col-lg-9');
        $(".admin").addClass('admin_margin70');
        $(".admin").removeClass('admin_margin20');
    });
     $("#showSidenav").click(function(){
        $(".leftSideBar").animate({width: '16.66666667%'});
        $("#showSidenav").removeClass('dsplyShow');
        $("#showSidenav").addClass('dsplyNone');
        $("#hideSidenav").removeClass('dsplyNone');
        $(".sildeIcon").removeClass('dsplyNone');
        $(".admin").addClass('col-lg-9');
        $(".admin").removeClass('col-lg-11');
        $(".admin").addClass('admin_margin20');
        $(".admin").removeClass('admin_margin70');
    });
     $("#subList").click(function(){
     	$(".subAdmin").removeClass('dsplyNone');
     	$(".subAdmin").addClass('dsplyShow');
     	$("#subList").addClass('active');
     	$("#creatSub").removeClass('active');
        $(".creatSubAdmin").addClass('dsplyNone');
        $(".creatSubAdmin").removeClass('dsplyShow');
     });
     $("#creatSub").click(function(){
     	$(".subAdmin").addClass('dsplyNone');
     	$(".subAdmin").removeClass('dsplyShow');
     	$("#subList").removeClass('active');
     	$("#creatSub").addClass('active');
        $(".creatSubAdmin").removeClass('dsplyNone');
        $(".creatSubAdmin").addClass('dsplyShow');
     })
     $('.editbtn').click(function () {
              var currentTD = $(this).parents('tr').find('td');
              
                 $.each(currentTD, function () {
                      $(this).prop('contenteditable', true)
                  });
          });
     $('.saveBtn').click(function () {
              var currentTD = $(this).parents('tr').find('td');
             
                 $.each(currentTD, function () {
                      $(this).prop('contenteditable', false)
                  });
          });
     
    $("#editSubAdmin").click(function(){
     	$(".subAdminTable").addClass('dsplyNone');
     	$(".subAdminTable").removeClass('dsplyShow');
     	$(".SubAdminEdit").removeClass('dsplyNone');
     	$(".SubAdminEdit").addClass('dsplyShow');
});
    $("#changed").click(function(){
     	$(".subAdminTable").addClass('dsplyShow');
     	$(".subAdminTable").removeClass('dsplyNone');
     	$(".SubAdminEdit").removeClass('dsplyShow');
     	$(".SubAdminEdit").addClass('dsplyNone');
});
    $('a').on('click', function(){
   var target = $(this).attr('rel');
   $("#"+target).show().siblings(".admin").hide();

});

    $('a').on('click', function(){
   var target = $(this).attr('rel');
   $("#"+target).show().siblings(".brandProfiles").hide();

});
    $('a').on('click', function(){
   var target = $(this).attr('rel');
   $("#"+target).show().siblings(".social").hide();

});
       $('a').on('click', function(){
   var target = $(this).attr('rel');
   $("#"+target).show().siblings(".social_hide").hide();

});
   
  /*  $('a').on('click', function(){
   var target = $(this).attr('rel');
   $("#"+target).show().siblings(".hide_influncer").hide();

});*/
    $("li").click(function(){
   $("li.active").removeClass("active");
   $(this).addClass("active");
});
 

 $(".onhoverclass").click(function(){
    $(".onhoverclass").toggleClass('hover_effect');

 })

 $('.one').click(function(){
    $(".admin_height").animate({ scrollTop: '240px' }, 600);
    return false;
 })
 $('.two').click(function(){
    $(".admin_height").animate({ scrollTop: '650px' }, 600);
    return false;
 })
 $('.three').click(function(){
    $(".admin_height").animate({ scrollTop: '1070px' }, 600);
    return false;
 })
 $('.four').click(function(){
    $(".admin_height").animate({ scrollTop: '1490px' }, 600);
    return false;
 })
 $('.five').click(function(){
    $(".admin_height").animate({ scrollTop: '2010px' }, 600);
    return false;
 })
 $('.six').click(function(){
    $(".admin_height").animate({ scrollTop: '0px' }, 600);
    return false;
 })
 $('.click_collapse').click(function(){
    $(".hide_content").slideToggle();
    $(".rotate").toggleClass('rotating')
 })
 $('.click1').click(function(){
    $(".rotated").toggleClass('rotating2')
 })
 $('.click2').click(function(){
    $(".rotated1").toggleClass('rotating3')
 })
 $('.click3').click(function(){
    $(".rotated2").toggleClass('rotating4')
 })
 $('.click4').click(function(){
    $(".rotated3").toggleClass('rotating5')
 })
 $('.click5').click(function(){
    $(".rotated4").toggleClass('rotating6')
 })
 $('.click6').click(function(){
    $(".rotated5").toggleClass('rotating7')
 })

 $('.cate-expand').click(function(){
    $(".hide_content1").slideToggle();
    $(".rotate1").toggleClass('rotating1')
 })
 $('.click_chat ').click(function(){
    $(".click_hidechat ").removeClass('dsplyShow');
     $(".click_hidechat ").addClass('dsplyNone');
     $(".click_showchat ").removeClass('dsplyNone');
     $(".click_showchat ").addClass('dsplyShow');
     $('.chat_screen').removeClass('screen_hide');
 });
 $('.click_chat1 ').click(function(){
    $(".click_hidechat ").removeClass('dsplyNone');
     $(".click_hidechat ").addClass('dsplyShow');
     $(".click_showchat ").removeClass('dsplyShow');
     $(".click_showchat ").addClass('dsplyNone');
     $('.chat_screen').addClass('screen_hide');
 })

 $('.pagination-inner a').on('click', function() {
        $(this).siblings().removeClass('pagination-active');
        $(this).addClass('pagination-active');

})


/*$('.click_profileShow').click(function(){
    $('.brandProfile_hide').addClass('dsplyNone');
    $('.brandProfile_show').removeClass('dsplyNone');
    $('.brandProfile_show').addClass('dsplyShow');
});
$('.click_back').click(function(){
    $('.brandProfile_hide').removeClass('dsplyNone');
    $('.brandProfile_hide').addClass('dsplyShow');
    $('.brandProfile_show').removeClass('dsplyShow');
    $('.brandProfile_show').addClass('dsplyNone');
})*/

$('.navbar-toggle').click(function(){
  $('.leftSideBar').toggleClass('adminLeftSideBar');
 
})
/*$('.sildeIcon ').click(function(){
  $('.leftSideBar').toggleClass('adminLeftSideBar');
  
})*/
$("#btn_wrapper1").click(function(){
  console.log($(window).height());
  $("#popupBox").height($(window).height());
  $(".overlay").height($(window).height())
  $("#popupBox").addClass("show");
  $("body").addClass("hide_sb");
});
$(".overlay").click(function(){
  $("#popupBox").removeClass("show");
  $("body").removeClass("hide_sb")
});
$(".close").click(function(){
  $("#popupBox").removeClass("show");
  $("body").removeClass("hide_sb")
});

$("#btn_wrapper2").click(function(){
  console.log($(window).height());
  $("#popupBox2").height($(window).height());
  $(".overlay").height($(window).height())
  $("#popupBox2").addClass("show");
  $("body").addClass("hide_sb");
});
$(".overlay").click(function(){
  $("#popupBox2").removeClass("show");
  $("body").removeClass("hide_sb")
});
$(".close").click(function(){
  $("#popupBox2").removeClass("show");
  $("body").removeClass("hide_sb")
});

$('.click_responsiveshow').click(function(){
  $('.leftSideBarHeight').toggleClass('responsive_dsply')
})
$('.click_responsiveshow').click(function(){
  $('.leftSideBar').toggleClass('responsive_dsply')
})


$('.close-panel').click(function () {
   $(this).find('.ion-ios7-close-empty').toggleClass('is-closed');
   $('.panel').slideToggle('slow');
});
  });

