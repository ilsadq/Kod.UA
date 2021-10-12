//

$(() => {
  $('#loginForm').on('submit', (e) => {
    e.preventDefault();

    $.ajax({
      type: $('form').attr('method'),
      url: $('form').attr('action'),
      data: {
        login: $('#loginForm input[name="login"]').val(),
        password: $('#loginForm input[name="password"]').val(),
      },
      cache: false,
      dataType: 'html',
      beforeSend: () => {
        $('form input[type="submit"]').prop('disabled', true);
      },
      success: (msg) => {
        if (msg == 'success') {
          window.location.href = 'http://kod.ua/add';
        } else {
          alert('Вы ввели неправильный логин или пароль');
        }
        $('form input[type="submit"]').prop('disabled', false);
      },
    });
  });
});
