<?php
session_start();

// Reset adventure if needed
if (!isset($_SESSION['cave_stage'])) {
    $_SESSION['cave_stage'] = 'start';
}

// Process user choices
if (isset($_GET['choice'])) {
    $_SESSION['cave_stage'] = $_GET['choice'];
}

// Define story stages
$stages = [
    'start' => [
        'description' => 'You enter a dark, echoing cave with crystals glimmering on the walls.',
        'choices' => [
            'follow_stream' => 'Follow the Underground Stream',
            'explore_crystals' => 'Investigate the Crystal Formations'
        ]
    ],
    'follow_stream' => [
        'description' => 'The stream leads you to a hidden underground lake with bioluminescent creatures.',
        'choices' => [
            'swim' => 'Swim in the Lake',
            'observe' => 'Observe from the Shore'
        ]
    ],
    'explore_crystals' => [
        'description' => 'The crystals pulse with an otherworldly energy, revealing ancient cave drawings.',
        'choices' => [
            'touch_crystals' => 'Touch the Crystals',
            'take_photo' => 'Try to Photograph the Drawings'
        ]
    ],
    'swim' => [
        'description' => 'Magical underwater currents guide you to a secret cavern!',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'observe' => [
        'description' => 'The bioluminescent creatures perform a mesmerizing dance.',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'touch_crystals' => [
        'description' => 'The crystals reveal ancient memories of the cave\'s history!',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'take_photo' => [
        'description' => 'Your camera mysteriously captures impossible images of the past.',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ]
];

// Current stage
$current_stage = $_SESSION['cave_stage'];

// Reset if requested
if ($current_stage === 'restart') {
    $_SESSION['cave_stage'] = 'start';
    $current_stage = 'start';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mysterious Cave Adventure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container adventure">
        <h1>Mysterious Cave Adventure</h1>
        
        <div class="story-box">
            <p><?php echo $stages[$current_stage]['description']; ?></p>
            
           <div class="choice-buttons">
                <?php foreach ($stages[$current_stage]['choices'] as $choice => $text): ?>
                    <a href="?choice=<?php echo $choice; ?>" class="choice-btn">
                        <?php echo $text; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <a href=" index.html" class="return-btn">Return to Doors</a>
        </div>
    </div>
</body>
</html>