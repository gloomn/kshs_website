$.getJSON('https://api.openweathermap.org/data/2.5/weather?q=Seoul&appid=44d55d9e07d9172567b239db173122ca&units=metric',
      function (result) {
        $('.cw > h3').append(result.main.temp + "도");
        $('.ltemp').append(result.main.temp_min);
        $('.htemp').append(result.main.temp_max);
        var wiconurl = '<img src="http://openweathermap.org/img/wn/' + result.weather[0].icon + '@2x.png" alt="' + result.weather[0].description + '"">'
        $('.icon').html(wiconurl);
      });
