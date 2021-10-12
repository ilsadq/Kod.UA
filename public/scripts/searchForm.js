//

$('form').on('submit', (e) => {
  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/search',
    data: {
      req: $('#searchinpt').val(),
    },
    cache: false,
    dataType: 'html',
    success: (msg) => {
      console.log(msg);
    },
  });
});
