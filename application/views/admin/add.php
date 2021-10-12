<div class="mt-3 d-flex justify-content-between">
  <form enctype="multipart/form-data" id="addForm" action="/add" method="POST" class="w-50">
    <div class="mt-3">
      <h5>Заголовок</h5>
      <input name="title" class="form-control" type="text">
    </div>
    <div class="mt-3">
      <h5>Содержание сайта в html формате</h5>
      <textarea id="txtArea" class="form-control" name="content" rows="20"></textarea>
    </div>
    <div class="mt-3">
      <h5>Картинка</h5>
      <input class="form-control" type="file" name="image" >
    </div>
    <div class="mt-3">
      <h5>Добавить новость</h5>
      <input class="form-control w-50 btn btn-danger" type="submit" value="Добавить">
    </div>
  </form>
  <div id="preview" class="text-white mt-3 w-50 mx-3"></div>
</div>