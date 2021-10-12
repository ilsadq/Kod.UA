<div class="text-center">
  <h1>Наши контакты</h1>
  <div class="text-start" id="contacts">
    <?php foreach ($contacts as $key => $val): ?>
      <p>
        <?=$key?> - <a href="mailto: <?=$val['href']?>"><?=$val['name']?></a>
      </p>
    <?php endforeach; ?>
  </div>
</div>