<?php
session_start();

// Reset adventure if needed
if (!isset($_SESSION['castle_stage'])) {
    $_SESSION['castle_stage'] = 'start';
}

// Process user choices
if (isset($_GET['choice'])) {
    $_SESSION['castle_stage'] = $_GET['choice'];
}

// Define story stages
$stages = [
    'start' => [
        'description' => 'You stand before an imposing ancient castle with towers reaching into the misty sky.',
        'choices' => [
            'enter_main_gate' => 'Enter Through the Main Gate',
            'explore_side_wall' => 'Explore the Castle Walls'
        ]
    ],
    'enter_main_gate' => [
        'description' => 'The grand hall is filled with dusty artifacts and mysterious portraits.',
        'choices' => [
            'examine_artifacts' => 'Examine the Artifacts',
            'climb_stairs' => 'Climb the Spiral Staircase'
        ]
    ],
    'explore_side_wall' => [
        'description' => 'You discover a hidden entrance through an old servant\'s passage.',
        'choices' => [
            'follow_passage' => 'Follow the Passage',
            'turn_back' => 'Turn Back'
        ]
    ],
    'examine_artifacts' => [
        'description' => 'An ancient map reveals a long-forgotten family secret!',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'climb_stairs' => [
        'description' => 'The staircase leads to a magical library with floating books!',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'follow_passage' => [
        'description' => 'The passage opens into a hidden treasure room!',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ],
    'turn_back' => [
        'description' => 'You narrowly avoid a magical trap hidden in the walls.',
        'choices' => [
            'restart' => 'Return to Start'
        ]
    ]
];

// Current stage
$current_stage = $_SESSION['castle_stage'];

// Reset if requested
if ($current_stage === 'restart') {
    $_SESSION['castle_stage'] = 'start';
    $current_stage = 'start';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ancient Castle Adventure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container adventure">
        <h1>Ancient Castle Adventure</h1>
        
        <div class="story-box">
            <p><?php echo $stages[$current_stage]['description']; ?></p>
            
            <div class="choice-buttons">
                <?php foreach ($stages[$current_stage]['choices'] as $choice => $text): ?>
                    <a href="?choice=<?php echo $choice; ?>" class="choice-btn">
                        <?php echo $text; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            
            <a href="index.html" class="return-btn">Return to Doors</a>
        </div>
    </div>
</body>
</html>