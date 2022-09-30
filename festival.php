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
  <link rel="stylesheet" type="text/css" href="CSS/festival.css">
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

<!--게시판-->
<section>
  <!--for demo wrap-->
  <h1 class="ftitle">2022학년도 광성제 운영 계획</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>구분</th>
          <th>시간</th>
          <th>학생 활동</th>
          <th>비고</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content tblCnt_height2">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td rowspan='4' class="txtalign">1부</td>
          <td class="txtalign">08:00~08:30 </td>
          <td class="txtalign">안전교육</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">08:30~09:30</td>
          <td class="txtalign">체육대회 결승전<br>(1학년 축구 및 2학년 피구)</td>
          <td class="txtalign" rowspan='2'>피구경기<br>중계 예정</td>
        </tr>
        <tr>
          <td class="txtalign">10:00~11:00</td>
          <td class="txtalign">체육대회 결승전<br>(1학년 피구 및 2학년 축구)</td>
        </tr>
        <tr>
          <td class="txtalign">11:00~11:50</td>
          <td class="txtalign">동아리 부스 준비 시간</td>
          <td class="txtalign">11:00<br>먹거리 장터 시작</td>
        </tr>
        <tr>
          <td class="txtalign"> </td>
          <td class="txtalign">11:50~12:50</td>
          <td class="txtalign">중식</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign" rowspan='2'>2부</td>
          <td class="txtalign">12:50~15:20</td>
          <td class="txtalign">동아리 부스 전시</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">15:20~15:40</td>
          <td class="txtalign">종례</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">3부</td>
          <td class="txtalign">17:30~20:00</td>
          <td class="txtalign">야간 공연</td>
          <td class="txtalign">대강당</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
