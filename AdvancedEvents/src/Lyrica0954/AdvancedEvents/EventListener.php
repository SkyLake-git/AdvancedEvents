<?php

namespace Lyrica0954\AdvancedEvents;

use Lyrica0954\AdvancedEvents\AdvancedEvents;
use Lyrica0954\AdvancedEvents\event\EventRunner;

use pocketmine\network\mcpe\protocol\PlayerActionPacket;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;

class EventListener implements \pocketmine\event\Listener{

    private $main;

    public function __construct(AdvancedEvents $main){
        $this->main = $main;
    }


    public function dataPacketReceive(\pocketmine\event\server\DataPacketReceiveEvent $event): void{
        $packet = $event->getPacket();
        $player = $event->getPlayer();

        if ($packet instanceof PlayerActionPacket){
            switch($packet->action){
                case PlayerActionPacket::ACTION_START_BREAK:
                    $obj = new EventRunner(AdvancedEvents::StartBreakBlockEvent, false);
                    $obj->runEvent($player);
                    break;
                case PlayerActionPacket::ACTION_ABORT_BREAK:
                    $obj = new EventRunner(AdvancedEvents::AbortBreakBlockEvent, false);
                    $obj->runEvent($player);
                    break;
                case PlayerActionPacket::ACTION_START_SNEAK:
                    $obj = new EventRunner(AdvancedEvents::StartSneakEvent, false);
                    $obj->runEvent($player);
                    break;
                case PlayerActionPacket::ACTION_STOP_SNEAK:
                    $obj = new EventRunner(AdvancedEvents::StopSneakEvent, false);
                    $obj->runEvent($player);
                    break;
                case PlayerActionPacket::ACTION_START_SPRINT:
                    $obj = new EventRunner(AdvancedEvents::StartSprintEvent, false);
                    $obj->runEvent($player);
                    break;
                case PlayerActionPacket::ACTION_STOP_SPRINT:
                    $obj = new EventRunner(AdvancedEvents::StopSprintEvent, false);
                    $obj->runEvent($player);
                    break;
            }
        }

        if ($packet instanceof LevelSoundEventPacket){
            $sound = $packet->sound;
            $position = $packet->position;
            $obj = new EventRunner(AdvancedEvents::SendSoundEvent, true, $event);
            $cancelled = $obj->runEvent($player, $sound, $position);
            if (!$cancelled){
                switch($sound){
                    case LevelSoundEventPacket::SOUND_ATTACK_NODAMAGE:
                        $obj = new EventRunner(AdvancedEvents::AirSwingEvent, true, $event);
                        $obj->runEvent($player, $sound, $position);
                        break;
                }
            }
        }
    }
}