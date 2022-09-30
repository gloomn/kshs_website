<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>광성고등학교</title>
  <meta charset="UTF-8">
  <meta author="Lee Ki Joon & Son jung Min">
  <meta Description="This is a KwangSung HighSchool Website Script">
  <meta name="viewport" content="width-device-width, initial-scale = 1.0">
  <meta http-equiv="X-UA-Compatible" content="ie = edge">
  <!--Font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
  <!--Favicon-->
  <link rel=icon href="images/favicon.png">
  <!--StyleSheet-->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" type="text/css" href="CSS/memberPage.css">
  <!--JavaScript-->
  <script type="text/javascript" src="JS/main.js" defer></script>
  <script type="text/javascript" src="JS/slide.js"></script>
  <script src="https://kit.fontawesome.com/d46260fedf.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="JS/weather.js"></script>
  <script type="text/javascript" src="JS/typingEffect.js"></script>

</head>
<nav class="navbar">
  <div class="navbar__logo">
    <a href="index.php">
      <img src="images/kwangsung_logo.png" alt="광성고등학교 로고" height="60" width="230">
    </a>
  </div>

  <ul class="navbar__menu">
    <li><i class="fas fa-info-circle"></i><a href="#">학교 소개</a></li>
    <li><i class="fas fa-newspaper"></i><a href="festival.php">광성제 정보</a></li>
    <li><i class="fas fa-box"></i><a href="#">자료란</a></li>
    <li><i class="fas fa-user"></i><a href="#">동아리 소개</a></li>
  </ul>

  <?php
    if(isset($_SESSION["userid"])) {
      echo '<li class="nr_li dd_main">';
      echo '<button class="btn"></button>';
      echo '<div class="dd_menu">';
      echo '<div class="dd_left">';
      echo '</div>';
      echo '<div class="dd_right">';
      echo '<span style=" padding-top: 10px; padding-left: 20px; font-size: 20px;">' . $_SESSION['userid'] .  '</span>';
      echo '<br>';
      echo '<br>';
      echo '<hr width="220px;>';
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
    }
    else {
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
      if(isset($_GET["error"])) {
        if($_GET["error"] == "LoginEmptyInput") {
          echo "<script>alert('모든 칸에 입력해주시기 바랍니다!')</script>";
        }
        else if($_GET["error"] == "wronglogin")
        {
          echo "<script>alert('로그인 정보가 정확하지 않습니다!')</script>";
        }
        else if($_GET["error"] == "WrongUid")
        {
          echo "<script>alert('사용자 이름이 정확하지 않습니다!')</script>";
        }
      }
    }
      echo '</ul>';
    ?>

  <a href="#" class="navbar__toggleBtn">
    <i class="fas fa-bars"></i>
  </a>
</nav>

<body onload="typeWriter()">
  <div class="memberpage">


  <section>
  <h1 id="demo"></h1>
    <div class="container">

      <div class="card">
        <div class="content">
          <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
            <div class="contentBx">
              <h3>박신영<br><span>광성고등학교 컴퓨터부 수장</span></h3>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
            <div class="contentBx">
              <h3>손정민<br><span>광성고등학교 컴퓨터부 기장</span></h3>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="content">
          <div class="imgBx"><img src="images/lkj.png" alt=""></div>
            <div class="contentBx">
              <h3>이기준<br><span>광성고등학교 컴퓨터부 1학년</span></h3>
            </div>
        </div>
      </div>
    </div>

</section>
<section>
  <div class="container">

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>유승재<br><span>광성고등학교 컴퓨터부 2학년</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>백도현<br><span>광성고등학교 컴퓨터부 2학년</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/lsh.jpg" alt=""></div>
          <div class="contentBx">
            <h3>이승환<br><span>광성고등학교 컴퓨터부 1학년</span></h3>
          </div>
      </div>
    </div>
  </div>

</section>
<section>
  <div class="container">

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/khw.jpg" alt=""></div>
          <div class="contentBx">
            <h3>김현우<br><span>광성고등학교 컴퓨터부 1학년</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>박현준<br><span>광성고등학교 컴퓨터부 기장</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>김건우<br><span>광성고등학교 컴퓨터부 1학년</span></h3>
          </div>
      </div>
    </div>
  </div>

</section>
<section>
  <div class="container">

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>송시헌<br><span>광성고등학교 컴퓨터부 수장</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>윤성현<br><span>광성고등학교 컴퓨터부 기장</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>김성택<br><span>광성고등학교 컴퓨터부 1학년</span></h3>
          </div>
      </div>
    </div>
  </div>

</section>

<section>
  <div class="container">

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>김준영<br><span>광성고등학교 컴퓨터부 수장</span></h3>
          </div>
      </div>
    </div>

    <div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/img1.jpg" alt=""></div>
          <div class="contentBx">
            <h3>박진수<br><span>광성고등학교 컴퓨터부 기장</span></h3>
          </div>
      </div>
    </div>

    <a href="https://kwangsung.sen.hs.kr/"><div class="card">
      <div class="content">
        <div class="imgBx"><img src="images/favicon.png" alt=""></div>
          <div class="contentBx">
            <h3>광성고등학교 홈페이지<br><span>광성고등학교 메인 홈페이지</span></h3>
          </div>
      </div>
    </div>
    </a>
</section>

</div>
</body>

</html>
