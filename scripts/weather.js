fetch('http://api.openweathermap.org/data/2.5/weather?id=515012&appid=cd0d813f0d0ae69bfc0fbd8a7383c81b&lang=ru')
    .then(function (resp) { return resp.json(); })
    .then(function (data) {
        console.log(data);
        document.querySelector('.intro__weather-deg').innerHTML = Math.round(data.main.temp - 273) + ' &deg;';
        document.querySelector('.intro__weather-description').textContent = data.weather[0].description;
        document.querySelector('.intro__weather-icon').innerHTML = `<img src="https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png">`;

    })
    .catch(function () {
        // any errors
        // https://openweathermap.org/img/wn/04d@2x.png
    });
