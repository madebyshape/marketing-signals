<?php

   return [
      '*' => [
         'enabled' => false,
         'enableDangerousTools' => false,
      ],
      'dev' => [
         'enabled' => true,
         'enableDangerousTools' => true,
         // Seeded content has to be live for screenshot evidence.
         'entryWriteMode' => 'live',
      ],
   ];