<section>
  <!--for demo wrap-->
  <h1 class="ftitle">※ 먹거리 장터(엄마가 만드신 수제(手製/秀製) 먹거리)</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>내용</th>
          <th>장소</th>
          <th>운영</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content tblCnt_height1" >
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
            <td rowspan="3">· 닭꼬치(1000원), 떡볶이&어묵(1000원), 소떡소떡(1000원),
                        <br>· 팝콘치킨(1000원), 콜라(1000원), 사이다(1000원),
                        <br>· 얼음물(500원)</td>
            <td class="txtalign" rowspan="3">학부모회 및 <br> 교육 혁신 부장</td>
            <td class="txtalign" rowspan="3">필로티</td>
        </tr>
        <tr>

        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="3">∎ 학생 1인당 쿠폰 1000원 제공</td>
        </tr>
        <tr>
            <td colspan="3">∎ 전염병 확산 예방을 위해 음식물 본관 건물 내로 반입 불가</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<section>
    <!--for demo wrap-->
    <h1 class="ftitle">2부 동아리 전시 내용 및 장소 배치</h1>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>번호</th>
            <th>동아리명</th>
            <th>교사</th>
            <th>행사명</th>
            <th>행사 장소</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content tblCnt_height3" >
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <tr>
            <td class="txtalign">1</td>
            <td class="txtalign">신문부</td>
            <td class="txtalign">기지영</td>
            <td class="txtalign">광성 앙케이트 조사</td>
            <td class="txtalign">4-2</td>
          </tr>
          <tr>
            <td class="txtalign">2</td>
            <td class="txtalign">방송부</td>
            <td class="txtalign">김민영</td>
            <td class="txtalign">VOK Photo</td>
            <td class="txtalign">교수법연구실</td>
          </tr>
          <tr>
            <td class="txtalign">3</td>
            <td class="txtalign"d>영자 신문부</td>
            <td class="txtalign">김이은</td>
            <td class="txtalign">할로윈 파티</td>
            <td class="txtalign">4-3</td>
          </tr>
          <tr>
            <td class="txtalign">4</td>
            <td class="txtalign">경제 경영부</td>
            <td class="txtalign">김주연</td>
            <td class="txtalign">광성 투자의 신</td>
            <td class="txtalign">5-1</td>
          </tr>
          <tr>
            <td class="txtalign">5</td>
            <td class="txtalign">학교 대표 축구부</td>
            <td class="txtalign">박동현</td>
            <td class="txtalign">축구 다트</td>
            <td class="txtalign">운동장</td>
          </tr>
          <tr>
            <td class="txtalign">6</td>
            <td class="txtalign">컴퓨터부</td>
            <td class="txtalign">박신영</td>
            <td class="txtalign">블록체인이라 쓰고 코인이라 읽는다</td>
            <td class="txtalign">중학교 컴퓨터실</td>
          </tr>
          <tr>
            <td class="txtalign">7</td>
            <td class="txtalign">미술부</td>
            <td class="txtalign">박현아</td>
            <td class="txtalign">광성 예술제</td>
            <td class="txtalign">2층 정문 및 복도</td>
          </tr>
          <tr>
            <td class="txtalign">8</td>
            <td class="txtalign">지구 우주 과학부</td>
            <td class="txtalign">이미경</td>
            <td class="txtalign">지구사랑(태양계)</td>
            <td class="txtalign">종합과학실2</td>
          </tr>
          <tr>
            <td class="txtalign">9</td>
            <td class="txtalign">공학연구부</td>
            <td class="txtalign">이성구</td>
            <td class="txtalign">전자, 컴퓨터 공학 체험</td>
            <td class="txtalign">공학 연구실</td>
          </tr>
          <tr>
            <td class="txtalign">10</td>
            <td class="txtalign">또래 상담부</td>
            <td class="txtalign">이진성</td>
            <td class="txtalign">WEE 카페</td>
            <td class="txtalign">WEE클래스</td>
          </tr>
          <tr>
            <td class="txtalign">11</td>
            <td class="txtalign">정치외교부</td>
            <td class="txtalign">이한나</td>
            <td class="txtalign">두근두근 한반도</td>
            <td class="txtalign">4-1</td>
          </tr>
          <tr>
            <td class="txtalign">12</td>
            <td class="txtalign">KSI&BIO부</td>
            <td class="txtalign">장동훈</td>
            <td class="txtalign">방탈출 카페</td>
            <td class="txtalign">종합과학실1</td>
          </tr>
          <tr>
            <td class="txtalign">13</td>
            <td class="txtalign">문예부</td>
            <td class="txtalign">장성민</td>
            <td class="txtalign">두근두근 문예부!</td>
            <td class="txtalign">도서관 및 복도</td>
          </tr>
          <tr>
            <td class="txtalign">14</td>
            <td class="txtalign">농구부</td>
            <td class="txtalign">장정렬</td>
            <td class="txtalign">KBS<br>(Kwangsung Basketball Skills-challenge)</td>
            <td class="txtalign">체육관</td>
          </tr>
          <tr>
            <td class="txtalign">15</td>
            <td class="txtalign">아키텍처부</td>
            <td class="txtalign">정현광</td>
            <td class="txtalign">미니어처 건축물 전시</td>
            <td class="txtalign">4-3</td>
          </tr>
          <tr>
            <td class="txtalign">16</td>
            <td class="txtalign">수학부</td>
            <td class="txtalign">채상훈</td>
            <td class="txtalign">확률과 도박</td>
            <td class="txtalign">6-1</td>
          </tr>
          <tr>
            <td class="txtalign">17</td>
            <td class="txtalign">도서부</td>
            <td class="txtalign">허윤정</td>
            <td class="txtalign">북카페</td>
            <td class="txtalign">도서관</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
  
  <section>
  <!--for demo wrap-->
  <h1 class="ftitle">3부 야간 공연 내용</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>순서</th>
          <th>공연명</th>
          <th>참가학생(팀)</th>
          <th>형식</th>
          <th>시작 시간</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content tblCnt_height4" >
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td class="txtalign" colspan="4">1부</td>
          <td class="txtalign">17:30</td>
        </tr>
        <tr>
          <td class="txtalign">1</td>
          <td class="txtalign">step back / got the beat 
            <br>girls / 에스파
            <br>tomboy / (여자)아이들
            <br>feel my rythm / 레드벨벳
          </td>
          <td class="txtalign">중앙여고 댄스부 본스터</td>
          <td class="txtalign">댄스</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">2</td>
          <td class="txtalign">오키도키 / 지코, 송민호</td>
          <td class="txtalign">20910 박서준 외 1인</td>
          <td class="txtalign">랩</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">3</td>
          <td class="txtalign">See the Light
            <br>Wadada / Kepler
            <br>Love Dive / 아이브
            <br>FEARLESS / 르세라핌
          </td>
          <td class="txtalign">20517 이연재</td>
          <td class="txtalign">댄스</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">4</td>
          <td class="txtalign">카드마술</td>
          <td class="txtalign">20207 박상우</td>
          <td class="txtalign">마술</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">5</td>
          <td class="txtalign">One Love / MC the max</td>
          <td class="txtalign">20716 이동찬</td>
          <td class="txtalign">발라드</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">6</td>
          <td class="txtalign">Seasons of Love / Musical 'Rent' ost</td>
          <td class="txtalign">하리스 뮤지컬 중창단</td>
          <td class="txtalign">중창</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td colspan="4" class="txtalign">2부</td>
          <td class="txtalign">18:45</td>
        </tr>
        <tr>
          <td class="txtalign">7</td>
          <td class="txtalign">Love Dive / 아이브
            <br>도깨비불 / 에스파
            <br>FEARLESS / 르세라핌
            <br>Panty droppa / Trey Songz
          </td>
          <td class="txtalign">상암고 댄스부 하이텍</td>
          <td class="txtalign">댄스</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">8</td>
          <td class="txtalign">Crow</td>
          <td class="txtalign">10119 임정우</td>
          <td class="txtalign">기타 연주</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">9</td>
          <td class="txtalign">내 고향 서울엔 / 검정치마
            <br>기다린만큼 더 / 검정치마
          </td>
          <td class="txtalign">10905 김정현</td>
          <td class="txtalign">발라드</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">10</td>
          <td class="txtalign">BAND / 창모
            <br>내일이 오면 / 릴보이
          </td>
          <td class="txtalign">20816 윤성현 외 2인</td>
          <td class="txtalign">랩</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">11</td>
          <td class="txtalign">Viva La Vida / Coldplay</td>
          <td class="txtalign">10517 유경탁 외 4인</td>
          <td class="txtalign">밴드</td>
          <td class="txtalign"> </td>
        </tr>
        <tr>
          <td class="txtalign">12</td>
          <td class="txtalign">밤이 깊었네 / 슬의생ost
            <br>Butterfly / 러브홀릭스
          </td>
          <td class="txtalign">슬기로운 교사 생활</td>
          <td class="txtalign">밴드</td>
          <td class="txtalign"> </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

  <footer>

  </footer>
  <!--footer>
      <img src="images/Logos/LogoWhite.png" alt="DevPortal Logo" class="logo_img">
      <p>© 2020 Devportal Forum.</P>
    </footer-->


</body>

</html>
