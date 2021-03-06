<!doctype html>
<html>
<head>
  <title> SYNACTION </title>
  <meta charset="uth-8">
  <link rel = "stylesheet" href ="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="shortcut icon" href="images\Favicon\Favicon2.png">
  <script type="text/javascript" src="MouseHover.js"></script>
    <style>
  .w3-button {width:150px}
  </style>
</head>
</html>


<body>
  <div class="gate">
    <div class="Titles">
      <h1> <a id="name" href="index.html"> SYNACTION </a> </h1>
      <h2 id="caption"> <a href="index.html"> synapse you and me </a></h2>
    </div>
   <div class="menu">
    <div class="dropdown">
      <button class="dropbtn" > <a href="index2.html">SHORT TALK </a><i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a id="submenu" href="index2.html"> Watch </a>
      <a id="submenu" href="QuickIn5.html"> Quick-in 5 </a>
        <a id="submenu"> Post </a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn" >  <a href="talk.html"> TALK </a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a id="submenu"> Current issue </a>
        <a id="submenu"> News & Comment </a>
        <a id="submenu"> Proposal </a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn" > <a href="about.html"> ABOUT </a>
        <i class="fa fa-caret-down"></i>
      </button>
      <!-- <div class="dropdown-content">
        <a href="submenu"> Discussion Marathon </a>
        <a href="submenu"> News & Comment </a>
        <a href="submenu"> Proposal </a>
      </div> -->
    </div>
    <div class="dropdown">
      <button class="dropbtn" > <a href="login.php"> LOGIN </a>
        <i class="fa fa-caret-down"></i>
      </button>

    </div>
  </div>

        <!-- <a id="uppermenu" href = "short_talk.html"> SHORT TALK </a> -->
        <!-- <a id="uppermenu" href = "talk.html"> TALK </a>
        <a id="uppermenu" href = "discussion.html"> DISCUSSION </a>
        <a id="uppermenu" href = "login.html"> LOGIN </a> -->
      </div>

<!--
    <div class="dropdown">
      <button class="dropbtn">Dropdown
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div> -->




<div class="titles">
    <img id = "titleimage" src="images\title\title1.jpg" alt="Title image:brainbow" >
    <div class="TitleText"> SYNACTION </div>
    <div class="explain"> Watch talks and Discuss </div>
    <div class="MoreButtoninGate">
      <button class="w3-button w3-round w3-border w3-padding-small w3-hover-light-grey"><a href="about.html">More</a></button>
    </div>
</div>


