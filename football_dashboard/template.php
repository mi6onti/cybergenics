<?php
    $highlights = [
            'Red Card' => ['class' => 'fa fa-square', 'style' => 'color: #e74c3c;'],
            'Goal' => ['class' => 'fa fa-futbol-o', 'style' => ''],
            'Substitution ON'  => ['class' => 'fa fa-arrow-circle-up', 'style' => 'color:#2ecc71;'],
            'Substitution OFF' => ['class' => 'fa fa-arrow-circle-down', 'style' => 'color:#e74c3c;']
    ];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Football Card UI</title>
  <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
    *{
        font-family: 'Dosis', sans-serif;
    }
    body{
        background-color: black;
    }
    #appConatainer{
        width:900px;
        height:650px;
        margin:0 auto;
        margin-left: 562px;
        padding:25px;
        box-sizing:border-box;
        display:flex;
        justify-content:space-around;
    }
    .screenContainer{
        box-sizing:border-box;
        width:370px;
        height:600px;
        box-shadow: 0 0 5px #7f8c8d;
        background-color:white;
        border-radius:0.3em;
    }
    #sectionHeader{
        height:150px;
        padding:20px;
        box-sizing:border-box;
        display:flex;
    }
    #labels{
        box-sizing:border-box;
        padding:8px;
        text-align:center;
    }
    #labels > h4{
        color:#a9a9a9;
    }
    #labels > h4,#labels > h5{
        margin:0;
        padding:4px 6px;
        letter-spacing:2px;
    }
    .teamImg{
        flex:1;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-direction:column;
        font-weight:bolder;
    }
    .teamImg > img{
        height:75px;
        width:75px;
    }
    #score > ul {
        display:flex;
        padding:8px;
        font-weight:bolder;
        position:relative;
        font-size:22px;
        top:6px;
        color:#000;
    }
    #score > ul >li{
        flex:1;
        list-style:none;
        height:50px;
        width:50px;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    li:nth-child(1){
        background-color:#7633e2;
        color:#fff;
    }
    li:nth-child(2){
        background-color:#ecf0f1;
    }
    #matchReport{
        padding:20px;
        padding-top:40px;
        height:400px;
        overflow-y:scroll;
        box-sizing:border-box;
        background-color:#bdc3c7;
    }
    #matchReport::-webkit-scrollbar {
        width: 0px;
        background: transparent; /* make scrollbar transparent */
    }
    .matchEntry{
        height:30px;
        padding:4px;
        display:flex;
    }
    .entryCard{
        background-color:#fff;
        display:flex;
        justify-content:space-around;
        align-items:center;
        width:150px;
        padding:2px;
        border-radius:0.3em;
        font-size:14px;
        font-weight:bolder;
        box-shadow: 0 0 5px #7f8c8d;
    }
    .left{
        justify-content:flex-start
    }
    .right{
        justify-content:flex-end;
    }
    #mom{
        background-color:#413f3f;
        height:50px;
        color:white;
        display:flex;
        align-items:center;
        justify-content:space-around;
        padding:8px;
        box-sizing:border-box;
        border-bottom-left-radius:0.3em;
        border-bottom-right-radius:0.3em;
    }
    #mom > span{
        font-weight:bolder;
    }
    #mom > img{
        height:30px;
        border-radius:50%;
    }
    #banner{
        display:flex;
        justify-content:center;
        padding-bottom:4px;
    }
    #pitchImg > img{
        height:420px;
        position:relative;
        left:45px;
        top: 25px;
    }
    .player{
        display: flex;
        flex-direction: column;
        width:25px;
        position:absolute;
    }
    .shirtImg{
        width:25px;
        height:25px;
    }
    .shirtImg > img{
        height:25px;
    }
    .playerName{
        height:10px;
        font-size:10px;
        width:25px;
        text-align: center;
        font-weight: bolder;
        POSITION: relative;
        left: -3px;
        text-transform:uppercase
    }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="appConatainer">
  <div class="screenContainer" id="scoresheet">
    <div id="sectionHeader">
      <div class="teamImg">
          <?php if ($settings['match']->getTeams()[0]): ?>
            <img src="http://i.imgrpost.com/imgr/2017/08/25/Juventus_Crest.jpg" alt="brand.gif" border="0" />
            <div><?php echo $settings['match']->getTeams()[0]->getName(); ?></div>
          <?php endif; ?>
      </div>
      <div id="labels">
        <h4>MATCH STATISTICS</h4>
        <h5><?php echo $settings['match']->getDate(); ?></h5>
        <div id="score">
          <ul>
            <li><?php echo isset($settings['match']->getTeams()[0]) ? $settings['match']->getTeams()[0]->getGoals() : 0; ?></li>
            <li><?php echo isset($settings['match']->getTeams()[1]) ? $settings['match']->getTeams()[1]->getGoals() : 0; ?></li>
          </ul>
        </div>
      </div>
      <div class="teamImg">
          <?php if (isset($settings['match']->getTeams()[1])): ?>
            <img src="http://i.imgrpost.com/imgr/2017/08/25/brand.gif" alt="Juventus_Crest.jpg" border="0" />
            <div><?php echo $settings['match']->getTeams()[1]->getName(); ?></div>
          <?php endif; ?>
      </div>
    </div>
    <div id="matchReport">
        <?php foreach($settings['match']->getTeams() as $key => $team): ?>
        <?php foreach($team->getPlayers() as $player): ?>
       <?php  if ($player->getHighlights()): ?>
      <div class="matchEntry <?php echo $key === 1 ? 'right' : 'left'; ?>">
        <div class="entryCard">
          <div class="time"><?php echo $player->getHighlights()[0]->getTime(); ?> '</div>
          <div class="name"><?php echo $player->getName(); ?></div>
          <div class="status">
              <i style="<?php echo $highlights[$player->getHighlights()[0]->getName()]['style']; ?>" class="<?php echo $highlights[$player->getHighlights()[0]->getName()]['class']; ?>" aria-hidden="true"></i>
          </div>
        </div>
      </div>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
      <?php if (isset($settings['match']->getTeams()[1]) && $settings['match']->getTeams()[1]->getGoals()): ?>
    <div id="mom"><span>Man of the Match :</span> Cristiano Ronaldo (RMA)
      <img src="https://tmssl.akamaized.net//images/portrait/originals/8198-1413207036.jpg" alt="">
    </div>
      <?php endif; ?>
  </div>
  <!--   second container -->
  <div class="screenContainer">
    <div id="sectionHeader">
      <div class="teamImg">
          <?php if ($settings['match']->getTeams()[0]): ?>
            <img src="http://i.imgrpost.com/imgr/2017/08/25/Juventus_Crest.jpg" alt="brand.gif" border="0" />
            <div><?php echo $settings['match']->getTeams()[0]->getName(); ?></div>
          <?php endif; ?>
      </div>
      <div id="labels">
        <h4>MATCH LINEUP</h4>
        <h5><?php echo $settings['match']->getDate(); ?></h5>
      </div>
      <div class="teamImg">
          <?php if (isset($settings['match']->getTeams()[1])): ?>
            <img src="http://i.imgrpost.com/imgr/2017/08/25/brand.gif" alt="Juventus_Crest.jpg" border="0" />
            <div><?php echo $settings['match']->getTeams()[1]->getName(); ?></div>
          <?php endif; ?>
      </div>
    </div>
 <div id="pitchImg">
      <img src="http://i.imgrpost.com/imgr/2017/08/28/imageedit_1_4805861975.png" alt="imageedit_1_4805861975.png" border="0">
     <?php if (isset($settings['match']->getTeams()[0]) && $settings['match']->getTeams()[0]->getPlayers()): ?>
      <span class="player" style="
    top: 579px;
    left: 926px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[0]->getName(); ?></div>
      </span>
       <span class="player" style="
    top: 524px;
    left: 966px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[1]->getName(); ?></div>
      </span>
       <span class="player" style="
    top: 524px;
    left: 886px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[2]->getName(); ?></div>
      </span>
       <span class="player" style="
    top: 518px;
    left: 826px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[3]->getName(); ?></div>
      </span>
       <span class="player" style="
    top: 518px;
    left: 1026px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[4]->getName(); ?></div>
      </span>
