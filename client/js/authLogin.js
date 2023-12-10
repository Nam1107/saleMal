var refreshToken = localStorage.getItem('refreshToken');
var token = '';
if (refreshToken === 'undefined') {
  localStorage.clear();
  window.open(PATH + "auth/login.html", "_self");
} else {
  $.ajax({
    url: ROOT + "api/auth/refresh",
    type: 'POST',
    headers: {
      "Authorization": 'Bearer ' + refreshToken,
    },
    async: false
  }).done(function (data) {
    var obj = JSON.parse(data);
    localStorage.setItem('token', obj.token);
  }).fail(async function (data) {
    localStorage.clear();
    window.open(PATH + "auth/login.html", "_self");
  });
}
