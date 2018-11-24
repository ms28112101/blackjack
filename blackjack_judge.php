<?php 
    class blackjack_judge {

        public function __construct () {}

        public function judge($user_cards, $dealer_cards) {

            if ($user_cards > $dealer_cards) {
                $result = 'WIN';
            } else {
                $result = 'LOSE';
            }

            echo json_encode($result);
        }
    }
?>