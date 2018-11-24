<?php 

    class blackjack_draw {

        private $cards = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10]
        ];

        public function __construct() {}

        public function draw() {
            
            do {
                
                $column = rand(0 , 3);

                switch($column) {

                    case 0 :
                        $spell = "ハート";
                        break;

                    case 1 :
                        $spell = "ダイヤ";
                        break;

                    case 2 :
                        $spell = "スペード";
                        break;

                    case 3 :
                        $spell = "クローバー";
                        break;
                }

                $row = rand(1 , 13);
                $temp = $cards[$spell][$row];
                $cards[$spell][$row] = 0;

                if ($temp != 0) {
                    $dealer_card[] = $temp;
                    $dealer_card_sum = array_sum($dealer_card);
                }

            } while( $dealer_card_sum < 17);

            $card[] = $dealer_card_sum;

            echo json_encode($card);
        }
        
    }

?>

<?php 
                $blackjack = new blackjack_conf();
                
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