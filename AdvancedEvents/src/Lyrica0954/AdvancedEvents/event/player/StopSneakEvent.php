<?php

namespace Lyrica0954\AdvancedEvents\event\player;

use \pocketmine\event\player\PlayerEvent;
use \pocketmine\event\Cancellable;
use \pocketmine\block\Block;
use \pocketmine\Player;

class StopSneakEvent extends PlayerEvent{

    public function __construct(Player $player){
        $this->player = $player;

    }

    
}