<?php

class Match {

    /**
     * Match date
     * @var string
     */
    protected $date;

    /**
     * Match teams
     * @var Team[]
     */
    protected $teams = [];

    /**
     * Match class constructor.
     * @param string $date
     *   Match date
     */
    public function __construct(string $date) {
        $this->date = $date;
    }

    /**
     * Get date.
     * @return string
     *   Match date
     */
    public function getDate(): string {
        return $this->date;
    }

    /**
     * Get teams.
     * @return Team[]
     *   Match teams
     */
    public function getTeams(): array {
        return $this->teams;
    }

    /**
     * Set date.
     * @param string $date
     *   Match date
     */
    public function setDate(string $date): Match {
        $this->date = $date;
        return $this;
    }

    /**
     * Set teams.
     * @param Team[] $teams
     *   Match teams
     */
    public function setTeams(array $teams): Match {
        $this->teams = $teams;
        return $this;
    }

    /**
     * Add Match Team.
     * @param Team $team
     *   Match team
     */
    public function addTeam(Team $team): Match {
        $this->teams[] = $team;
        return $this;
    }

}

class Team {

    /**
     * Team name
     * @var string
     */
    protected $name;

    /**
     * Team goals
     * @var int
     */
    protected $goals = 0;

    /**
     * Team players
     * @var Player[]
     */
    protected $players = [];

    /**
     * Team class constructor.
     * @param string $name
     *   Team name
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Get name.
     * @return string
     *   Team name
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get goals.
     * @return int
     *   Team goals
     */
    public function getGoals(): int {
        return $this->goals;
    }

    /**
     * Get players.
     * @return Player[]
     *   Team players
     */
    public function getPlayers(): array {
        return $this->players;
    }

    /**
     * Set name.
     * @param string $name
     *   Team name
     */
    public function setName(string $name): Team {
        $this->name = $name;
        return $this;
    }

    /**
     * Set goals.
     * @param int $goals
     *   Team goals
     */
    public function setGoals(int $goals): Team {
        $this->goals = $goals;
        return $this;
    }

    /**
     * Set players.
     * @param Player[] $players
     *   Team players
     */
    public function setPlayers(array $players): Team {
        $this->players = $players;
        return $this;
    }

    /**
     * Add Team player.
     * @param player $player
     *   Team player
     */
    public function addplayer(player $player): Team {
        $this->players[] = $player;
        return $this;
    }

}

class Player {

    /**
     * Player number
     * @var string
     */
    protected $number;

    /**
     * Player name
     * @var string
     */
    protected $name;

    /**
     * Player highlights
     * @var Highlight[]
     */
    protected $highlights = [];

    /**
     * Player class constructor.
     * @param string $number
     *   Player number
     * @param string $name
     *   Player name
     */
    public function __construct(string $number, string $name) {
        $this->number = $number;
        $this->name = $name;
    }

    /**
     * Get number.
     * @return string
     *   Player number
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Get name.
     * @return string
     *   Player name
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get highlights.
     * @return Highlight[]
     *   Player highlights
     */
    public function getHighlights(): array {
        return $this->highlights;
    }

    /**
     * Set number.
     * @param string $number
     *   Player number
     */
    public function setNumber(string $number): Player {
        $this->number = $number;
        return $this;
    }

    /**
     * Set name.
     * @param string $name
     *   Player name
     */
    public function setName(string $name): Player {
        $this->name = $name;
        return $this;
    }

    /**
     * Set highlights.
     * @param Highlight[] $highlights
     *   Player highlights
     */
    public function setHighlights(array $highlights): Player {
        $this->highlights = $highlights;
        return $this;
    }

    /**
     * Add Player Highlight.
     * @param Highlight $highlight
     *   Player highlight
     */
    public function addHighlight(Highlight $highlight): Player {
        $this->highlights[] = $highlight;
        return $this;
    }

}

class Highlight {

    /**
     * Highlight name
     * @var string
     */
    protected $name;

    /**
     * Highlight time
     * @var string
     */
    protected $time;

    /**
     * Highlight class constructor.
     * @param string $name
     *   Highlight name
     * @param string $time
     *   Highlight time
     */
    public function __construct(string $name, string $time) {
        $this->name = $name;
        $this->time = $time;
    }

    /**
     * Get name.
     * @return string
     *   Highlight name
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get time.
     * @return string
     *   Highlight time
     */
    public function getTime(): string {
        return $this->time;
    }

    /**
     * Set name.
     * @param string $name
     *   Highlight name
     */
    public function setName(string $name): Highlight {
        $this->name = $name;
        return $this;
    }

    /**
     * Set time.
     * @param string $time
     *   Highlight time
     */
    public function setTime(string $time): Highlight {
        $this->time = $time;
        return $this;
    }

}

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
