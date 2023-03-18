<?php
require 'classes.php';

$match = new Match('02 June 2017');
$rma = new Team('Real Madrid');
$juv = new Team('Juventus');
$match->addTeam($juv)->addTeam($rma);

$juv->addplayer(new Player(1, 'Buffon'))
    ->addplayer(new Player(2, 'chiellini'))
    ->addplayer(new Player(3, 'BARZAGLI'))
    ->addplayer(new Player(4, 'BONUCCI'))
    ->addplayer(new Player(5, 'KHEDIRA'))
    ->addplayer(new Player(6, 'PJANIC'))
    ->addplayer(new Player(7, 'RONALDO'))
    ->addplayer(new Player(8, 'ALEX SANDRO'))
    ->addplayer(new Player(9, 'Mandžukić'))
    ->addplayer(new Player(10, 'Lemina'))
    ->addplayer(new Player(11, 'DYBALA'));

$rma->addplayer(new Player(1, 'NAVAS'))
    ->addplayer(new Player(2, 'RAMOS'))
    ->addplayer(new Player(3, 'VARANE'))
    ->addplayer(new Player(4, 'MARCELO'))
    ->addplayer(new Player(5, 'CARVAJAL'))
    ->addplayer(new Player(6, 'KROOS'))
    ->addplayer(new Player(7, 'MODRIC'))
    ->addplayer(new Player(8, 'CASEMIRO'))
    ->addplayer(new Player(9, 'BALE'))
    ->addplayer(new Player(10, 'BENZEMA'))
    ->addplayer(new Player(11, 'Ronaldo'));


$juv->getPlayers()[1]->addHighlight(new Highlight('Red Card', 10));
$juv->getPlayers()[5]->addHighlight(new Highlight('Substitution ON', 50));
$juv->getPlayers()[6]->addHighlight(new Highlight('Substitution OFF', 50));

$rma->getPlayers()[2]->addHighlight(new Highlight('Goal', 20));
$rma->getPlayers()[4]->addHighlight(new Highlight('Substitution ON', 70));
$rma->getPlayers()[5]->addHighlight(new Highlight('Substitution OFF', 70));
$rma->getPlayers()[7]->addHighlight(new Highlight('Substitution ON', 90));
$rma->getPlayers()[8]->addHighlight(new Highlight('Substitution OFF', 80));

$rma->setGoals(1);

// Load template.
$settings['match'] = $match;
include 'template.php';
