function jalali_to_gregorian(jy,jm,jd){
    if(jy > 979){
        gy=1600;
        jy-=979;
    }else{
        gy=621;
    }
    days=(365*jy) +((parseInt(jy/33))*8) +(parseInt(((jy%33)+3)/4)) +78 +jd +((jm<7)?(jm-1)*31:((jm-7)*30)+186);
    gy+=400*(parseInt(days/146097));
    days%=146097;
    if(days > 36524){
        gy+=100*(parseInt(--days/36524));
        days%=36524;
        if(days >= 365)days++;
    }
    gy+=4*(parseInt(days/1461));
    days%=1461;
    if(days > 365){
        gy+=parseInt((days-1)/365);
        days=(days-1)%365;
    }
    gd=days+1;
    sal_a=[0,31,((gy%4==0 && gy%100!=0) || (gy%400==0))?29:28,31,30,31,30,31,31,30,31,30,31];
    for(gm=0;gm<13;gm++){
        v=sal_a[gm];
        if(gd <= v)break;
        gd-=v;
    }
    return [gy,gm,gd];
}

$( document ).ready(function() {



    $( "input#fromDate1" ).keyup( function () {
        var value = $( this ).val();

        split = value.split('/');

        pyear = parseInt(split[0]);
        pmonth = parseInt(split[1]);
        pday = parseInt(split[2]);

        shamsi=[pyear,pmonth , pday];
        miladi=jalali_to_gregorian(shamsi[0],shamsi[1],shamsi[2]);
        finallf = miladi[0]+'-'+miladi[1]+'-'+miladi[2];

        $( "span.showyearSF" ).text( value );
        $( "input.gfdatehidden" ).val( finallf );


    } );


    $( "input#toDate1" ).keyup( function () {
        var value = $( this ).val();

        split = value.split('/');

        pyear = parseInt(split[0]);
        pmonth = parseInt(split[1]);
        pday = parseInt(split[2]);

        shamsi=[pyear,pmonth , pday];
        miladi=jalali_to_gregorian(shamsi[0],shamsi[1],shamsi[2]);
        finallt = miladi[0]+'-'+miladi[1]+'-'+miladi[2];

        $( "span.showyearST" ).text( value );
        $( "input.gtdatehidden" ).val( finallt );



        var fromDatevalue = $("input.gfdatehidden").val(),
            toDatevalue = $("input.gtdatehidden").val(),
            from, to, duration;

        from = moment(fromDatevalue, 'YYYY-MM-DD');
        to = moment(toDatevalue, 'YYYY-MM-DD');
        duration = to.diff(from, 'days');
        if (duration > 0) {
            $('span.rentDays').text(duration);
            $('input.rentdays').val(duration);
        }else {
            $('span.rentDays').text('تاریخ خروج اشتباه است');
        }

        valuePrice = parseFloat($("span#pricenight").text());
        valueRent = parseInt($("span.rentDays").text());
        totalprice = valuePrice * valueRent;
        $( "span#totalprice" ).text( totalprice );

        $( "span#payprice" ).text( totalprice );

    } );

});

$( document ).ready(function() {
    $("input.getguest").keyup( function () {
        valueG = $( this ).val();
        $( "span#showguest" ).text( valueG );


    } );

});