<span class="player" style="
   top: 470px;
   left: 992px;
   ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[5]->getName(); ?></div>
      </span>
       <span class="player" style="
   top: 470px;
   left: 860px;
   ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[6]->getName(); ?></div>
      </span>
      <span class="player" style="
   top: 480px;
   left: 926px;
   ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[7]->getName(); ?></div>
      </span>
     <span class="player" style="
   top: 420px;
    left: 992px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[8]->getName(); ?></div>
      </span>
       <span class="player" style="
   top: 420px;
    left: 860px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[9]->getName(); ?></div>
      </span>
      <span class="player" style="
   top: 420px;
    left: 926px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[0]->getPlayers()[10]->getName(); ?></div>
      </span>
     <?php endif; ?>
     <?php if (isset($settings['match']->getTeams()[1]) && $settings['match']->getTeams()[1]->getPlayers()): ?>

     <span class="player" style="
    top: 214px;
    left: 926px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[0]->getName(); ?></div>
      </span>
   <span class="player" style="
   top: 266px;
    left: 992px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[1]->getName(); ?></div>
      </span>
       <span class="player" style="
   top: 266px;
    left: 860px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[2]->getName(); ?></div>
      </span>
      <span class="player" style="
   top: 266px;
    left: 926px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[3]->getName(); ?></div>
      </span>
   <span class="player" style="
    top: 306px;
    left: 966px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[4]->getName(); ?></div>
      </span>
       <span class="player" style="
    top: 306px;
    left: 886px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[5]->getName(); ?></div>
      </span>
     <span class="player" style="
    top: 306px;
    left: 826px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[6]->getName(); ?></div>
      </span>
       <span class="player" style="
    top: 306px;
    left: 1026px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[7]->getName(); ?></div>
      </span>
   <span class="player" style="
   top: 376px;
    left: 974px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[8]->getName(); ?></div>
      </span>
       <span class="player" style="
   top: 376px;
    left: 882px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[9]->getName(); ?></div>
      </span>
      <span class="player" style="
   top: 338px;
    left: 926px;
    ">
        <div class="shirtImg">
          <img src="http://i.imgrpost.com/imgr/2017/09/27/casual-t-shirt-1.png" alt="casual-t-shirt-1.png" border="0">
        </div>
        <div class="playerName"><?php echo $settings['match']->getTeams()[1]->getPlayers()[10]->getName(); ?></div>
      </span>
     <?php endif; ?>
    </div>
  </div>
</div>
<!-- partial -->
<script>
    $('.player').each(function() {
        $(this).css('left', parseInt($(this).css('left')) + 300);
    });
</script>
</body>
</html>
