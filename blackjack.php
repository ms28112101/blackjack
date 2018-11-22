<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h2>ブラックジャック</h2><br>
        <button id="start">start</button>
        <form action="blackjack_conf.php" method="post">
            <input type="submit" name="stand" value="stand">
            <input type="submit" name="hit" value="hit">
        </form>
        <!== standが勝負、hitはカード引きます ==>

        <script>
            
            $(funciton(){

                $('#start').on('click', function(){
                    $(this).remove();
                    $.ajax({
                        url: 'blackjack_conf.php',
                        type: 'POST'
                    })
                    .done(function){
                        <?php 
                            $blackjack = new blackjack();
                            
                            do {
                                
                                $dealer_card[] = $blackjack->drow();
                                $dealer_card_sum = array_sum($dealer_card);
                                echo htmlspecialchars($dealer_card . "\t" . $dealer_card_sum . "\n");

                            } while( $dealer_card_sum < 17);

                            for ($i = 0; $i < 2; $i++) {

                                $user_card[] = $blackjack->drow();
                                $user_card_sum = array_sum($user_card);
                                echo htmlspecialchars($user_card . "\t" . $user_card_sum . "\n");
                            }                            

                            while(true) {

                                if( $user_card_sum > 21) {

                                    echo htmlspecialchars("LOSE" . "\n");
                                    break;
                                } elseif( $dealer_card_sum > 21) {

                                    echo htmlspecialchars("WIN" . "\n");
                                    break;
                                } elseif($_POST['hit']) {

                                    $user_card[] = $blackjack->drow();
                                } elseif($_POST['stand']) {
    
                                    $result = $blackjack->judge($user_card_sum, $dealer_card_sum);
                                    echo htmlspecialchars($result . "\n");
                                    break;
                                }
                            }

                            ?>
                    }.fail(function){
                        var_dump("NG");
                    }
                });
            });
        </script>

    </body>
</html>