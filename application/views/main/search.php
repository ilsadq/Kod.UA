<div>
  <form action="/search" method="POST" class="d-flex justify-content-between">
    <input id="searchinpt" name="search" type="text" class="form-control mx-1">
    <input type="submit" value="Поиск" class="form-control btn btn-danger w-25 mx-1">
  </form>
</div>
<? if (!empty($news)): ?>
  <? foreach ($news as $key => $val): ?>
    <?  // Посик по массиву
      foreach ($redactors as $val) {
        if ($news['redactor'] == $val['id']) {
          $redactor = $val;
        }
      }
      ?>
    <article class="mt-5 m-3">
      <a href="<?=URL.'news/'.$news['id']?>">
        <div>
          <img src="<?=$news['path']?>" class="rounded-3 w-100" />
        </div>
      </a>
      <h3 class="mt-2">
        <a href="<?=URL.'news/'.$news['id']?>">
          <?=$news['title']?>
        </a>
      </h3>
      <div>
        <div class="d-flex mt-3">
          <div id="avatar">
            <a href="<?='mailto: '.$redactor['admin_email']?>">
              <img src="<?=$redactor['img']?>" />
            </a>
          </div>
            <div class="text-start align-self-end">
              <div>
                <a href="<?='mailto: '.$redactor['admin_email']?>"><?=$redactor['admin_name']?></a>
              </div>
              <div><?=$news['date']?></div>
            </div>
        </div>
      </div>
    </article>
  <? endforeach; ?>
<? endif; ?>