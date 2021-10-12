<div
  id="header-card"
  class="d-flex row text-center m-auto p-5 pt-4 mt-3"
  >
  <h1>Новости</h1>
    <div class="mt-4">
      <p>
        <?=$card_title?>
      </p>
    </div>
  <div><?=$news_count['COUNT(*)']?> публикаций</div>
</div>
<div id="news-list" class="d-flex w-auto justify-content-start flex-wrap">
  <? foreach ($news as $news): ?>
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
</div>