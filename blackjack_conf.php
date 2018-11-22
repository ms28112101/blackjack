<?php 

    public class blackjack {

        private $cards = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10],
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10]
        ];

        public function __construct() {}

        public function draw() {
            
            $column = rand(0 , 3);
            $row = rand(1 , 13);
            $card = [$column, $row];
            //$cards[$column][$row] = 0;

            return $card;
        }

        public function judge($user_cards, $dealer_cards) {

            if ($user_cards > $dealer_cards) {
                $result = 'WIN';
            } else {
                $result = 'LOSE';
            }

            return $result;
        }
    }

?>