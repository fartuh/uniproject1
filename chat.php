<?php 

if(!isset($_SESSION['theme'])) $_SESSION['theme'] = "drops of water";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link rel="icon" href="assets/chat-logo.jpg">
  <link rel="stylesheet" href="chat.css">
  <link rel="stylesheet" href="resets.css">
</head>

<body>
  <div class="settings-list">
    <div class="drop-down-list-style">
      <label for="theme-list">Choose color theme</label>
      <select class="theme" action="theme" id="theme-list">
      <option value="themeDrops"<?php if($_SESSION['theme'] == 'themeDrops') echo "selected='selected'" ?> class="option">
          drops of water
        </option>
        <option value="themePink" <?php if($_SESSION['theme'] == 'themePink') echo "selected='selected'" ?>class"option">
          pink
        </option>
        <option value="themeGold" <?php if($_SESSION['theme'] == 'themeGold') echo "selected='selected'" ?>class="option">
          gold
        </option>
      </select>
    </div>
    <button class="exitbtn" id="Exit"><a href="logout">Exit</a></button>
  </div>

  <div class="fon-chat">
    <div>
        <?php
            foreach($data as $msg){
                echo "<div class='font-message'>";
                echo "<p class='nick'>". $msg['login'] ."</p>";
                echo "<p class='text-message'>". $msg['message'] ."</p>";
                echo "</div>";
            }
        ?>
    </div>
    <div class="interactive-element">
      <form action="newMsg" method="post">
        <input type="text" name="msg" class="text-box">
        <button type="submit" class="sentbtn" id="Sent">Sent</button>
      </form>
    </div>
  </div>

<?php 

echo "<script>const form = document.querySelector('body');";
echo "const themeSelector = document.querySelector('.theme');";

echo "form.classList.remove('themeGold', 'themePink', 'themeDrops');";

echo "form.classList.add('". $_SESSION['theme'] ."');</script>";


?>

<script>

function handleSelectChange(event) {
            // Получение нового выбранного значения
            var selectedValue = event.target.value;
            
            location.replace("newTheme?newTheme=" + selectedValue);
            // Отображение выбранного значения
        }

        // Добавление обработчика события change к элементу select
        document.getElementById("theme-list").addEventListener("change", handleSelectChange);

const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));

(async () => {
  // Задержка в 2 секунды перед выводом сообщения
  await sleep(10000);
  location.reload(true);
})();


</script>

</body>

</html>
