<html>

<head>
  <title>광성고등학교 회원가입</title>
  <meta charset="UTF-8">
  <meta author="Lee Ki Joon">
  <meta Description="This is a DevPortal Forum Script">
  <meta name="viewport" content="width-device-width, initial-scale = 1.0">
  <meta http-equiv="X-UA-Compatible" content="ie = edge">
  <!--Font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
  <!--Favicon-->
  <link rel=icon href="images/favicon.png">
  <!--StyleSheet-->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <!--JavaScript-->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="JS/main.js" defer></script>
  <script src="https://kit.fontawesome.com/d46260fedf.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar">
    <div class="navbar__logo">
      <a href="index.php">
        <img src="images/kwangsung_logo.png" alt="광성고등학교 로고" height="60" width="230">
      </a>
    </div>

    <ul class="navbar__menu">
      <li><i class="fas fa-info-circle"></i><a href="https://kwangsung.sen.hs.kr/34506/subMenu.do">학교 소개</a></li>
      <li><i class="fas fa-newspaper"></i><a href="festival.php">광성제 정보</a></li>
      <li><i class="fas fa-box"></i><a href="#">자료란</a></li>
      <li><i class="fas fa-user"></i><a href="club-introduce.php">동아리 소개</a></li>
    </ul>

    <?php
    if (isset($_SESSION["userid"])) {
      echo '<li class="nr_li dd_main">';
      echo '<button class="btn"></button>';
      echo '<div class="dd_menu">';
      echo '<div class="dd_left">';
      echo '</div>';
      echo '<div class="dd_right">';
      echo '<span style=" padding-top: 5px; padding-left: 5px; font-size: 20px;">[' . $_SESSION['userid'] .  ']</span>';
      echo '<br>';
      echo '<br>';
      echo '<a href="#"><button class="dd_mypage"><i class="fa fa-user" style="font-size:20px;color:black; padding-right:5px; "></i>마이페이지</button></a>';
      echo '<br>';
      echo '<a href="#"><button class="dd_mypage"><i class="fas fa-map-marker" style="font-size:20px;color:black; padding-right:5px;"></i>북마크</button></a>';
      echo '<br>';
      echo '<a href="#"><button class="dd_mypage"><i class="fas fa-file" style="font-size:20px;color:black; padding-right:5px;"></i>작성글</button></a>';
      echo '<br>';
      echo '<a href="../includes/logout.inc.php"><button class="dd_logout"><i class="fas fa-sign-out-alt" style="font-size:20px;color:black; padding-right:5px; text-align:center;"></i>로그아웃</button></a>';
      echo '</div>';
      echo '</div>';
      echo '</li>';
    } else {
      echo '<ul class = "navbar__icons">';
      echo '<div class="popup" id="popup-1">';
      echo '<div class="overlay"></div>';
      echo '<div class="content">';
      echo '<div class="close-btn" onclick="togglePopup()">&times;</div>';
      echo '<h1 class = "popup-h1-title">로그인</h1>';
      echo '<hr>';
      echo '<br>';
      echo '<form action="includes/login.inc.php" method = "POST" >';
      echo '<label for="ID" class="popup-h1">아이디</label>';
      echo ' <input type="text"  name="login-id" placeholder="아이디" onkeypress="return block1(event)">';
      echo '<label for="Password" class="popup-h1">비밀번호</label>';
      echo '<input type="password"  class = "loginPlaceHolder" name="login-password" placeholder="비밀번호">';
      echo '<a class = "popup-find-id-pw" href="#">ID/PW 찾기</a>';
      echo '<input type="submit" name = "submit" class="popup-login-button" value="로그인">';
      echo '<p>아직 회원이 아니신가요?<a href="register.php" class="popup-register-button">회원가입 하기</a></p>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '<li><button onclick="togglePopup()">로그인</button></li>';
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "LoginEmptyInput") {
          echo "<script>alert('모든 칸에 입력해주시기 바랍니다!')</script>";
        } else if ($_GET["error"] == "wronglogin") {
          echo "<script>alert('로그인 정보가 정확하지 않습니다!')</script>";
        }
      }
    }
    echo '</ul>';
    ?>

    <a href="#" class="navbar__toggleBtn">
      <i class="fas fa-bars"></i>
    </a>
  </nav>
  <script type="text/javascript">
    function block1(e) {
      var k;
      document.all ? k = e.keyCode : k = e.which;
      return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k >= 48 && k <= 57) || k == 8);
    }

    function block2(e) {
      var k;
      document.all ? k = e.keyCode : k = e.which;
      return ((k > 63 && k < 91) || (k > 96 && k < 123) || (k >= 48 && k <= 57) || k == 8 || k == 46);
    }
  </script>
  <div class="register">
    <h1>회원가입</h1>
    <form action="includes/register.inc.php" method="POST">
      <label for="아이디" class="fb">User Name *</label>
      <input type="text" name="userid" placeholder="아이디" onkeypress="return block1(event)" required>

      <label for="비밀번호" class="fb">Password *</label>
      <input type="password" name="password" placeholder="비밀번호" required>

      <label for="비밀번호 확인" class="fb">Check Password *</label>
      <input type="password" name="passwordCheck" placeholder="비밀번호 확인" required>

      <label for="이메일" class="fb">Email *</label>
      <input type="email" name="email" placeholder="이메일 주소" onkeypress="return block2(event)" required>

      <label for="학년" class="fb">Grade *</label>
      <input type="text" name="grade" placeholder="학년" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>

      <label for="반" class="fb">Class *</label>
      <input type="text" name="class" placeholder="반" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>

      <form action="?" method="POST">
        <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdKE8YZAAAAANyZFxLwpCCbRkGrE8UVNSvtot3y"></div>
        <br />
        <input type="submit" name="submit" id="form-submit-btn" class="g-recaptcha" value="계정 생성">
        <!--Use JavaScript and make button disable and able function while
          recaptcha checked and not checked-->
        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>빈칸은 모두 채워주시기 바랍니다.</p>";
          }
          if ($_GET["error"] == "invaliduid") {
            echo "<p>다른 아이디를 사용해주시기 바랍니다.</p>";
          }
          if ($_GET["error"] == "invalidemail") {
            echo "<p>이메일을 정확하게 입력해주시기 바랍니다.</p>";
          }
          if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>비밀번호와 비밀번호 확인이 다릅니다.</p>";
          }
          if ($_GET["error"] == "stmtfailed") {
            echo "<p>무언가가 잘못되었습니다. 다시 시도해보시기 바랍니다.</p>";
          }
        }
        ?>
        </p>
      </form>
  </div>
  <?php
  echo $error;
  ?>
</body>

</html>