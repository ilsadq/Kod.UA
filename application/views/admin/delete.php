<div id="delete-lsit">
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
          <button name="<?=$val['id']?>" class="btn btn-danger btn-sm m-1">Удалить</button>
        </div>
      </div>
    </div>
  <? endforeach; ?>
</div>
<script>
  const list = document.getElementById('delete-lsit');
  let buttons = list.querySelectorAll('button');

  buttons.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      $.ajax({
        type: 'post',
        url: '//kod.ua/delete',
        data: {
          id: e.target.name,
        },
        cache: false,
        dataType: 'html',
        success: (msg) => {
          console.log(msg);
        }
      });
    });
  });
</script>