fetch('https://api.openweathermap.org/data/2.5/weather?id=515012&appid=cd0d813f0d0ae69bfc0fbd8a7383c81b&lang=ru')
    .then(function (resp) { return resp.json(); })
    .then(function (data) {
        let tempInC = Math.round(data.main.temp - 273);
        if (tempInC > 0) {
            document.querySelector('.weather-deg').innerHTML = '<small>+</small>' + tempInC + '&deg;';
        } else if (tempInC < 0) {
            document.querySelector('.weather-deg').innerHTML = '<small>-</small>' + tempInC + '&deg;';
        } else {
            document.querySelector('.weather-deg').innerHTML = tempInC + '&deg;';
        }
        document.querySelector('.weather-description').textContent = data.weather[0].description;
        document.querySelector('.weather-icon').innerHTML = 
        `<img src="img/weather/${data.weather[0].icon}.png"</img>`;
    })
    .catch(function () {
        document.querySelector('.weather').remove();
    });