<div class="LatestTalk">
    <h2 id="StraplineLatestTalk"> Latest talks </h2>
    <div id="Extalks">
      <div id="Extalk">
        <img id="LatestTalkThumbnail" src="images\Latest Talk\Extalk1.PNG" alt="Extalk1 image">
        <h3 id="LatestTalkTitle"> How brain senses water? </h3>
        <div id="TalkInfo">
            <h4 id="publisher"> WongyoJung </h4>
            <h4 id="likes"> 50 Likes </h4> <h4 id="PostedDate"> |  2days ago </h4>
        </div>
   </div>

      <div id="Extalk">
        <img id="LatestTalkThumbnail" src="images\Latest Talk\Extalk2.PNG" alt="Extalk1 image">
        <h3 id="LatestTalkTitle"> Discovery brain circuit for Emotions </h3>
        <div id="TalkInfo">
          <h4 id="publisher"> Riat Terry </h4> <h4 id="likes"> 48 Likes </h4> <h4 id="PostedDate"> |  1 week ago </h4>
        </div>
      </div>

      <div id="Extalk">
        <img id="LatestTalkThumbnail" src="images\Latest Talk\Extalk3.PNG" alt="Extalk1 image">
        <h3 id="LatestTalkTitle"> Example thumbnails of latest talks </h3>
        <div id="TalkInfo">
            <h4 id="publisher"> TroyCalight </h4>
            <h4 id="likes"> 8 Likes </h4> <h4 id="PostedDate"> | 4days ago </h4>
       </div>
      </div>

      <div id="Extalk">
        <img id="LatestTalkThumbnail" src="images\Latest Talk\Extalk4.PNG" alt="Extalk4">
        <h3 id="LatestTalkTitle"> Example thumbnails of latest talks1 </h3>
        <div id="TalkInfo">
            <h4 id="publisher"> Camode516 </h4>
                <h4 id="likes"> 21 Likes </h4> <h4 id="PostedDate"> | 3days ago </h4>
        </div>
      </div>
    </div>
  </div>


    <div class="QuickTalk">
      <img id="QuickTalkImage" src="images\QuickTalk\QuickTalk Image.png" alt="QuickTalk Explain Image" onmouseover="
      MouseIn('QuickTalkExplainTitle')"
      onmouseout="
      MouseOut('QuickTalkExplainTitle')">
      <div id="QuickTalkExplain" onmouseover="
      MouseIn('QuickTalkExplainTitle')"
      onmouseout="
      MouseOut('QuickTalkExplainTitle')">
        <h3 id="QuickTalkExplainTitle" > <span> Quick view about papers </span> </h3>
        <p id="QuickTalkExplainArticle">
          How can we read papers efficiently? <br> Synaction helps you to read papers quickly. <br> Absorb just highlights of paper within 10 minutes.
           </p>
      </div>
    </div>

    <div class="KeyNoteSpeakers">
      <h2 id="StraplineLatestTalk"> Key note Speakers </h2>
      <div id="Speakers">

          <div id="Speaker">
            <img id="KeynoteSpeakerImage" src="images\KeynoteSpeaker\Face1.jpg" alt="Keynote speaker">
            <h3 id="SpeakerId" > Sally91 </h3>
            <h4 id="SpeakerInfo"> Ph.D student in Cambridge <br> Major in System Neuroscience</h4>
            <div id="MoreButtoninSpeakers">
              <button class="w3-button w3-green w3-round w3-padding-small"><a href="">More</a></button>
            </div>
            <br><br><br>
          </div>

          <div id="Speaker">
            <img id="KeynoteSpeakerImage" src="images\KeynoteSpeaker\Face2.jpg" alt="Keynote speaker">
            <h3 id="SpeakerId" > HarryKing@ </h3>
            <h4 id="SpeakerInfo"> Senior student in NTU <br> Major in Learning and Memory </h4>
            <div id="MoreButtoninSpeakers">
              <button class="w3-button w3-green w3-round w3-padding-small"><a href="">More</a></button>
            </div>
            <br><br><br>
          </div>


          <div id="Speaker">
            <img id="KeynoteSpeakerImage" src="images\KeynoteSpeaker\Face3.jpg" alt="Keynote speaker">
            <h3 id="SpeakerId" > Supderdupar </h3>
            <h4 id="SpeakerInfo"> Ph.D student in Havard <br> Major in Computational Neuroscience</h4>
            <div id="MoreButtoninSpeakers">
              <button class="w3-button w3-green w3-round w3-padding-small"><a href="">More</a></button>
            </div>
            <br><br><br>
          </div>


          <div id="Speaker">
            <img id="KeynoteSpeakerImage" src="images\KeynoteSpeaker\Face4.jpg" alt="Keynote speaker">
            <h3 id="SpeakerId" > CK_Lang </h3>
            <h4 id="SpeakerInfo"> Assistant Profeesor <br> Major in Bio infomatics</h4>
            <div id="MoreButtoninSpeakers">
              <button class="w3-button w3-green w3-round w3-padding-small"><a href="">More</a></button>
            </div>
            <br><br><br>
          </div>


      </div>
    </div>


    <div class="WebinarNotice">
      <div id="WebinarNoticeExplain" onmouseover="
      MouseIn('WebinarNoticeTitle')"
      onmouseout="
      MouseOut('WebinarNoticeTitle')">
        <h3 id="WebinarNoticeTitle"> Connection between peoples </h3>
        <p id="WebinarNoticeExplainArticle"> Do you need more discussion? <br> Participate live webinar and make connection through all world!  </p>
      </div>
        <img id="WebinarImage" src="images\WebinarNotice\NoticeImage.png" alt="Webinar notice image" onmouseover="
        MouseIn('WebinarNoticeTitle')"
        onmouseout="
        MouseOut('WebinarNoticeTitle')">


      </div>


      <div class="ABOUT">
        <h2 id="AboutSynaction"> SYNACTION </h2>
        <h3 id="SynactionExplaination"> Tons of presentations about various journals are producted in the worlds.
          <br> We connect such presentations to create synergy.
          <br> We belieive in power of connection.
          <br> Participate in our crews and connect more synapses!
          <br>
          <br> contact: kbb329@gmail.com
        </h3>
      </div>

    <div>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
    </div>

</body>

</html>
