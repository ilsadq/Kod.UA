<? if (empty($this->route['id'])): ?>
  <div id="edit-list">
    <? foreach ($news as $val): ?>
      <div
          class="
            border
            rounded
            d-flex
            bg-dark
            justify-content-between
            align-items-center
            mt-3
            p-2">
        <div class="text-white">
          <?=$val['title']?>
        </div>
        <div class="d-flex justify-content-end align-items-center">
        <div class="mx-4 text-white"><?=$val['date']?></div>
        <div class="mx-4 text-white">
        <a class="mx-4 text-white text-decoration-none" href="<?='//kod.ua/news/'.$val['id']?>">Ссылка</a>
        </div>
          <div>
            <button name="<?=$val['id']?>" class="btn btn-danger btn-sm m-1">Редактировать</button>
          </div>
        </div>
      </div>
    <? endforeach; ?>
</div>
<script>
  const list = document.getElementById('edit-list');
  let buttons = list.querySelectorAll('button');

  buttons.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      window.location.href = '/edit/' + e.target.name;
    })
  })
</script>
<? endif; ?>
<? if (!empty($this->route['id'])): ?>
  <div class="mt-3 d-flex justify-content-between">
    <form id="editForm" action="/edit" method="POST" class="w-50">
      <div class="mt-3">
        <h5>Заголовок</h5>
        <input id="title" name="title" value="<?=$news['title']?>" class="form-control" type="text">
      </div>
      <div class="mt-3">
        <h5>Содержание сайта в html формате</h5>
        <textarea id="txtArea" class="form-control" name="content" rows="20">
          <?=$news['content']?>
        </textarea>
      </div>
      <div class="mt-3">
        <h5>Редактировать новость</h5>
        <input id="editSbmt" class="form-control w-50 btn btn-danger" type="submit" value="Редактировать">
      </div>
    </form>
    <div id="preview" class="text-white mt-3 w-50 mx-3"></div>
  </div>
  <script>
    const txtArea = document.getElementById('txtArea');
    const preview = document.getElementById('preview');

    txtArea.onkeyup = () => {
      preview.innerHTML = txtArea.value;
    };
  </script>
<? endif; ?>
