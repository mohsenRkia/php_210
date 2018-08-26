
function hide_overlay_background() {

    $("#overlay-background-fade").removeClass('overlay-background-fade');
}
var ChannelManngerAutoCompleteAddress = "https://inh.jabama.ir/v1/AutoComplete";
var ChannelManngerAddress = "https://inh.jabama.ir/v1";
$('.submit-mail').click(function () {
    $.ajax({
        url: '/emailsubscription/subscribe',
        type: 'POST',
        data: $('form#email-subscription').serialize(),
        success: function (result) {
            if (result.IsSuccess) {
                $(".messageLead").removeClass("none");
                $(".messageLead").removeClass("failed");
                $(".messageLead span").removeClass("fa-close");
                $(".messageLead").addClass("success");
                $(".messageLead span").addClass("fa-check");
                $(".messageLead span").text("ایمیل شما با موفقیت ثبت شد .");
                setTimeout(function () {
                    $('.close-subscriber').click()
                }, 2000);
            } else {
                $(".messageLead").removeClass("none");
                $(".messageLead").addClass("failed");
                $(".messageLead span").addClass("fa-close");
                $(".messageLead span").text(result.Message);
                $('input[name="emailAddress"]').val("");
            }
        }
    });
});



$(".TourMask").click(function () {
    $('.TourMask').hide();
});




$(".divMask").click(function () {
    $('.divMask').hide();
});
$(".close-subscriber").click(function () {
    $('.divMask.LeadMask').hide();
});

$(".closeError").click(function () {
    $('.jbAllException').hide(500);

});

var QueryString = (function (a) {
    if (a === "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i) {
        var p = a[i].split('=', 2);
        if (p.length == 1)
            b[p[0]] = "";
        else
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
})(window.location.search.substr(1).split('&'));

$(document).ready(function () {
    var campaignMarketing = QueryString[encodeURI("رزروهتل")];
    if (typeof campaignMarketing != "undefined") {
        $(".LeadMask").show();
    } else {
        //var visited = $.cookie("visited");
        //if (visited == null) {
        //    $(".TourMask").show();

        //} else {
        //    $(".TourMask").hide();
        //}

        //$.cookie('visited', 'yes', { expires: 14, path: '/' });
    }


});


showAllLocalTime();
function lazyLoadAll() {
    $("a.lazy").lazyload({
        effect: "fadeIn"
    });//
    $("img.lazy").lazyload({
        effect: "fadeIn"
    });
    $("span.lazy").lazyload({
        effect: "fadeIn"
    });
    $("div.lazy").lazyload({
        effect: "fadeIn"
    });
}
$(document).ready(function () {



    lazyLoadAll();
    $.ajax({
        url: '/user/get',
        type: 'GET',
        success: function (result) {
            if (result.balance) {
                $(".jbAccountBalance .currency").html(result.balance);
                addDigtGroup();
            }


            if (result.userName != "") {
                $(".authorized").removeClass("hidden");
                $(".unathorized").addClass("hidden");
            } else {
                $(".authorized").addClass("hidden");
                $(".unathorized").removeClass("hidden");
            }
            if (result.fullName != "") {
                $("#userName").html(result.fullName);
            }
            else {
                $("#userName").html(result.userName);
            }
        }
    });

});
setTimeout(function() {
    $('#chat_window_container').contents().find("head").append($("<style type='text/css'>* {font-family: tahoma !important;direction:rtl;font-size:12px;} </style>"));
},3000);