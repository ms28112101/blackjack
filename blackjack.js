$(funciton(){

    $('#start').click(function(){
        $(this).remove();
        $.ajax({
            url: 'blackjack_draw.php',
            type: 'POST'
        })
        .done(function(){
            var card = JSON.parse();
        })
        .fail(function(){
            var_dump("NG");
        });
    });

    $('#stand').click(function(){ 
        $.ajax({url: 'blackjack_judge.php',
                type: 'POST'
        })
        .done(function(user_card, dealer_card) {

        })
        .fail(function() {

        });
    });

    $('#hit').click(function(){
        $.ajax({url: 'blackjack_conf.php',
                type: 'POST'
        })
        .done(function(){

        })
        .fail(function(){

        });
    });
});