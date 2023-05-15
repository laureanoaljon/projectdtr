function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function saveAs(uri, filename) {
    var link = document.createElement('a');

    if (typeof link.download === 'string') {
        link.href = uri;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

    } else {
        window.open(uri);
    }
}

function getScales(end, arr, prop) {
    // Get min and max
    var min, max;
    for (var i = 0; i < arr.length; i++) {
        if (max == null || parseFloat(arr[i][prop]) < parseFloat(max[prop]))
            max = parseFloat(arr[i][prop]);
        else
            min = parseFloat(arr[i][prop]);
    }

    var start = 1;
    var result = [];
    var st = (max - min) / (end - start + 1);
    var buffer = min;

    for (var i = 0; i <= end - start; i++) {
        buffer = st * i + min;
        result.push({
            range: i,
            minValue: buffer.toFixed(2),
            maxValue: (buffer + st).toFixed(2)
        });
    }
    return result;

}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function clean(obj) {
  for (var propName in obj) {
    if (obj[propName]['value'] === null || obj[propName]['value'] === undefined) {
      delete obj[propName];
    }
  }
  var output = [];
  for (var i in obj) {
    output.push(obj[i]);
  }  
  return output
}

$(document).ready(function () {
    $("#ctxTopProvTopContainer").hide();
    $("#phl-top").hide();
    $("#ctxTopProvContainer").hide();
    $("#phl").hide();
    $("#showTop").prop('disabled', true);
    $("#showAll").prop('disabled', true);

    $('#showTop').click(function () {
        $("#ctxTopProvTopContainer").show();
        $("#phl-top").show();
        $("#ctxTopProvContainer").hide();
        $("#phl").hide();
        $("#chart2-header").html("Palay Production by Province, Top 20 (2021)");
        $("#chart2-harvest").html("Rice Area Harvested by Province, Top 20 (2021)");
        $("#chart2-yield").html("Rice Area Harvested by Province, Top 20 (2021)");
    });

    $('#showAll').click(function () {
        $("#ctxTopProvTopContainer").hide();
        $("#phl-top").hide();
        $("#ctxTopProvContainer").show();
        $("#phl").show();
        $("#ctxRegionalContainer").hide();
        $("#phl-reg").hide();
        $("#chart2-header").html("Palay Production by Province (2021)");
        $("#chart2-harvest").html("Rice Area Harvested by Province (2021)");
        $("#chart2-yield").html("Average Yield per Hectare per Cropping Season by Province (2021)");
    });

    $('#showprov').click(function () {
        $("#ctxRegionalContainer").hide();
        $("#phl-reg").hide();
        $("#chart2-header").html("Palay Production by Province, Top 20 (2021)");
        $("#chart2-harvest").html("Rice Area Harvested by Province, Top 20 (2021)");
        $("#chart2-yield").html("Average Yield per Hectare per Cropping Season by Province, Top 20 (2021)");
        $("#showTop").prop('disabled', false);
        $("#showAll").prop('disabled', false);
        $("#showTop").parent().addClass("active");
        $("#ctxTopProvTopContainer").show();
        $("#phl-top").show();
        $("#ctxTopProvContainer").hide();
        $("#phl").hide();
    });

    $('#showreg').click(function () {
        $("#ctxRegionalContainer").show();
        $("#phl-reg").show();
        $("#ctxTopProvTopContainer").hide();
        $("#phl-top").hide();
        $("#ctxTopProvContainer").hide();
        $("#phl").hide();
        $("#chart2-header").html("Palay Production by Region (2021)");
        $("#chart2-harvest").html("Rice Area Harvested by Region (2021)");
        $("#chart2-yield").html("Average Yield per Hectare per Cropping Season by Province by Region (2021)");
        $("#showTop").prop('disabled', true);
        $("#showTop").parent().removeClass("active");
        $("#showAll").prop('disabled', true);
        $("#showAll").parent().removeClass("active");
    });

    $("#ctxWideRegions2").hide();
    $("#ctxWideRegions3").hide();

    $('#showCost').click(function () {
        $("#ctxWideRegions").show();
        $("#ctxWideRegions2").hide();
        $("#ctxWideRegions3").hide();
        $("#chart2-income").html("Total Cost per Hectare of Rice Production by Region (2020)");
    });

    $('#showNet').click(function () {
        $("#ctxWideRegions").hide();
        $("#ctxWideRegions2").show();
        $("#ctxWideRegions3").hide();
        $("#chart2-income").html("Net Returns per Hectare per Cropping Season by Region (2020)");
    });

    $('#showGross').click(function () {
        $("#ctxWideRegions").hide();
        $("#ctxWideRegions2").hide();
        $("#ctxWideRegions3").show();
        $("#chart2-income").html("Gross Returns per Hectare per Cropping Season by Region (2020)");
    });

    $("#ctxChart2-v").hide();

    $('#showVar').click(function () {
        $("#ctxChart1-v").show();
        $("#ctxChart2-v").hide();
        $("#chart-variety").html("Major varieties planted (2017 DS)");
    });

    $('#showPrVar').click(function () {
        $("#ctxChart1-v").hide();
        $("#ctxChart2-v").show();
        $("#chart-variety").html("Major PhilRice-bred varieties planted (2017 DS)");
    });

    $("#ctxWholesalePricesSem").hide();
    $("#ctxWholesalePricesMon").hide();

    $('#showAnnual').click(function () {
        $("#ctxWholesalePrices").show();
        $("#ctxWholesalePricesSem").hide();
        $("#ctxWholesalePricesMon").hide();
        $("#chart-wp").html("Wholesale Prices of Regular and Well-milled Rice (2001-2021)");
    });

    $('#showSem').click(function () {
        $("#ctxWholesalePrices").hide();
        $("#ctxWholesalePricesSem").show();
        $("#ctxWholesalePricesMon").hide();
        $("#chart-wp").html("Semestral Wholesale Prices of Regular and Well-milled Rice (2012-2021)");
    });

    $('#showMonth').click(function () {
        $("#ctxWholesalePrices").hide();
        $("#ctxWholesalePricesSem").hide();
        $("#ctxWholesalePricesMon").show();
        $("#chart-wp").html("Monthly Wholesale Prices of Regular and <br/> Well-milled Rice (May 2020-December 2021)");
    });

    $("#ctxRegRegional").hide();
    $("#phl-reg-reg").hide();
    $("#leg-reg").hide();

    $('#showWell').click(function () {
        $("#ctxRegRegional").hide();
        $("#phl-reg-reg").hide();
        $("#ctxWellRegional").show();
        $("#phl-well-reg").show();
        $("#chart2-wp").html("Wholesale Price of Well-Milled Rice (2021)");
    });

    $('#showReg').click(function () {
        $("#ctxRegRegional").show();
        $("#phl-reg-reg").show();
        $("#ctxWellRegional").hide();
        $("#phl-well-reg").hide();
        $("#chart2-wp").html("Wholesale Price of Regular-Milled Rice (2021)");
    });

    $("#ctxRetailPricesSem").hide();
    $("#ctxRetailPricesMon").hide();

    $('#showRAnnual').click(function () {
        $("#ctxRetailPrices").show();
        $("#ctxRetailPricesSem").hide();
        $("#ctxRetailPricesMon").hide();
        $("#chart-rp").html("Retail Prices of Regular and Well-milled Rice (2001-2021)");
    });

    $('#showRSem').click(function () {
        $("#ctxRetailPrices").hide();
        $("#ctxRetailPricesSem").show();
        $("#ctxRetailPricesMon").hide();
        $("#chart-rp").html("Retail Wholesale Prices of Regular and Well-milled Rice (2012-2021)");
    });

    $('#showRMonth').click(function () {
        $("#ctxRetailPrices").hide();
        $("#ctxRetailPricesSem").hide();
        $("#ctxRetailPricesMon").show();
        $("#chart-rp").html("Retail Wholesale Prices of Regular and <br/> Well-milled Rice (May 2020-December 2021)");
    });

    $('#showRWell').click(function () {
        $("#ctxRegRegional").hide();
        $("#phl-reg-reg").hide();
        $("#leg-reg").hide();
        $("#ctxWellRegional").show();
        $("#phl-well-reg").show();
        $("#leg-well").show();
        $("#chart2-rp").html("Retail Price of Well-Milled Rice (2021)");
    });

    $('#showRReg').click(function () {
        $("#ctxRegRegional").show();
        $("#phl-reg-reg").show();
        $("#leg-reg").show();
        $("#ctxWellRegional").hide();
        $("#phl-well-reg").hide();
        $("#leg-well").hide();
        $("#chart2-rp").html("Retail Price of Regular-Milled Rice (2021)");
    });

    $("#ctxFarmPricesSem").hide();
    $("#ctxFarmPricesMon").hide();

    $('#showFAnnual').click(function () {
        $("#ctxFarmPrices").show();
        $("#ctxFarmPricesSem").hide();
        $("#ctxFarmPricesMon").hide();
        $("#chart-fp").html("Nominal and Real Prices of Dry Palay (2001-2021)");
    });

    $('#showFSem').click(function () {
        $("#ctxFarmPrices").hide();
        $("#ctxFarmPricesSem").show();
        $("#ctxFarmPricesMon").hide();
        $("#chart-fp").html("Semestral Farmgate Prices of Regular and Well-milled Rice (2012-2021)");
    });

    $('#showFMonth').click(function () {
        $("#ctxFarmPrices").hide();
        $("#ctxFarmPricesSem").hide();
        $("#ctxFarmPricesMon").show();
        $("#chart-fp").html("Monthly Farmgate Prices of Regular and <br/> Well-milled Rice (May 2020-December 2021)");
    });


    $('#feedbackform').submit(function (e) {
        e.preventDefault();

        var age = $("select[name='age']").val();
        var sex = $("select[name='sex']").val();
        var sector = $("select[name='sector']").val();
        var agency_school = $("input[name='agency_school']").val();
        var purpose_work = $("select[name='purpose_work']").val();
        var region = $("select[name='region']").val();
        var province = $("select[name='province']").val();
        var municipality = $("select[name='municipality']").val();
        var others_inspect = $("input[name='others_inspect']").val();

        $.ajax({
            url: $('#feedbackform').attr('action'),
            type: 'POST',
            data: {
                age: age,
                sex: sex,
                sector: sector,
                agency_school: agency_school,
                purpose_work: purpose_work,
                region: region,
                province: province,
                municipality: municipality,
                others_inspect: others_inspect
            },
            error: function () {
                $('#feedbackModal').modal('hide');
            },
            success: function (data) {
                $("p.message").html("Submitted successfully.");
                $('#feedbackModal').modal('hide');
                setCookie('fbcookie', 'true', 365);
            }
        });


    });

    $('#region_list').on('change', function () {
        var region = $("select[name='region']").val();
        $.ajax({
            url: 'https://www.philrice.gov.ph/ricelytics/index.php/Feedbacks/provinces',
            type: 'POST',
            data: {
                region: region
            },
            success: function (data) {
                var list = jQuery.parseJSON(data);
                $('#province_list').html('');
                $('#province_list').append($('<option></option>').text('Select an option...'));
                $('#municipality_list').html('');
                $('#municipality_list').append($('<option></option>').text('Select an option...'));
                $.each(list, function (i) {
                    $('#province_list').append($('<option></option>').val(list[i].province_id).text(list[i].province));
                });
            }
        });
    });

    $('#province_list').on('change', function () {
        var province = $("select[name='province']").val();
        $.ajax({
            url: 'https://www.philrice.gov.ph/ricelytics/index.php/Feedbacks/cities',
            type: 'POST',
            data: {
                province: province
            },
            success: function (data) {
                var list = jQuery.parseJSON(data);
                $('#municipality_list').html('');
                $('#municipality_list').append($('<option></option>').text('Select an option...'));
                $.each(list, function (i) {
                    $('#municipality_list').append($('<option></option>').val(list[i].city_id).text(list[i].city));
                });
            }
        });
    });
    
    $('a.download-chart').click(function () {
        var extractChart = this.parentElement.parentElement;
        $('div.scrollable-chart').css('height', 'auto');
        var titleChart = this.parentElement.querySelector('h5.my-0.pt-2.pb-2').innerHTML + ".png";
        html2canvas(extractChart).then(function (canvas) {
            saveAs(canvas.toDataURL(), titleChart);
        });
        $('div.scrollable-chart').css('height', '950px');
    });
    
    
    $(function () {
        $('.card-main-alt').hover(function () {
                $(this).parent().parent().find('.caret-select').css('width', '55px');
                $(this).parent().parent().find('.caret-select').css('left', 'calc(100% - 55px)');
                $(this).parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '15px');
            },
            function () {
                $(this).parent().parent().find('.caret-select').css('width', '25px');
                $(this).parent().parent().find('.caret-select').css('left', 'calc(100% - 25px)');
                $(this).parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '1px');
            });
    });

    $(function () {
        $('.card-main').hover(function () {
                $(this).parent().parent().parent().find('.caret-select').css('width', '55px');
                $(this).parent().parent().parent().find('.caret-select').css('left', 'calc(100% - 55px)');
                $(this).parent().parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '15px');
            },
            function () {
                $(this).parent().parent().parent().find('.caret-select').css('width', '25px');
                $(this).parent().parent().parent().find('.caret-select').css('left', 'calc(100% - 25px)');
                $(this).parent().parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '1px');
            });
    });
    
    $(function () {
        $('.card-sec').hover(function () {
                $(this).parent().parent().parent().parent().parent().find('.caret-select').css('width', '55px');
                $(this).parent().parent().parent().parent().parent().find('.caret-select').css('left', 'calc(100% - 55px)');
                $(this).parent().parent().parent().parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '15px');
            },
            function () {
                $(this).parent().parent().parent().parent().parent().find('.caret-select').css('width', '25px');
                $(this).parent().parent().parent().parent().parent().find('.caret-select').css('left', 'calc(100% - 25px)');
                $(this).parent().parent().parent().parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '1px');
            });
    });
    
    $(function () {
        $('.farmer-sec').hover(function () {
                $(this).parent().parent().parent().parent().parent().parent().find('.caret-select').css('width', '55px');
                $(this).parent().parent().parent().parent().parent().parent().find('.caret-select').css('left', 'calc(100% - 55px)');
                $(this).parent().parent().parent().parent().parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '15px');
            },
            function () {
                $(this).parent().parent().parent().parent().parent().parent().find('.caret-select').css('width', '25px');
                $(this).parent().parent().parent().parent().parent().parent().find('.caret-select').css('left', 'calc(100% - 25px)');
                $(this).parent().parent().parent().parent().parent().parent().find('.caret-select').find('.bi-caret-right-alt').css('left', '1px');
            });
    });

    $(function () {
        $('.caret-select').hover(function () {
                $(this).css('width', '55px');
                $(this).css('left', 'calc(100% - 55px)');
                $(this).find('.bi-caret-right-alt').css('left', '15px');
            },
            function () {
                $(this).css('width', '25px');
                $(this).css('left', 'calc(100% - 25px)');
                $(this).find('.bi-caret-right-alt').css('left', '1px');
            });
    });
    
    $(".caret-select").click(function() {
      $(this).parent().find('a')[0].click();
    });
})

$(window).on('load', function () {
    var x = getCookie('fbcookie');
    if (!(x)) {
        $('#feedbackModal').modal('show');
    }
});
