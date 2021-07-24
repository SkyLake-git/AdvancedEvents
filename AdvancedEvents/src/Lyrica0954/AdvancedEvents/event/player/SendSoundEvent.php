<?php

namespace Lyrica0954\AdvancedEvents\event\player;

use \pocketmine\event\player\PlayerEvent;
use \pocketmine\event\Cancellable;
use \pocketmine\block\Block;
use \pocketmine\Player;
use \pocketmine\math\Vector3;

class SendSoundEvent extends PlayerEvent implements Cancellable{

    private $soundId;
    private $position;

    public function __construct(Player $player, Int $soundId, Vector3 $position){
        $this->player = $player;
        $this->soundId = $soundId;
        $this->position = $position;

    }

    public function getSound(){
        return $this->soundId;
    }
    
    public function getVector(){
        return $this->position;
    }
    
}