function updateClock() {
  var currentTime = new Date();
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();
  var day = currentTime.getDate();
  var monthNames = [
    "Январь", "Февраль", "Март", "Апрель", "Мая", "Июнь",
    "Июль", "Авгут", "Сетябрь", "Октябрь", "Ноябрь", "Декабрь"
  ];

  var month = monthNames[currentTime.getMonth()];
  var year = currentTime.getFullYear();
  
  hours = (hours < 10 ? "0" : "") + hours;
  minutes = (minutes < 10 ? "0" : "") + minutes;
  seconds = (seconds < 10 ? "0" : "") + seconds;

  var timeString = hours + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2) + ' ' + day + ' ' + month + ' ' + year;

  document.getElementById("clock").innerHTML = timeString;
}

setInterval(updateClock, 1000);

window.onload = updateClock;