var codes = new Array();

    codes[0] = "Angin Topan"; //"tornado"
    codes[1] = "Badai Tropis"; //"tropical storm"
    codes[2] = "Badai Topan"; //"hurricane"
    codes[3] = "Badai Petir Ekstrim"; //"severe thunderstorms"
    codes[4] = "Badai Petir"; //"thunderstorms"
    codes[5] = "Hujan Bercampur Salju"; //"mixed rain and snow"
    codes[6] = "Hujan Bercampur Es"; //"mixed rain and sleet"
    codes[7] = "Hujan Bercampur Salju"; //"mixed snow and sleet"
    codes[8] = "Hujan Gerimis Beku"; //"freezing drizzle"
    codes[9] = "Hujan Gerimis"; //"drizzle"
    codes[10] = "Hujan Beku"; //"freezing rain"
    codes[11] = "Gerimis"; //"showers"
    codes[12] = "Gerimis"; //"showers"
    codes[13] = "Lapisan Salju"; //"snow flurries"
    codes[14] = "Gerimis Salju Ringan"; //"light snow showers"
    codes[15] = "Salju Berterbangan"; // "blowing snow"
    codes[16] = "Salju"; //"snow"
    codes[17] = "Hujan Es"; //"hail"
    codes[18] = "Hujan Es"; //"sleet"
    codes[19] = "Berdebu"; //"dust"
    codes[20] = "Berkabut"; //"foggy"
    codes[21] = "Kabut"; //"haze"
    codes[22] = "Berasap"; //"smoky"
    codes[23] = "Berangin Kencang"; //"blustery"
    codes[24] = "Berangin"; //"windy"
    codes[25] = "Dingin"; //"cold"
    codes[26] = "Berawan"; //"cloudy"
    codes[27] = "Sebagian Besar Berawan"; //"mostly cloudy (night)"
    codes[28] = "Sebagian Besar Berawan"; //"mostly cloudy (day)"
    codes[29] = "Sebagian Berawan"; //"partly cloudy (night)"
    codes[30] = "Sebagian Berawan"; //"partly cloudy (day)"
    codes[31] = "Cerah"; //"clear (night)"
    codes[32] = "Cerah"; //"sunny"
    codes[33] = "Fair"; //"fair (night)"
    codes[34] = "Fair"; //"fair (day)"
    codes[35] = "Hujan Bercampur Es"; //"mixed rain and hail"
    codes[36] = "Panas"; //"hot"
    codes[37] = "Sedikit Badai Petir"; //"isolated thunderstorms"
    codes[38] = "Badai Petir Acak"; //"scattered thunderstorms"
    codes[39] = "Badai Petir Acak"; //"scattered thunderstorms"
    codes[40] = "Gerimis Acak"; //"scattered showers"
    codes[41] = "Salju Ekstrim"; //"heavy snow"
    codes[42] = "Gerimis Salhu Acak"; //"scattered snow showers"
    codes[43] = "Salju Ekstrim"; //"heavy snow"
    codes[44] = "Sebagian Berawan"; //"partly cloudy"
    codes[45] = "Gerimis Petir"; //"thundershowers"
    codes[46] = "Gerimis Salju"; //"snow showers"
    codes[47] = "Sedikit Gerimis Petir"; //"isolated thundershowers"
    codes[3200] = "Tidak Tersedia"; //"not available"

        $(document).ready(function() {
          $.simpleWeather({
            location: '-5.378305, 105.031593',
            woeid: '',
            unit: 'c',
            success: function(weather) {
              html = '<div class="title-box"><h3><i class="wicon icon-'+weather.code+'"></i> Cuaca Saat Ini</h3></div>'
              html += '<div class="content-box" ><p>'+weather.temp+'&deg;'+weather.units.temp;
              html += '&nbsp;-&nbsp;'+codes[weather.code]+'</p>';
              html += '<p>Kelembaban : '+weather.humidity+'&#37;</p>';
              html += '<p>Arah Angin &nbsp;: '+weather.wind.speed+' '+weather.units.speed+'&nbsp;&nbsp;'+weather.wind.direction+'</p></div>';
          
              $("#cuaca").html(html);
            },
            error: function(error) {
              $("#cuaca").html('<p>'+error+'</p>');
            }
          });
        });