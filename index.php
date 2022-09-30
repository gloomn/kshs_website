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
  <!--JavaScript-->
  <script type="text/javascript" src="JS/main.js" defer></script>
  <script type="text/javascript" src="JS/slide.js"></script>
  <script src="https://kit.fontawesome.com/d46260fedf.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="JS/weather.js"></script>
  <script type="text/javascript" src="JS/typingEffect.js"></script>

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


  <div class="banner">
    <!-- 슬라이더 제작 시작 -->
    <div class="slider">
      <div class="slides">

        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">

        <div class="slide first">
          <img src="images/slide1.png" alt="">
        </div>
        <div class="slide">
          <img src="images/slide2.png" alt="">
        </div>
        <div class="slide">
          <img src="images/slide3.png" alt="">
        </div>

        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
        </div>

      </div>

      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>

    </div>

  </div>
<!--게시판-->
  <div class="memberpage">

  <section>
    <div class="container">

      <div class="card">
        <div class="content">
            <div class="contentBx">
              <h3>공지 사항</h3>
                <hr class="maincontents-hr">
                <div id="wrapper">
                  <table id="keywords" cellspacing="0" cellpadding="0">
                   <thead>
                     <tr>
                       <th><span>번호</span></th>
                       <th><span>제목</span></th>
                       <th><span>작성자</span></th>
                       <th><span>작성일</span></th>
                     </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>졸업생 수능 원서 작성 안내</td>
                      <td>채상훈</td>
                      <td>2022-08-17</td>
                    </tr>
                  
                    <tr>
                      <td>2</td>
                      <td>광성고 조리원 채용 공고(시간제)</td>
                      <td>신동규</td>
                      <td>2022-08-22</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>2023학년도 수시모집 추천전형...</td>
                      <td>구혜영</td>
                      <td>2022-08-22</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>광성고 조리원 채용 공고(5차/병가대체)</td>
                      <td>신동규</td>
                      <td>2022-08-17</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>금식 방역활도 지원 업무...</td>
                      <td>신동규</td>
                      <td>2022-08-08</td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
      <div class="card">
        <div class="content">
            <div class="contentBx">
              <div class="cw">
                <h3>현재 온도:</h3>
              </div>
              <hr class="maincontents-hr">
              <div class="icon"></div>
            </div>
        </div>
      </div>
    </div>

  </section>

  <section>
    <div class="container">

      <div class="card">
        <div class="content">
            <div class="contentBx">
              <h3>급식 정보</h3>
                <hr class="maincontents-hr">
                <div id="wrapper">
                  <table id="keywords" cellspacing="0" cellpadding="0">
                   <thead>
                     <tr>
                       <th><span>급식</span></th>
                       <th><span>제목</span></th>
                       <th><span>식단</span></th>
                       <th><span>칼로리</span></th>
                       <th><span>등록일</span></th>
                     </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>신문부</td>
                      <td>기지영</td>
                      <td>광성 앙케이트 조사</td>
                      <td>4-2</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>방송부</td>
                      <td>김민영</td>
                      <td>VOK Photo</td>
                      <td>교수법 연구실</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>영자신문부</td>
                      <td>김이은</td>
                      <td>할로윈 파티</td>
                      <td>4-3</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>경제경영부</td>
                      <td>김주연</td>
                      <td>광성 투자의 신</td>
                      <td>5-1</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>학교대표축구부</td>
                      <td>박동현</td>
                      <td>축구 다트</td>
                      <td>운동장</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="content">
            <div class="contentBx">
              <div class="mc_title">
                <h3>광성제 이벤트</h3>
                <hr class="maincontents-hr">
                <div id="wrapper">
                  <table id="keywords" cellspacing="0" cellpadding="0">
                   <thead>
                     <tr>
                       <th><span>번호</span></th>
                       <th><span>동아리명</span></th>
                       <th><span>교사</span></th>
                       <th><span>행사명</span></th>
                       <th><span>행사장소</span></th>
                     </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>신문부</td>
                      <td>기지영</td>
                      <td>광성 앙케이트 조사</td>
                      <td>4-2</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>방송부</td>
                      <td>김민영</td>
                      <td>VOK Photo</td>
                      <td>교수법 연구실</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>영자신문부</td>
                      <td>김이은</td>
                      <td>할로윈 파티</td>
                      <td>4-3</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>경제경영부</td>
                      <td>김주연</td>
                      <td>광성 투자의 신</td>
                      <td>5-1</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>학교대표축구부</td>
                      <td>박동현</td>
                      <td>축구 다트</td>
                      <td>운동장</td>
                    </tr>
                  </tbody>
                </table>
            </div>
              </div>
            </div>
        </div>
      </div>
    </div>

  </section>
</div>



  <footer>

  </footer>
  <!--footer>
      <img src="images/Logos/LogoWhite.png" alt="DevPortal Logo" class="logo_img">
      <p>© 2020 Devportal Forum.</P>
    </footer-->


</body>

</html>
