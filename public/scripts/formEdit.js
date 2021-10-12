//

$(() => {
  $('#editForm').on('submit', (e) => {
    e.preventDefault();

    let id = /edit\/(\w+)/.exec(document.location.href)[1];

    $.ajax({
      type: $('#editForm').attr('method'),
      url: $('#editForm').attr('action'),
      data: {
        id: id,
        content: $('#txtArea').val(),
        title: $('#title').val(),
      },
      cache: false,
      dataType: 'html',
    });
  });
});
