<?php

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/application',
        __DIR__ . '/Classes',
    ]);

    // Define what rule sets will be applied
    // PHP_80 is the target version
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_80,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
    ]);

    // $rectorConfig->importNames();
    // $rectorConfig->importShortClasses(false);

    // Skip specific files or directories if needed
    // For now, not skipping PHPExcel to see if Rector can help,
    // but it will be replaced later.
    // $rectorConfig->skip([
    //     __DIR__ . '/Classes/PHPExcel',
    // ]);
};
