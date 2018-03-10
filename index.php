<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System for automatic detection and implementation of YouTube video by Pierre Leocadie</title>
</head>
<body>

    <form method="get">
        <input type="text" name="videoLink" placeholder="Video Youtube Link" value="<?php echo (!empty($_GET['videoLink'])) ? $_GET['videoLink'] : ""; ?>">
        <input type="submit" name="test" value="Test">
        <input type="reset" value="Empty the field">
    </form>
    <?php
        if(isset($_GET['test'])){
            extract($_GET);

            if(!empty($videoLink)){
                // First Step : Analyze
                $analyzeLink = $videoLink;
                $analyzeSplit = explode("/", $analyzeLink);

                // Second Step : Treatment
                $treatmentLink = $analyzeSplit[3];
                $treatmentSplit = explode('=', $treatmentLink);

                // Third Step : Set up/Implementation
                $implementation = $analyzeSplit[0].'//'.$analyzeSplit[2].'/embed/'.$treatmentSplit[1];

                //Fourth Setp : Display
                $display = '<iframe width="560" height="315" src="'.$implementation.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

                // See informations
                    // Step 1
                var_dump($analyzeSplit);
                    // Step 2
                var_dump($treatmentSplit);

            }else{
                echo "Error";
            }
        }
    ?>
    <?php
        if(!empty($_GET['videoLink'])){
            echo $display;
            echo '<br/><a href="index.php" class="button">Delete this video</a>';
        }else{
            echo "<br/>No YOUTUBE video link has been submitted";
        }
    ?>
</body>
</html>