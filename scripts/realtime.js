fetch('https://api.openweathermap.org/data/2.5/weather?id=515012&appid=cd0d813f0d0ae69bfc0fbd8a7383c81b&lang=ru')
    .then(function (resp) { return resp.json(); })
    .then(function (data) {
        let tempInC = Math.round(data.main.temp - 273);
        if (tempInC > 0) {
            document.querySelector('#weather-degrees').innerHTML = '<small>+</small>' + tempInC + '&deg;';
        } else {
            document.querySelector('#weather-degrees').innerHTML = tempInC + '&deg;';
        }
        document.querySelector('#weather-description').textContent = data.weather[0].description;
        document.querySelector('#weather-icon').innerHTML = 
        `<img src="img/main/realtime-icons/weather/${data.weather[0].icon}.png"</img>`;
    })
    .catch(function () {
        document.querySelector('.weather').remove();
    });


const monthArray = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
const weekDayArray = ['понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье'];
setInterval(() => {
    const date = new Date();
    const day = date.getDate();
    const month = date.getMonth();
    const weekDay = date.getDay();

    const hours = formatTime(date.getHours());
    const minutes = formatTime(date.getMinutes());

    function formatTime(count) {
        if (count < 10) {
            count = `0${count}`;
        }
        return count;
    }

    document.querySelector('.date p').textContent = `${day} ${monthArray[month]}, ${weekDayArray[weekDay - 1]}`;
    document.querySelector('.time p').textContent = `${hours}:${minutes}`;
}, 3000);
