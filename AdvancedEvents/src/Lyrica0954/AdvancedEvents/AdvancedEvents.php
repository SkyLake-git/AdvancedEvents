<?php

declare(strict_types=1);

namespace Lyrica0954\AdvancedEvents;

use pocketmine\plugin\PluginBase;

use Lyrica0954\AdvancedEvents\EventListener;

class AdvancedEvents extends PluginBase{

    public const StartBreakBlockEvent = 'Lyrica0954\AdvancedEvents\event\player\StartBreakBlockEvent';
    public const AbortBreakBlockEvent = 'Lyrica0954\AdvancedEvents\event\player\AbortBreakBlockEvent';
    public const StartSneakEvent      = 'Lyrica0954\AdvancedEvents\event\player\StartSneakEvent';
    public const StopSneakEvent       = 'Lyrica0954\AdvancedEvents\event\player\StopSneakEvent';
    public const SendSoundEvent       = 'Lyrica0954\AdvancedEvents\event\player\SendSoundEvent';
    public const AirSwingEvent        = 'Lyrica0954\AdvancedEvents\event\player\AirSwingEvent';
    public const StartSprintEvent     = 'Lyrica0954\AdvancedEvents\event\player\StartSprintEvent';
    public const StopSprintEvent      = 'Lyrica0954\AdvancedEvents\event\player\StopSprintEvent';

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this),$this);
        $this->getServer()->getLogger()->info("§d[AdvancedEvents] §fAdvancedEvents has been loaded!");
    }
}
